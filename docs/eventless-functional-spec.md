## Eventless Rebuild – Functional Requirements & Data Model

### 1. Goal & Scope
Migrate to Laravel 11 project using Livewire 3 for all interactive views.
- Deliver a fun World Cup prediction game where registered users submit match score predictions, see live/final fixtures, and compare performance on a global scoreboard.
- Scope excludes payments, gambling, or integrations beyond what is present in the reference repo.

### 2. User Roles
- **Guest**
  - Browse fixtures/results in read-only mode.
  - View scoreboard usernames without email visibility.
- **Registered User**
  - Full auth lifecycle (sign up, sign in/out, password change, profile edit).
  - Manage own predictions while matches are still “Not started”.
  - Review personal prediction history and accumulated points.
- **Administrator / Staff**
  - Same capabilities as a registered user plus ability to manage teams, games, and finalize results (admin usage). Implementation will rely on existing Filament admin tooling.

### 3. Functional Requirements
#### Authentication & Profile
- Email + username registration form with password confirmation and uniqueness validation.
- Sign-in form with error feedback; redirect authenticated users away from auth pages.
- Profile screen shows username, obfuscated email for other viewers, and buttons for “Edit profile” and “Change password” for the owner only.
- Edit profile form lets a user change email (with duplicate check).
- Change password form enforces password confirmation and logs the user out after success.

#### Games & Fixtures
- Manage national teams list (name + crest). Each team can appear as home or away in many games.
- Maintain games with: UID, title, home team, away team, scheduled start, state (`Not started`, `Live`, `Finished`), and live/final scores.
- Fixtures page:
  - Shows upcoming/live games ordered by start time.
  - Guests see scores only when a match is Live; otherwise they see “-”.
  - Authenticated users see their own prediction inline. Clicking a non-live game opens the prediction form (`/predictions/{username}-{game-title}`).
  - Live games display real scores and disable prediction editing.
- Results page lists finished games in reverse chronological order with score, prediction, and per-match points (0/1/3) color-coded.

#### Predictions
- Each user–game pair has at most one prediction (title composed of `{user}-{game}`).
- Prediction form requires both scores, validates numeric input, and is only accessible if:
  - The authenticated user matches the prediction owner.
  - The game state is `Not started`.
  - The current time is before the game’s `start_time`.
- Points engine (triggered when a game is saved/finalized):
  - Exact score → 3 points.
  - Correct outcome (win/draw) but wrong score → 1 point.
  - Wrong outcome → 0 points.
  - Once graded, `is_open` flips to `false` to lock the prediction.

#### Scoreboard & History
- Scoreboard aggregates all closed predictions:
  - Totals: points, exact hits (`correct`), partial hits (`semi_correct`), misses.
  - Sorted by points descending, displaying rank and linking to user profiles.
- Profile history shows finished games with the user’s prediction, actual score, state, and earned points.
- “Rules” static page outlines scoring logic (from Django template).

### 4. Data Model Overview
| Entity | Key Fields | Notes |
| --- | --- | --- |
| **users** | `id`, `username`, `email`, `password`, `active`, `staff`, `admin`, `hide_email`, timestamps | Extends Laravel’s default `users` |
| **teams** | `id`, `name` | One row per national team; name used to map crest images. |
| **games** | `id`, `uid`, `title`, `home_team_id`, `away_team_id`, `home_goals`, `away_goals`, `start_time`, `state`, timestamps | `title` defaults to `{home}-{away}-{uid}`. Updating scores triggers prediction grading. |
| **predictions** | `id`, `user_id`, `game_id`, `home_prediction`, `away_prediction`, `points`, `prediction_time`, `is_open`, timestamps | Unique `(user_id, game_id)`; title derived from referenced entities for URLs. |

### 5. ER Diagram
```mermaid
erDiagram
    users ||--o{ predictions : "makes"
    games ||--o{ predictions : "accepts"
    teams ||--o{ games : "home_team"
    teams ||--o{ games : "away_team"

    users {
        bigint id PK
        string username UNIQUE
        string email UNIQUE
        bool active
        bool staff
        bool admin
        bool hide_email
        timestamp created_at
        timestamp updated_at
    }

    teams {
        bigint id PK
        string name UNIQUE
    }

    games {
        bigint id PK
        smallint uid UNIQUE
        string title
        bigint home_team_id FK -> teams.id
        bigint away_team_id FK -> teams.id
        smallint home_goals
        smallint away_goals
        datetime start_time
        string state
        timestamp created_at
        timestamp updated_at
    }

    predictions {
        bigint id PK
        bigint user_id FK -> users.id
        bigint game_id FK -> games.id
        smallint home_prediction
        smallint away_prediction
        smallint points
        datetime prediction_time
        bool is_open
        timestamp created_at
        timestamp updated_at
    }
```

### 6. Implementation Notes for Laravel + Livewire
- Map each Django view to a Livewire component: `Fixtures`, `Results`, `Scoreboard`, `Profile`, `PredictionForm`, `Auth` screens.
- Use policies/middleware to enforce access control (e.g., editing predictions only by owner).
- Schedule a job/command for importing fixtures or updating scores if needed; in Django it relied on admin edits, so Filament resources can handle it.
- Reuse existing Tailwind/Vite pipeline; crest assets can live under `public/images/teams`.
- Keep scoring business rules inside a dedicated service triggered from Eloquent model observers .



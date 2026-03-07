<x-layouts.base>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Game Results</h1>
        
        @if($results->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($results as $game)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        @if($game->start_time)
                            <div class="text-center mb-4">
                                <p class="text-sm text-gray-500">{{ $game->start_time->format('d M Y') }}</p>
                                <p class="text-xs text-gray-400">{{ $game->start_time->format('H:i') }}</p>
                            </div>
                        @endif
                        
                        <div class="flex items-center justify-between">
                            <div class="text-center flex-1">
                                <p class="font-semibold text-lg">{{ $game->homeTeam?->name ?? 'Home Team' }}</p>
                                <p class="text-2xl font-bold">{{ $game->home_goals ?? '-' }}</p>
                            </div>
                            
                            <div class="px-4 text-center">
                                <p class="text-gray-500 text-sm">VS</p>
                            </div>
                            
                            <div class="text-center flex-1">
                                <p class="font-semibold text-lg">{{ $game->awayTeam?->name ?? 'Away Team' }}</p>
                                <p class="text-2xl font-bold">{{ $game->away_goals ?? '-' }}</p>
                            </div>
                        </div>
                        
                        @if($game->title)
                            <div class="mt-4 pt-4 border-t">
                                <p class="text-xs text-gray-500 text-center">{{ $game->title }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-100 rounded-lg p-8 text-center">
                <p class="text-gray-600 text-lg">No finished games available yet.</p>
            </div>
        @endif
    </div>
</x-layouts.base>

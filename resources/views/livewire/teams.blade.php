<div>
    <h1>
        TEAMS FINALIST LIST EURO 2024
    </h1>
</div>

<div>
    <div class="Categorynav" style="width: 368px; height: 273px; justify-content: flex-end; align-items: center; gap: 14px; display: inline-flex">
        <div class="CategoryNonActive" style="width: 108px; height: 115px; position: relative">
            <div class="Group7" style="width: 108px; height: 115px; left: 0px; top: 0px; position: absolute">
                <div class="Rectangle1" style="width: 108px; height: 115px; left: 0px; top: 0px; position: absolute; background: rgba(255, 255, 255, 0.50); border-radius: 16px"></div>
                <div class="C" style="left: 23px; top: 76px; position: absolute; text-align: center; color: white; font-size: 12px; font-family: Tajawal; font-weight: 700; word-wrap: break-word">المجموعة C</div>
            </div>
            <div class="Argentina" style="width: 40px; height: 40px; left: 34px; top: 20px; position: absolute">
                <div class="Vector" style="width: 40px; height: 40px; left: 0px; top: 0px; position: absolute; background: #F0F0F0"></div>
                <div class="Group" style="width: 36.03px; height: 40px; left: 1.98px; top: 0px; position: absolute">
                    <div class="Vector" style="width: 36.03px; height: 11.30px; left: 0px; top: 0px; position: absolute; background: #338AF3"></div>
                    <div class="Vector" style="width: 36.03px; height: 11.30px; left: 0px; top: 28.70px; position: absolute; background: #338AF3"></div>
                </div>
                <div class="Vector" style="width: 11.96px; height: 11.37px; left: 14.02px; top: 14.31px; position: absolute; background: #FFDA44"></div>
            </div>
        </div>
        <div class="CategoryNonActive" style="width: 108px; height: 115px; position: relative">
            <div class="Group7" style="width: 108px; height: 115px; left: 0px; top: 0px; position: absolute">
                <div class="Rectangle1" style="width: 108px; height: 115px; left: 0px; top: 0px; position: absolute; background: rgba(255, 255, 255, 0.50); border-radius: 16px"></div>
                <div class="B" style="left: 23px; top: 76px; position: absolute; color: white; font-size: 12px; font-family: Tajawal; font-weight: 700; word-wrap: break-word">المجموعة B</div>
            </div>
            <div class="England" style="width: 40px; height: 40px; left: 34px; top: 20px; position: absolute">
                <div class="Vector" style="width: 40px; height: 40px; left: 0px; top: 0px; position: absolute; background: #F0F0F0"></div>
                <div class="Vector" style="width: 40px; height: 40px; left: 0px; top: 0px; position: absolute; background: #D80027"></div>
            </div>
        </div>
        <div class="CategoryActive" style="width: 108px; height: 115px; position: relative">
            <div class="Rectangle2" style="width: 108px; height: 115px; left: 0px; top: 0px; position: absolute; background: #FF004C; border-radius: 16px"></div>
            <div class="A" style="left: 22px; top: 76px; position: absolute; text-align: center; color: white; font-size: 12px; font-family: Tajawal; font-weight: 700; word-wrap: break-word">المجموعة A</div>
            <div class="Qatar" style="width: 40px; height: 40px; left: 34px; top: 20px; position: absolute">
                <div class="Vector" style="width: 40px; height: 40px; left: 0px; top: 0px; position: absolute; background: #F0F0F0"></div>
                <div class="Vector" style="width: 32.17px; height: 40px; left: 7.83px; top: 0px; position: absolute; background: #751A46"></div>
            </div>
        </div>
    </div>
    @foreach ($teams as $team)
        <div wire:key="{{ $team->id }}">
            <div>
                {{$team->name}}
            </div>
            <div>
                <img src="/storage/{{$team->flag}}" alt="team-flag">
            </div>
        </div>
    @endforeach
</div>

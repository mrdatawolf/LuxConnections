<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-2">
        <div class="members">
            <div class="title">Members</div>
            <div class="body grid lg:grid-cols-2 grid-cols-1">
                <div class="user warning m-4 p-2 rounded bg-yellow-300">
                    <div class="grid grid-cols-3">
                        <div class="supporting_staff"><span class="material-icons bg-red-600 rounded-full" title="supported by: 2">group</span></div>
                        <div class="last_heard"><span class="material-icons bg-green-600 rounded-full">record_voice_over</span></div>
                        <div class="last_reached_out"><span class="material-icons bg-green-600 rounded-full">ring_volume</span></div>
                    </div>
                    <div class="name">1llusionist#1981</div>
                    <div class="grid grid-cols-2">
                        <div class="last_heard">Last heard: 01/01/2021</div>
                        <div class="last_reachout">Reached out: 03/01/2021</div>
                    </div>
                    <div class="reachout_times" title="Ambear x3, Brealok x4">Times reached out too: 7</div>

                </div>
                <div class="user danger m-4 p-2 rounded bg-red-300">
                    <div class="grid grid-cols-3">
                        <div class="supporting_staff"><span class="material-icons bg-green-600 rounded-full" title="supported by: 1">group</span></div>
                        <div class="last_heard"><span class="material-icons bg-red-600 rounded-full">record_voice_over</span></div>
                        <div class="last_reached_out"><span class="material-icons bg-red-600 rounded-full">ring_volume</span></div>
                    </div>
                    <div class="name">1one#1586</div>
                    <div class="grid grid-cols-2">
                        <div class="last_heard">Last heard: 10/01/2020</div>
                        <div class="last_reachout">Reached out: 01/01/2021</div>
                    </div>
                    <div class="reachout_times" title="Ambear x3, Brealok x2">Times reached out too: 6</div>
                </div>
                <div class="user m-4 p-2 rounded bg-gray-300">
                    <div class="grid grid-cols-3">
                        <div class="supporting_staff"><span class="material-icons bg-green-600 rounded-full" title="supported by: 1">group</span></div>
                        <div class="last_heard"><span class="material-icons bg-red-600 rounded-full">record_voice_over</span></div>
                        <div class="last_reached_out"><span class="material-icons bg-green-600 rounded-full">ring_volume</span></div>
                    </div>
                    <div class="name">à¹–Ì¶Ì¶Ì¶Î¶ÍœÍ¡ GrimmÎ¶ÍœÍ¡à¹–#1817</div>
                    <div class="grid grid-cols-2">
                        <div class="last_heard">Last heard: 01/01/2021</div>
                        <div class="last_reachout">Reached out: 04/01/2021</div>
                    </div>
                    <div class="reachout_times" title="Ambear x3">Times reached out too: 3</div>
                </div>
                <div class="user m-4 p-2 rounded bg-gray-300">
                    <div class="grid grid-cols-3">
                        <div class="supporting_staff"><span class="material-icons bg-green-600 rounded-full" title="supported by: 1">group</span></div>
                        <div class="last_heard"><span class="material-icons bg-green-600 rounded-full">record_voice_over</span></div>
                        <div class="last_reached_out"><span class="material-icons bg-green-600 rounded-full">ring_volume</span></div>
                    </div>
                    <div class="supporting_staff">supported by: 1</div>
                    <div class="name">à¹–Û£ÛœÎ¶Í¡ÍœBraelok#1894</div>
                    <div class="grid grid-cols-2">
                        <div class="last_heard">Last heard: 04/15/2021</div>
                        <div class="last_reachout">Reached out: 01/01/2021</div>
                    </div>
                    <div class="reachout_times" title="Ambear x1">Times reached out too: 1</div>
                </div>
            </div>
        </div>
        <div class="staff">
            <div class="title">Staff</div>
            <div class="body">
                <div class="staff m-4 p-2 rounded bg-gray-300">
                    <div class="name">Phylast</div>
                    <div class="grid grid-cols-1">
                        <div class="support_load"><span class="material-icons bg-green-300 rounded-full" title="supported by: 1">fitness_center</span></div>
                    </div>
                    <div class="current_members_supported">1</div>
                    <div class="supporting">Supporting: <span class="bg-gray-500 rounded-full pl-2 pr-2">1llusionist#1981</span></div>
                </div>
                <div class="staff m-4 p-2 rounded bg-gray-300">
                    <div class="name">Ambear</div>
                    <div class="grid grid-cols-1">
                        <div class="support_load"><span class="material-icons bg-green-300 rounded-full" title="supported by: 1">fitness_center</span></div>
                    </div>
                    <div class="current_members_supported">2</div>
                    <div class="supporting">Supporting: <span class="bg-gray-500 rounded-full pl-2 pr-2">1one#1586</span><span class="bg-gray-500 rounded-full pl-2 pr-2">1llusionist#1981</span></div>
                </div>
                <div class="staff m-4 p-2 rounded bg-gray-300">
                    <div class="name">Braelok</div>
                    <div class="grid grid-cols-1">
                        <div class="support_load"><span class="material-icons bg-yellow-500 rounded-full" title="supported by: 1">fitness_center</span></div>
                    </div>
                    <div class="current_members_supported">2</div>
                    <div class="supporting">Supporting: <span class="bg-gray-500 rounded-full pl-2 pr-2">à¹–Ì¶Ì¶Ì¶Î¶ÍœÍ¡ GrimmÎ¶ÍœÍ¡à¹–#1817</span><span class="bg-gray-500 rounded-full pl-2 pr-2">à¹–Û£ÛœÎ¶Í¡ÍœBraelok#1894</span></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

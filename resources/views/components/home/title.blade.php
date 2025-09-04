    <div class="bg-white flex flex-col gap-3">
        <div class=" flex flex-col text-left gap-5">
            <div>
                @if(!empty($badge))
                <span class="inline-block px-4 py-1  text-[13px] font-medium text-gray-700 bg-[#f5f4f0] rounded-full">
                    {{ $badge }}
                </span>
                @endif
            </div>
            <div>
                @if(!empty($title))
                <h1 class="text-3xl sm:text-4xl md:text-[58px] text-gray-900">
                    {!! $title !!}
                </h1>
                @endif
            </div>
        </div>
    </div>
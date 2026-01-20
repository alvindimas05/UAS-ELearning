<div x-data="{ open: false }"
    style="display: flex; align-items: center; justify-content: space-between; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; background-color: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: box-shadow 0.2s;">
    <div style="display: flex; flex-direction: column; gap: 4px;">
        <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin: 0;">{{ $getRecord()->title }}</h3>
        <div>
            @if ($getRecord()->type === 'video')
                <span
                    style="display: inline-flex; align-items: center; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: #dcfce7; color: #166534;">
                    Video
                </span>
            @elseif ($getRecord()->type === 'youtube')
                <span
                    style="display: inline-flex; align-items: center; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: #fee2e2; color: #991b1b;">
                    Youtube
                </span>
            @else
                <span
                    style="display: inline-flex; align-items: center; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: #dbeafe; color: #1e40af;">
                    Text
                </span>
            @endif
        </div>
    </div>

    <button type="button" @click="open = true"
        style="display: inline-flex; align-items: center; padding: 8px 16px; font-size: 0.875rem; font-weight: 500; color: white; background-color: #d97706; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.2s;"
        onmouseover="this.style.backgroundColor='#b45309'" onmouseout="this.style.backgroundColor='#d97706'">
        Show Content
    </button>

    <template x-teleport="body">
        <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            :style="open ?
                'position: fixed; inset: 0; z-index: 9999; padding: 16px; background-color: rgba(17, 24, 39, 0.75); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center;' :
                'display: none'">
            <div style="position: relative; width: 100%; max-width: 896px; background-color: white; border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); overflow-y: auto; max-height: 90vh; display: flex; flex-direction: column;"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                <!-- Close Button -->
                <button @click="open = false"
                    style="position: absolute; top: 16px; right: 16px; z-index: 10; padding: 8px; color: white; background-color: rgba(0, 0, 0, 0.5); border: none; border-radius: 9999px; cursor: pointer; transition: background-color 0.2s; display: flex; align-items: center; justify-content: center;"
                    onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.7)'"
                    onmouseout="this.style.backgroundColor='rgba(0, 0, 0, 0.5)'">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Media Section -->
                <div
                    style="width: 100%; background-color: black; display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                    @if ($getRecord()->type === 'video')
                        <video controls style="width: 100%; max-height: 60vh; object-fit: contain;">
                            <source src="{{ \Illuminate\Support\Facades\Storage::url($getRecord()->file_path) }}"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif ($getRecord()->type === 'youtube')
                        @php
                            $url = $getRecord()->url;
                            $videoId = null;
                            if (
                                preg_match(
                                    '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                    $url,
                                    $matches,
                                )
                            ) {
                                $videoId = $matches[1];
                            }
                        @endphp
                        @if ($videoId)
                            <iframe width="100%" height="450"
                                src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen style="width: 100%; max-height: 60vh;">
                            </iframe>
                        @else
                            <div style="color: white; padding: 20px;">Invalid Youtube URL</div>
                        @endif
                    @else
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($getRecord()->file_path) }}"
                            style="width: 100%; max-height: 60vh; object-fit: contain;" alt="{{ $getRecord()->title }}">
                    @endif
                </div>

                <!-- Description Section -->
                <div style="padding: 24px; background-color: white;">
                    <h2
                        style="font-size: 1.5rem; font-weight: 700; margin-bottom: 16px; color: #111827; margin-top: 0;">
                        {{ $getRecord()->title }}</h2>
                    <div style="max-width: none; color: #374151; line-height: 1.75;">
                        {!! \Illuminate\Support\Str::markdown($getRecord()->description ?? '') !!}
                    </div>
                </div>

            </div>
        </div>
    </template>
</div>

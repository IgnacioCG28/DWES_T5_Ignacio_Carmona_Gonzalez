<button
    {{ $attributes->merge([
        'type' => 'submit',
        'style' =>
            'display: inline-flex; align-items: center; padding-left: 1rem; padding-right: 1rem; padding-top: 0.5rem; padding-bottom: 0.5rem; background-color: #10B981; border-width: 1px; border-color: transparent; border-radius: 0.375rem; /* 6px */ font-weight: 600; font-size: 0.75rem; /* 12px */ color: #fff; text-transform: uppercase; letter-spacing: 0.2em; background-color: #A7F3D0; /* on hover */ background-color: #047857; /* on active */ outline: none; /* on focus */ box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.5); /* on focus */ box-shadow: 0 0 0 3px #10B981; /* on focus */ box-shadow: 0 0 0 5px rgba(0, 0, 0, 0.6); /* on focus */ box-shadow: 0 0 0 5px #1F2937; /* on focus */ transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms;',
    ]) }}>
    {{ $slot }}
</button>

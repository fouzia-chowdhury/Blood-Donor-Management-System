<button {{ $attributes->merge(['type' => 'submit', 'style' => 'background-color: #FF2D55; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; text-transform: uppercase; border: none; cursor: pointer;']) }} onmouseover="this.style.backgroundColor='#e6294d'" onmouseout="this.style.backgroundColor='#FF2D55'">
    {{ $slot }}
</button>
<label><br>{$label}<br>
    <input type='password' name='{$name}['serial']' value='{$value}['serial']'>
    {if $required eq 'true'}*{/if}
    <input type='password' name='{$name}['number']' value='{$value}['number']'>
    {if $required eq 'true'}*{/if}
</label>
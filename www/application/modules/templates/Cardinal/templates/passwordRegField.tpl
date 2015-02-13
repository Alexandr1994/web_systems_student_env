<label><br>{$label}<br>
    <input type='password' name='{$name}['main']' value='{$value}['main']'>
    {if $required eq 'true'}*{/if}
    <br>Повторите {$label}<br>
    <input type='password' name='{$name}['repeat']' value='{$value}['repeat']'>
    {if $required eq 'true'}*{/if}
</label>
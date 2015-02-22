<label><br><font {if $error eq 'true'}color="red"{/if}>{$label}</font><br>
    <input type='password' name='{$name}['main']' value='{$value}['main']'>
    {if $required eq 'true'}*{/if}
    <br><font {if $error eq 'true'}color="red"{/if}>Повторите {$label}</font><br>
    <input type='password' name='{$name}['repeat']' value='{$value}['repeat']'>
    {if $required eq 'true'}*{/if}
</label>
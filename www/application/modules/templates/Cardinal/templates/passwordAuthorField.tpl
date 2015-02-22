<label><br><font {if $error eq 'true'}color="red"{/if}>{$label}</font><br>
    <input type='password' name='{$name}' value='{$value}'>
    {if $required eq 'true'}*{/if}
</label>
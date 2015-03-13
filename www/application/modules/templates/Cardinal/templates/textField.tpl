{*Smarty*}
<label><br><font {if $error eq 'true'}color="red"{/if}>{$label}</font><br>
    <input type='text' name='{$name}' value='{$value}'>
    {if $required eq 'true'}<font>*</font>{/if}
</label>
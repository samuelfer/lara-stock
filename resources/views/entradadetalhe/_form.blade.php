<input type="button" id="add_field" value="Adicionar">
<table id="listas" border="0">
    <tr>
        <th>Nome</th>
        <th>Data Nasc.</th>
        <th>Estamos bem?</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td><input type="text" name="utente[]" id="utente" maxlength="150"></td>
        <td><input type="text" name="dta_nasc[]" id="dta_nasc" maxlength="10" placeholder="yyyy-mm-dd"></td>
        <td>
            Sim&nbsp;<input type="radio" value="1" name="cool[0]" id="urgente">&nbsp;
            N&atilde;o&nbsp;<input type="radio" value="0" name="cool[0]" id="urgente" checked>&nbsp;
        </td>
    </tr>
</table>


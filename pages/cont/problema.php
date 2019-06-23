<?php


/**
 * Description of problema
 *
 * @author felip
 */
class problema {

    function __construct() {

        echo "<script>
    function submit() {
        document.formp.submit();
    }
</script>
<div id='corpo' >
    <form id='formp' name='formp' method='POST' action='#'>
        <fieldset>
            <legend>Relatar problema</legend>
            <div class='campo'>
                <div class='nome-campo'>
                    <p><span>Assunto:*</span></p>
                    <p><span>Descrição:</span></p>
                </div>
                <div class='item-campo'>
                    <p><input type='text' name='assunto' /></p>
                    <p><textarea name='descricao' rows='5' cols='40' maxlength='400'></textarea></p>

                </div>
                <p >
                <input type='hidden' name='est' value='cad'/>
                    <input style='margin-top:3em;' type='button' name='problema' value='Prosseguir' onclick='submit();'/></p>
            </div>
        </fieldset>
    </form>
    </div>";
    }

}

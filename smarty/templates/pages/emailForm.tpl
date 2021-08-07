<form name="sendEmailForm" action="" method="post">
    <fieldset>
        <legend>メール</legend>
        お店のメールへ: <input type="text" name="storeEmail" value="simple.cofeeshop@gmail.com"  style="width: 300px;" disabled><br>
        他のメールへ: <select name = 'otherEmail' >
            <option value = '1' >To</option>
            <option value = '2' >CC</option>
            <option value = '3' >BCC</option>
        </select>
        <input type="text" name="addedEmail"  style="width: 300px;">
        <span class="error" style = "color: #FF0000;">{$emailErr}</span>
        <br><br>
        件名: <input type="text" name="title" style="width: 200px;">
        <span class="error" style = "color: #FF0000;" >* {$titleErr}</span>
        <br><br>
        内容: <span class="error" style = "color: #FF0000;" >* {$messageErr}</span>
        <textarea rows="5" name="message" cols="30" style="width: -webkit-fill-available;height: 300px;"></textarea>
        <br><br>
        <input type="submit" name="sendEmail" value="送る">
    </fieldset>
</form>

{* <script>
    function validateForm(){
        var title = document.forms["sendEmailForm"]["title"].value;
        var message = document.forms["sendEmailForm"]["message"].value;
        if (title == "") {
            alert("件名は空けっています");
            return false;
        }
        if (message == "") {
            alert("メールの内容は空けっています");
            return false;
        }
    }
</script> *}
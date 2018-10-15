<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet" />
<script type="text/javascript">
    $(".selectpicker").on("change", function() {
    var self = $(this);
    var values = self.val();

    $(".selectpicker").not(self).each(function() {
        var _values = $(this).val();
        for (var v = _values.length; v--;) {
            if (values.indexOf(_values[v]) >= 0) {
                _values.splice(v, 1);
            }
        }

        $(this).val(_values);
    });
});
</script>
<select class="selectpicker" multiple>
      <option value="1">Líder</option>
      <option value="10">Para Conhecimentor</option>
      <option value="11">Participante</option>
    </select>
    <br><br>
    <select class="selectpicker" multiple>
      <option value="1">Líder</option>
      <option value="10">Para Conhecimentor</option>
      <option value="11">Participante</option>
    </select>
    <br><br>
    <select class="selectpicker" multiple>
      <option value="1">Líder</option>
      <option value="10">Para Conhecimentor</option>
      <option value="11">Participante</option>
    </select>
    <br><br>
    <select class="selectpicker" multiple>
      <option value="1">Líder</option>
      <option value="10">Para Conhecimentor</option>
      <option value="11">Participante</option>
    </select>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
$(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "data.php", success: function(result){
      $("#div1").html(result);
    }});
  });
});
</script> -->

    <script language="javascript">
        function load_ajax() {
            $.ajax({
                url: "data.php",
                type: "post",
                dataType: "text",
                data: {

                    "glossary": {
                        "title": "example glossary",
                        "GlossDiv": {
                            "title": "S",
                            "GlossList": {
                                "GlossEntry": {
                                    "ID": "SGML",
                                    "SortAs": "SGML",
                                    "GlossTerm": "Standard Generalized Markup Language",
                                    "Acronym": "SGML",
                                    "Abbrev": "ISO 8879:1986",
                                    "GlossDef": {
                                        "para": "A meta-markup language, used to create markup languages such as DocBook.",
                                        "GlossSeeAlso": ["GML", "XML"]
                                    },
                                    "GlossSee": "markup"
                                }
                            }
                        }

                    }
                },
                success: function(result) {
                    $('#div1').html(result);
                }
            });
        }
    </script>
</head>

<body>

    <div id="div1">
        <h2>Let jQuery AJAX Change This Text</h2>
    </div>

    <button onclick="load_ajax()">Get External Content</button>

</body>

</html>
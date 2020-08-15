<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Publications</h1>
        </div>
        <div id="tabs">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 publications-tab-group">
                    <ul style="list-style: none;">
                        <li><a href="#tabs-1">Refereed Journal Articles in Print</a></li>
                        <li><a href="#tabs-2">Other Publications in Print</a></li>
                        <li><a href="#tabs-3">Refereed Journal Articles in the Press</a></li>
                        <li><a href="#tabs-4">Refereed Conference Proceedings</a></li>
                        <li><a href="#tabs-5">Conference Presentations</a></li>
                        <li><a href="#tabs-6">White Papers</a></li>
                    </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 publications-desc-group">
                <?php include 'publications-tabs.php'; ?> 
            </div>
                     
    </div>
    </div>
    <?php include 'footer.php'; ?>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
</script>

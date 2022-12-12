
    <footer class="main-footer">
        <div class="pull-right hidden-xs">Versi 1.0</div>
        IT Developer &copy; 2018
    </footer>

    <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    getdate();
});
function getdate() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }

    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;

    var tgl = ("&nbsp;" + thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
    var jam = (h + ":" + m + ":" + s + " WIB");
    $("#timer").html(tgl + ' ' + jam);
    setTimeout(function () { getdate() }, 1000);
}
</script>
</body>
</html>
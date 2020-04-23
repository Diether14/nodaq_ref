<div class="container py-4 px-4">
<div class="row rounded-lg overflow-hidden shadow">
    <!-- Users box-->
    <div class="col-5 px-0">
      <div class="card">
      <textarea name="msgpost" id="msgpost" cols="50" rows="10">
        <strong>Your</strong> HTML <em>code</em> goes here.<br>
        This text will be pre-loaded in the editor when it is rendered.
      </textarea>
      </div>
    </div>

</div>
</div>

<script>
var myEditor = new YAHOO.widget.Editor('msgpost', {
    height: '300px',
    width: '522px',
    dompath: true, //Turns on the bar at the bottom
    animate: true //Animates the opening, closing and moving of Editor windows
});
myEditor.render();
</script>
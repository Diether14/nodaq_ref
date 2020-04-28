
<main>

<div class="" style="margin-top: 20px; height:500px;">
  <div class="grid-container">
    <div class="grid-width-100">
      <div id="editor">
        
      </div>
      <button class="btn btn-primary save mt-3">Save Changes</button>
    </div>
  </div>
</div>

</main>

<script>
initSample();
$(document).ready(function(){
  $(".save").click(function(){
    var data = CKEDITOR.instances.editor.getData();
    console.log(data);
  });
});
 
</script>
<!-- <footer class="footer footer-default bg-dark w-footer" style="color:#ffffff">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              Weendi
            </a>
          </li>
          <li>
            <a href="#">
              About Us
            </a>
          </li>
          <li>
            <a href="#">
              Contact Us
            </a>
          </li>
         
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, 
        <a href="#" style="color:#ffffff" target="_blank">Weendi</a>
      </div>
    </div>
  </footer> -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url(); ?>/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  </div>

  <script src="<?= base_url(); ?>/public/user/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>/public/user/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/assets/js/main.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/assets/taginput/tagsinput.js" type="text/javascript"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- Load Tools -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script><!-- Image -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->

<!-- Load Editor.js's Core -->
<script src="<?= base_url(); ?>/public/editorjs/dist/editor.js"></script>

<!-- Initialization -->
<script>
  /**
   * Saving button
   */
  const saveButton = document.getElementById('saveButton');

  /**
   * To initialize the Editor, create a new instance with configuration object
   * @see docs/installation.md for mode details
   */
  var editor = new EditorJS({
    /**
     * Wrapper of Editor
     */
    holder: 'editorjs',

    /**
     * Tools list
     */
    tools: {

      

      paragraph: {
        config: {
          placeholder: "Enter something"
        }
      },
      /**
       * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
       */
      header: {
        class: Header,
        inlineToolbar: ['link'],
        config: {
          placeholder: 'Header'
        },
        shortcut: 'CMD+SHIFT+H'
      },

      /**
       * Or pass class directly without any configuration
       */
      // image: ImageTool,

      image: {
        class: ImageTool,
        config: {
          endpoints: {
            byFile: '<?= base_url(); ?>/community/upload-picture', // Your backend file uploader endpoint
            byUrl: '<?= base_url(); ?>/community/upload-picture', // Your endpoint that provides uploading by Url
          }
        }
      },

      list: {
        class: List,
        inlineToolbar: true,
        shortcut: 'CMD+SHIFT+L'
      },

      checklist: {
        class: Checklist,
        inlineToolbar: true,
      },

      quote: {
        class: Quote,
        inlineToolbar: true,
        config: {
          quotePlaceholder: 'Enter a quote',
          captionPlaceholder: 'Quote\'s author',
        },
        shortcut: 'CMD+SHIFT+O'
      },

      warning: Warning,

      marker: {
        class:  Marker,
        shortcut: 'CMD+SHIFT+M'
      },

      code: {
        class:  CodeTool,
        shortcut: 'CMD+SHIFT+C'
      },

      delimiter: Delimiter,

      inlineCode: {
        class: InlineCode,
        shortcut: 'CMD+SHIFT+C'
      },

      linkTool: LinkTool,

      embed: Embed,

      table: {
        class: Table,
        inlineToolbar: true,
        shortcut: 'CMD+ALT+T'
      },

    },
 
    i18n: {
      /**
       * @type {I18nDictionary}
       */
      messages: {
    
        "ui": {
          "blockTunes": {
            "toggler": {
              "Click to tune": "Click to tune",
              "or drag to move": "or drag to move"
            },
          },
          "inlineToolbar": {
            "converter": {
              "Convert to": "Convert to"
            }
          },
          "toolbar": {
            "toolbox": {
              "Add": "Add"
            }
          }
        },

        /**
         * Section for translation Tool Names: both block and inline tools
         */
        "toolNames": {
          "Text": "Text",
          "Heading": "Heading",
          "List": "List",
          "Warning": "Warning",
          "Checklist": "Checklist",
          "Quote": "Quote",
          "Code": "Code",
          "Delimiter": "Delimiter",
          "Raw HTML": "Raw HTML",
          "Table": "Table",
          "Link": "Link",
          "Marker": "Marker",
          "Bold": "Полужирный",
          "Italic": "Italic",
          "InlineCode": "InlineCode",
          "Image": "Image"
        },

        /**
         * Section for passing translations to the external tools classes
         */
        "tools": {
          /**
           * Each subsection is the i18n dictionary that will be passed to the corresponded plugin
           * The name of a plugin should be equal the name you specify in the 'tool' section for that plugin
           */
          "warning": { // <-- 'Warning' tool will accept this dictionary section
            "Title": "Title",
            "Message": "Message",
          },

          /**
           * Link is the internal Inline Tool
           */
          "link": {
            "Add a link": "Add a link"
          },
          /**
           * The "stub" is an internal block tool, used to fit blocks that does not have the corresponded plugin
           */
          "stub": {
            'The block can not be displayed correctly.': 'The block can not be displayed correctly.'
          },
          "image": {
            "Caption": "Caption",
            "Select an Image": "Select an Image",
            "With border": "With border",
            "Stretch image": "Stretch image",
            "With background": "With background",
          },
          "code": {
            "Enter a code": "Enter a code",
          },
          "linkTool": {
            "Link": "Link",
            "Couldn't fetch the link data": "Couldn't fetch the link data",
            "Couldn't get this link data, try the other one": "Couldn't get this link data, try the other one",
            "Wrong response format from the server": "Wrong response format from the server",
          },
          "header": {
            "Header": "Header",
          },
          "paragraph": {
            "Enter something": "Enter something"
          },
          "list": {
            "Ordered": "Ordered",
            "Unordered": "Unordered",
          }
        },

        /**
         * Section allows to translate Block Tunes
         */
        "blockTunes": {
          /**
           * Each subsection is the i18n dictionary that will be passed to the corresponded Block Tune plugin
           * The name of a plugin should be equal the name you specify in the 'tunes' section for that plugin
           *
           * Also, there are few internal block tunes: "delete", "moveUp" and "moveDown"
           */
          "delete": {
            "Delete": "Delete"
          },
          "moveUp": {
            "Move up": "Move up"
          },
          "moveDown": {
            "Move down": "Move down"
          }
        },
      }
    },

    /**
     * Initial Editor data
     */
    data: {
      blocks: [
        {
          type: "header",
          data: {
            text: "Editor.js",
            level: 2
          }
        },
        {
          type : 'paragraph',
          data : {
            text : 'Hey. Meet the new Editor. On this page you can see it in action — try to edit this text. Source code of the page contains the example of connection and configuration.'
          }
        },
        {
          type: "header",
          data: {
            text: "Key features",
            level: 3
          }
        },
        {
          type : 'list',
          data : {
            items : [
              'It is a block-styled editor',
              'It returns clean data output in JSON',
              'Designed to be extendable and pluggable with a simple API',
            ],
            style: 'unordered'
          }
        },
        {
          type: "header",
          data: {
            text: "What does it mean «block-styled editor»",
            level: 3
          }
        },
        {
          type : 'paragraph',
          data : {
            text : 'Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor\'s Core.'
          }
        },
        {
          type : 'paragraph',
          data : {
            text : `There are dozens of <a href="https://github.com/editor-js">ready-to-use Blocks</a> and the <a href="https://editorjs.io/creating-a-block-tool">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games.`
          }
        },
        {
          type: "header",
          data: {
            text: "What does it mean clean data output",
            level: 3
          }
        },
        {
          type : 'paragraph',
          data : {
            text : 'Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below'
          }
        },
        {
          type : 'paragraph',
          data : {
            text : `Given data can be used as you want: render with HTML for <code class="inline-code">Web clients</code>, render natively for <code class="inline-code">mobile apps</code>, create markup for <code class="inline-code">Facebook Instant Articles</code> or <code class="inline-code">Google AMP</code>, generate an <code class="inline-code">audio version</code> and so on.`
          }
        },
        {
          type : 'paragraph',
          data : {
            text : 'Clean data is useful to sanitize, validate and process on the backend.'
          }
        },
        {
          type : 'delimiter',
          data : {}
        },
        {
          type : 'paragraph',
          data : {
            text : 'We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make its core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. 😏'
          }
        },
     
      ]
    },
   
  });

  /**
   * Saving example
   */
  saveButton.addEventListener('click', function () {
    editor.save().then((savedData) => {
      // cPreview.show(savedData, document.getElementById("output"));
      console.log(savedData.blocks);
      var base_url = $('input[name=base]').val();
      var title = $("input[name=title]").val();
      var community_id = $("input[name=community_id]").val();
      var content = savedData;
      var tags = $("input[name=tags]").val();
      var category_id = $("input[name=category_id]").val();
      var subclass_id = $("input[name=subclass_id]").val();

      var data = {
        'content': content,
        'title': title,
        'community_id': community_id,
        'tags': tags,
        'category_id': category_id,
        'subclass_id': subclass_id
      };

      if(title == ''  || content == '' || community_id == '' || tags == ''  || category_id == '' || subclass_id == ''){
            alert('Please fill out the fields!');
      }else{
        $.ajax({
          type: "POST",
          url  : base_url + '/save_post',
          data:  data, 
          dataType: "JSON",  
          success: function(data)
          {
            alert(data.msg);
            location.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
            {
              alert('There is an error!');
            }
              });
      }
    });
  });
</script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>
</body>
</html>

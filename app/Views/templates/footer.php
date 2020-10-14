
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url(); ?>/public/user/assets/js/core/jquery.min.js" type="text/javascript"></script> -->
  <script src="<?= base_url(); ?>/public/user/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- <script src="<?= base_url(); ?>/public/user/assets/js/plugins/mentionjs/bootstrap-typeahead.js" type="text/javascript"></script> -->
  <!-- <script src="<?= base_url(); ?>/public/user/assets/js/plugins/mentionjs/mention.js" type="text/javascript"></script> -->
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/moment.min.js"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/jquery.timeago.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  
  
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>/public/user/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>

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


  <!-- emojis  -->
  <script src="<?= base_url()?>/public/assets/js/emoji-picker/config.js"></script>
  <script src="<?= base_url()?>/public/assets/js/emoji-picker/util.js"></script>
  <script src="<?= base_url()?>/public/assets/js/emoji-picker/jquery.emojiarea.js"></script>
  <script src="<?= base_url()?>/public/assets/js/emoji-picker/emoji-picker.js"></script>

  <!-- Load Editor.js's Core -->
  <script src="<?= base_url(); ?>/public/editorjs/dist/editor.js"></script>
  <script src="<?= base_url(); ?>/public/assets/js/main.js" type="text/javascript"></script>

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
      blocks: <?= json_encode(unserialize($blog['content'])); ?>
    },

    // data: {
    //   blocks: [
    //     <= json_encode(unserialize($blog['content'])); ?>
    //   ]
    // },

    
   
  });
  

  /**
   * Saving example
   */
</script>


</body>
</html>

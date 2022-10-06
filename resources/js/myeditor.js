// app.js

// import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor'
// import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials'
// import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph'
// import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold'
// import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic'
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor'
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials'

import Font from '@ckeditor/ckeditor5-font/src/font'

import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph'
import Heading from '@ckeditor/ckeditor5-heading/src/heading'
import Title from '@ckeditor/ckeditor5-heading/src/title'

import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold'
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic'
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough'
import Subscript from '@ckeditor/ckeditor5-basic-styles/src/subscript'
import Superscript from '@ckeditor/ckeditor5-basic-styles/src/superscript'
import ListProperties from '@ckeditor/ckeditor5-list/src/listproperties'
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline'

import Indent from '@ckeditor/ckeditor5-indent/src/indent'
import IndentBlock from '@ckeditor/ckeditor5-indent/src/indentblock'

import Table from '@ckeditor/ckeditor5-table/src/table'
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar'

import Image from '@ckeditor/ckeditor5-image/src/image'
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar'
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption'
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle'
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize'
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload'
import LinkImage from '@ckeditor/ckeditor5-link/src/linkimage'

import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter'

import FindAndReplace from '@ckeditor/ckeditor5-find-and-replace/src/findandreplace'

// import CKEditorInspector from '@ckeditor/ckeditor5-inspector'

export class DashboardEditor {
    targetId = undefined
    plugins = [
      Font,
      Heading,
      Essentials,
      Title,
      Paragraph,
      Bold,
      Italic,
      Strikethrough,
      Subscript,
      Superscript,
      Indent,
      IndentBlock,
      FindAndReplace,
      ListProperties,
      HorizontalLine,
      Table,
      TableToolbar,
      SimpleUploadAdapter,
      Image,
      ImageToolbar,
      ImageCaption,
      ImageStyle,
      ImageResize,
      ImageUpload,
      LinkImage
    ];
    toolbar = [
      'undo',
      'redo',
      '|',
      'heading',
      'fontSize',
      'bulletedList',
      'numberedList',
      'fontFamily',
      'fontColor',
      'fontBackgroundColor',
      '|',
      'bold',
      'italic',
      'underline',
      'superscript',
      'subscript',
      'strikethrough',
      'horizontalLine',
      '|',
      'outdent',
      'indent',
      '|',
      'insertTable',
      'imageUpload',
      '|',
      'findAndReplace'
    ];
    simpleUpload = {
      // The URL that the images are uploaded to.
      uploadUrl: 'http://http://06-nonconformingproduct.test/insert-image',

      // Enable the XMLHttpRequest.withCredentials property.
      withCredentials: true,

      // Headers sent along with the XMLHttpRequest to the upload server.
      headers: {
          'X-CSRF-TOKEN': document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute('content')
        }
      };

      heading = {
        options: [
          {
              model: 'paragraph',
              title: 'Paragraph',
              class: 'ck-heading_paragraph'
          },
          {
              model: 'heading1',
              view: 'h1',
              title: 'Heading 1',
              class: 'ck-heading_heading1'
          },
          {
              model: 'heading2',
              view: 'h2',
              title: 'Heading 2',
              class: 'ck-heading_heading2'
          },
          {
              model: 'heading3',
              view: 'h3',
              title: 'Heading 3',
              class: 'ck-heading_heading3'
          },
          {
              model: 'heading4',
              view: 'h4',
              title: 'Heading 4',
              class: 'ck-heading_heading4'
          },
          {
              model: 'heading5',
              view: 'h5',
              title: 'Heading 5',
              class: 'ck-heading_heading5'
          },
          {
              model: 'heading6',
              view: 'h6',
              title: 'Heading 6',
              class: 'ck-heading_heading6'
          }
        ],
      };

    /**
     * @param {string} elementId - a place for build the editor
     */
    setTarget (elementId) {
        let componentName = arguments[1]
        try {
            let targetId = document
                .querySelector(componentName)
                .shadowRoot.getElementById(elementId)
            this.targetId = targetId
            return this.targetId
        } catch (e) {
            let targetId = document.getElementById(elementId)
            this.targetId = targetId
            return this.targetId
        }
    }

    /**
     * @param {any} every argument is pushed into this.plugins
     */
    setPlugins () {
        if (arguments) {
            for (const arg of arguments) {
                this.plugins.includes(!arg) ? this.plugins.push(arg) : false
            }
        }
    }

    /**
     * @param {any} every argument is pushed into this.toolbar
     */
    setToolbar () {
        if (arguments) {
            for (const arg of arguments) {
                this.toolbar.includes(!arg) ? this.toolbar.push(arg) : false
            }
        }
    }

    get renderEditor () {

        return ClassicEditor.create(this.targetId, {
          heading: {
              options: this.heading.options,
          },
          fontFamily: {
              options: [
                  'default',
                  'Arial, sans-serif',
                  'Ubuntu Mono, Courier New, Courier, monospace'
              ],
              supportAllValues: true
          },
          plugins: this.plugins,
          toolbar: this.toolbar,

          simpleUpload: this.simpleUpload,
          
          image: {
              toolbar: [
                  'imageStyle:block',
                  'imageStyle:side',
                  '|',
                  'toggleImageCaption',
                  'imageTextAlternative',
                  '|',
                  'linkImage'
              ]
          },
          table: {
              defaultHeadings: { rows: 1, columns: 0 },
              contentToolbar: [
                  'tableColumn',
                  'tableRow',
                  'mergeTableCells',
                  'tableProperties',
                  'tableCellProperties'
              ],
              // Configuration of the TableProperties plugin.
              tableProperties: {
                  //
              },
              // Configuration of the TableCellProperties plugin.
              tableCellProperties: {
                  //
              }
          },
          fontSize: {
              options: ['default', 10, 11, 12, 13, 17, 19, 21],
              supportAllValues: true
          },
          list: {
              properties: {
                  styles: true,
                  startIndex: true,
                  reversed: true
              }
          },
          title: {
            placeholder: 'write here for the title'
          },
          placeholder: 'write here for the description'
      })
          .then(editor => {
              console.log('Editor was initialized', editor)
              // CKEditorInspector.attach(editor)
          })
          .catch(error => {
              console.error(error.stack)
          })
      
    }
}


// setTimeout(()=>{
//   try {
//     console.log('LINE-5, ini', MyEditor)
//     Dashboard.availableScript.push('editor/editor.bundle')
//     document.dispatchEvent(evn);
//   } catch (e) {
//     console.log('LINE-6, ini', MyEditor)
//     console.log(e.stack)
//   }
// },100)


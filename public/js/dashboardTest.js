
console.log('dashboard script for content is inialization')
const dashboard = {

    availableScript: [],
    dataToFetch: {
        // data required fetch to server
        // model1: [field11, field12, field13],
        // model2: [field21, field22, field23],
    },
    responseResult: {
        // data to fill out the client windows based on dataToFetch rule
        // model1: {
        // field11: string,
        // field12: string,
        // field13: string
        // },
        // model2: {
        // field21: string,
        // field22: string,
        // field23: string
        // }
        dpls: {

        }
    },
    previousContent: {
      name: '',
      componentName: ''
    },
    currentContent: {
      name: '',
      componentName: ''
    },

    /**
     * @param {any} url - relative public path, after the origin url without slash at the end
     */
    set scriptUrl(url){
      this.scriptUrl = window.location.origin + url;
    },

    // dibawah ini adalah script untuk mengganti/mengisi data UI dashboard-content, after UI has changed
    /**
     * @param {any} componentName - the template livewire to get any form message like input, select
     * @param string[] requiredModel - the data model required to fetch
     * setiap input atau select, tambahkan f-model = "users" untuk menandakan ini database tabelnya pakai yang mana
     */
    setData (componentName) {
        let shadowTemplate = document.querySelector(componentName).shadowRoot;
        // this.shadowTemplate = shadowTemplate;
        // get dataToFetch from formInput
        ['input[name]', 'select[name]'].forEach(value => {
            Object.values(shadowTemplate.querySelectorAll(value)).forEach(
                node => {
                    //untuk setiap tag ber-attribute name,...
                    let model = node.getAttribute('f-model')
                    let name = node.getAttribute('name')

                    if (this.dataToFetch[model]) {
                        if (!this.dataToFetch[model].includes(node.name)) {
                            this.dataToFetch[model].push(name)
                        }
                    } else {
                        let arr = new Array()
                        this.dataToFetch[model] = arr
                        this.dataToFetch[model].push(name)
                    }
                }
            )
        })
    },

    /**
     * this function is intended to get data for the content-form input name of the dashboard
     */
    get fetchData () {
        let fetching = fetch('/dashboard-content', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name = "csrf-token"]')
                    .getAttribute('content')
            },
            body: JSON.stringify(this.dataToFetch)
        })

        let result = fetching
            .then(response => response.json())
            .then(data => {
                console.log('success', typeof data, data)
                this.responseResult = data;
            })
        return result
    },

    /**
     * dibawah ini adalah script untuk mengganti UI dashboard-content (change view)
     * @params {componentName} - specific string for the livewire component
     * @params arguments[0] - script Name, if any 
     */ 
    async showContent (componentName) {
        let scriptName = arguments[1] ?? false;

        let name = componentName.split('-').join('') // output = string for object dashboard key
        this[name]
            ? new Promise(resolve =>
                  // resolve(this.renderTemplate(name, componentName, scriptName))
                  resolve(this.renderTemplate(name, componentName, scriptName))
              ).then(() => {
                this.renderChart(componentName);
                console.log('render chart success')

                this.renderEditor(componentName);
                console.log('render editor success')
              })
            : new Promise(resolve => 
                  resolve(this.xhr(name, componentName))
              ).then(() => {
                this.renderTemplate(name, componentName, scriptName)

                this.renderChart(componentName);
                console.log('render chart success')
                
                this.renderEditor(componentName);
                console.log('render editor success')
            })
    },

    /**
     * xhr(name, componentName) is the function to get content template from the server then render it into the window
     * @param {name} is the property which containe the string of html tag to be render later. 
     * @param {componentName} is the string for livewire templating render, ex: user-settings-profile. That string is must available in livewire package view in application
     */
    async xhr (name, componentName) {
        let getUrl = await fetch('/view/' + componentName)
        let result = await getUrl.text()
        this[name] = result
    },

    /**
     * renderTemplate(name, componentName) is the function to render template to window
     * @param {name} is the property (string) which containe the html tag to be render later.
     * @param {componentName} is the string for livewire templating render, ex: user-settings-profile. That string is must available in livewire package view in application
     */
    renderTemplate(name, componentName, scriptName){
      this.previousContent.name = this.currentContent.name;
      this.previousContent.componentName = this.currentContent.componentName;

      const content = document.querySelector('#content');
      content.innerHTML = '';

      let div = document.createElement('div');
      div.innerHTML = this.createComponent(name, componentName);

      content.appendChild(div);
      if (scriptName) {
        this.renderScript(scriptName);
      }
      
      this.currentContent.name = name;
      this.currentContent.componentName = componentName;
    },
    // renderTemplate (name, componentName, scriptName) {
    //     let el = document.createElement(componentName)
    //     try {
    //         this.newElement(name, componentName)
    //     } catch (e) {
    //         window.content.appendChild(el)
    //         this.renderScript(scriptName)
    //         console.log('render Template has finished')
    //     }
    //     window.content.appendChild(el)
    //     this.renderScript(scriptName)
    //     console.log('render Template has finished')
    // },

    /**
     * htmlToElement(html, id) is the function to create <template> and add the inner by html params
     * @param {html} is string contains html tag
     */
    // htmlToElement (html, id) {
    //     let template = document.createElement('template')
    //     // html = html.trim(); // Never return a text node of whitespace as the result
    //     template.id = id
    //     template.innerHTML = html
    //     return template
    // },

    renderEditor(componentName){
      let target =  undefined;
      try{
        target = document.querySelectorAll('div[editor]');
      } catch(e){
        console.log(e)
      }

      this.editor = {};

      target.forEach((element, index) => {
        try{
          let editor = new MyEditor.DashboardEditor();

          editor.setTarget(element.id, componentName);
          editor.renderEditor;
          return this.editor[index] = editor;
        } 
        catch (e){
          console.log(e);
        }
      });
      
    },

    /**
     * renderChart(componentName) is the function to render chart into window which has the <canvas id="...
     * this function need a module(class) DashboardChart which running/rendered before to window
     * this function is needed to set data and labels for the chart befor rendered to window or it use default mode in Dashboard Chart
     * @param {componentName} - the custom own template, but not livewire or any framework licensed 
     */
    renderChart(componentName){
      // console.log('renderChart() function is running');
      let canvas = document.querySelectorAll('canvas[id]');
      this.chart = { chartDump: null}; // harus di instansiasi dulu properti chart karena kita mau pakai forEach dibawah

      canvas.forEach((element, index) => {

        function getTitle(element){
          try{
            return element.querySelector('title').innerHTML;
          } catch(e){ null }
        };

        let title = getTitle(element);
        let labelX = element.querySelector('label-x').innerHTML;
        let labelY = element.querySelector('label-y').innerHTML;
        
        try{
          let chart = new MyChart.DashboardChart();
          chart.setCtx(element.id, componentName);        
          chart.setLabel(labelX.split(','));
          chart.setData(title ,labelY.split(','));
  
          chart.renderChart;        
          return this.chart[index] = chart;
        } catch(e){
          console.log(e);        }
        
        
      });
      // console.log('renderChart() function has completed')

    },

    renderScript(scriptName){
      console.log(scriptName + ' is running');
      if (scriptName){
        if (!this.availableScript.includes(scriptName)){
          const script = document.createElement('script');
          // script.type = 'module';
          script.src = window.location.origin + "/js/" + scriptName + ".js";
          document.querySelector('#content').appendChild(script);    
          this.availableScript.push(scriptName);      
        }
      }
    },

    /**
     * newElement (name, componentName) is the function to make shadowRoot and also mount the its stylsheet and its scripts
     */
     createComponent(name, componentName){
      let component = document.createElement(componentName);
      return this[name] ? component.innerHTML = this[name] : component;
    },

    // previous content, supaya bisa balik ke halaman sebelumnya
    getPreviousContent(){
      let name = this.previousContent.name;
      let componentName = this.previousContent.componentName;
      // this.renderTemplate(name, componentName, '')
      new Promise(resolve => 
            resolve(this.xhr(name, componentName))
        ).then(() => {
          this.renderTemplate(name, componentName, '')

          this.renderChart(componentName);
          console.log('render chart success')
          
          this.renderEditor(componentName);
          console.log('render editor success')
      })
    }
}
// document ini backupan
// script ini masih memakai <template> rendering
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
                console.log('success', data)
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
        console.log(scriptName + ' is running');

        const content = document.querySelector('#content')
        content.innerHTML = ''

        let name = componentName.split('-').join('') // output = string for object dashboard key
        this[name]
            ? new Promise(resolve =>
                  resolve(this.renderTemplate(name, componentName, scriptName))
              ).then(() => {
                dashboard.fetchData
              })
            : new Promise(resolve => resolve(this.xhr(name, componentName, scriptName))).then(() => {
              dashboard.setData(componentName) ;      
              dashboard.fetchData;
            })
    },

    /**
     * xhr(name, componentName) is the function to get content template from the server then render it into the window
     * @param {name} is the property which containe the string of html tag to be render later. 
     * @param {componentName} is the string for livewire templating render, ex: user-settings-profile. That string is must available in livewire package view in application
     */
    async xhr (name, componentName, scriptName) {
        let getUrl = await fetch('/view/' + componentName)
        let result = await getUrl.text()
        this[name] = result
        await this.renderTemplate(name, componentName, scriptName)
    },

    /**
     * renderTemplate(name, componentName) is the function to render template to window
     * @param {name} is the property (string) which containe the html tag to be render later.
     * @param {componentName} is the string for livewire templating render, ex: user-settings-profile. That string is must available in livewire package view in application
     */
    renderTemplate (name, componentName, scriptName) {
        let el = document.createElement(componentName)
        try {
            this.newElement(name, componentName)
        } catch (e) {
            window.content.appendChild(el)
            this.renderScript(scriptName)
        }
        window.content.appendChild(el)
        this.renderScript(scriptName)
    },

    /**
     * htmlToElement(html, id) is the function to create <template> and add the inner by html params
     * @param {html} is string contains html tag
     */
    htmlToElement (html, id) {
        let template = document.createElement('template')
        // html = html.trim(); // Never return a text node of whitespace as the result
        template.id = id
        template.innerHTML = html
        return template
    },

    renderScript(scriptName){
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
    newElement (name, componentName) {
        let htmlToElement = this.htmlToElement(this[name], componentName)
        return customElements.define(
            componentName,
            class extends HTMLElement {
                constructor () {
                    super()

                    let template = htmlToElement
                    let templateContent = template.content

                    const shadowRoot = this.attachShadow({ mode: 'open' })
                    shadowRoot.appendChild(templateContent.cloneNode(true))

                    // tambahan untuk CSS nya
                    const linkElem1 = document.createElement('link')
                    linkElem1.setAttribute('rel', 'stylesheet')
                    linkElem1.setAttribute('href', '/css/bootstrap.min.css')
                    shadowRoot.appendChild(linkElem1)

                    // tambahan untuk CSS nya
                    const linkElem2 = document.createElement('link')
                    linkElem2.setAttribute('rel', 'stylesheet')
                    linkElem2.setAttribute('href', '/css/dashboard.css')
                    shadowRoot.appendChild(linkElem2)

                    // tambahan untuk Script nya
                    // const script1 = document.createElement('script')
                    // script1.id = 'script-user-dashboard-content' 
                    // script1.src = window.location.origin + "/js/dashboardContent.JS"
                    // shadowRoot.appendChild(script1);

                }
            }
        )
    },
}




// alert('chart script is running')
// const ctx = document.getElementById('dpl-chart').getContext('2d');
// const myChart = new Chart(ctx, {
//   type: 'bar',
//   data: {
//     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//     datasets: [{
//       label: '# of Votes',
//       data: [12, 19, 3, 5, 2, 3],
//       backgroundColor: [
//         'rgba(255, 99, 132, 0.2)',
//         'rgba(54, 162, 235, 0.2)',
//         'rgba(255, 206, 86, 0.2)',
//         'rgba(75, 192, 192, 0.2)',
//         'rgba(153, 102, 255, 0.2)',
//         'rgba(255, 159, 64, 0.2)'
//       ],
//       borderColor: [
//         'rgba(255, 99, 132, 1)',
//         'rgba(54, 162, 235, 1)',
//         'rgba(255, 206, 86, 1)',
//         'rgba(75, 192, 192, 1)',
//         'rgba(153, 102, 255, 1)',
//         'rgba(255, 159, 64, 1)'
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });
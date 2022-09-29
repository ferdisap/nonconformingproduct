export class DashboardChart {
  // labels;
  labels = [
    'J',
    'F',
    'M',
    'A',
    'M',
    'Jn',
    'Jl',
    'Ag',
    'Sp',
    'Oc',
    'Nv',
    'Ds',
  ];

  // data;
  data = {
    labels: this.labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45, 30, 20, 45, 90, 130],
    }]
  };

  config = {
    type: 'line',
    data: this.data,
    options: {}
  };

  setCtx (elementId) {
      let componentName = arguments[1]
      try {
          this.ctx = document
              .querySelector('#content')
              .querySelector(componentName)
              .shadowRoot.getElementById(elementId)
              .getContext('2d')
      } catch (e) {
          try {
              this.ctx = document.getElementById(elementId).getContext('2d')
          } catch (e) {
              console.log(e, elementId, 'the element id cannot be found')
          }
      }
  }

  setLabel (labels = []) {
      // let shadowTemplate = document.querySelector(componentName).shadowRoot;
      // let labelsX = shadowTemplate.querySelectorAll('labelsx')
      labels.length == 0 ? this.labels : (this.labels = Array.from(labels))
  }

  setData ( title = 'no title given' ,data = []) {
      // return data.length == 0 ? this.data : () => {}
      this.data = {
          labels: this.labels,
          datasets: [
              {
                  label: title,
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: data
              }
          ]
      };
      // return this.labels;
  }

  // set config bisa digunakan untuk mengganti type chart, dan option2 chart lainnya
  setConfig () {
      this.config = {
          type: 'line',
          data: this.data,
          options: {}
      }
      // return this.config;
  }

  /**
   * @param {(arg0: any) => void} componentName
   * @param {componentName}  - must be a type of string of the custom component in window
   */
  get prepared () {
      this.setConfig();
      return this.config;
      // try{
      //   // this
      //   // this.setConfig();
      // } catch (e){
      //   console.log(e)
      // }
      // return this.config;
  }

  /**
   * @param {(arg0: any) => void} componentName
   * @param {componentName}  - must be a type of string of the custom component in window
   */
  get renderChart () {
      try {
          return (this.chart = new Chart(this.ctx, this.prepared))
      } catch (e) {
          this.chart.destroy()
          return (this.chart = new Chart(this.ctx, this.prepared))
      }
  }

  get destroyChart () {
      return this.chart.destroy()
  }
}

// let chart1 = new DashboardChart();
// chart1.setCtx('myChart1');
// chart1.config;
// chart1.renderChart;

// let arr = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun']

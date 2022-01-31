export default class ChartClass {
    constructor() {
        this.axis = new Axis();
        this.data = [{
            label: '',
            value: ''
        }];
        this.province = '';
        this.title = '';

        // this.dataDefault();
    }

    dataDefault() {

        this.title = 'Grafico de Cantidad de Productores'
        this.axis.x = 'label'
        this.axis.y = 'value'
        this.data = [
            {
            "label": "Primer Categoria",
            "value": 501.9
            }, {
            "label": "Segunda Categoria",
            "value": 301.9
            }, {
            "label": "Tercer Caregoria",
            "value": 201.1
            }
        ]
    }
}

class Axis {
    constructor() {
        this.x = ''
        this.y = ''
    }
}
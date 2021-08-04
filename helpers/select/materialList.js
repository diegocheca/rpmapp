export default {
    minerals: [
        {
            element: {
                label: 'Sustancias de aprovechamiento común',
                value: 'aprovechamiento_comun',
            },
            subElements: [
                {
                    label: 'Arenas Metalíferas',
                    value: 'Arenas Metalíferas'
                },
                {
                    label: 'Piedras Preciosas',
                    value: 'Piedras Preciosas'
                },
                {
                    label: 'Desmontes',
                    value: 'Desmontes'
                },
                {
                    label: 'Relaves',
                    value: 'Relaves'
                },
                {
                    label: 'Escoriales',
                    value: 'Escoriales'
                },
            ]
        },
        {
            element: {
                label: 'Sustancias que se conceden preferentemente al dueño del suelo',
                value: 'conceden_preferentemente',
            },
            subElements: [
                {
                    label: 'Salitres',
                    value: 'Salitres'
                },
                {
                    label: 'Salinas',
                    value: 'Salinas'
                },
                {
                    label: 'Turberas',
                    value: 'Turberas'
                },
                {
                    label: 'Metales no comprendidos en 1° Categ.',
                    value: 'Metales no comprendidos en 1° Categ.'
                },
                {
                    label: 'Abrasivos',
                    value: 'Abrasivos'
                },
                {
                    label: 'Ocres',
                    value: 'Ocres'
                },
                {
                    label: 'Resinas',
                    value: 'Resinas'
                },
                {
                    label: 'Esteatitas',
                    value: 'Esteatitas'
                },
                {
                    label: 'Baritina',
                    value: 'Baritina'
                },
                {
                    label: 'Caparrosas',
                    value: 'Caparrosas'
                },
                {
                    label: 'Grafito',
                    value: 'Grafito'
                },
                {
                    label: 'Caolí­n',
                    value: 'Caolí­n'
                },
                {
                    label: 'Sales Alcalinas o Alcalino Terrosas',
                    value: 'Sales Alcalinas o Alcalino Terrosas'
                },
                {
                    label: 'Amianto',
                    value: 'Amianto'
                },
                {
                    label: 'Bentonita',
                    value: 'Bentonita'
                },
                {
                    label: 'Zeolitas o Minerales Permutantes o Permutíticos',
                    value: 'Zeolitas o Minerales Permutantes o Permutíticos'
                },
            ]
        }
    ],

    getOptions(selected) {
        console.log(selected);
    }
}

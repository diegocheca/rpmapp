<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesRawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE public."Localidad2" (
            categoria character varying(100),
            centroide_lat numeric,
            centroide_lon numeric,
            departamento_nombre character varying(200),
            fuente character varying(150),
            id bigint NOT NULL,
            localidad_censal_id character varying(150),
            localidad_censal_nombre character varying(250),
            municipio_id character varying,
            municipio_nombre character varying(200),
            nombre character varying(250),
            provincia_id bigint,
            provincia_nombre character varying(250),
            departamento_id bigint
        );'
        );


        DB::statement('ALTER TABLE public."Localidad2" OWNER TO postgres;');



        DB::statement('ALTER TABLE ONLY public."Localidad2"
        ADD CONSTRAINT "Localidad2_pkey" PRIMARY KEY (id);');


DB::statement(INSERT INTO public."Localidad"(
	categoria, centroide_lat, centroide_lon, departamento_nombre, fuente, id, localidad_censal_id, localidad_censal_nombre, municipio_id, municipio_nombre, nombre, provincia_id, provincia_nombre, departamento_id)
	VALUES (
        "Localidad simple",	-35.0330734347841,	-60.2806197287099,	"Alberti",	"INDEC",	"6021010000",	"06021010",	Alberti	060021	Alberti	ALBERTI	6	Buenos Aires	6021
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');





        DB::statement('
        COPY public."Localidad2" (categoria, centroide_lat, centroide_lon, departamento_nombre, fuente, id, localidad_censal_id, localidad_censal_nombre, municipio_id, municipio_nombre, nombre, provincia_id, provincia_nombre, departamento_id) FROM stdin;
        
        Localidad simple	-34.8681189984321	-60.3939708823404	Alberti	INDEC	6021020000	06021020	Coronel Seguí	060021	Alberti	CORONEL SEGUI	6	Buenos Aires	6021
        Componente de localidad compuesta	-35.068013673391	-60.4025971632697	Alberti	INDEC	6021030000	06021030	Mechita	060021	Alberti	MECHITA	6	Buenos Aires	6021
        Localidad simple	-35.1243819752343	-60.2200612615259	Alberti	INDEC	6021040000	06021040	Pla	060021	Alberti	PLA	6	Buenos Aires	6021
        Localidad simple	-35.1096178332808	-60.070551324606	Alberti	INDEC	6021050000	06021050	Villa Grisolía	060021	Alberti	VILLA GRISOLIA	6	Buenos Aires	6021
        Localidad simple	-34.8881255447686	-60.3469385614883	Alberti	INDEC	6021060000	06021060	Villa María	060021	Alberti	VILLA MARIA	6	Buenos Aires	6021
        Localidad simple	-34.8435329449862	-60.3048498633642	Alberti	INDEC	6021070000	06021070	Villa Ortiz	060021	Alberti	VILLA ORTIZ	6	Buenos Aires	6021
        Entidad	-34.8015580737331	-58.3914677191541	Almirante Brown	INDEC	6028010001	06028010	Almirante Brown	060028	Almirante Brown	ADROGUE	6	Buenos Aires	6028
        Entidad	-34.8315415891783	-58.3986874871405	Almirante Brown	INDEC	6028010002	06028010	Almirante Brown	060028	Almirante Brown	BURZACO	6	Buenos Aires	6028
        Entidad	-34.8044759080477	-58.3447825531042	Almirante Brown	INDEC	6028010003	06028010	Almirante Brown	060028	Almirante Brown	CLAYPOLE	6	Buenos Aires	6028
        Entidad	-34.8210751643113	-58.3447457989957	Almirante Brown	INDEC	6028010004	06028010	Almirante Brown	060028	Almirante Brown	DON ORIONE	6	Buenos Aires	6028
        Entidad	-34.8860114180413	-58.3818301842512	Almirante Brown	INDEC	6028010005	06028010	Almirante Brown	060028	Almirante Brown	GLEW	6	Buenos Aires	6028
        Entidad	-34.7851442510713	-58.3681475603787	Almirante Brown	INDEC	6028010006	06028010	Almirante Brown	060028	Almirante Brown	JOSE MARMOL	6	Buenos Aires	6028
        Entidad	-34.8609450255718	-58.3891476922426	Almirante Brown	INDEC	6028010007	06028010	Almirante Brown	060028	Almirante Brown	LONGCHAMPS	6	Buenos Aires	6028
        Entidad	-34.8189583169642	-58.4235610606239	Almirante Brown	INDEC	6028010008	06028010	Almirante Brown	060028	Almirante Brown	MALVINAS ARGENTINAS	6	Buenos Aires	6028
        Entidad	-34.8556895005541	-58.361646542791	Almirante Brown	INDEC	6028010009	06028010	Almirante Brown	060028	Almirante Brown	MINISTRO RIVADAVIA	6	Buenos Aires	6028
        Entidad	-34.7911367513318	-58.350598184222	Almirante Brown	INDEC	6028010010	06028010	Almirante Brown	060028	Almirante Brown	RAFAEL CALZADA	6	Buenos Aires	6028
        Entidad	-34.7866743578473	-58.3219363521574	Almirante Brown	INDEC	6028010011	06028010	Almirante Brown	060028	Almirante Brown	SAN FRANCISCO SOLANO	6	Buenos Aires	6028
        Entidad	-34.7673771924196	-58.3432771404358	Almirante Brown	INDEC	6028010012	06028010	Almirante Brown	060028	Almirante Brown	SAN JOSE	6	Buenos Aires	6028
        Entidad	-34.6750056478488	-58.3105634248142	Avellaneda	INDEC	6035010001	06035010	Avellaneda	060035	Avellaneda	AREA CINTURON ECOLOGICO	6	Buenos Aires	6035
        Entidad	-34.6626508059016	-58.3656990232718	Avellaneda	INDEC	6035010002	06035010	Avellaneda	060035	Avellaneda	AVELLANEDA	6	Buenos Aires	6035
        Entidad	-34.66910587351	-58.3574544412345	Avellaneda	INDEC	6035010003	06035010	Avellaneda	060035	Avellaneda	CRUCESITA	6	Buenos Aires	6035
        Entidad	-34.6491266928534	-58.3411774769136	Avellaneda	INDEC	6035010004	06035010	Avellaneda	060035	Avellaneda	DOCK SUD	6	Buenos Aires	6035
        Entidad	-34.6847637540553	-58.3726025503412	Avellaneda	INDEC	6035010005	06035010	Avellaneda	060035	Avellaneda	GERLI	6	Buenos Aires	6035
        Entidad	-34.6685497926645	-58.3886029123689	Avellaneda	INDEC	6035010006	06035010	Avellaneda	060035	Avellaneda	PIÑEYRO	6	Buenos Aires	6035
        Entidad	-34.6843716640855	-58.348101313379	Avellaneda	INDEC	6035010007	06035010	Avellaneda	060035	Avellaneda	SARANDI	6	Buenos Aires	6035
        Entidad	-34.6986315148924	-58.3363602646664	Avellaneda	INDEC	6035010008	06035010	Avellaneda	060035	Avellaneda	VILLA DOMINICO	6	Buenos Aires	6035
        Entidad	-34.7061588356333	-58.3218349208501	Avellaneda	INDEC	6035010009	06035010	Avellaneda	060035	Avellaneda	WILDE	6	Buenos Aires	6035
        Localidad simple	-37.1536695670417	-58.4895476662462	Ayacucho	INDEC	6042010000	06042010	Ayacucho	060042	Ayacucho	AYACUCHO	6	Buenos Aires	6042
        Localidad simple	-37.2286256057071	-58.7603890048806	Ayacucho	INDEC	6042020000	06042020	La Constancia	060042	Ayacucho	LA CONSTANCIA	6	Buenos Aires	6042
        Localidad simple	-36.8444984439739	-58.5071421689017	Ayacucho	INDEC	6042030000	06042030	Solanet	060042	Ayacucho	SOLANET	6	Buenos Aires	6042
        Localidad simple	-36.5637513540211	-58.5333344196536	Ayacucho	INDEC	6042040000	06042040	Udaquiola	060042	Ayacucho	UDAQUIOLA	6	Buenos Aires	6042
        Localidad simple	-36.5312544192466	-59.9200651844348	Azul	INDEC	6049010000	06049010	Ariel	060049	Azul	ARIEL	6	Buenos Aires	6049
        Localidad simple	-36.7795144970313	-59.8586331707414	Azul	INDEC	6049020000	06049020	Azul	060049	Azul	AZUL	6	Buenos Aires	6049
        Localidad simple	-36.3805626332947	-59.5030645507265	Azul	INDEC	6049030000	06049030	Cacharí	060049	Azul	CACHARI	6	Buenos Aires	6049
        Localidad simple	-37.3150113247344	-59.9853181679139	Azul	INDEC	6049040000	06049040	Chillar	060049	Azul	CHILLAR	6	Buenos Aires	6049
        Localidad simple	-37.2020524773603	-60.1652139181813	Azul	INDEC	6049050000	06049050	16 de Julio	060049	Azul	16 DE JULIO	6	Buenos Aires	6049
        Entidad	-38.7114037284555	-62.2569089501864	Bahía Blanca	INDEC	6056010001	06056010	Bahía Blanca	060056	Bahía Blanca	BAHIA BLANCA	6	Buenos Aires	6056
        Entidad	-38.7471079502848	-62.1891166907456	Bahía Blanca	INDEC	6056010002	06056010	Bahía Blanca	060056	Bahía Blanca	GRÜNBEIN	6	Buenos Aires	6056
        Entidad	-38.7794670416666	-62.262951248824	Bahía Blanca	INDEC	6056010003	06056010	Bahía Blanca	060056	Bahía Blanca	INGENIERO WHITE	6	Buenos Aires	6056
        Entidad	-38.6472605094596	-62.3200223419024	Bahía Blanca	INDEC	6056010004	06056010	Bahía Blanca	060056	Bahía Blanca	VILLA BORDEAU	6	Buenos Aires	6056
        Entidad	-38.7765069529222	-62.1851833537179	Bahía Blanca	INDEC	6056010005	06056010	Bahía Blanca	060056	Bahía Blanca	VILLA ESPORA	6	Buenos Aires	6056
        Localidad simple	-38.4838572081944	-61.8926015349487	Bahía Blanca	INDEC	6056020000	06056020	Cabildo	060056	Bahía Blanca	CABILDO	6	Buenos Aires	6056
        Localidad simple	-38.7136524854986	-62.3924221653991	Bahía Blanca	INDEC	6056030000	06056030	General Daniel Cerri	060056	Bahía Blanca	GENERAL DANIEL CERRI	6	Buenos Aires	6056
        Localidad simple	-37.8482779294345	-58.2551665841248	Balcarce	INDEC	6063010000	06063010	Balcarce	060063	Balcarce	BALCARCE	6	Buenos Aires	6063
        Localidad simple	-37.9412057603	-58.3225920150442	Balcarce	INDEC	6063020000	06063020	Los Pinos	060063	Balcarce	LOS PINOS	6	Buenos Aires	6063
        Localidad simple	-37.6254980210026	-58.7461862359423	Balcarce	INDEC	6063030000	06063030	Napaleofú	060063	Balcarce	NAPALEOFU	6	Buenos Aires	6063
        Localidad simple	-37.5426353712017	-58.3407185507274	Balcarce	INDEC	6063040000	06063040	Ramos Otero	060063	Balcarce	RAMOS OTERO	6	Buenos Aires	6063
        Localidad simple	-38.0122838564587	-58.355377761682	Balcarce	INDEC	6063050000	06063050	San Agustín	060063	Balcarce	SAN AGUSTIN	6	Buenos Aires	6063
        Localidad simple	-37.8596285282151	-57.9806008736401	Balcarce	INDEC	6063060000	06063060	Villa Laguna La Brava	060063	Balcarce	VILLA LAGUNA LA BRAVA	6	Buenos Aires	6063
        Localidad simple	-33.8128781547156	-59.5043068852807	Baradero	INDEC	6070010000	06070010	Baradero	060070	Baradero	BARADERO	6	Buenos Aires	6070
        Localidad simple	-33.9810489198561	-59.6715601606315	Baradero	INDEC	6070020000	06070020	Irineo Portela	060070	Baradero	IRINEO PORTELA	6	Buenos Aires	6070
        Localidad simple	-34.062154134736	-59.5585420642846	Baradero	INDEC	6070030000	06070030	Santa Coloma	060070	Baradero	SANTA COLOMA	6	Buenos Aires	6070
        Localidad simple	-33.9096038045591	-59.3882017132282	Baradero	INDEC	6070040000	06070040	Villa Alsina	060070	Baradero	VILLA ALSINA	6	Buenos Aires	6070
        Localidad simple	-34.064591121211	-60.1025564443537	Arrecifes	INDEC	6077010000	06077010	Arrecifes	060077	Arrecifes	ARRECIFES	6	Buenos Aires	6077
        Localidad simple	-34.0328240475348	-60.1562270065746	Arrecifes	INDEC	6077020000	06077020	Todd	060077	Arrecifes	TODD	6	Buenos Aires	6077
        Localidad simple	-33.9922765156087	-60.2263211205477	Arrecifes	INDEC	6077030000	06077030	Viña	060077	Arrecifes	VI¥A	6	Buenos Aires	6077
        Localidad simple	-37.6424111302365	-59.3889380312927	Benito Juárez	INDEC	6084010000	06084010	Barker	060084	Benito Juárez	BARKER	6	Buenos Aires	6084
        Localidad simple	-37.6766410210105	-59.8057677109444	Benito Juárez	INDEC	6084020000	06084020	Benito Juárez	060084	Benito Juárez	BENITO JUAREZ	6	Buenos Aires	6084
        Localidad simple	-37.5545120854221	-59.6278461536299	Benito Juárez	INDEC	6084030000	06084030	López	060084	Benito Juárez	LOPEZ	6	Buenos Aires	6084
        Localidad simple	-37.3683686253208	-59.7630391604187	Benito Juárez	INDEC	6084040000	06084040	Tedín Uriburu	060084	Benito Juárez	TEDIN URIBURU	6	Buenos Aires	6084
        Localidad simple	-37.6704778893557	-59.4003533386514	Benito Juárez	INDEC	6084050000	06084050	Villa Cacique	060084	Benito Juárez	VILLA CACIQUE	6	Buenos Aires	6084
        Entidad	-34.7597493264937	-58.2019645234278	Berazategui	INDEC	6091010001	06091010	Berazategui	060091	Berazategui	BERAZATEGUI	6	Buenos Aires	6091
        Entidad	-34.7804201858899	-58.2415010261207	Berazategui	INDEC	6091010002	06091010	Berazategui	060091	Berazategui	BERAZATEGUI OESTE	6	Buenos Aires	6091
        Entidad	-34.8021192214631	-58.2188212494897	Berazategui	INDEC	6091010003	06091010	Berazategui	060091	Berazategui	CARLOS TOMAS SOURIGUES	6	Buenos Aires	6091
        Entidad	-34.9067557072114	-58.1966995021239	Berazategui	INDEC	6091010004	06091010	Berazategui	060091	Berazategui	EL PATO	6	Buenos Aires	6091
        Entidad	-34.7897594857633	-58.1439692638183	Berazategui	INDEC	6091010005	06091010	Berazategui	060091	Berazategui	GUILLERMO ENRIQUE HUDSON	6	Buenos Aires	6091
        Entidad	-34.8348420760566	-58.1819061125702	Berazategui	INDEC	6091010006	06091010	Berazategui	060091	Berazategui	JUAN MARIA GUTIERREZ	6	Buenos Aires	6091
        Entidad	-34.8471945391094	-58.1392765205344	Berazategui	INDEC	6091010007	06091010	Berazategui	060091	Berazategui	PEREYRA	6	Buenos Aires	6091
        Entidad	-34.7674201820877	-58.1652686003148	Berazategui	INDEC	6091010008	06091010	Berazategui	060091	Berazategui	PLATANOS	6	Buenos Aires	6091
        Entidad	-34.7941468501172	-58.1989815634425	Berazategui	INDEC	6091010009	06091010	Berazategui	060091	Berazategui	RANELAGH	6	Buenos Aires	6091
        Entidad	-34.776063416904	-58.2002532983623	Berazategui	INDEC	6091010010	06091010	Berazategui	060091	Berazategui	VILLA ESPAÑA	6	Buenos Aires	6091
        Entidad	-34.8752589900973	-57.8550856662876	Berisso	INDEC	6098010001	06098010	Berisso	060098	Berisso	BARRIO BANCO PROVINCIA	6	Buenos Aires	6098
        Entidad	-34.9293102150655	-57.8853552505795	Berisso	INDEC	6098010002	06098010	Berisso	060098	Berisso	BARRIO EL CARMEN (ESTE)	6	Buenos Aires	6098
        Entidad	-34.9027528834433	-57.9270884333304	Berisso	INDEC	6098010003	06098010	Berisso	060098	Berisso	BARRIO UNIVERSITARIO	6	Buenos Aires	6098
        Entidad	-34.8746353679645	-57.8947472316799	Berisso	INDEC	6098010004	06098010	Berisso	060098	Berisso	BERISSO	6	Buenos Aires	6098
        Entidad	-34.9190209219847	-57.7909954962894	Berisso	INDEC	6098010005	06098010	Berisso	060098	Berisso	LOS TALAS	6	Buenos Aires	6098
        Entidad	-34.9053981881099	-57.9180815078165	Berisso	INDEC	6098010006	06098010	Berisso	060098	Berisso	VILLA ARGÜELLO	6	Buenos Aires	6098
        Entidad	-34.8802085383888	-57.8663036732616	Berisso	INDEC	6098010007	06098010	Berisso	060098	Berisso	VILLA DOLORES	6	Buenos Aires	6098
        Entidad	-34.8829519743895	-57.8614892695719	Berisso	INDEC	6098010008	06098010	Berisso	060098	Berisso	VILLA INDEPENDENCIA	6	Buenos Aires	6098
        Entidad	-34.8957079362353	-57.9108816644737	Berisso	INDEC	6098010009	06098010	Berisso	060098	Berisso	VILLA NUEVA	6	Buenos Aires	6098
        Entidad	-34.891043310448	-57.8963773978494	Berisso	INDEC	6098010010	06098010	Berisso	060098	Berisso	VILLA PORTEÑA	6	Buenos Aires	6098
        Entidad	-34.9308766123633	-57.8468799885622	Berisso	INDEC	6098010011	06098010	Berisso	060098	Berisso	VILLA PROGRESO	6	Buenos Aires	6098
        Entidad	-34.8838130805	-57.87701595642	Berisso	INDEC	6098010012	06098010	Berisso	060098	Berisso	VILLA SAN CARLOS	6	Buenos Aires	6098
        Entidad	-34.9221646298322	-57.8009664840662	Berisso	INDEC	6098010013	06098010	Berisso	060098	Berisso	VILLA ZULA	6	Buenos Aires	6098
        Localidad simple	-36.0010429767568	-60.8534495072374	Bolívar	INDEC	6105010000	06105010	Hale	060105	Bolívar	HALE	6	Buenos Aires	6105
        Localidad simple	-36.3498770527922	-61.2552591224518	Bolívar	INDEC	6105020000	06105020	Juan F. Ibarra	060105	Bolívar	JUAN F. IBARRA	6	Buenos Aires	6105
        Localidad simple	-36.5053183545527	-61.0243287245345	Bolívar	INDEC	6105040000	06105040	Paula	060105	Bolívar	PAULA	6	Buenos Aires	6105
        Localidad simple	-36.5109170215402	-61.5545516558692	Bolívar	INDEC	6105050000	06105050	Pirovano	060105	Bolívar	PIROVANO	6	Buenos Aires	6105
        Localidad simple	-36.2295602208798	-61.1131898679983	Bolívar	INDEC	6105060000	06105060	San Carlos de Bolívar	060105	Bolívar	SAN CARLOS DE BOLIVAR	6	Buenos Aires	6105
        Localidad simple	-36.4329292363695	-61.4191160192421	Bolívar	INDEC	6105070000	06105070	Urdampilleta	060105	Bolívar	URDAMPILLETA	6	Buenos Aires	6105
        Localidad simple	-36.6025793254646	-61.3618625494725	Bolívar	INDEC	6105080000	06105080	Villa Lynch Pueyrredón	060105	Bolívar	VILLA LYNCH PUEYRREDON	6	Buenos Aires	6105
        Localidad simple	-35.2267581272748	-60.4168952837295	Bragado	INDEC	6112005000	06112005	Asamblea	060112	Bragado	ASAMBLEA	6	Buenos Aires	6112
        Localidad simple	-35.118942299763	-60.4879147568209	Bragado	INDEC	6112010000	06112010	Bragado	060112	Bragado	BRAGADO	6	Buenos Aires	6112
        Localidad simple	-35.3233100374631	-60.5217314911689	Bragado	INDEC	6112020000	06112020	Comodoro Py	060112	Bragado	COMODORO PY	6	Buenos Aires	6112
        Localidad simple	-34.9067979091956	-60.7597838238054	Bragado	INDEC	6112030000	06112030	General O-Brien	060112	Bragado	GENERAL O-BRIEN	6	Buenos Aires	6112
        Localidad simple	-34.7718230311122	-60.6916912010278	Bragado	INDEC	6112040000	06112040	Irala	060112	Bragado	IRALA	6	Buenos Aires	6112
        Localidad simple	-35.0797272650156	-60.5928546665185	Bragado	INDEC	6112050000	06112050	La Limpia	060112	Bragado	LA LIMPIA	6	Buenos Aires	6112
        Localidad simple	-35.0615246745825	-60.7060741424473	Bragado	INDEC	6112060000	06112060	Juan F. Salaberry	060112	Bragado	MAXIMO FERNANDEZ	6	Buenos Aires	6112
        Componente de localidad compuesta	-35.0699378566803	-60.4084937925362	Bragado	INDEC	6112070000	06112070	Mechita	060112	Bragado	MECHITA	6	Buenos Aires	6112
        Localidad simple	-35.2375277927366	-60.6115341696178	Bragado	INDEC	6112080000	06112080	Olascoaga	060112	Bragado	OLASCOAGA	6	Buenos Aires	6112
        Localidad simple	-34.9098734445057	-60.5381681629003	Bragado	INDEC	6112090000	06112090	Warnes	060112	Bragado	WARNES	6	Buenos Aires	6112
        Localidad simple	-35.3615828022139	-58.1504868159157	Brandsen	INDEC	6119010000	06119010	Altamirano	060119	Brandsen	ALTAMIRANO	6	Buenos Aires	6119
        Localidad simple	-35.3145370547125	-58.0484420796345	Brandsen	INDEC	6119015000	06119015	Barrio El Mirador	060119	Brandsen	BARRIO EL MIRADOR	6	Buenos Aires	6119
        Localidad simple	-35.0335777783556	-58.1935382681817	Brandsen	INDEC	6119020000	06119020	Barrio Las Golondrinas	060119	Brandsen	BARRIO LAS GOLONDRINAS	6	Buenos Aires	6119
        Localidad simple	-35.1050389949725	-58.1835007859607	Brandsen	INDEC	6119030000	06119030	Barrio Los Bosquecitos	060119	Brandsen	BARRIO LOS BOSQUECITOS	6	Buenos Aires	6119
        Localidad simple	-35.1030329461442	-58.2730405375653	Brandsen	INDEC	6119040000	06119040	Barrio Parque Las Acacias	060119	Brandsen	BARRIO PARQUE LAS ACACIAS	6	Buenos Aires	6119
        Localidad simple	-35.1149772603157	-58.0953896541907	Brandsen	INDEC	6119045000	06119045	Campos de Roca	060119	Brandsen	CAMPOS DE ROCA	6	Buenos Aires	6119
        Localidad simple	-35.1690983002919	-58.2373529446643	Brandsen	INDEC	6119050000	06119050	Coronel Brandsen	060119	Brandsen	CORONEL BRANDSEN	6	Buenos Aires	6119
        Localidad simple	-35.2139978115731	-58.2433030920635	Brandsen	INDEC	6119055000	06119055	Club de Campo Las Malvinas	060119	Brandsen	CLUB DE CAMPO LAS MALVINAS	6	Buenos Aires	6119
        Localidad simple	-35.0693655332834	-58.1656899882306	Brandsen	INDEC	6119060000	06119060	Gómez	060119	Brandsen	GOMEZ	6	Buenos Aires	6119
        Localidad simple	-35.2802043920968	-58.1996649431989	Brandsen	INDEC	6119070000	06119070	Jeppener	060119	Brandsen	JEPPENER	6	Buenos Aires	6119
        Localidad simple	-35.1842584334678	-57.9479623248001	Brandsen	INDEC	6119080000	06119080	Oliden	060119	Brandsen	OLIDEN	6	Buenos Aires	6119
        Localidad simple	-35.1499383981993	-58.0504528667351	Brandsen	INDEC	6119085000	06119085	Posada de los Lagos	060119	Brandsen	POSADA DE LOS LAGOS	6	Buenos Aires	6119
        Localidad simple	-35.2206242719966	-58.2805297949826	Brandsen	INDEC	6119090000	06119090	Samborombón	060119	Brandsen	SAMBOROMBON	6	Buenos Aires	6119
        Componente de localidad compuesta	-34.3160243688815	-58.9784574815339	Campana	INDEC	6126010000	06126010	Los Cardales	060126	Campana	ALTO LOS CARDALES	6	Buenos Aires	6126
        Localidad simple	-34.2530406367633	-58.9584400368589	Campana	INDEC	6126020000	06126020	Barrio Los Pioneros (Barrio Tavella)	060126	Campana	BARRIO LOS PIONEROS	6	Buenos Aires	6126
        Localidad simple	-34.1639618118269	-58.9588741035355	Campana	INDEC	6126030000	06126030	Campana	060126	Campana	CAMPANA	6	Buenos Aires	6126
        Componente de localidad compuesta	-34.2934153226239	-58.921199044246	Campana	INDEC	6126035000	06126035	Chacras del Río Luján	060126	Campana	CHACRAS DEL RIO LUJAN	6	Buenos Aires	6126
        Componente de localidad compuesta	-34.2816770641806	-58.8911906524052	Campana	INDEC	6126040000	06126040	Río Luján	060126	Campana	LOMAS DEL RIO LUJAN	6	Buenos Aires	6126
        Localidad simple	-34.9793768508134	-58.6749430768989	Cañuelas	INDEC	6134010000	06134010	Alejandro Petión	060134	Cañuelas	ALEJANDRO PETION	6	Buenos Aires	6134
        Localidad simple	-35.0742486164225	-58.8632420603475	Cañuelas	INDEC	6134020000	06134020	Barrio El Taladro	060134	Cañuelas	BARRIO EL TALADRO	6	Buenos Aires	6134
        Localidad simple	-35.0527140350539	-58.7583856965375	Cañuelas	INDEC	6134030000	06134030	Cañuelas	060134	Cañuelas	CA¥UELAS	6	Buenos Aires	6134
        Localidad simple	-35.3003271130454	-58.5943053657455	Cañuelas	INDEC	6134040000	06134040	Gobernador Udaondo	060134	Cañuelas	GOBERNADOR UDAONDO	6	Buenos Aires	6134
        Entidad	-34.9022941561353	-58.6479010170021	Cañuelas	INDEC	6134050001	06134050	Máximo Paz	060134	Cañuelas	BARRIO BELGRANO	6	Buenos Aires	6134
        Entidad	-34.9364563092157	-58.6143957995956	Cañuelas	INDEC	6134050002	06134050	Máximo Paz	060134	Cañuelas	MAXIMO PAZ	6	Buenos Aires	6134
        Localidad simple	-34.9611839371811	-58.7308918275978	Cañuelas	INDEC	6134060000	06134060	Santa Rosa	060134	Cañuelas	SANTA ROSA	6	Buenos Aires	6134
        Localidad simple	-35.1227364407356	-58.8904871463421	Cañuelas	INDEC	6134070000	06134070	Uribelarrea	060134	Cañuelas	URIBELARREA	6	Buenos Aires	6134
        Localidad simple	-34.9653526702416	-58.6504979594296	Cañuelas	INDEC	6134080000	06134080	Vicente Casares	060134	Cañuelas	VICENTE CASARES	6	Buenos Aires	6134
        Localidad simple	-34.1723674255219	-59.789349139091	Capitán Sarmiento	INDEC	6140010000	06140010	Capitán Sarmiento	060140	Capitán Sarmiento	CAPITAN SARMIENTO	6	Buenos Aires	6140
        Localidad simple	-34.1285572110784	-59.9240058312679	Capitán Sarmiento	INDEC	6140020000	06140020	La Luisa	060140	Capitán Sarmiento	LA LUISA	6	Buenos Aires	6140
        Localidad simple	-35.9189705554631	-61.5312630222769	Carlos Casares	INDEC	6147010000	06147010	Bellocq	060147	Carlos Casares	BELLOCQ	6	Buenos Aires	6147
        Entidad	-34.637632238148	-58.7921362740593	Moreno	INDEC	6560010004	06560010	Moreno	060560	Moreno	MORENO	6	Buenos Aires	6560
        Localidad simple	-35.7727531397053	-61.3353879836968	Carlos Casares	INDEC	6147020000	06147020	Cadret	060147	Carlos Casares	CADRET	6	Buenos Aires	6147
        Localidad simple	-35.623543502046	-61.3653159121918	Carlos Casares	INDEC	6147030000	06147030	Carlos Casares	060147	Carlos Casares	CARLOS CASARES	6	Buenos Aires	6147
        Localidad simple	-35.5249595511909	-61.4378670824782	Carlos Casares	INDEC	6147040000	06147040	Colonia Mauricio	060147	Carlos Casares	COLONIA MAURICIO	6	Buenos Aires	6147
        Localidad simple	-35.9277092575349	-61.262290153739	Carlos Casares	INDEC	6147050000	06147050	Hortensia	060147	Carlos Casares	HORTENSIA	6	Buenos Aires	6147
        Localidad simple	-35.7003907357414	-61.1702865161871	Carlos Casares	INDEC	6147060000	06147060	La Sofía	060147	Carlos Casares	LA SOFIA	6	Buenos Aires	6147
        Localidad simple	-35.583017649873	-61.5244457086778	Carlos Casares	INDEC	6147070000	06147070	Mauricio Hirsch	060147	Carlos Casares	MAURICIO HIRSCH	6	Buenos Aires	6147
        Localidad simple	-35.4774725641963	-61.4930734927677	Carlos Casares	INDEC	6147080000	06147080	Moctezuma	060147	Carlos Casares	MOCTEZUMA	6	Buenos Aires	6147
        Localidad simple	-35.8831262095535	-61.1594280439031	Carlos Casares	INDEC	6147090000	06147090	Ordoqui	060147	Carlos Casares	ORDOQUI	6	Buenos Aires	6147
        Localidad simple	-35.6740915009624	-61.5066664301675	Carlos Casares	INDEC	6147095000	06147095	Santo Tomás	060147	Carlos Casares	SANTO TOMAS	6	Buenos Aires	6147
        Localidad simple	-35.4946290260766	-61.5937811081594	Carlos Casares	INDEC	6147100000	06147100	Smith	060147	Carlos Casares	SMITH	6	Buenos Aires	6147
        Localidad simple	-35.3925733302196	-62.4193023144118	Carlos Tejedor	INDEC	6154010000	06154010	Carlos Tejedor	060154	Carlos Tejedor	CARLOS TEJEDOR	6	Buenos Aires	6154
        Localidad simple	-35.4388157700903	-62.7252382146864	Carlos Tejedor	INDEC	6154020000	06154020	Colonia Seré	060154	Carlos Tejedor	COLONIA SERE	6	Buenos Aires	6154
        Localidad simple	-35.6403503028113	-62.1924372294866	Carlos Tejedor	INDEC	6154030000	06154030	Curarú	060154	Carlos Tejedor	CURARU	6	Buenos Aires	6154
        Localidad simple	-35.3477615165229	-62.2246532791856	Carlos Tejedor	INDEC	6154040000	06154040	Timote	060154	Carlos Tejedor	TIMOTE	6	Buenos Aires	6154
        Localidad simple	-35.1979815144911	-62.7730814064669	Carlos Tejedor	INDEC	6154050000	06154050	Tres Algarrobos	060154	Carlos Tejedor	TRES ALGARROBOS	6	Buenos Aires	6154
        Localidad simple	-34.3776987251735	-59.8229019801033	Carmen de Areco	INDEC	6161010000	06161010	Carmen de Areco	060161	Carmen de Areco	CARMEN DE ARECO	6	Buenos Aires	6161
        Localidad simple	-34.4951191416005	-59.8029737383366	Carmen de Areco	INDEC	6161020000	06161020	Pueblo Gouin	060161	Carmen de Areco	PUEBLO GOUIN	6	Buenos Aires	6161
        Localidad simple	-34.4664778301466	-60.0008697422009	Carmen de Areco	INDEC	6161030000	06161030	Tres Sargentos	060161	Carmen de Areco	TRES SARGENTOS	6	Buenos Aires	6161
        Localidad simple	-36.091694119436	-57.8071801619355	Castelli	INDEC	6168010000	06168010	Castelli	060168	Castelli	CASTELLI	6	Buenos Aires	6168
        Localidad simple	-36.0570621940227	-57.8235422591576	Castelli	INDEC	6168020000	06168020	Centro Guerrero	060168	Castelli	CENTRO GUERRERO	6	Buenos Aires	6168
        Localidad simple	-35.9760530599951	-57.4487354447874	Castelli	INDEC	6168030000	06168030	Cerro de la Gloria	060168	Castelli	CERRO DE LA GLORIA (CANAL 15)	6	Buenos Aires	6168
        Localidad simple	-33.8978633606345	-61.099560506382	Colón	INDEC	6175010000	06175010	Colón	060175	Colón	COLON	6	Buenos Aires	6175
        Componente de localidad compuesta	-33.9147838019682	-60.9438081845998	Colón	INDEC	6175020000	06175020	Villa Manuel Pomar	060175	Colón	EL ARBOLITO	6	Buenos Aires	6175
        Localidad simple	-33.6518963027432	-60.8922239880462	Colón	INDEC	6175030000	06175030	Pearson	060175	Colón	PEARSON	6	Buenos Aires	6175
        Localidad simple	-34.0523353092344	-61.2019040914739	Colón	INDEC	6175040000	06175040	Sarasa	060175	Colón	SARASA	6	Buenos Aires	6175
        Localidad simple	-38.7648159927502	-61.9184051093309	Coronel de Marina Leonardo Rosales	INDEC	6182010000	06182010	Bajo Hondo	060182	Coronel de Marina Leonardo Rosales	BAJO HONDO	6	Buenos Aires	6182
        Localidad simple	-38.9961963948629	-61.5471990087107	Coronel de Marina Leonardo Rosales	INDEC	6182020000	06182020	Balneario Pehuen Co	060182	Coronel de Marina Leonardo Rosales	BALNEARIO PEHUEN CO	6	Buenos Aires	6182
        Localidad simple	-38.7839402799391	-62.1195194756714	Coronel de Marina Leonardo Rosales	INDEC	6182025000	06182025	Pago Chico	060182	Coronel de Marina Leonardo Rosales	PAGO CHICO	6	Buenos Aires	6182
        Localidad simple con entidad	-38.8813527346955	-62.0749536088688	Coronel de Marina Leonardo Rosales	INDEC	6182030000	06182030	Punta Alta	060182	Coronel de Marina Leonardo Rosales	PUNTA ALTA	6	Buenos Aires	6182
        Entidad	-38.8823547797498	-62.0626706347168	Coronel de Marina Leonardo Rosales	INDEC	6182030001	06182030	Punta Alta	060182	Coronel de Marina Leonardo Rosales	PUNTA ALTA	6	Buenos Aires	6182
        Entidad	-38.8532242630709	-62.1164752039925	Coronel de Marina Leonardo Rosales	INDEC	6182030002	06182030	Punta Alta	060182	Coronel de Marina Leonardo Rosales	VILLA DEL MAR	6	Buenos Aires	6182
        Localidad simple	-38.8069001411051	-62.09498539538	Coronel de Marina Leonardo Rosales	INDEC	6182050000	06182050	Villa General Arias	060182	Coronel de Marina Leonardo Rosales	VILLA GENERAL ARIAS	6	Buenos Aires	6182
        Localidad simple	-38.6204949120776	-60.8809603426407	Coronel Dorrego	INDEC	6189010000	06189010	Aparicio	060189	Coronel Dorrego	APARICIO	6	Buenos Aires	6189
        Localidad simple	-38.9224906889726	-60.5329774471942	Coronel Dorrego	INDEC	6189020000	06189020	Marisol	060189	Coronel Dorrego	BALNEARIO MARISOL	6	Buenos Aires	6189
        Localidad simple	-38.7166239148323	-61.2884948879698	Coronel Dorrego	INDEC	6189030000	06189030	Coronel Dorrego	060189	Coronel Dorrego	CORONEL DORREGO	6	Buenos Aires	6189
        Localidad simple	-38.6757752787604	-61.0884421797928	Coronel Dorrego	INDEC	6189040000	06189040	El Perdido	060189	Coronel Dorrego	EL PERDIDO	6	Buenos Aires	6189
        Localidad simple	-38.7966781095909	-61.0688772134763	Coronel Dorrego	INDEC	6189050000	06189050	Faro	060189	Coronel Dorrego	FARO	6	Buenos Aires	6189
        Localidad simple	-38.5543426342658	-60.6954938748393	Coronel Dorrego	INDEC	6189060000	06189060	Irene	060189	Coronel Dorrego	IRENE	6	Buenos Aires	6189
        Localidad simple	-38.7388491145692	-60.6092238150829	Coronel Dorrego	INDEC	6189070000	06189070	Oriente	060189	Coronel Dorrego	ORIENTE	6	Buenos Aires	6189
        Localidad simple	-38.6534164106777	-60.8608557685895	Coronel Dorrego	INDEC	6189075000	06189075	Paraje La Ruta	060189	Coronel Dorrego	LA RUTA	6	Buenos Aires	6189
        Localidad simple	-38.7415550885108	-61.5377200112301	Coronel Dorrego	INDEC	6189080000	06189080	San Román	060189	Coronel Dorrego	SAN ROMAN	6	Buenos Aires	6189
        Localidad simple	-37.9865210556901	-61.3540715661069	Coronel Pringles	INDEC	6196010000	06196010	Coronel Pringles	060196	Coronel Pringles	CORONEL PRINGLES	6	Buenos Aires	6196
        Localidad simple	-38.3235636030787	-61.4450578127822	Coronel Pringles	INDEC	6196020000	06196020	El Divisorio	060196	Coronel Pringles	EL DIVISORIO	6	Buenos Aires	6196
        Localidad simple	-38.2154094275446	-61.3145847771451	Coronel Pringles	INDEC	6196030000	06196030	El Pensamiento	060196	Coronel Pringles	EL PENSAMIENTO	6	Buenos Aires	6196
        Localidad simple	-38.3293770967784	-60.8866340266383	Coronel Pringles	INDEC	6196040000	06196040	Indio Rico	060196	Coronel Pringles	INDIO RICO	6	Buenos Aires	6196
        Localidad simple	-38.44591903663	-61.566096860456	Coronel Pringles	INDEC	6196050000	06196050	Lartigau	060196	Coronel Pringles	LARTIGAU	6	Buenos Aires	6196
        Localidad simple	-37.2899615825436	-62.2971682457111	Coronel Suárez	INDEC	6203010000	06203010	Cascada	060203	Coronel Suárez	CASCADAS	6	Buenos Aires	6203
        Localidad simple	-37.4596224938744	-61.9317530113989	Coronel Suárez	INDEC	6203020000	06203020	Coronel Suárez	060203	Coronel Suárez	CORONEL SUAREZ	6	Buenos Aires	6203
        Localidad simple	-37.4843018699441	-62.10361959864	Coronel Suárez	INDEC	6203030000	06203030	Curamalal	060203	Coronel Suárez	CURA MALAL	6	Buenos Aires	6203
        Localidad simple	-37.6772293087783	-61.7052608546557	Coronel Suárez	INDEC	6203040000	06203040	DOrbigny	060203	Coronel Suárez	D-ORBIGNY	6	Buenos Aires	6203
        Localidad simple	-37.0622288209544	-61.9297529087938	Coronel Suárez	INDEC	6203050000	06203050	Huanguelén	060203	Coronel Suárez	HUANGUELEN	6	Buenos Aires	6203
        Localidad simple	-37.2234351404125	-62.1602259170472	Coronel Suárez	INDEC	6203060000	06203060	Pasman	060203	Coronel Suárez	PASMAN	6	Buenos Aires	6203
        Localidad simple	-37.5077480260109	-61.9211473085303	Coronel Suárez	INDEC	6203070000	06203070	San José	060203	Coronel Suárez	SAN JOSE	6	Buenos Aires	6203
        Localidad simple	-37.5565856774998	-61.872634363442	Coronel Suárez	INDEC	6203080000	06203080	Santa María	060203	Coronel Suárez	SANTA MARIA	6	Buenos Aires	6203
        Localidad simple	-37.4891036510029	-61.9252761219778	Coronel Suárez	INDEC	6203090000	06203090	Santa Trinidad	060203	Coronel Suárez	SANTA TRINIDAD	6	Buenos Aires	6203
        Componente de localidad compuesta	-38.1345025284944	-61.7885553500206	Coronel Suárez	INDEC	6203100000	06203100	Villa La Arcadia	060203	Coronel Suárez	VILLA LA ARCADIA	6	Buenos Aires	6203
        Localidad simple	-34.6131247014799	-59.9005194580559	Chacabuco	INDEC	6210010000	06210010	Castilla	060210	Chacabuco	CASTILLA	6	Buenos Aires	6210
        Localidad simple	-34.6429843999409	-60.4701843504346	Chacabuco	INDEC	6210020000	06210020	Chacabuco	060210	Chacabuco	CHACABUCO	6	Buenos Aires	6210
        Localidad simple	-34.4575064000002	-60.1801845132051	Chacabuco	INDEC	6210030000	06210030	Los Angeles	060210	Chacabuco	LOS ANGELES	6	Buenos Aires	6210
        Localidad simple	-34.5854707868254	-60.6986325840689	Chacabuco	INDEC	6210040000	06210040	O-Higgins	060210	Chacabuco	O-HIGGINS	6	Buenos Aires	6210
        Localidad simple	-34.6086374337309	-60.0677106761007	Chacabuco	INDEC	6210050000	06210050	Rawson	060210	Chacabuco	RAWSON	6	Buenos Aires	6210
        Localidad simple	-35.5739889229165	-58.0680436475186	Chascomús	INDEC	6217003000	06217003	Barrio Lomas Altas	060218	Chascomús	BARRIO LOMAS ALTAS	6	Buenos Aires	6217
        Entidad	-35.5743009068199	-58.0005532563664	Chascomús	INDEC	6217010001	06217010	Chascomús	060218	Chascomús	CHASCOMUS	6	Buenos Aires	6217
        Entidad	-35.5466815668936	-58.0013258753826	Chascomús	INDEC	6217010003	06217010	Chascomús	060218	Chascomús	BARRIO SAN CAYETANO	6	Buenos Aires	6217
        Localidad simple	-35.5404169288645	-58.1349194201315	Chascomús	INDEC	6217015000	06217015	Laguna Vitel	060218	Chascomús	LAGUNA VITEL	6	Buenos Aires	6217
        Localidad simple	-35.8748248734085	-57.8964226760932	Chascomús	INDEC	6217020000	06217020	Manuel J. Cobo	060466	Lezama	MANUEL J. COBO	6	Buenos Aires	6217
        Localidad simple	-35.6282696386352	-58.0145524400059	Chascomús	INDEC	6217030000	06217030	Villa Parque Girado	060218	Chascomús	VILLA PARQUE GIRADO	6	Buenos Aires	6217
        Componente de localidad compuesta	-34.9660329017519	-60.1236385563996	Chivilcoy	INDEC	6224005000	06224005	Benitez	060224	Chivilcoy	BENITEZ	6	Buenos Aires	6224
        Localidad simple	-34.8980163772726	-60.0188841030321	Chivilcoy	INDEC	6224010000	06224010	Chivilcoy	060224	Chivilcoy	CHIVILCOY	6	Buenos Aires	6224
        Localidad simple	-34.746060108407	-60.0392314192743	Chivilcoy	INDEC	6224020000	06224020	Emilio Ayarza	060224	Chivilcoy	EMILIO AYARZA	6	Buenos Aires	6224
        Localidad simple	-34.839127302807	-59.8646671984292	Chivilcoy	INDEC	6224030000	06224030	Gorostiaga	060224	Chivilcoy	GOROSTIAGA	6	Buenos Aires	6224
        Localidad simple	-34.9739189538858	-59.8639302070489	Chivilcoy	INDEC	6224040000	06224040	La Rica	060224	Chivilcoy	LA RICA	6	Buenos Aires	6224
        Localidad simple	-35.0926582854313	-59.7745302971612	Chivilcoy	INDEC	6224050000	06224050	Moquehuá	060224	Chivilcoy	MOQUEHUA	6	Buenos Aires	6224
        Localidad simple	-35.0858455213162	-59.9236682591744	Chivilcoy	INDEC	6224060000	06224060	Ramón Biaus	060224	Chivilcoy	RAMON BIAUS	6	Buenos Aires	6224
        Localidad simple	-34.9443783815263	-59.7018597369347	Chivilcoy	INDEC	6224070000	06224070	San Sebastián	060224	Chivilcoy	SAN SEBASTIAN	6	Buenos Aires	6224
        Localidad simple	-36.5640579804658	-62.1324009778233	Daireaux	INDEC	6231010000	06231010	Andant	060231	Daireaux	ANDANT	6	Buenos Aires	6231
        Localidad simple	-36.8827708539235	-61.4878179060517	Daireaux	INDEC	6231020000	06231020	Arboledas	060231	Daireaux	ARBOLEDAS	6	Buenos Aires	6231
        Localidad simple	-36.6001749213746	-61.7450132654369	Daireaux	INDEC	6231030000	06231030	Daireaux	060231	Daireaux	DAIREAUX	6	Buenos Aires	6231
        Localidad simple	-36.6749256386405	-61.9291952273289	Daireaux	INDEC	6231040000	06231040	La Larga	060231	Daireaux	LA LARGA	6	Buenos Aires	6231
        Localidad simple	-36.307117163487	-62.2003365899	Daireaux	INDEC	6231060000	06231060	Salazar	060231	Daireaux	SALAZAR	6	Buenos Aires	6231
        Localidad simple	-36.3161215739926	-57.6752657333964	Dolores	INDEC	6238010000	06238010	Dolores	060238	Dolores	DOLORES	6	Buenos Aires	6238
        Localidad simple	-36.2067284269712	-57.7413707296745	Dolores	INDEC	6238020000	06238020	Sevigne	060238	Dolores	SEVIGNE	6	Buenos Aires	6238
        Entidad	-34.8758485548313	-57.9336298993983	Ensenada	INDEC	6245010001	06245010	Ensenada	060245	Ensenada	DIQUE Nº 1	6	Buenos Aires	6245
        Entidad	-34.8679770208454	-57.9214379246659	Ensenada	INDEC	6245010002	06245010	Ensenada	060245	Ensenada	ENSENADA	6	Buenos Aires	6245
        Entidad	-34.8370461990756	-57.8999620408998	Ensenada	INDEC	6245010003	06245010	Ensenada	060245	Ensenada	ISLA SANTIAGO (OESTE)	6	Buenos Aires	6245
        Entidad	-34.8346689394776	-58.0010481870988	Ensenada	INDEC	6245010004	06245010	Ensenada	060245	Ensenada	PUNTA LARA	6	Buenos Aires	6245
        Entidad	-34.884600148052	-57.9511290255284	Ensenada	INDEC	6245010005	06245010	Ensenada	060245	Ensenada	VILLA CATELA	6	Buenos Aires	6245
        Entidad	-34.3516704130246	-58.7832526742638	Escobar	INDEC	6252010001	06252010	Escobar	060252	Escobar	BELEN DE ESCOBAR	6	Buenos Aires	6252
        Entidad	-34.3034904902207	-58.7811274560113	Escobar	INDEC	6252010002	06252010	Escobar	060252	Escobar	EL CAZADOR	6	Buenos Aires	6252
        Entidad	-34.428785229178	-58.7361732596546	Escobar	INDEC	6252010003	06252010	Escobar	060252	Escobar	GARIN	6	Buenos Aires	6252
        Entidad	-34.3790006332322	-58.7303342412363	Escobar	INDEC	6252010004	06252010	Escobar	060252	Escobar	INGENIERO MASCHWITZ	6	Buenos Aires	6252
        Entidad	-34.3285234890863	-58.8506997728362	Escobar	INDEC	6252010005	06252010	Escobar	060252	Escobar	LOMA VERDE	6	Buenos Aires	6252
        Entidad	-34.3688779666182	-58.8402291878847	Escobar	INDEC	6252010006	06252010	Escobar	060252	Escobar	MATHEU	6	Buenos Aires	6252
        Entidad	-34.3964888336318	-58.7629458829717	Escobar	INDEC	6252010007	06252010	Escobar	060252	Escobar	MAQUINISTA F. SAVIO ESTE	6	Buenos Aires	6252
        Entidad	-34.8849791351051	-58.4778099372334	Esteban Echeverría	INDEC	6260010001	06260010	Esteban Echeverría	060260	Esteban Echeverría	CANNING	6	Buenos Aires	6260
        Entidad	-34.8304505041023	-58.494869419897	Esteban Echeverría	INDEC	6260010002	06260010	Esteban Echeverría	060260	Esteban Echeverría	EL JAGÜEL	6	Buenos Aires	6260
        Entidad	-34.800196435999	-58.4530964052639	Esteban Echeverría	INDEC	6260010003	06260010	Esteban Echeverría	060260	Esteban Echeverría	LUIS GUILLON	6	Buenos Aires	6260
        Entidad	-34.8191368630736	-58.4726947603508	Esteban Echeverría	INDEC	6260010004	06260010	Esteban Echeverría	060260	Esteban Echeverría	MONTE GRANDE	6	Buenos Aires	6260
        Entidad	-34.7565075768115	-58.4902923509723	Esteban Echeverría	INDEC	6260010005	06260010	Esteban Echeverría	060260	Esteban Echeverría	9 DE ABRIL	6	Buenos Aires	6260
        Localidad simple	-34.3363786908945	-59.1094149717708	Exaltación de la Cruz	INDEC	6266010000	06266010	Arroyo de la Cruz	060266	Exaltación de la Cruz	ARROYO DE LA CRUZ	6	Buenos Aires	6266
        Localidad simple	-34.2912108668035	-59.1015232724441	Exaltación de la Cruz	INDEC	6266020000	06266020	Capilla del Señor	060266	Exaltación de la Cruz	CAPILLA DEL SE¥OR	6	Buenos Aires	6266
        Localidad simple	-34.288973975279	-59.222781222713	Exaltación de la Cruz	INDEC	6266030000	06266030	Diego Gaynor	060266	Exaltación de la Cruz	DIEGO GAYNOR	6	Buenos Aires	6266
        Componente de localidad compuesta	-34.3300736993853	-58.9885651588167	Exaltación de la Cruz	INDEC	6266040000	06266040	Los Cardales	060266	Exaltación de la Cruz	LOS CARDALES	6	Buenos Aires	6266
        Localidad simple	-34.3273003551547	-59.0759905460338	Exaltación de la Cruz	INDEC	6266050000	06266050	Parada Orlando	060266	Exaltación de la Cruz	PARADA ORLANDO	6	Buenos Aires	6266
        Entidad	-34.4149477393736	-59.086281182388	Exaltación de la Cruz	INDEC	6266060001	06266060	Parada Robles - Pavón	060266	Exaltación de la Cruz	EL REMANSO	6	Buenos Aires	6266
        Entidad	-34.3736266959435	-59.139354021597	Exaltación de la Cruz	INDEC	6266060002	06266060	Parada Robles - Pavón	060266	Exaltación de la Cruz	PARADA ROBLES	6	Buenos Aires	6266
        Entidad	-34.3581118951493	-59.0310010709452	Exaltación de la Cruz	INDEC	6266060003	06266060	Parada Robles - Pavón	060266	Exaltación de la Cruz	PAVON	6	Buenos Aires	6266
        Entidad	-34.8128216283518	-58.5521650062885	José M. Ezeiza	INDEC	6270010001	06270010	Ezeiza	060270	Ezeiza	AEROPUERTO INTERNACIONAL EZEIZA	6	Buenos Aires	6270
        Entidad	-34.8962283957338	-58.5087006002723	José M. Ezeiza	INDEC	6270010002	06270010	Ezeiza	060270	Ezeiza	CANNING	6	Buenos Aires	6270
        Entidad	-34.9338489869515	-58.5780017334776	José M. Ezeiza	INDEC	6270010003	06270010	Ezeiza	060270	Ezeiza	CARLOS SPEGAZZINI	6	Buenos Aires	6270
        Entidad	-34.8536100103068	-58.5195521653909	José M. Ezeiza	INDEC	6270010004	06270010	Ezeiza	060270	Ezeiza	JOSE MARIA EZEIZA	6	Buenos Aires	6270
        Entidad	-34.8503859677023	-58.5558695462288	José M. Ezeiza	INDEC	6270010005	06270010	Ezeiza	060270	Ezeiza	LA UNION	6	Buenos Aires	6270
        Entidad	-34.8851527149847	-58.5700335845498	José M. Ezeiza	INDEC	6270010006	06270010	Ezeiza	060270	Ezeiza	TRISTAN SUAREZ	6	Buenos Aires	6270
        Entidad	-34.827580702831	-58.2229120039487	Florencio Varela	INDEC	6274010001	06274010	Florencio Varela	060274	Florencio Varela	BOSQUES	6	Buenos Aires	6274
        Entidad	-34.812285887223	-58.2426532633495	Florencio Varela	INDEC	6274010002	06274010	Florencio Varela	060274	Florencio Varela	ESTANISLAO SEVERO ZEBALLOS	6	Buenos Aires	6274
        Entidad	-34.7960544308506	-58.2748588953342	Florencio Varela	INDEC	6274010003	06274010	Florencio Varela	060274	Florencio Varela	FLORENCIO VARELA	6	Buenos Aires	6274
        Entidad	-34.8152397261388	-58.3082334245906	Florencio Varela	INDEC	6274010004	06274010	Florencio Varela	060274	Florencio Varela	GOBERNADOR JULIO A. COSTA	6	Buenos Aires	6274
        Entidad	-34.8648075260046	-58.2110437322304	Florencio Varela	INDEC	6274010005	06274010	Florencio Varela	060274	Florencio Varela	INGENIERO JUAN ALLAN	6	Buenos Aires	6274
        Entidad	-34.8790424725562	-58.2898092496787	Florencio Varela	INDEC	6274010006	06274010	Florencio Varela	060274	Florencio Varela	VILLA BROWN	6	Buenos Aires	6274
        Entidad	-34.8627929258513	-58.2553232274346	Florencio Varela	INDEC	6274010007	06274010	Florencio Varela	060274	Florencio Varela	VILLA SAN LUIS	6	Buenos Aires	6274
        Entidad	-34.8380276482598	-58.2888899071764	Florencio Varela	INDEC	6274010008	06274010	Florencio Varela	060274	Florencio Varela	VILLA SANTA ROSA	6	Buenos Aires	6274
        Entidad	-34.8303193176345	-58.2635239901185	Florencio Varela	INDEC	6274010009	06274010	Florencio Varela	060274	Florencio Varela	VILLA VATTEONE	6	Buenos Aires	6274
        Entidad	-34.9564048574127	-58.2787454299742	Florencio Varela	INDEC	6274010010	06274010	Florencio Varela	060274	Florencio Varela	EL TROPEZON	6	Buenos Aires	6274
        Entidad	-34.9437330109546	-58.2632550914348	Florencio Varela	INDEC	6274010011	06274010	Florencio Varela	060274	Florencio Varela	LA CAPILLA	6	Buenos Aires	6274
        Localidad simple	-34.6356616332748	-62.4786821321875	Florentino Ameghino	INDEC	6277010000	06277010	Blaquier	060277	Florentino Ameghino	BLAQUIER	6	Buenos Aires	6277
        Localidad simple	-34.846677699169	-62.4671575805384	Florentino Ameghino	INDEC	6277020000	06277020	Florentino Ameghino	060277	Florentino Ameghino	FLORENTINO AMEGHINO	6	Buenos Aires	6277
        Localidad simple	-34.9522292183733	-62.2174229886622	Florentino Ameghino	INDEC	6277030000	06277030	Porvenir	060277	Florentino Ameghino	PORVENIR	6	Buenos Aires	6277
        Localidad simple	-38.4348806367321	-58.216863731472	General Alvarado	INDEC	6280005000	06280005	Centinela del Mar	060280	General Alvarado	CENTINELA DEL MAR	6	Buenos Aires	6280
        Localidad simple	-38.1119335118514	-57.8415353121543	General Alvarado	INDEC	6280010000	06280010	Comandante Nicanor Otamendi	060280	General Alvarado	COMANDANTE NICANOR OTAMENDI	6	Buenos Aires	6280
        Localidad simple	-38.3446881533109	-57.9920393065731	General Alvarado	INDEC	6280020000	06280020	Mar del Sur	060280	General Alvarado	MAR DEL SUR	6	Buenos Aires	6280
        Localidad simple	-38.1486545138318	-58.2230121065801	General Alvarado	INDEC	6280030000	06280030	Mechongué	060280	General Alvarado	MECHONGUE	6	Buenos Aires	6280
        Componente de localidad compuesta	-38.2707429318083	-57.8404714577536	General Alvarado	INDEC	6280040000	06280040	Miramar	060280	General Alvarado	MIRAMAR	6	Buenos Aires	6280
        Localidad simple	-36.0229384341367	-60.0147935726886	General Alvear	INDEC	6287010000	06287010	General Alvear	060287	General Alvear	GENERAL ALVEAR	6	Buenos Aires	6287
        Localidad simple	-34.2101542565966	-61.3548577979495	General Arenales	INDEC	6294010000	06294010	Arribeños	060294	General Arenales	ARRIBE¥OS	6	Buenos Aires	6294
        Localidad simple	-34.2368758979793	-61.103613881133	General Arenales	INDEC	6294020000	06294020	Ascensión	060294	General Arenales	ASCENSION	6	Buenos Aires	6294
        Localidad simple	-34.2698455922697	-61.2926718130401	General Arenales	INDEC	6294030000	06294030	Estación Arenales	060294	General Arenales	ESTACION ARENALES	6	Buenos Aires	6294
        Localidad simple	-34.1250383813873	-61.132654886464	General Arenales	INDEC	6294040000	06294040	Ferré	060294	General Arenales	FERRE	6	Buenos Aires	6294
        Localidad simple	-34.3044679711077	-61.3056277788216	General Arenales	INDEC	6294050000	06294050	General Arenales	060294	General Arenales	GENERAL ARENALES	6	Buenos Aires	6294
        Localidad simple	-34.2608740726731	-60.9685988224111	General Arenales	INDEC	6294060000	06294060	La Angelita	060294	General Arenales	LA ANGELITA	6	Buenos Aires	6294
        Localidad simple	-34.1068549430168	-61.1317020714357	General Arenales	INDEC	6294070000	06294070	La Trinidad	060294	General Arenales	LA TRINIDAD	6	Buenos Aires	6294
        Localidad simple	-35.7694577358026	-58.4944615102033	General Belgrano	INDEC	6301010000	06301010	General Belgrano	060301	General Belgrano	GENERAL BELGRANO	6	Buenos Aires	6301
        Localidad simple	-35.6733729629116	-58.9582999568816	General Belgrano	INDEC	6301020000	06301020	Gorchs	060301	General Belgrano	GORCHS	6	Buenos Aires	6301
        Localidad simple	-36.6431651777017	-57.7905019037041	General Guido	INDEC	6308010000	06308010	General Guido	060308	General Guido	GENERAL GUIDO	6	Buenos Aires	6308
        Localidad simple	-36.9489668508723	-58.1035671819428	General Guido	INDEC	6308020000	06308020	Labardén	060308	General Guido	LABARDEN	6	Buenos Aires	6308
        Entidad	-37.0062217702401	-57.1417255856769	General Juan Madariaga	INDEC	6315010001	06315010	General Juan Madariaga	060315	General Juan Madariaga	BARRIO KENNEDY	6	Buenos Aires	6315
        Entidad	-36.9967730012079	-57.1374769071298	General Juan Madariaga	INDEC	6315010002	06315010	General Juan Madariaga	060315	General Juan Madariaga	GENERAL JUAN MADARIAGA	6	Buenos Aires	6315
        Localidad simple	-37.2503992475804	-61.2595794125711	General La Madrid	INDEC	6322010000	06322010	General La Madrid	060322	General la Madrid	GENERAL LA MADRID	6	Buenos Aires	6322
        Localidad simple	-37.3607690235166	-61.5348487870647	General La Madrid	INDEC	6322020000	06322020	La Colina	060322	General la Madrid	LA COLINA	6	Buenos Aires	6322
        Localidad simple	-37.1980813542863	-61.1220424031557	General La Madrid	INDEC	6322030000	06322030	Las Martinetas	060322	General la Madrid	LAS MARTINETAS	6	Buenos Aires	6322
        Localidad simple	-37.53362138441	-61.2865750087495	General La Madrid	INDEC	6322040000	06322040	Líbano	060322	General la Madrid	LIBANO	6	Buenos Aires	6322
        Localidad simple	-37.731769903374	-61.3230957170244	General La Madrid	INDEC	6322050000	06322050	Pontaut	060322	General la Madrid	PONTAUT	6	Buenos Aires	6322
        Localidad simple	-34.8937763345299	-58.9172215319327	General Las Heras	INDEC	6329010000	06329010	General Hornos	060329	General las Heras	GENERAL HORNOS	6	Buenos Aires	6329
        Localidad simple	-34.9267739074255	-58.9453407851291	General Las Heras	INDEC	6329020000	06329020	General Las Heras	060329	General las Heras	GENERAL LAS HERAS	6	Buenos Aires	6329
        Localidad simple	-34.7829908276155	-59.1095647693247	General Las Heras	INDEC	6329030000	06329030	La Choza	060329	General las Heras	LA CHOZA	6	Buenos Aires	6329
        Localidad simple	-34.7941193667757	-59.0279756935744	General Las Heras	INDEC	6329050000	06329050	Plomer	060329	General las Heras	PLOMER	6	Buenos Aires	6329
        Localidad simple	-34.8300241949658	-58.9422589402025	General Las Heras	INDEC	6329060000	06329060	Villars	060329	General las Heras	VILLARS	6	Buenos Aires	6329
        Localidad simple	-36.4080851872455	-56.9433553335054	General Lavalle	INDEC	6336020000	06336020	General Lavalle	060336	General Lavalle	GENERAL LAVALLE	6	Buenos Aires	6336
        Localidad simple	-36.7089537726649	-56.7598433617574	General Lavalle	INDEC	6336030000	06336030	Pavón	060336	General Lavalle	PAVON	6	Buenos Aires	6336
        Localidad simple	-35.6936377582584	-58.447313612508	General Paz	INDEC	6343010000	06343010	Barrio Río Salado	060343	General Paz	BARRIO RIO SALADO	6	Buenos Aires	6343
        Localidad simple	-35.2747490125694	-58.4041701894263	General Paz	INDEC	6343020000	06343020	Loma Verde	060343	General Paz	LOMA VERDE	6	Buenos Aires	6343
        Localidad simple	-35.5173520233652	-58.3184247148653	General Paz	INDEC	6343030000	06343030	Ranchos	060343	General Paz	RANCHOS	6	Buenos Aires	6343
        Localidad simple	-35.6776271050909	-58.4350923167562	General Paz	INDEC	6343040000	06343040	Villanueva	060343	General Paz	VILLANUEVA	6	Buenos Aires	6343
        Localidad simple	-34.4162137301573	-61.9280141749282	General Pinto	INDEC	6351010000	06351010	Colonia San Ricardo	060351	General Pinto	COLONIA SAN RICARDO	6	Buenos Aires	6351
        Localidad simple	-34.764155990724	-61.8900674920122	General Pinto	INDEC	6351020000	06351020	General Pinto	060351	General Pinto	GENERAL PINTO	6	Buenos Aires	6351
        Localidad simple	-34.576111833277	-62.0518306894073	General Pinto	INDEC	6351030000	06351030	Germania	060351	General Pinto	GERMANIA	6	Buenos Aires	6351
        Localidad simple	-34.5994995308259	-61.9164989081536	General Pinto	INDEC	6351035000	06351035	Gunther	060351	General Pinto	GUNTHER	6	Buenos Aires	6351
        Localidad simple	-34.7913160212074	-62.2011090686366	General Pinto	INDEC	6351040000	06351040	Villa Francia	060351	General Pinto	VILLA FRANCIA	6	Buenos Aires	6351
        Localidad simple	-34.5798302278832	-62.1710489234118	General Pinto	INDEC	6351050000	06351050	Villa Roth	060351	General Pinto	VILLA ROTH	6	Buenos Aires	6351
        Localidad simple	-38.0297229162982	-57.7995485049706	General Pueyrredón	INDEC	6357020000	06357020	Barrio El Boquerón	060357	General Pueyrredón	BARRIO EL BOQUERON	6	Buenos Aires	6357
        Localidad simple	-37.9068268303117	-57.7858860640391	General Pueyrredón	INDEC	6357050000	06357050	Barrio La Gloria	060357	General Pueyrredón	BARRIO LA GLORIA	6	Buenos Aires	6357
        Localidad simple	-37.9317157840639	-57.683162032898	General Pueyrredón	INDEC	6357060000	06357060	Barrio Santa Paula	060357	General Pueyrredón	BARRIO SANTA PAULA	6	Buenos Aires	6357
        Localidad simple	-38.0086211557001	-57.7085500402678	General Pueyrredón	INDEC	6357070000	06357070	Batán	060357	General Pueyrredón	BATAN	6	Buenos Aires	6357
        Localidad simple	-38.1757779275595	-57.6513390003209	General Pueyrredón	INDEC	6357080000	06357080	Chapadmalal	060357	General Pueyrredón	CHAPADMALAL	6	Buenos Aires	6357
        Componente de localidad compuesta	-38.2369312519788	-57.763418077922	General Pueyrredón	INDEC	6357090000	06357090	El Marquesado	060357	General Pueyrredón	EL MARQUESADO	6	Buenos Aires	6357
        Localidad simple	-38.036727731373	-57.7129897398616	General Pueyrredón	INDEC	6357100000	06357100	Estación Chapadmalal	060357	General Pueyrredón	ESTACION CHAPADMALAL	6	Buenos Aires	6357
        Entidad	-37.9130763908367	-57.552463851894	General Pueyrredón	INDEC	6357110001	06357110	Mar del Plata	060357	General Pueyrredón	CAMET	6	Buenos Aires	6357
        Entidad	-37.888665236683	-57.6000121501773	General Pueyrredón	INDEC	6357110002	06357110	Mar del Plata	060357	General Pueyrredón	ESTACION CAMET	6	Buenos Aires	6357
        Entidad	-38.0120914785136	-57.6064947153173	General Pueyrredón	INDEC	6357110003	06357110	Mar del Plata	060357	General Pueyrredón	MAR DEL PLATA	6	Buenos Aires	6357
        Entidad	-38.0833774287933	-57.5859350936487	General Pueyrredón	INDEC	6357110004	06357110	Mar del Plata	060357	General Pueyrredón	PUNTA MOGOTES	6	Buenos Aires	6357
        Entidad	-37.8324145231571	-57.6311155465986	General Pueyrredón	INDEC	6357110005	06357110	Mar del Plata	060357	General Pueyrredón	BARRIO EL CASAL	6	Buenos Aires	6357
        Localidad simple con entidad	-37.954166706805	-57.7715971022228	General Pueyrredón	INDEC	6357120000	06357120	Sierra de los Padres	060357	General Pueyrredón	SIERRA DE LOS PADRES	6	Buenos Aires	6357
        Entidad	-37.8931024789245	-57.8261645643114	General Pueyrredón	INDEC	6357120001	06357120	Sierra de los Padres	060357	General Pueyrredón	BARRIO COLINAS VERDES	6	Buenos Aires	6357
        Entidad	-37.9050810135269	-57.7391824086455	General Pueyrredón	INDEC	6357120002	06357120	Sierra de los Padres	060357	General Pueyrredón	BARRIO EL COYUNCO	6	Buenos Aires	6357
        Entidad	-37.9504850690528	-57.7774696627876	General Pueyrredón	INDEC	6357120004	06357120	Sierra de los Padres	060357	General Pueyrredón	SIERRA DE LOS PADRES	6	Buenos Aires	6357
        Componente de localidad compuesta con entidad	-34.6079239021063	-58.950282039134	General Rodríguez	INDEC	6364030000	06364030	General Rodríguez	060364	General Rodríguez	GENERAL RODRIGUEZ	6	Buenos Aires	6364
        Entidad	-34.5497197440161	-58.9467785534585	General Rodríguez	INDEC	6364030001	06364030	General Rodríguez	060364	General Rodríguez	BARRIO MORABO	6	Buenos Aires	6364
        Entidad	-34.6764462958288	-58.9704188625706	General Rodríguez	INDEC	6364030002	06364030	General Rodríguez	060364	General Rodríguez	BARRIO RUTA 24 KM. 10	6	Buenos Aires	6364
        Entidad	-34.5601388485008	-58.9182614196703	General Rodríguez	INDEC	6364030003	06364030	General Rodríguez	060364	General Rodríguez	C.C. BOSQUE REAL	6	Buenos Aires	6364
        Entidad	-34.6278603432415	-58.9532533538878	General Rodríguez	INDEC	6364030004	06364030	General Rodríguez	060364	General Rodríguez	GENERAL RODRGUEZ	6	Buenos Aires	6364
        Entidad	-34.5673433766504	-58.5843112459936	Ciudad Libertador San Martín	INDEC	6371010001	06371010	General San Martín	060371	General San Martín	BARRIO PARQUE GENERAL SAN MARTIN	6	Buenos Aires	6371
        Entidad	-34.5751071711249	-58.5745828938046	Ciudad Libertador San Martín	INDEC	6371010002	06371010	General San Martín	060371	General San Martín	BILLINGHURST	6	Buenos Aires	6371
        Entidad	-34.5796986848297	-58.5420144816587	Ciudad Libertador San Martín	INDEC	6371010003	06371010	General San Martín	060371	General San Martín	CIUDAD DEL LIBERTADOR GENERAL SAN MARTIN	6	Buenos Aires	6371
        Entidad	-34.5416520781805	-58.5959093634496	Ciudad Libertador San Martín	INDEC	6371010004	06371010	General San Martín	060371	General San Martín	CIUDAD JARDIN EL LIBERTADOR	6	Buenos Aires	6371
        Entidad	-34.5904132636755	-58.5530430923958	Ciudad Libertador San Martín	INDEC	6371010005	06371010	General San Martín	060371	General San Martín	VILLA AYACUCHO	6	Buenos Aires	6371
        Entidad	-34.5422846822324	-58.5583177179822	Ciudad Libertador San Martín	INDEC	6371010006	06371010	General San Martín	060371	General San Martín	VILLA BALLESTER	6	Buenos Aires	6371
        Entidad	-34.5905899097986	-58.5396606594168	Ciudad Libertador San Martín	INDEC	6371010007	06371010	General San Martín	060371	General San Martín	VILLA BERNARDO MONTEAGUDO	6	Buenos Aires	6371
        Entidad	-34.5796744853293	-58.523036970803	Ciudad Libertador San Martín	INDEC	6371010008	06371010	General San Martín	060371	General San Martín	VILLA CHACABUCO	6	Buenos Aires	6371
        Entidad	-34.5595169115142	-58.5772769308184	Ciudad Libertador San Martín	INDEC	6371010009	06371010	General San Martín	060371	General San Martín	VILLA CORONEL JOSE M. ZAPIOLA	6	Buenos Aires	6371
        Entidad	-34.5470506011052	-58.5694391894093	Ciudad Libertador San Martín	INDEC	6371010010	06371010	General San Martín	060371	General San Martín	VILLA GENERAL ANTONIO J. DE SUCRE	6	Buenos Aires	6371
        Entidad	-34.51253320696	-58.5801478288493	Ciudad Libertador San Martín	INDEC	6371010011	06371010	General San Martín	060371	General San Martín	VILLA GENERAL EUGENIO NECOCHEA	6	Buenos Aires	6371
        Entidad	-34.553116323608	-58.5669976603922	Ciudad Libertador San Martín	INDEC	6371010012	06371010	General San Martín	060371	General San Martín	VILLA GENERAL JOSE TOMAS GUIDO	6	Buenos Aires	6371
        Entidad	-34.5612567076697	-58.5553936643491	Ciudad Libertador San Martín	INDEC	6371010013	06371010	General San Martín	060371	General San Martín	VILLA GENERAL JUAN G. LAS HERAS	6	Buenos Aires	6371
        Entidad	-34.5433989252454	-58.5755928423118	Ciudad Libertador San Martín	INDEC	6371010014	06371010	General San Martín	060371	General San Martín	VILLA GODOY CRUZ	6	Buenos Aires	6371
        Entidad	-34.5507646909435	-58.5284854572959	Ciudad Libertador San Martín	INDEC	6371010015	06371010	General San Martín	060371	General San Martín	VILLA GRANADEROS DE SAN MARTIN	6	Buenos Aires	6371
        Entidad	-34.6699430265699	-58.6733044157835	Ituzaingó	INDEC	6410010002	06410010	Ituzaingó	060410	Ituzaingó	ITUZAINGO SUR	6	Buenos Aires	6410
        Entidad	-34.5383846467918	-58.5491721010066	Ciudad Libertador San Martín	INDEC	6371010016	06371010	General San Martín	060371	General San Martín	VILLA GREGORIA MATORRAS	6	Buenos Aires	6371
        Entidad	-34.5253711653351	-58.5802550661988	Ciudad Libertador San Martín	INDEC	6371010017	06371010	General San Martín	060371	General San Martín	VILLA JOSE LEON SUAREZ	6	Buenos Aires	6371
        Entidad	-34.5474839124216	-58.5750972559389	Ciudad Libertador San Martín	INDEC	6371010018	06371010	General San Martín	060371	General San Martín	VILLA JUAN MARTIN DE PUEYRREDON	6	Buenos Aires	6371
        Entidad	-34.5846960052521	-58.5623334028073	Ciudad Libertador San Martín	INDEC	6371010019	06371010	General San Martín	060371	General San Martín	VILLA LIBERTAD	6	Buenos Aires	6371
        Entidad	-34.590146441043	-58.5234377223288	Ciudad Libertador San Martín	INDEC	6371010020	06371010	General San Martín	060371	General San Martín	VILLA LYNCH	6	Buenos Aires	6371
        Entidad	-34.5682131696117	-58.5245451491949	Ciudad Libertador San Martín	INDEC	6371010021	06371010	General San Martín	060371	General San Martín	VILLA MAIPU	6	Buenos Aires	6371
        Entidad	-34.5646397095177	-58.5922548425316	Ciudad Libertador San Martín	INDEC	6371010022	06371010	General San Martín	060371	General San Martín	VILLA MARIA IRENE DE LOS REMEDIOS DE ESCALADA	6	Buenos Aires	6371
        Entidad	-34.5551356608044	-58.5383771255925	Ciudad Libertador San Martín	INDEC	6371010023	06371010	General San Martín	060371	General San Martín	VILLA MARQUES ALEJANDRO MARIA DE AGUADO	6	Buenos Aires	6371
        Entidad	-34.5939487574993	-58.5321739553925	Ciudad Libertador San Martín	INDEC	6371010024	06371010	General San Martín	060371	General San Martín	VILLA PARQUE PRESIDENTE FIGUEROA ALCORTA	6	Buenos Aires	6371
        Entidad	-34.5618730613851	-58.5336624494541	Ciudad Libertador San Martín	INDEC	6371010025	06371010	General San Martín	060371	General San Martín	VILLA PARQUE SAN LORENZO	6	Buenos Aires	6371
        Entidad	-34.5659932905453	-58.5448069225448	Ciudad Libertador San Martín	INDEC	6371010026	06371010	General San Martín	060371	General San Martín	VILLA SAN ANDRES	6	Buenos Aires	6371
        Entidad	-34.5716953020123	-58.5491073994839	Ciudad Libertador San Martín	INDEC	6371010027	06371010	General San Martín	060371	General San Martín	VILLA YAPEYU	6	Buenos Aires	6371
        Localidad simple	-34.7472686783062	-60.9889526585307	General Viamonte	INDEC	6385010000	06385010	Baigorrita	060385	General Viamonte	BAIGORRITA	6	Buenos Aires	6385
        Localidad simple	-34.9437720137007	-61.1588643543904	General Viamonte	INDEC	6385020000	06385020	La Delfina	060385	General Viamonte	LA DELFINA	6	Buenos Aires	6385
        Localidad simple	-35.0010365651503	-61.0381497866181	General Viamonte	INDEC	6385030000	06385030	Los Toldos	060385	General Viamonte	LOS TOLDOS	6	Buenos Aires	6385
        Localidad simple	-35.0319914044113	-60.8647685857183	General Viamonte	INDEC	6385040000	06385040	San Emilio	060385	General Viamonte	SAN EMILIO	6	Buenos Aires	6385
        Localidad simple	-34.8949208760254	-61.0044538243489	General Viamonte	INDEC	6385050000	06385050	Zavalía	060385	General Viamonte	ZAVALIA	6	Buenos Aires	6385
        Localidad simple	-35.0124666610174	-63.3741563457186	General Villegas	INDEC	6392010000	06392010	Banderaló	060392	General Villegas	BANDERALO	6	Buenos Aires	6392
        Localidad simple	-34.4155054560621	-62.9618553806295	General Villegas	INDEC	6392020000	06392020	Cañada Seca	060392	General Villegas	CA¥ADA SECA	6	Buenos Aires	6392
        Localidad simple	-34.672994561958	-63.3724454840572	General Villegas	INDEC	6392030000	06392030	Coronel Charlone	060392	General Villegas	CORONEL CHARLONE	6	Buenos Aires	6392
        Localidad simple	-34.7798328261907	-63.1960964862342	General Villegas	INDEC	6392040000	06392040	Emilio V. Bunge	060392	General Villegas	EMILIO V. BUNGE	6	Buenos Aires	6392
        Localidad simple	-35.0338419886306	-63.0146637107531	General Villegas	INDEC	6392050000	06392050	General Villegas	060392	General Villegas	GENERAL VILLEGAS	6	Buenos Aires	6392
        Localidad simple	-35.0490892294374	-63.1218876844046	General Villegas	INDEC	6392060000	06392060	Massey	060392	General Villegas	MASSEY	6	Buenos Aires	6392
        Localidad simple	-34.5804516676438	-62.3516395240412	General Villegas	INDEC	6392070000	06392070	Pichincha	060392	General Villegas	PICHINCHA	6	Buenos Aires	6392
        Localidad simple	-34.771104540922	-62.9846965760316	General Villegas	INDEC	6392080000	06392080	Piedritas	060392	General Villegas	PIEDRITAS	6	Buenos Aires	6392
        Localidad simple	-34.6921180067125	-62.6957932681386	General Villegas	INDEC	6392090000	06392090	Santa Eleodora	060392	General Villegas	SANTA ELEODORA	6	Buenos Aires	6392
        Localidad simple	-34.548335663977	-63.1732728724567	General Villegas	INDEC	6392100000	06392100	Santa Regina	060392	General Villegas	SANTA REGINA	6	Buenos Aires	6392
        Localidad simple	-34.4607916334895	-62.649344456796	General Villegas	INDEC	6392110000	06392110	Villa Saboya	060392	General Villegas	VILLA SABOYA	6	Buenos Aires	6392
        Localidad simple	-35.2858298200472	-63.3682055476167	General Villegas	INDEC	6392120000	06392120	Villa Sauze	060392	General Villegas	VILLA SAUZE	6	Buenos Aires	6392
        Localidad simple	-37.0864662845331	-62.5391482291111	Guaminí	INDEC	6399010000	06399010	Arroyo Venado	060399	Guaminí	ARROYO VENADO	6	Buenos Aires	6399
        Localidad simple	-36.7580953396186	-62.5017754084549	Guaminí	INDEC	6399020000	06399020	Casbas	060399	Guaminí	CASBAS	6	Buenos Aires	6399
        Localidad simple	-36.5604378772819	-62.5981120377825	Guaminí	INDEC	6399030000	06399030	Garré	060399	Guaminí	GARRE	6	Buenos Aires	6399
        Localidad simple	-37.0120881308673	-62.4166857296556	Guaminí	INDEC	6399040000	06399040	Guaminí	060399	Guaminí	GUAMINI	6	Buenos Aires	6399
        Localidad simple	-36.80905243808	-62.2451480754422	Guaminí	INDEC	6399050000	06399050	Laguna Alsina	060399	Guaminí	LAGUNA ALSINA	6	Buenos Aires	6399
        Localidad simple	-36.2994630370091	-61.7178401805261	Hipólito Yrigoyen	INDEC	6406010000	06406010	Henderson	060406	Hipólito Yrigoyen	HENDERSON	6	Buenos Aires	6406
        Localidad simple	-36.0883254041477	-61.4112500767203	Hipólito Yrigoyen	INDEC	6406020000	06406020	Herrera Vegas	060406	Hipólito Yrigoyen	HERRERA VEGAS	6	Buenos Aires	6406
        Entidad	-34.5930931356257	-58.6357209509749	Hurlingham	INDEC	6408010001	06408010	Hurlingham	060408	Hurlingham	HURLINGHAM	6	Buenos Aires	6408
        Entidad	-34.6123944448227	-58.6538103691925	Hurlingham	INDEC	6408010002	06408010	Hurlingham	060408	Hurlingham	VILLA SANTOS TESEI	6	Buenos Aires	6408
        Entidad	-34.5815622830288	-58.6583005365543	Hurlingham	INDEC	6408010003	06408010	Hurlingham	060408	Hurlingham	WILLIAM C. MORRIS	6	Buenos Aires	6408
        Entidad	-34.6440551161203	-58.688489332955	Ituzaingó	INDEC	6410010001	06410010	Ituzaingó	060410	Ituzaingó	ITUZAINGO CENTRO	6	Buenos Aires	6410
        Entidad	-34.6168695808944	-58.693287500009	Ituzaingó	INDEC	6410010003	06410010	Ituzaingó	060410	Ituzaingó	VILLA GOBERNADOR UDAONDO	6	Buenos Aires	6410
        Entidad	-34.480495794913	-58.8042588983994	José C. Paz	INDEC	6412010001	06412010	José C. Paz	060412	José C. Paz	DEL VISO	6	Buenos Aires	6412
        Entidad	-34.5211611965464	-58.770881112578	José C. Paz	INDEC	6412010002	06412010	José C. Paz	060412	José C. Paz	JOSE C. PAZ	6	Buenos Aires	6412
        Entidad	-34.4918483987206	-58.7863780316191	José C. Paz	INDEC	6412010003	06412010	José C. Paz	060412	José C. Paz	TORTUGUITAS	6	Buenos Aires	6412
        Localidad simple	-34.508084406003	-60.8648956546314	Junín	INDEC	6413010000	06413010	Agustín Roca	060413	Junín	AGUSTIN ROCA	6	Buenos Aires	6413
        Localidad simple	-34.4607068571169	-61.067072329925	Junín	INDEC	6413020000	06413020	Agustina	060413	Junín	AGUSTINA	6	Buenos Aires	6413
        Localidad simple	-34.6606435780718	-61.0183645929666	Junín	INDEC	6413030000	06413030	Balneario Laguna de Gómez	060413	Junín	BALNEARIO LAGUNA DE GOMEZ	6	Buenos Aires	6413
        Localidad simple	-34.3467322372427	-61.1310781728463	Junín	INDEC	6413040000	06413040	Fortín Tiburcio	060413	Junín	FORTIN TIBURCIO	6	Buenos Aires	6413
        Localidad simple	-34.5838316271397	-60.9472651715327	Junín	INDEC	6413050000	06413050	Junín	060413	Junín	JUNIN	6	Buenos Aires	6413
        Localidad simple	-34.6564145153102	-60.8466681579607	Junín	INDEC	6413055000	06413055	Paraje La Agraria	060413	Junín	LA AGRARIA	6	Buenos Aires	6413
        Localidad simple	-34.7245238530675	-61.1553171474145	Junín	INDEC	6413060000	06413060	Laplacette	060413	Junín	LAPLACETTE	6	Buenos Aires	6413
        Localidad simple	-34.7608898130707	-60.8419122487126	Junín	INDEC	6413070000	06413070	Morse	060413	Junín	MORSE	6	Buenos Aires	6413
        Localidad simple	-34.5752591285936	-61.0747308195452	Junín	INDEC	6413080000	06413080	Saforcada	060413	Junín	SAFORCADA	6	Buenos Aires	6413
        Localidad simple	-36.4883976285615	-56.7004352579533	La Costa	INDEC	6420010000	06420010	Las Toninas	060420	La Costa	LAS TONINAS	6	Buenos Aires	6420
        Entidad	-36.6552111489067	-56.6949520678334	La Costa	INDEC	6420020001	06420020	Mar de Ajó - San Bernardo	060420	La Costa	AGUAS VERDES	6	Buenos Aires	6420
        Entidad	-36.6627491358367	-56.6817136067571	La Costa	INDEC	6420020002	06420020	Mar de Ajó - San Bernardo	060420	La Costa	LUCILA DEL MAR	6	Buenos Aires	6420
        Entidad	-36.7468693750233	-56.6852641972249	La Costa	INDEC	6420020003	06420020	Mar de Ajó - San Bernardo	060420	La Costa	MAR DE AJO	6	Buenos Aires	6420
        Entidad	-36.7065977594674	-56.6904987226994	La Costa	INDEC	6420020004	06420020	Mar de Ajó - San Bernardo	060420	La Costa	MAR DE AJO NORTE	6	Buenos Aires	6420
        Entidad	-36.6874110140403	-56.6841400639982	La Costa	INDEC	6420020005	06420020	Mar de Ajó - San Bernardo	060420	La Costa	SAN BERNARDO	6	Buenos Aires	6420
        Localidad simple	-36.3532388310754	-56.723944139417	La Costa	INDEC	6420030000	06420030	San Clemente del Tuyú	060420	La Costa	SAN CLEMENTE DEL TUYU	6	Buenos Aires	6420
        Entidad	-36.5861168542894	-56.6990062189009	La Costa	INDEC	6420040001	06420040	Santa Teresita - Mar del Tuyú	060420	La Costa	MAR DEL TUYU	6	Buenos Aires	6420
        Entidad	-36.5409111808415	-56.705867443875	La Costa	INDEC	6420040002	06420040	Santa Teresita - Mar del Tuyú	060420	La Costa	SANTA TERESITA	6	Buenos Aires	6420
        Entidad	-34.7141728890679	-58.5089043765674	La Matanza	INDEC	6427010001	06427010	La Matanza	060427	La Matanza	ALDO BONZI	6	Buenos Aires	6427
        Entidad	-34.7245358500775	-58.5370063768546	La Matanza	INDEC	6427010002	06427010	La Matanza	060427	La Matanza	CIUDAD EVITA	6	Buenos Aires	6427
        Entidad	-34.7724652485211	-58.6404861634561	La Matanza	INDEC	6427010003	06427010	La Matanza	060427	La Matanza	GONZALEZ CATAN	6	Buenos Aires	6427
        Entidad	-34.7468379962284	-58.5925328858169	La Matanza	INDEC	6427010004	06427010	La Matanza	060427	La Matanza	GREGORIO DE LAFERRERE	6	Buenos Aires	6427
        Entidad	-34.7184291570686	-58.577751528605	La Matanza	INDEC	6427010005	06427010	La Matanza	060427	La Matanza	ISIDRO CASANOVA	6	Buenos Aires	6427
        Entidad	-34.6870536689657	-58.5256123986254	La Matanza	INDEC	6427010006	06427010	La Matanza	060427	La Matanza	LA TABLADA	6	Buenos Aires	6427
        Entidad	-34.6656949723622	-58.5331553311677	La Matanza	INDEC	6427010007	06427010	La Matanza	060427	La Matanza	LOMAS DEL MIRADOR	6	Buenos Aires	6427
        Entidad	-34.7132054583486	-58.6258365121679	La Matanza	INDEC	6427010008	06427010	La Matanza	060427	La Matanza	RAFAEL CASTILLO	6	Buenos Aires	6427
        Entidad	-34.6523081823718	-58.5592114732944	La Matanza	INDEC	6427010009	06427010	La Matanza	060427	La Matanza	RAMOS MEJIA	6	Buenos Aires	6427
        Entidad	-34.6881604248706	-58.5626785715398	La Matanza	INDEC	6427010010	06427010	La Matanza	060427	La Matanza	SAN JUSTO	6	Buenos Aires	6427
        Entidad	-34.7108317770604	-58.495008488146	La Matanza	INDEC	6427010011	06427010	La Matanza	060427	La Matanza	TAPIALES	6	Buenos Aires	6427
        Entidad	-34.7855336508384	-58.7171850019077	La Matanza	INDEC	6427010012	06427010	La Matanza	060427	La Matanza	20 DE JUNIO	6	Buenos Aires	6427
        Entidad	-34.6981156880684	-58.4877575961419	La Matanza	INDEC	6427010013	06427010	La Matanza	060427	La Matanza	VILLA EDUARDO MADERO	6	Buenos Aires	6427
        Entidad	-34.6730866446433	-58.5938792359541	La Matanza	INDEC	6427010014	06427010	La Matanza	060427	La Matanza	VILLA LUZURIAGA	6	Buenos Aires	6427
        Entidad	-34.8475213469043	-58.686067635918	La Matanza	INDEC	6427010015	06427010	La Matanza	060427	La Matanza	VIRREY DEL PINO	6	Buenos Aires	6427
        Entidad	-34.6909571502715	-58.3838628492162	Lanús	INDEC	6434010001	06434010	Lanús	060434	Lanús	GERLI	6	Buenos Aires	6434
        Entidad	-34.7108609216651	-58.3725047463731	Lanús	INDEC	6434010002	06434010	Lanús	060434	Lanús	LANUS ESTE	6	Buenos Aires	6434
        Entidad	-34.6957815314992	-58.416253274019	Lanús	INDEC	6434010003	06434010	Lanús	060434	Lanús	LANUS OESTE	6	Buenos Aires	6434
        Entidad	-34.7302098940207	-58.3561741850066	Lanús	INDEC	6434010004	06434010	Lanús	060434	Lanús	MONTE CHINGOLO	6	Buenos Aires	6434
        Entidad	-34.723808815713	-58.397669711018	Lanús	INDEC	6434010005	06434010	Lanús	060434	Lanús	REMEDIOS ESCALADA DE SAN MARTIN	6	Buenos Aires	6434
        Entidad	-34.672035526127	-58.4134851675076	Lanús	INDEC	6434010006	06434010	Lanús	060434	Lanús	VALENTIN ALSINA	6	Buenos Aires	6434
        Localidad simple	-35.0794688053886	-58.1393275732941	La Plata	INDEC	6441010000	06441010	Country Club El Rodeo	060441	La Plata	COUNTRY CLUB EL RODEO	6	Buenos Aires	6441
        Localidad simple	-35.0345600341406	-57.8440249586726	La Plata	INDEC	6441020000	06441020	Ignacio Correas	060441	La Plata	IGNACIO CORREAS	6	Buenos Aires	6441
        Entidad	-35.0103681960184	-58.1151848585184	La Plata	INDEC	6441030001	06441030	La Plata	060441	La Plata	ABASTO	6	Buenos Aires	6441
        Entidad	-35.0261580911328	-58.0959060056615	La Plata	INDEC	6441030002	06441030	La Plata	060441	La Plata	ANGEL ETCHEVERRY	6	Buenos Aires	6441
        Entidad	-35.0300556104917	-57.8865250010855	La Plata	INDEC	6441030003	06441030	La Plata	060441	La Plata	ARANA	6	Buenos Aires	6441
        Entidad	-34.8907397135389	-58.132711650613	La Plata	INDEC	6441030004	06441030	La Plata	060441	La Plata	ARTURO SEGUI	6	Buenos Aires	6441
        Entidad	-34.9707544223488	-57.8108950283044	La Plata	INDEC	6441030005	06441030	La Plata	060441	La Plata	BARRIO EL CARMEN (OESTE)	6	Buenos Aires	6441
        Entidad	-34.9359594527479	-57.9837630521994	La Plata	INDEC	6441030006	06441030	La Plata	060441	La Plata	BARRIO GAMBIER	6	Buenos Aires	6441
        Entidad	-34.9374880163466	-58.0093954169858	La Plata	INDEC	6441030007	06441030	La Plata	060441	La Plata	BARRIO LAS MALVINAS	6	Buenos Aires	6441
        Entidad	-34.9257210987549	-58.0393403036748	La Plata	INDEC	6441030008	06441030	La Plata	060441	La Plata	BARRIO LAS QUINTAS	6	Buenos Aires	6441
        Entidad	-34.8879382744371	-58.0582328038691	La Plata	INDEC	6441030009	06441030	La Plata	060441	La Plata	CITY BELL	6	Buenos Aires	6441
        Entidad	-34.9476175562489	-57.9957432212034	La Plata	INDEC	6441030010	06441030	La Plata	060441	La Plata	EL RETIRO	6	Buenos Aires	6441
        Entidad	-34.9017817335757	-58.039185928571	La Plata	INDEC	6441030011	06441030	La Plata	060441	La Plata	JOAQUIN GORINA	6	Buenos Aires	6441
        Entidad	-34.8985896635727	-58.0143972026636	La Plata	INDEC	6441030012	06441030	La Plata	060441	La Plata	JOSE HERNANDEZ	6	Buenos Aires	6441
        Entidad	-34.9455092438623	-58.0362904746611	La Plata	INDEC	6441030013	06441030	La Plata	060441	La Plata	JOSE MELCHOR ROMERO	6	Buenos Aires	6441
        Entidad	-34.9235917717359	-58.0019478733944	La Plata	INDEC	6441030014	06441030	La Plata	060441	La Plata	LA CUMBRE	6	Buenos Aires	6441
        Entidad	-34.920863104693	-57.9540560062469	La Plata	INDEC	6441030015	06441030	La Plata	060441	La Plata	LA PLATA	6	Buenos Aires	6441
        Entidad	-34.9976086009747	-58.043377425691	La Plata	INDEC	6441030016	06441030	La Plata	060441	La Plata	LISANDRO OLMOS	6	Buenos Aires	6441
        Entidad	-34.973715513981	-57.9850539062724	La Plata	INDEC	6441030017	06441030	La Plata	060441	La Plata	LOS HORNOS	6	Buenos Aires	6441
        Entidad	-34.8819511933447	-58.0189915342036	La Plata	INDEC	6441030018	06441030	La Plata	060441	La Plata	MANUEL B. GONNET	6	Buenos Aires	6441
        Entidad	-34.8910544941568	-57.9913781921596	La Plata	INDEC	6441030019	06441030	La Plata	060441	La Plata	RINGUELET	6	Buenos Aires	6441
        Entidad	-34.9710900774179	-57.9524351288235	La Plata	INDEC	6441030020	06441030	La Plata	060441	La Plata	RUFINO DE ELIZALDE	6	Buenos Aires	6441
        Entidad	-34.9007699307169	-57.9821293495972	La Plata	INDEC	6441030021	06441030	La Plata	060441	La Plata	TOLOSA	6	Buenos Aires	6441
        Entidad	-34.8790055541958	-58.081733864461	La Plata	INDEC	6441030022	06441030	La Plata	060441	La Plata	TRANSRADIO	6	Buenos Aires	6441
        Entidad	-34.8776205187118	-58.0907139194439	La Plata	INDEC	6441030023	06441030	La Plata	060441	La Plata	VILLA ELISA	6	Buenos Aires	6441
        Entidad	-34.9406437624757	-57.9214984675578	La Plata	INDEC	6441030024	06441030	La Plata	060441	La Plata	VILLA ELVIRA	6	Buenos Aires	6441
        Entidad	-34.9986517196678	-57.8404966243711	La Plata	INDEC	6441030025	06441030	La Plata	060441	La Plata	VILLA GARIBALDI	6	Buenos Aires	6441
        Entidad	-34.9634490535296	-57.9025001308298	La Plata	INDEC	6441030026	06441030	La Plata	060441	La Plata	VILLA MONTORO	6	Buenos Aires	6441
        Entidad	-34.9830288461923	-57.8674653074052	La Plata	INDEC	6441030027	06441030	La Plata	060441	La Plata	VILLA PARQUE SICARDI	6	Buenos Aires	6441
        Localidad simple	-34.9520385659845	-57.8409385980167	La Plata	INDEC	6441040000	06441040	Lomas de Copello	060441	La Plata	LOMAS DE COPELLO	6	Buenos Aires	6441
        Componente de localidad compuesta	-34.9437333541431	-58.1732652389706	La Plata	INDEC	6441050000	06441050	Ruta Sol	060441	La Plata	BARRIO RUTA SOL	6	Buenos Aires	6441
        Localidad simple	-37.5467976434903	-60.7970535965801	Laprida	INDEC	6448010000	06448010	Laprida	060448	Laprida	LAPRIDA	6	Buenos Aires	6448
        Localidad simple	-37.3263227	-60.9098409	Laprida	INDEC	6448020000	06448020	Pueblo Nuevo	060448	Laprida	PUEBLO NUEVO	6	Buenos Aires	6448
        Localidad simple	-37.2298626892886	-60.9621658450441	Laprida	INDEC	6448030000	06448030	Pueblo San Jorge	060448	Laprida	PUEBLO SAN JORGE	6	Buenos Aires	6448
        Localidad simple	-35.9414440334215	-59.0693547287839	Las Flores	INDEC	6455010000	06455010	Coronel Boerr	060455	Las Flores	CORONEL BOERR	6	Buenos Aires	6455
        Localidad simple	-35.8815483511482	-59.4063369903389	Las Flores	INDEC	6455020000	06455020	El Trigo	060455	Las Flores	EL TRIGO	6	Buenos Aires	6455
        Localidad simple	-36.0154969145348	-59.1004659218434	Las Flores	INDEC	6455030000	06455030	Las Flores	060455	Las Flores	LAS FLORES	6	Buenos Aires	6455
        Localidad simple	-36.2437580460508	-59.3662916338311	Las Flores	INDEC	6455040000	06455040	Pardo	060455	Las Flores	PARDO	6	Buenos Aires	6455
        Localidad simple	-34.4418003349	-61.8448787838164	Leandro N. Alem	INDEC	6462010000	06462010	Alberdi Viejo	060462	Leandro N. Alem	ALBERDI VIEJO	6	Buenos Aires	6462
        Localidad simple	-34.6528608747523	-61.5829085058874	Leandro N. Alem	INDEC	6462020000	06462020	El Dorado	060462	Leandro N. Alem	EL DORADO	6	Buenos Aires	6462
        Localidad simple	-34.3430420274499	-61.5156655267073	Leandro N. Alem	INDEC	6462030000	06462030	Fortín Acha	060462	Leandro N. Alem	FORTIN ACHA	6	Buenos Aires	6462
        Localidad simple	-34.4387919326349	-61.8121893821736	Leandro N. Alem	INDEC	6462040000	06462040	Juan Bautista Alberdi	060462	Leandro N. Alem	JUAN BAUTISTA ALBERDI	6	Buenos Aires	6462
        Localidad simple	-34.5217246234597	-61.391182899484	Leandro N. Alem	INDEC	6462050000	06462050	Leandro N. Alem	060462	Leandro N. Alem	LEANDRO N. ALEM	6	Buenos Aires	6462
        Localidad simple	-34.4973984349932	-61.5453447631479	Leandro N. Alem	INDEC	6462060000	06462060	Vedia	060462	Leandro N. Alem	VEDIA	6	Buenos Aires	6462
        Localidad simple	-34.9846043002155	-61.7729116988591	Lincoln	INDEC	6469010000	06469010	Arenaza	060469	Lincoln	ARENAZA	6	Buenos Aires	6469
        Localidad simple	-34.8710511337121	-61.2895451446375	Lincoln	INDEC	6469020000	06469020	Bayauca	060469	Lincoln	BAYAUCA	6	Buenos Aires	6469
        Localidad simple	-34.6966047108596	-61.3250128810539	Lincoln	INDEC	6469030000	06469030	Bermúdez	060469	Lincoln	BERMUDEZ	6	Buenos Aires	6469
        Localidad simple	-35.3913662871435	-61.9949102331933	Lincoln	INDEC	6469040000	06469040	Carlos Salas	060469	Lincoln	CARLOS SALAS	6	Buenos Aires	6469
        Localidad simple	-35.3321817215807	-61.6140851684372	Lincoln	INDEC	6469050000	06469050	Coronel Martínez de Hoz	060469	Lincoln	CORONEL MARTINEZ DE HOZ	6	Buenos Aires	6469
        Localidad simple	-35.0882210775847	-61.5163333232822	Lincoln	INDEC	6469060000	06469060	El Triunfo	060469	Lincoln	EL TRIUNFO	6	Buenos Aires	6469
        Localidad simple	-35.3649873001768	-61.8055485519284	Lincoln	INDEC	6469070000	06469070	Las Toscas	060469	Lincoln	LAS TOSCAS	6	Buenos Aires	6469
        Localidad simple	-34.869042222818	-61.5291649669285	Lincoln	INDEC	6469080000	06469080	Lincoln	060469	Lincoln	LINCOLN	6	Buenos Aires	6469
        Localidad simple	-35.1426386337075	-62.2439028944602	Lincoln	INDEC	6469090000	06469090	Pasteur	060469	Lincoln	PASTEUR	6	Buenos Aires	6469
        Localidad simple	-35.1440875676884	-61.9707859541264	Lincoln	INDEC	6469100000	06469100	Roberts	060469	Lincoln	ROBERTS	6	Buenos Aires	6469
        Componente de localidad compuesta	-34.6758379792473	-61.4657087059048	Lincoln	INDEC	6469110000	06469110	Triunvirato	060469	Lincoln	TRIUNVIRATO	6	Buenos Aires	6469
        Localidad simple	-38.5463782386967	-58.557322112625	Lobería	INDEC	6476010000	06476010	Arenas Verdes	060476	Lobería	ARENAS VERDES	6	Buenos Aires	6476
        Localidad simple	-37.9097927118145	-58.9120965943062	Lobería	INDEC	6476020000	06476020	Licenciado Matienzo	060476	Lobería	LICENCIADO MATIENZO	6	Buenos Aires	6476
        Localidad simple	-38.165273387122	-58.7822303314999	Lobería	INDEC	6476030000	06476030	Lobería	060476	Lobería	LOBERIA	6	Buenos Aires	6476
        Localidad simple	-38.3962306181995	-58.670580006548	Lobería	INDEC	6476040000	06476040	Pieres	060476	Lobería	PIERES	6	Buenos Aires	6476
        Localidad simple	-37.7892829007834	-58.8486476710495	Lobería	INDEC	6476050000	06476050	San Manuel	060476	Lobería	SAN MANUEL	6	Buenos Aires	6476
        Localidad simple	-38.2010112434137	-58.7373143964601	Lobería	INDEC	6476060000	06476060	Tamangueyú	060476	Lobería	TAMANGUEYU	6	Buenos Aires	6476
        Localidad simple	-35.2033088915799	-59.3449562581802	Lobos	INDEC	6483010000	06483010	Antonio Carboni	060483	Lobos	ANTONIO CARBONI	6	Buenos Aires	6483
        Localidad simple	-35.243272141682	-59.4860397931491	Lobos	INDEC	6483020000	06483020	Elvira	060483	Lobos	ELVIRA	6	Buenos Aires	6483
        Localidad simple	-35.2747624905943	-59.1339060011927	Lobos	INDEC	6483030000	06483030	Laguna de Lobos	060483	Lobos	LAGUNA DE LOBOS	6	Buenos Aires	6483
        Localidad simple	-35.1858677983922	-59.0957115706922	Lobos	INDEC	6483040000	06483040	Lobos	060483	Lobos	LOBOS	6	Buenos Aires	6483
        Localidad simple	-35.3028071422894	-59.1696841440203	Lobos	INDEC	6483050000	06483050	Salvador María	060483	Lobos	SALVADOR MARIA	6	Buenos Aires	6483
        Entidad	-34.7379027155314	-58.440675368556	Lomas de Zamora	INDEC	6490010001	06490010	Lomas de Zamora	060490	Lomas de Zamora	BANFIELD	6	Buenos Aires	6490
        Entidad	-34.7946182344111	-58.4320908524909	Lomas de Zamora	INDEC	6490010002	06490010	Lomas de Zamora	060490	Lomas de Zamora	LLAVALLOL	6	Buenos Aires	6490
        Entidad	-34.7627676410061	-58.4267903899666	Lomas de Zamora	INDEC	6490010003	06490010	Lomas de Zamora	060490	Lomas de Zamora	LOMAS DE ZAMORA	6	Buenos Aires	6490
        Entidad	-34.767486625425	-58.3780461337408	Lomas de Zamora	INDEC	6490010004	06490010	Lomas de Zamora	060490	Lomas de Zamora	TEMPERLEY	6	Buenos Aires	6490
        Entidad	-34.789560716095	-58.4041056486523	Lomas de Zamora	INDEC	6490010005	06490010	Lomas de Zamora	060490	Lomas de Zamora	TURDERA	6	Buenos Aires	6490
        Entidad	-34.7289932955803	-58.4283436419093	Lomas de Zamora	INDEC	6490010006	06490010	Lomas de Zamora	060490	Lomas de Zamora	VILLA CENTENARIO	6	Buenos Aires	6490
        Entidad	-34.7067104032516	-58.4451304500011	Lomas de Zamora	INDEC	6490010007	06490010	Lomas de Zamora	060490	Lomas de Zamora	VILLA FIORITO	6	Buenos Aires	6490
        Localidad simple	-34.4862819813638	-59.2180861330698	Luján	INDEC	6497020000	06497020	Carlos Keen	060497	Luján	CARLOS KEEN	6	Buenos Aires	6497
        Localidad simple	-34.5760126891975	-59.0214105976263	Luján	INDEC	6497025000	06497025	Club de Campo Los Puentes	060497	Luján	CLUB DE CAMPO LOS PUENTES	6	Buenos Aires	6497
        Localidad simple con entidad	-34.5706550661632	-59.109540176033	Luján	INDEC	6497060000	06497060	Luján	060497	Luján	LUJAN	6	Buenos Aires	6497
        Entidad	-34.5607457195455	-59.1700837097016	Luján	INDEC	6497060001	06497060	Luján	060497	Luján	BARRIO LAS CASUARINAS	6	Buenos Aires	6497
        Entidad	-34.5590633814317	-59.2044266157478	Luján	INDEC	6497060002	06497060	Luján	060497	Luján	CORTINES	6	Buenos Aires	6497
        Entidad	-34.5806997364467	-59.0582308683017	Luján	INDEC	6497060003	06497060	Luján	060497	Luján	LEZICA Y TORREZURI	6	Buenos Aires	6497
        Entidad	-34.5646845021423	-59.1320945387741	Luján	INDEC	6497060004	06497060	Luján	060497	Luján	LUJAN	6	Buenos Aires	6497
        Entidad	-34.570714539607	-59.1826103383073	Luján	INDEC	6497060005	06497060	Luján	060497	Luján	VILLA FLANDRIA NORTE (PUEBLO NUEVO)	6	Buenos Aires	6497
        Entidad	-34.5993969541802	-59.1757636437956	Luján	INDEC	6497060006	06497060	Luján	060497	Luján	VILLA FLANDRIA SUR (EST. JAUREGUI)	6	Buenos Aires	6497
        Entidad	-34.4902656696955	-59.1324863072423	Luján	INDEC	6497060007	06497060	Luján	060497	Luján	COUNTRY CLUB LAS PRADERAS	6	Buenos Aires	6497
        Entidad	-34.4890162386569	-59.0617361279716	Luján	INDEC	6497060008	06497060	Luján	060497	Luján	OPEN DOOR	6	Buenos Aires	6497
        Localidad simple	-34.6265041710141	-59.2533805145177	Luján	INDEC	6497070000	06497070	Olivera	060497	Luján	OLIVERA	6	Buenos Aires	6497
        Localidad simple	-34.4318215080317	-59.1287739002816	Luján	INDEC	6497090000	06497090	Torres	060497	Luján	TORRES	6	Buenos Aires	6497
        Localidad simple	-35.0240363457416	-57.5340253600961	Magdalena	INDEC	6505010000	06505010	Atalaya	060505	Magdalena	ATALAYA	6	Buenos Aires	6505
        Localidad simple	-35.0816834306862	-57.7469762592144	Magdalena	INDEC	6505020000	06505020	General Mansilla	060505	Magdalena	GENERAL MANSILLA	6	Buenos Aires	6505
        Localidad simple	-34.99655185849	-57.7036642458572	Magdalena	INDEC	6505030000	06505030	Los Naranjos	060505	Magdalena	LOS NARANJOS	6	Buenos Aires	6505
        Localidad simple	-35.0806853032506	-57.5172585839912	Magdalena	INDEC	6505040000	06505040	Magdalena	060505	Magdalena	MAGDALENA	6	Buenos Aires	6505
        Localidad simple	-35.1799267057869	-57.651986019808	Magdalena	INDEC	6505050000	06505050	Roberto J. Payró	060505	Magdalena	ROBERTO J. PAYRO	6	Buenos Aires	6505
        Localidad simple	-35.269568396303	-57.5757117447539	Magdalena	INDEC	6505060000	06505060	Vieytes	060505	Magdalena	VIEYTES	6	Buenos Aires	6505
        Localidad simple	-37.0860540989	-57.8285752273883	Maipú	INDEC	6511010000	06511010	Las Armas	060511	Maipú	LAS ARMAS	6	Buenos Aires	6511
        Localidad simple	-36.8648514645038	-57.8829166198472	Maipú	INDEC	6511020000	06511020	Maipú	060511	Maipú	MAIPU	6	Buenos Aires	6511
        Localidad simple	-36.7137597811284	-57.5860126519926	Maipú	INDEC	6511030000	06511030	Santo Domingo	060511	Maipú	SANTO DOMINGO	6	Buenos Aires	6511
        Entidad	-34.4544550576034	-58.7062417407487	Malvinas Argentinas	INDEC	6515010001	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	AREA DE PROMOCION EL TRIANGULO	6	Buenos Aires	6515
        Entidad	-34.4869935800875	-58.7286750953502	Malvinas Argentinas	INDEC	6515010002	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	GRAND BOURG	6	Buenos Aires	6515
        Entidad	-34.5004325972609	-58.6618050648717	Malvinas Argentinas	INDEC	6515010003	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	INGENIERO ADOLFO SOURDEAUX	6	Buenos Aires	6515
        Entidad	-34.4790933125467	-58.6989741628196	Malvinas Argentinas	INDEC	6515010004	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	INGENIERO PABLO NOGUES	6	Buenos Aires	6515
        Entidad	-34.5078746726212	-58.7013439131882	Malvinas Argentinas	INDEC	6515010005	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	LOS POLVORINES	6	Buenos Aires	6515
        Entidad	-34.4746661471823	-58.7513344097631	Malvinas Argentinas	INDEC	6515010007	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	TORTUGUITAS	6	Buenos Aires	6515
        Entidad	-34.5061507591135	-58.6793063506777	Malvinas Argentinas	INDEC	6515010008	06515010	Malvinas Argentinas	060515	Malvinas Argentinas	VILLA DE MAYO	6	Buenos Aires	6515
        Localidad simple	-37.452214188593	-57.7299500229319	Mar Chiquita	INDEC	6518010000	06518010	Coronel Vidal	060518	Mar Chiquita	CORONEL VIDAL	6	Buenos Aires	6518
        Localidad simple	-37.2778606745914	-57.7740148170475	Mar Chiquita	INDEC	6518020000	06518020	General Pirán	060518	Mar Chiquita	GENERAL PIRAN	6	Buenos Aires	6518
        Localidad simple	-37.774854850113	-57.6351210747907	Mar Chiquita	INDEC	6518030000	06518030	La Armonía	060518	Mar Chiquita	LA ARMONIA	6	Buenos Aires	6518
        Localidad simple	-37.7462581727647	-57.4274479339348	Mar Chiquita	INDEC	6518040000	06518040	Mar Chiquita	060518	Mar Chiquita	MAR CHIQUITA	6	Buenos Aires	6518
        Entidad	-37.7697388275396	-57.450820092514	Mar Chiquita	INDEC	6518050001	06518050	Mar de Cobo	060518	Mar Chiquita	LA BALIZA	6	Buenos Aires	6518
        Entidad	-37.7834384978567	-57.4647863685704	Mar Chiquita	INDEC	6518050002	06518050	Mar de Cobo	060518	Mar Chiquita	LA CALETA	6	Buenos Aires	6518
        Entidad	-37.7768000427976	-57.455658983424	Mar Chiquita	INDEC	6518050003	06518050	Mar de Cobo	060518	Mar Chiquita	MAR DE COBO	6	Buenos Aires	6518
        Entidad	-37.8505519250944	-57.5134595632837	Mar Chiquita	INDEC	6518060001	06518060	Santa Clara del Mar	060518	Mar Chiquita	ATLANTIDA	6	Buenos Aires	6518
        Entidad	-37.8224325083139	-57.4974692762018	Mar Chiquita	INDEC	6518060002	06518060	Santa Clara del Mar	060518	Mar Chiquita	CAMET NORTE	6	Buenos Aires	6518
        Entidad	-37.857770246553	-57.5154242437478	Mar Chiquita	INDEC	6518060003	06518060	Santa Clara del Mar	060518	Mar Chiquita	FRENTE MAR	6	Buenos Aires	6518
        Entidad	-37.8730952780707	-57.5218898754931	Mar Chiquita	INDEC	6518060004	06518060	Santa Clara del Mar	060518	Mar Chiquita	PLAYA DORADA	6	Buenos Aires	6518
        Entidad	-37.834833606977	-57.5079487213859	Mar Chiquita	INDEC	6518060005	06518060	Santa Clara del Mar	060518	Mar Chiquita	SANTA CLARA DEL MAR	6	Buenos Aires	6518
        Entidad	-37.8649003626945	-57.5169016362882	Mar Chiquita	INDEC	6518060006	06518060	Santa Clara del Mar	060518	Mar Chiquita	SANTA ELENA	6	Buenos Aires	6518
        Localidad simple	-37.6627994476991	-57.6670967441538	Mar Chiquita	INDEC	6518070000	06518070	Vivoratá	060518	Mar Chiquita	VIVORATA	6	Buenos Aires	6518
        Localidad simple	-34.953080822173	-58.78292863718	Marcos Paz	INDEC	6525010000	06525010	Barrio Santa Rosa	060525	Marcos Paz	BARRIO SANTA ROSA	6	Buenos Aires	6525
        Entidad	-34.854330073065	-58.7844436414942	Marcos Paz	INDEC	6525020001	06525020	Marcos Paz	060525	Marcos Paz	BARRIOS LISANDRO DE LA TORRE Y SANTA MARTA	6	Buenos Aires	6525
        Entidad	-34.7965436888808	-58.8778211205753	Marcos Paz	INDEC	6525020002	06525020	Marcos Paz	060525	Marcos Paz	MARCOS PAZ	6	Buenos Aires	6525
        Localidad simple	-34.6029546709308	-59.288213732192	Mercedes	INDEC	6532005000	06532005	Goldney	060532	Mercedes	GOLDNEY	6	Buenos Aires	6532
        Localidad simple	-34.652429281715	-59.3523186300108	Mercedes	INDEC	6532010000	06532010	Gowland	060532	Mercedes	GOWLAND	6	Buenos Aires	6532
        Localidad simple	-34.6521715354886	-59.4295981722689	Mercedes	INDEC	6532020000	06532020	Mercedes	060532	Mercedes	MERCEDES	6	Buenos Aires	6532
        Localidad simple	-34.698955554941	-59.3194428313109	Mercedes	INDEC	6532030000	06532030	Jorge Born	060532	Mercedes	TOMAS JOFRE	6	Buenos Aires	6532
        Entidad	-34.7085422423529	-58.6795867252566	Merlo	INDEC	6539010001	06539010	Merlo	060539	Merlo	LIBERTAD	6	Buenos Aires	6539
        Entidad	-34.7154808073462	-58.7976740413845	Merlo	INDEC	6539010002	06539010	Merlo	060539	Merlo	MARIANO ACOSTA	6	Buenos Aires	6539
        Entidad	-34.6823277014068	-58.7436432079669	Merlo	INDEC	6539010003	06539010	Merlo	060539	Merlo	MERLO	6	Buenos Aires	6539
        Entidad	-34.7467959489481	-58.7060431536772	Merlo	INDEC	6539010004	06539010	Merlo	060539	Merlo	PONTEVEDRA	6	Buenos Aires	6539
        Entidad	-34.6698581359268	-58.697930436646	Merlo	INDEC	6539010005	06539010	Merlo	060539	Merlo	SAN ANTONIO DE PADUA	6	Buenos Aires	6539
        Localidad simple	-35.2825062106661	-58.8042619084922	Monte	INDEC	6547010000	06547010	Abbott	060547	Monte	ABBOTT	6	Buenos Aires	6547
        Localidad simple	-35.4391643240479	-58.8094598355672	Monte	INDEC	6547020000	06547020	San Miguel del Monte	060547	Monte	SAN MIGUEL DEL MONTE	6	Buenos Aires	6547
        Localidad simple	-35.5447734044526	-58.8855911917932	Monte	INDEC	6547030000	06547030	Zenón Videla Dorna	060547	Monte	ZENON VIDELA DORNA	6	Buenos Aires	6547
        Localidad simple	-38.995357691335	-61.2152015930805	Monte Hermoso	INDEC	6553010000	06553010	Balneario Sauce Grande	060553	Monte Hermoso	BALNEARIO SAUCE GRANDE	6	Buenos Aires	6553
        Localidad simple	-38.9815065384254	-61.3005457486605	Monte Hermoso	INDEC	6553020000	06553020	Monte Hermoso	060553	Monte Hermoso	MONTE HERMOSO	6	Buenos Aires	6553
        Entidad	-34.5586595722532	-58.8163010886698	Moreno	INDEC	6560010001	06560010	Moreno	060560	Moreno	CUARTEL V	6	Buenos Aires	6560
        Entidad	-34.6073137077479	-58.859942785434	Moreno	INDEC	6560010002	06560010	Moreno	060560	Moreno	FRANCISCO ALVAREZ	6	Buenos Aires	6560
        Entidad	-34.6452391234366	-58.8380252692761	Moreno	INDEC	6560010003	06560010	Moreno	060560	Moreno	LA REJA	6	Buenos Aires	6560
        Entidad	-34.6353876829627	-58.7503180890016	Moreno	INDEC	6560010005	06560010	Moreno	060560	Moreno	PASO DEL REY	6	Buenos Aires	6560
        Entidad	-34.5941439978594	-58.7557346559769	Moreno	INDEC	6560010006	06560010	Moreno	060560	Moreno	TRUJUI	6	Buenos Aires	6560
        Entidad	-34.6644131034283	-58.6456427123911	Morón	INDEC	6568010001	06568010	Morón	060568	Morón	CASTELAR	6	Buenos Aires	6568
        Entidad	-34.617707172718	-58.601533043415	Morón	INDEC	6568010002	06568010	Morón	060568	Morón	EL PALOMAR	6	Buenos Aires	6568
        Entidad	-34.6440661183216	-58.5978176171897	Morón	INDEC	6568010003	06568010	Morón	060568	Morón	HAEDO	6	Buenos Aires	6568
        Entidad	-34.6652227151167	-58.6190557007973	Morón	INDEC	6568010004	06568010	Morón	060568	Morón	MORON	6	Buenos Aires	6568
        Entidad	-34.6346596523214	-58.5715757135423	Morón	INDEC	6568010005	06568010	Morón	060568	Morón	VILLA SARMIENTO	6	Buenos Aires	6568
        Localidad simple	-34.9232643360691	-59.5422519447044	Navarro	INDEC	6574010000	06574010	José Juan Almeyra	060574	Navarro	JOSE JUAN ALMEYRA	6	Buenos Aires	6574
        Localidad simple	-35.0539263781559	-59.5131011825281	Navarro	INDEC	6574020000	06574020	Las Marianas	060574	Navarro	LAS MARIANAS	6	Buenos Aires	6574
        Localidad simple	-35.0036066018879	-59.2774163163898	Navarro	INDEC	6574030000	06574030	Navarro	060574	Navarro	NAVARRO	6	Buenos Aires	6574
        Localidad simple	-35.0782490606759	-59.651945539681	Navarro	INDEC	6574040000	06574040	Villa Moll	060574	Navarro	VILLA MOLL	6	Buenos Aires	6574
        Localidad simple	-37.8918269607856	-59.2866977775565	Necochea	INDEC	6581010000	06581010	Claraz	060581	Necochea	CLARAZ	6	Buenos Aires	6581
        Localidad simple	-38.5580125335608	-59.3364566671065	Necochea	INDEC	6581025000	06581025	Energía	060581	Necochea	ENERGIA	6	Buenos Aires	6581
        Localidad simple	-38.0091787783017	-59.2634988347821	Necochea	INDEC	6581030000	06581030	Juan N. Fernández	060581	Necochea	JUAN N. FERNANDEZ	6	Buenos Aires	6581
        Entidad	-38.5711702285697	-58.7702419838751	Necochea	INDEC	6581040001	06581040	Necochea - Quequén	060581	Necochea	NECOCHEA	6	Buenos Aires	6581
        Entidad	-38.5375051784084	-58.6952024694735	Necochea	INDEC	6581040002	06581040	Necochea - Quequén	060581	Necochea	QUEQUEN	6	Buenos Aires	6581
        Entidad	-38.5589732600706	-58.6585544269181	Necochea	INDEC	6581040003	06581040	Necochea - Quequén	060581	Necochea	COSTA BONITA	6	Buenos Aires	6581
        Localidad simple	-38.2846361959919	-59.202754253612	Necochea	INDEC	6581050000	06581050	Nicanor Olivera	060581	Necochea	NICANOR OLIVERA	6	Buenos Aires	6581
        Localidad simple	-38.4503897333336	-59.3311154416146	Necochea	INDEC	6581060000	06581060	Ramón Santamarina	060581	Necochea	RAMON SANTAMARINA	6	Buenos Aires	6581
        Localidad simple	-35.2929819536873	-61.4072542128	9 de Julio	INDEC	6588010000	06588010	Alfredo Demarchi	060588	9 de Julio	ALFREDO DEMARCHI	6	Buenos Aires	6588
        Localidad simple	-35.239499381663	-60.8251358750153	9 de Julio	INDEC	6588020000	06588020	Carlos María Naón	060588	9 de Julio	CARLOS MARIA NAON	6	Buenos Aires	6588
        Localidad simple	-35.607730780146	-60.9182929927645	9 de Julio	INDEC	6588030000	06588030	12 de Octubre	060588	9 de Julio	12 DE OCTUBRE	6	Buenos Aires	6588
        Localidad simple	-35.6511928511123	-60.7098962799094	9 de Julio	INDEC	6588040000	06588040	Dudignac	060588	9 de Julio	DUDIGNAC	6	Buenos Aires	6588
        Localidad simple	-35.4079467934432	-61.2105668204871	9 de Julio	INDEC	6588050000	06588050	La Aurora	060588	9 de Julio	LA AURORA	6	Buenos Aires	6588
        Localidad simple	-35.5201414507378	-60.9989487976537	9 de Julio	INDEC	6588060000	06588060	Manuel B. Gonnet	060588	9 de Julio	MANUEL B. GONNET	6	Buenos Aires	6588
        Localidad simple	-35.3462662593318	-60.7453446826815	9 de Julio	INDEC	6588070000	06588070	Marcelino Ugarte	060588	9 de Julio	MARCELINO UGARTE	6	Buenos Aires	6588
        Localidad simple	-35.5563880098445	-60.5605940553161	9 de Julio	INDEC	6588080000	06588080	Morea	060588	9 de Julio	MOREA	6	Buenos Aires	6588
        Localidad simple	-35.5357392707567	-60.7928143632315	9 de Julio	INDEC	6588090000	06588090	Norumbega	060588	9 de Julio	NORUMBEGA	6	Buenos Aires	6588
        Localidad simple	-35.4447435053964	-60.8843433362719	9 de Julio	INDEC	6588100000	06588100	9 de Julio	060588	9 de Julio	9 DE JULIO	6	Buenos Aires	6588
        Localidad simple	-35.4395526972374	-60.7174384712323	9 de Julio	INDEC	6588110000	06588110	Patricios	060588	9 de Julio	PATRICIOS	6	Buenos Aires	6588
        Localidad simple	-35.4989239490928	-60.8647207106461	9 de Julio	INDEC	6588120000	06588120	Villa Fournier	060588	9 de Julio	VILLA GENERAL FOURNIER	6	Buenos Aires	6588
        Localidad simple	-36.5328887082639	-60.8824549132602	Olavarría	INDEC	6595010000	06595010	Blancagrande	060595	Olavarría	BLANCAGRANDE	6	Buenos Aires	6595
        Localidad simple	-36.8641370257955	-60.0816424704	Olavarría	INDEC	6595030000	06595030	Colonia Nievas	060595	Olavarría	COLONIA NIEVAS	6	Buenos Aires	6595
        Localidad simple	-36.9495659791886	-60.1108954083182	Olavarría	INDEC	6595040000	06595040	Colonia San Miguel	060595	Olavarría	COLONIA SAN MIGUEL	6	Buenos Aires	6595
        Localidad simple	-36.4122732396335	-60.6730694647	Olavarría	INDEC	6595050000	06595050	Espigas	060595	Olavarría	ESPIGAS	6	Buenos Aires	6595
        Localidad simple con entidad	-36.8805120719062	-60.1771940245473	Olavarría	INDEC	6595060000	06595060	Hinojo	060595	Olavarría	HINOJO	6	Buenos Aires	6595
        Entidad	-36.8800694499223	-60.1780552970611	Olavarría	INDEC	6595060001	06595060	Hinojo	060595	Olavarría	COLONIA HINOJO	6	Buenos Aires	6595
        Entidad	-36.8758995951211	-60.1473196906487	Olavarría	INDEC	6595060002	06595060	Hinojo	060595	Olavarría	HINOJO	6	Buenos Aires	6595
        Localidad simple	-36.8920935788859	-60.3180046559577	Olavarría	INDEC	6595070000	06595070	Olavarría	060595	Olavarría	OLAVARRIA	6	Buenos Aires	6595
        Localidad simple	-36.6515016172821	-61.0845040269815	Olavarría	INDEC	6595080000	06595080	Recalde	060595	Olavarría	RECALDE	6	Buenos Aires	6595
        Localidad simple	-37.1289653693521	-60.4099303899854	Olavarría	INDEC	6595090000	06595090	Santa Luisa	060595	Olavarría	SANTA LUISA	6	Buenos Aires	6595
        Localidad simple	-36.843238222524	-60.2234271381196	Olavarría	INDEC	6595100000	06595100	Sierra Chica	060595	Olavarría	SIERRA CHICA	6	Buenos Aires	6595
        Entidad	-36.9225238148372	-60.2157925414657	Olavarría	INDEC	6595110001	06595110	Sierras Bayas	060595	Olavarría	SIERRAS BAYAS	6	Buenos Aires	6595
        Entidad	-36.9436605372421	-60.1578271825148	Olavarría	INDEC	6595110002	06595110	Sierras Bayas	060595	Olavarría	VILLA ARRIETA	6	Buenos Aires	6595
        Localidad simple	-32.0874958453901	-58.3417058444451	Colón	INDEC	30008050000	30008050	Hocker			HOCKER	30	Entre Ríos	30008
        Localidad simple	-36.9802714637124	-60.2790828437139	Olavarría	INDEC	6595120000	06595120	Villa Alfredo Fortabat	060595	Olavarría	VILLA ALFREDO FORTABAT	6	Buenos Aires	6595
        Localidad simple	-36.9903632120511	-60.3108081181748	Olavarría	INDEC	6595130000	06595130	Villa La Serranía	060595	Olavarría	VILLA LA SERRANIA	6	Buenos Aires	6595
        Localidad simple	-40.5602246137406	-62.2380643077459	Patagones	INDEC	6602010000	06602010	Bahía San Blas	060602	Patagones	BAHIA SAN BLAS	6	Buenos Aires	6602
        Localidad simple	-40.6522000086693	-62.7575972084464	Patagones	INDEC	6602020000	06602020	Cardenal Cagliero	060602	Patagones	CARDENAL CAGLIERO	6	Buenos Aires	6602
        Componente de localidad compuesta	-40.797298324401	-62.984754269904	Patagones	INDEC	6602030000	06602030	Carmen de Patagones	060602	Patagones	CARMEN DE PATAGONES	6	Buenos Aires	6602
        Localidad simple	-40.4363643935514	-62.5449343513868	Patagones	INDEC	6602040000	06602040	José B. Casas	060602	Patagones	JOSE B. CASAS	6	Buenos Aires	6602
        Localidad simple	-39.5993801239416	-62.6510470779021	Patagones	INDEC	6602050000	06602050	Juan A. Pradere	060602	Patagones	JUAN A. PRADERE	6	Buenos Aires	6602
        Localidad simple	-40.1854869993736	-62.6205163469862	Patagones	INDEC	6602060000	06602060	Stroeder	060602	Patagones	STROEDER	6	Buenos Aires	6602
        Localidad simple	-39.9151387867695	-62.6188702678852	Patagones	INDEC	6602070000	06602070	Villalonga	060602	Patagones	VILLALONGA	6	Buenos Aires	6602
        Localidad simple	-35.913692884071	-62.2240579143551	Pehuajó	INDEC	6609010000	06609010	Capitán Castro	060609	Pehuajó	CAPITAN CASTRO	6	Buenos Aires	6609
        Localidad simple	-35.7327373193414	-61.7439272931387	Pehuajó	INDEC	6609020000	06609020	San Esteban	060609	Pehuajó	CHICLANA	6	Buenos Aires	6609
        Localidad simple	-35.8483065194137	-62.0693918423117	Pehuajó	INDEC	6609030000	06609030	Francisco Madero	060609	Pehuajó	FRANCISCO MADERO	6	Buenos Aires	6609
        Localidad simple	-35.7184196474894	-62.1142777365421	Pehuajó	INDEC	6609035000	06609035	Inocencio Sosa	060609	Pehuajó	INOCENCIO SOSA	6	Buenos Aires	6609
        Localidad simple	-35.8524740557321	-62.2962123802194	Pehuajó	INDEC	6609040000	06609040	Juan José Paso	060609	Pehuajó	JUAN JOSE PASO	6	Buenos Aires	6609
        Localidad simple	-36.0846707903374	-61.7254747841859	Pehuajó	INDEC	6609050000	06609050	Magdala	060609	Pehuajó	MAGDALA	6	Buenos Aires	6609
        Localidad simple	-36.2301776476091	-62.0069944091925	Pehuajó	INDEC	6609060000	06609060	Mones Cazón	060609	Pehuajó	MONES CAZON	6	Buenos Aires	6609
        Localidad simple	-35.9199117438484	-61.8133995164977	Pehuajó	INDEC	6609070000	06609070	Nueva Plata	060609	Pehuajó	NUEVA PLATA	6	Buenos Aires	6609
        Localidad simple	-35.8123030689596	-61.8988207561037	Pehuajó	INDEC	6609080000	06609080	Pehuajó	060609	Pehuajó	PEHUAJO	6	Buenos Aires	6609
        Localidad simple	-35.7137365347985	-61.6477830181101	Pehuajó	INDEC	6609090000	06609090	San Bernardo	060609	Pehuajó	SAN BERNARDO	6	Buenos Aires	6609
        Localidad simple	-36.2065730139324	-63.0761554731554	Pellegrini	INDEC	6616010000	06616010	Bocayuva	060616	Pellegrini	BOCAYUVA	6	Buenos Aires	6616
        Localidad simple	-36.3416806655424	-63.2611533171506	Pellegrini	INDEC	6616020000	06616020	De Bary	060616	Pellegrini	DE BARY	6	Buenos Aires	6616
        Localidad simple	-36.2697352282386	-63.1652861097017	Pellegrini	INDEC	6616030000	06616030	Pellegrini	060616	Pellegrini	PELLEGRINI	6	Buenos Aires	6616
        Localidad simple	-33.755665348987	-60.4408373865386	Pergamino	INDEC	6623010000	06623010	Acevedo	060623	Pergamino	ACEVEDO	6	Buenos Aires	6623
        Localidad simple	-33.9138392371386	-60.4628650932084	Pergamino	INDEC	6623020000	06623020	Fontezuela	060623	Pergamino	FONTEZUELA	6	Buenos Aires	6623
        Localidad simple	-33.6745849638169	-60.4006865938611	Pergamino	INDEC	6623030000	06623030	Guerrico	060623	Pergamino	GUERRICO	6	Buenos Aires	6623
        Localidad simple	-33.8322767381075	-60.4864895356948	Pergamino	INDEC	6623040000	06623040	Juan A. de la Peña	060623	Pergamino	JUAN A. DE LA PE¥A	6	Buenos Aires	6623
        Localidad simple	-33.9263378592898	-60.3829034809436	Pergamino	INDEC	6623050000	06623050	Juan Anchorena	060623	Pergamino	JUAN ANCHORENA	6	Buenos Aires	6623
        Localidad simple	-33.7347851403163	-60.1701773086428	Pergamino	INDEC	6623060000	06623060	La Violeta	060623	Pergamino	LA VIOLETA	6	Buenos Aires	6623
        Localidad simple	-33.7647232673599	-60.6492429333859	Pergamino	INDEC	6623070000	06623070	Manuel Ocampo	060623	Pergamino	MANUEL OCAMPO	6	Buenos Aires	6623
        Localidad simple	-33.7090270411103	-60.5842599045876	Pergamino	INDEC	6623080000	06623080	Mariano Benítez	060623	Pergamino	MARIANO BENITEZ	6	Buenos Aires	6623
        Localidad simple	-33.9149979004605	-60.8383550657724	Pergamino	INDEC	6623090000	06623090	Mariano H. Alfonzo	060623	Pergamino	MARIANO H. ALFONZO	6	Buenos Aires	6623
        Localidad simple	-33.8949900563191	-60.5716400794952	Pergamino	INDEC	6623100000	06623100	Pergamino	060623	Pergamino	PERGAMINO	6	Buenos Aires	6623
        Localidad simple	-33.9947211174052	-60.7316480040989	Pergamino	INDEC	6623110000	06623110	Pinzón	060623	Pergamino	PINZON	6	Buenos Aires	6623
        Localidad simple	-34.0303722475767	-60.5042327001336	Pergamino	INDEC	6623120000	06623120	Rancagua	060623	Pergamino	RANCAGUA	6	Buenos Aires	6623
        Localidad simple	-33.6647037443081	-60.7084372635626	Pergamino	INDEC	6623130000	06623130	Villa Angélica	060623	Pergamino	VILLA ANGELICA	6	Buenos Aires	6623
        Componente de localidad compuesta	-34.0906695795004	-60.4162716627136	Pergamino	INDEC	6623140000	06623140	Villa San José	060623	Pergamino	VILLA SAN JOSE	6	Buenos Aires	6623
        Localidad simple	-36.3181419923689	-58.5525025522873	Pila	INDEC	6630010000	06630010	Casalins	060630	Pila	CASALINS	6	Buenos Aires	6630
        Localidad simple	-36.0014746137723	-58.1427778873885	Pila	INDEC	6630020000	06630020	Pila	060630	Pila	PILA	6	Buenos Aires	6630
        Entidad	-34.4494009456502	-58.8009119728306	Pilar	INDEC	6638040001	06638040	Pilar	060638	Pilar	DEL VISO	6	Buenos Aires	6638
        Entidad	-34.4072575836787	-58.974691291144	Pilar	INDEC	6638040002	06638040	Pilar	060638	Pilar	FATIMA	6	Buenos Aires	6638
        Entidad	-34.4448149403448	-58.8393730861805	Pilar	INDEC	6638040003	06638040	Pilar	060638	Pilar	LA LONJA	6	Buenos Aires	6638
        Entidad	-34.4250028270043	-58.7950003996087	Pilar	INDEC	6638040004	06638040	Pilar	060638	Pilar	LOS CACHORROS	6	Buenos Aires	6638
        Entidad	-34.452630932571	-59.0136606624887	Pilar	INDEC	6638040005	06638040	Pilar	060638	Pilar	MANZANARES	6	Buenos Aires	6638
        Entidad	-34.5287308766458	-58.8775995091498	Pilar	INDEC	6638040006	06638040	Pilar	060638	Pilar	MANZONE	6	Buenos Aires	6638
        Entidad	-34.410617254736	-58.7821701089413	Pilar	INDEC	6638040007	06638040	Pilar	060638	Pilar	MAQUINISTA F. SAVIO (OESTE)	6	Buenos Aires	6638
        Entidad	-34.4663318396358	-58.9227197887079	Pilar	INDEC	6638040008	06638040	Pilar	060638	Pilar	PILAR	6	Buenos Aires	6638
        Entidad	-34.4928616935261	-58.8416985218723	Pilar	INDEC	6638040009	06638040	Pilar	060638	Pilar	PRESIDENTE DERQUI	6	Buenos Aires	6638
        Entidad	-34.4369652784326	-58.7669941785147	Pilar	INDEC	6638040010	06638040	Pilar	060638	Pilar	ROBERTO DE VICENZO	6	Buenos Aires	6638
        Entidad	-34.4366914158447	-58.7573470164393	Pilar	INDEC	6638040011	06638040	Pilar	060638	Pilar	SANTA TERESA	6	Buenos Aires	6638
        Entidad	-34.4578061717121	-58.76209072062	Pilar	INDEC	6638040012	06638040	Pilar	060638	Pilar	TORTUGUITAS	6	Buenos Aires	6638
        Entidad	-34.4858983446269	-58.8768335703823	Pilar	INDEC	6638040013	06638040	Pilar	060638	Pilar	VILLA ASTOLFI	6	Buenos Aires	6638
        Entidad	-34.4077327133185	-58.8539345779841	Pilar	INDEC	6638040014	06638040	Pilar	060638	Pilar	VILLA ROSA	6	Buenos Aires	6638
        Entidad	-34.3657182841794	-58.893696088678	Pilar	INDEC	6638040015	06638040	Pilar	060638	Pilar	ZELAYA	6	Buenos Aires	6638
        Entidad	-37.1641593745618	-56.9027914378095	Pinamar	INDEC	6644010001	06644010	Pinamar	060644	Pinamar	CARILO	6	Buenos Aires	6644
        Entidad	-37.1300477581888	-56.8833984697828	Pinamar	INDEC	6644010002	06644010	Pinamar	060644	Pinamar	OSTENDE	6	Buenos Aires	6644
        Entidad	-37.0777448860202	-56.8437227435213	Pinamar	INDEC	6644010003	06644010	Pinamar	060644	Pinamar	PINAMAR	6	Buenos Aires	6644
        Entidad	-37.1445557771803	-56.890291998877	Pinamar	INDEC	6644010004	06644010	Pinamar	060644	Pinamar	VALERIA DEL MAR	6	Buenos Aires	6644
        Entidad	-34.886197581853	-58.41733483734	Presidente Perón	INDEC	6648010001	06648010	Presidente Perón	060648	Presidente Perón	BARRIO AMERICA UNIDA	6	Buenos Aires	6648
        Entidad	-34.9230592108536	-58.3650272662643	Presidente Perón	INDEC	6648010002	06648010	Presidente Perón	060648	Presidente Perón	GUERNICA	6	Buenos Aires	6648
        Localidad simple	-37.7017920523646	-62.9006764415683	Puán	INDEC	6651010000	06651010	Azopardo	060651	Puán	AZOPARDO	6	Buenos Aires	6651
        Localidad simple	-37.8028181597411	-63.0425144041162	Puán	INDEC	6651020000	06651020	Bordenave	060651	Puán	BORDENAVE	6	Buenos Aires	6651
        Localidad simple	-37.6857562622736	-63.1595663902141	Puán	INDEC	6651030000	06651030	Darregueira	060651	Puán	DARREGUEIRA	6	Buenos Aires	6651
        Localidad simple	-37.9086924428976	-62.9360284730803	Puán	INDEC	6651040000	06651040	17 de Agosto	060651	Puán	17 DE AGOSTO	6	Buenos Aires	6651
        Localidad simple	-38.1080950084855	-62.9129041375994	Puán	INDEC	6651050000	06651050	Estela	060651	Puán	ESTELA	6	Buenos Aires	6651
        Localidad simple	-38.005992834739	-62.8186936682637	Puán	INDEC	6651060000	06651060	Felipe Solá	060651	Puán	FELIPE SOLA	6	Buenos Aires	6651
        Localidad simple	-38.1171190117962	-62.7254849373447	Puán	INDEC	6651070000	06651070	López Lecube	060651	Puán	LOPEZ LECUBE	6	Buenos Aires	6651
        Localidad simple	-37.542613502113	-62.7652275731166	Puán	INDEC	6651080000	06651080	Puán	060651	Puán	PUAN	6	Buenos Aires	6651
        Localidad simple	-38.2995183581309	-62.9821877089624	Puán	INDEC	6651090000	06651090	San Germán	060651	Puán	SAN GERMAN	6	Buenos Aires	6651
        Localidad simple	-37.3905464925651	-62.8051325654187	Puán	INDEC	6651100000	06651100	Villa Castelar	060651	Puán	VILLA CASTELAR	6	Buenos Aires	6651
        Localidad simple	-38.1693097057753	-63.2320511809102	Puán	INDEC	6651110000	06651110	Villa Iris	060651	Puán	VILLA IRIS	6	Buenos Aires	6651
        Localidad simple	-35.3227800092544	-57.4490768504218	Punta Indio	INDEC	6655010000	06655010	Alvarez Jonte	060655	Punta Indio	ALVAREZ JONTE	6	Buenos Aires	6655
        Localidad simple	-35.53126706917	-57.3285887617048	Punta Indio	INDEC	6655030000	06655030	Pipinas	060655	Punta Indio	PIPINAS	6	Buenos Aires	6655
        Localidad simple	-35.2808352898089	-57.2360072391524	Punta Indio	INDEC	6655040000	06655040	Punta Indio	060655	Punta Indio	PUNTA INDIO	6	Buenos Aires	6655
        Localidad simple	-35.3881552142501	-57.3371601623743	Punta Indio	INDEC	6655050000	06655050	Verónica	060655	Punta Indio	VERONICA	6	Buenos Aires	6655
        Entidad	-34.700378406023	-58.2766427817003	Quilmes	INDEC	6658010001	06658010	Quilmes	060658	Quilmes	BERNAL	6	Buenos Aires	6658
        Entidad	-34.7269644246033	-58.3182795621594	Quilmes	INDEC	6658010002	06658010	Quilmes	060658	Quilmes	BERNAL OESTE	6	Buenos Aires	6658
        Entidad	-34.7032130159372	-58.2984533178872	Quilmes	INDEC	6658010003	06658010	Quilmes	060658	Quilmes	DON BOSCO	6	Buenos Aires	6658
        Entidad	-34.7435644425127	-58.2281408361207	Quilmes	INDEC	6658010004	06658010	Quilmes	060658	Quilmes	EZPELETA	6	Buenos Aires	6658
        Entidad	-34.7634442077448	-58.2638314351646	Quilmes	INDEC	6658010005	06658010	Quilmes	060658	Quilmes	EZPELETA OESTE	6	Buenos Aires	6658
        Entidad	-34.7241344748224	-58.2492205541766	Quilmes	INDEC	6658010006	06658010	Quilmes	060658	Quilmes	QUILMES	6	Buenos Aires	6658
        Entidad	-34.7477989892391	-58.2999440151876	Quilmes	INDEC	6658010007	06658010	Quilmes	060658	Quilmes	QUILMES OESTE	6	Buenos Aires	6658
        Entidad	-34.7777730726874	-58.3101561253692	Quilmes	INDEC	6658010008	06658010	Quilmes	060658	Quilmes	SAN FRANCISCO SOLANO	6	Buenos Aires	6658
        Entidad	-34.7688841339243	-58.2957092489115	Quilmes	INDEC	6658010009	06658010	Quilmes	060658	Quilmes	VILLA LA FLORIDA	6	Buenos Aires	6658
        Localidad simple	-33.5679152654445	-59.9791123483107	Ramallo	INDEC	6665010000	06665010	El Paraíso	060665	Ramallo	EL PARAISO	6	Buenos Aires	6665
        Localidad simple	-33.6366100825527	-59.9895563465816	Ramallo	INDEC	6665020000	06665020	Las Bahamas	060665	Ramallo	LAS BAHAMAS	6	Buenos Aires	6665
        Localidad simple	-33.7674497804832	-60.0927343667154	Ramallo	INDEC	6665030000	06665030	Pérez Millán	060665	Ramallo	PEREZ MILLAN	6	Buenos Aires	6665
        Localidad simple	-33.4877021169888	-60.0072209741607	Ramallo	INDEC	6665040000	06665040	Ramallo	060665	Ramallo	RAMALLO	6	Buenos Aires	6665
        Localidad simple	-33.4352672179447	-60.1451316522293	Ramallo	INDEC	6665050000	06665050	Villa General Savio	060665	Ramallo	VILLA GENERAL SAVIO	6	Buenos Aires	6665
        Localidad simple	-33.502293213764	-60.0650138035308	Ramallo	INDEC	6665060000	06665060	Villa Ramallo	060665	Ramallo	VILLA RAMALLO	6	Buenos Aires	6665
        Localidad simple	-36.7755035485732	-59.0871114029954	Rauch	INDEC	6672010000	06672010	Rauch	060672	Rauch	RAUCH	6	Buenos Aires	6672
        Localidad simple	-35.4903412429492	-62.9763759840765	Rivadavia	INDEC	6679010000	06679010	América	060679	Rivadavia	AMERICA	6	Buenos Aires	6679
        Localidad simple	-35.7048848499519	-63.0230332752501	Rivadavia	INDEC	6679020000	06679020	Fortín Olavarría	060679	Rivadavia	FORTIN OLAVARRIA	6	Buenos Aires	6679
        Localidad simple	-35.5576529256075	-63.3815800402317	Rivadavia	INDEC	6679030000	06679030	González Moreno	060679	Rivadavia	GONZALEZ MORENO	6	Buenos Aires	6679
        Localidad simple	-35.8703867348478	-63.3742010687724	Rivadavia	INDEC	6679040000	06679040	Mira Pampa	060679	Rivadavia	MIRA PAMPA	6	Buenos Aires	6679
        Localidad simple	-35.8466320155134	-63.2898118317476	Rivadavia	INDEC	6679050000	06679050	Roosevelt	060679	Rivadavia	ROOSEVELT	6	Buenos Aires	6679
        Localidad simple	-35.5118022821456	-63.1882154861262	Rivadavia	INDEC	6679060000	06679060	San Mauricio	060679	Rivadavia	SAN MAURICIO	6	Buenos Aires	6679
        Localidad simple	-35.2750295400617	-63.2135436741919	Rivadavia	INDEC	6679070000	06679070	Sansinena	060679	Rivadavia	SANSINENA	6	Buenos Aires	6679
        Localidad simple	-35.7656416636683	-63.1386100973601	Rivadavia	INDEC	6679080000	06679080	Sundblad	060679	Rivadavia	SUNDBLAD	6	Buenos Aires	6679
        Localidad simple	-34.1544387870912	-61.0128711169321	Rojas	INDEC	6686010000	06686010	La Beba	060686	Rojas	LA BEBA	6	Buenos Aires	6686
        Localidad simple	-34.0381002651925	-60.8685264174218	Rojas	INDEC	6686020000	06686020	Las Carabelas	060686	Rojas	LAS CARABELAS	6	Buenos Aires	6686
        Localidad simple	-34.3735696107802	-60.6523710265627	Rojas	INDEC	6686030000	06686030	Los Indios	060686	Rojas	LOS INDIOS	6	Buenos Aires	6686
        Localidad simple	-34.3588132488617	-60.7845693256007	Rojas	INDEC	6686040000	06686040	Rafael Obligado	060686	Rojas	RAFAEL OBLIGADO	6	Buenos Aires	6686
        Localidad simple	-34.0876515179763	-60.6672564006968	Rojas	INDEC	6686050000	06686050	Roberto Cano	060686	Rojas	ROBERTO CANO	6	Buenos Aires	6686
        Localidad simple con entidad	-34.1961600446015	-60.7332636467146	Rojas	INDEC	6686060000	06686060	Rojas	060686	Rojas	ROJAS	6	Buenos Aires	6686
        Entidad	-34.1932374145653	-60.6820264999894	Rojas	INDEC	6686060001	06686060	Rojas	060686	Rojas	BARRIO LAS MARGARITAS	6	Buenos Aires	6686
        Entidad	-34.1872292263523	-60.7179411923956	Rojas	INDEC	6686060002	06686060	Rojas	060686	Rojas	ROJAS	6	Buenos Aires	6686
        Entidad	-34.1707175989305	-60.7438336816558	Rojas	INDEC	6686060003	06686060	Rojas	060686	Rojas	VILLA PARQUE CECIR	6	Buenos Aires	6686
        Localidad simple	-34.2689448512236	-60.8717773420981	Rojas	INDEC	6686070000	06686070	Sol de Mayo	060686	Rojas	ESTACION SOL DE MAYO	6	Buenos Aires	6686
        Componente de localidad compuesta	-33.9159508805463	-60.9379380238883	Rojas	INDEC	6686080000	06686080	Villa Manuel Pomar	060686	Rojas	VILLA MANUEL POMAR	6	Buenos Aires	6686
        Localidad simple	-35.4854690457283	-59.1017155978911	Roque Pérez	INDEC	6693010000	06693010	Carlos Beguerie	060693	Roque Pérez	CARLOS BEGUERIE	6	Buenos Aires	6693
        Localidad simple	-35.4016375824204	-59.3346857845207	Roque Pérez	INDEC	6693020000	06693020	Roque Pérez	060693	Roque Pérez	ROQUE PEREZ	6	Buenos Aires	6693
        Localidad simple	-37.512917973477	-62.3116837747426	Saavedra	INDEC	6700010000	06700010	Arroyo Corto	060700	Saavedra	ARROYO CORTO	6	Buenos Aires	6700
        Localidad simple	-37.9769152091143	-62.3326095560459	Saavedra	INDEC	6700020000	06700020	Colonia San Martín	060700	Saavedra	COLONIA SAN MARTIN	6	Buenos Aires	6700
        Localidad simple	-37.9428223013646	-62.284864272698	Saavedra	INDEC	6700030000	06700030	Dufaur	060700	Saavedra	DUFAUR	6	Buenos Aires	6700
        Componente de localidad compuesta	-37.3604343942367	-62.4297386825705	Saavedra	INDEC	6700040000	06700040	Espartillar	060700	Saavedra	ESPARTILLAR (E)	6	Buenos Aires	6700
        Localidad simple	-37.7192518502325	-62.6071296330023	Saavedra	INDEC	6700050000	06700050	Goyena	060700	Saavedra	GOYENA	6	Buenos Aires	6700
        Localidad simple	-38.0361082716296	-62.4704140736323	Saavedra	INDEC	6700055000	06700055	Las Encadenadas	060700	Saavedra	LAS ENCADENADAS	6	Buenos Aires	6700
        Localidad simple	-37.6063896033626	-62.4057728759143	Saavedra	INDEC	6700060000	06700060	Pigüé	060700	Saavedra	PIGUE	6	Buenos Aires	6700
        Localidad simple	-37.7636402199499	-62.3506328041255	Saavedra	INDEC	6700070000	06700070	Saavedra	060700	Saavedra	SAAVEDRA	6	Buenos Aires	6700
        Localidad simple	-35.6391609182127	-59.6292383440582	Saladillo	INDEC	6707010000	06707010	Álvarez de Toledo	060707	Saladillo	ALVAREZ DE TOLEDO	6	Buenos Aires	6707
        Localidad simple	-35.576803202395	-59.6645037628687	Saladillo	INDEC	6707030000	06707030	Cazón	060707	Saladillo	CAZON	6	Buenos Aires	6707
        Localidad simple	-35.5127172285926	-59.5158202035334	Saladillo	INDEC	6707040000	06707040	Del Carril	060707	Saladillo	DEL CARRIL	6	Buenos Aires	6707
        Localidad simple	-35.593907231155	-59.5079734849201	Saladillo	INDEC	6707050000	06707050	Polvaredas	060707	Saladillo	POLVAREDAS	6	Buenos Aires	6707
        Localidad simple	-35.6404298805989	-59.7790589845354	Saladillo	INDEC	6707060000	06707060	Saladillo	060707	Saladillo	SALADILLO	6	Buenos Aires	6707
        Componente de localidad compuesta	-34.1024332833136	-60.4061551794069	Salto	INDEC	6714010000	06714010	Arroyo Dulce	060714	Salto	ARROYO DULCE	6	Buenos Aires	6714
        Localidad simple	-34.3987726587976	-60.2605725409335	Salto	INDEC	6714020000	06714020	Berdier	060714	Salto	BERDIER	6	Buenos Aires	6714
        Localidad simple	-34.3380744009945	-60.0992736191527	Salto	INDEC	6714030000	06714030	Gahan	060714	Salto	GAHAN	6	Buenos Aires	6714
        Localidad simple	-34.3994163305262	-60.5436825925267	Salto	INDEC	6714040000	06714040	Inés Indart	060714	Salto	INES INDART	6	Buenos Aires	6714
        Localidad simple	-34.2687422037239	-60.3853645216588	Salto	INDEC	6714050000	06714050	La Invencible	060714	Salto	LA INVENCIBLE	6	Buenos Aires	6714
        Localidad simple	-34.2921598652878	-60.2546244496406	Salto	INDEC	6714060000	06714060	Salto	060714	Salto	SALTO	6	Buenos Aires	6714
        Localidad simple	-36.5689908284906	-63.0876229573465	Salliqueló	INDEC	6721010000	06721010	Quenumá	060721	Salliqueló	QUENUMA	6	Buenos Aires	6721
        Localidad simple	-36.7511653813281	-62.9599573443115	Salliqueló	INDEC	6721020000	06721020	Salliqueló	060721	Salliqueló	SALLIQUELO	6	Buenos Aires	6721
        Localidad simple	-34.3637910907784	-59.3745991110996	San Andrés de Giles	INDEC	6728010000	06728010	Azcuénaga	060728	San Andrés de Giles	AZCUENAGA	6	Buenos Aires	6728
        Localidad simple	-34.4460870678	-59.3622553297801	San Andrés de Giles	INDEC	6728020000	06728020	Cucullú	060728	San Andrés de Giles	CULULLU	6	Buenos Aires	6728
        Localidad simple	-34.6103908719397	-59.6301795182439	San Andrés de Giles	INDEC	6728030000	06728030	Franklin	060728	San Andrés de Giles	FRANKLIN	6	Buenos Aires	6728
        Localidad simple	-31.9771375050248	-58.3917628888627	Colón	INDEC	30008060000	30008060	La Clarita			LA CLARITA	30	Entre Ríos	30008
        Localidad simple	-34.4459080814748	-59.4451673563949	San Andrés de Giles	INDEC	6728040000	06728040	San Andrés de Giles	060728	San Andrés de Giles	SAN ANDRES DE GILES	6	Buenos Aires	6728
        Localidad simple	-34.2989712949513	-59.3250547278241	San Andrés de Giles	INDEC	6728050000	06728050	Solís	060728	San Andrés de Giles	SOLIS	6	Buenos Aires	6728
        Localidad simple	-34.5066814044811	-59.3372661316763	San Andrés de Giles	INDEC	6728060000	06728060	Villa Espil	060728	San Andrés de Giles	VILLA ESPIL	6	Buenos Aires	6728
        Localidad simple	-34.4352021828488	-59.260395880426	San Andrés de Giles	INDEC	6728070000	06728070	Villa Ruiz	060728	San Andrés de Giles	VILLA RUIZ	6	Buenos Aires	6728
        Localidad simple	-34.2071973030208	-59.6357055338083	San Antonio de Areco	INDEC	6735010000	06735010	Duggan	060735	San Antonio de Areco	DUGGAN	6	Buenos Aires	6735
        Localidad simple	-34.2503763113877	-59.4708634797005	San Antonio de Areco	INDEC	6735020000	06735020	San Antonio de Areco	060735	San Antonio de Areco	SAN ANTONIO DE ARECO	6	Buenos Aires	6735
        Localidad simple	-34.1237740718192	-59.4313725724126	San Antonio de Areco	INDEC	6735030000	06735030	Villa Lía	060735	San Antonio de Areco	VILLA LIA	6	Buenos Aires	6735
        Localidad simple	-38.7481815016452	-59.429204589717	San Cayetano	INDEC	6742010000	06742010	Balneario San Cayetano	060742	San Cayetano	BALNEARIO SAN CAYETANO	6	Buenos Aires	6742
        Localidad simple	-38.3598244506044	-59.7935349347064	San Cayetano	INDEC	6742020000	06742020	Ochandío	060742	San Cayetano	OCHANDIO	6	Buenos Aires	6742
        Localidad simple	-38.346970946847	-59.6063826058006	San Cayetano	INDEC	6742030000	06742030	San Cayetano	060742	San Cayetano	SAN CAYETANO	6	Buenos Aires	6742
        Entidad	-34.4473601745411	-58.5690015916776	San Fernando	INDEC	6749010001	06749010	San Fernando	060749	San Fernando	SAN FERNANDO	6	Buenos Aires	6749
        Entidad	-34.4619820050413	-58.5595970877081	San Fernando	INDEC	6749010002	06749010	San Fernando	060749	San Fernando	VICTORIA	6	Buenos Aires	6749
        Entidad	-34.4636240092728	-58.5761941633194	San Fernando	INDEC	6749010003	06749010	San Fernando	060749	San Fernando	VIRREYES	6	Buenos Aires	6749
        Entidad	-34.4794018120083	-58.5074043996961	San Isidro	INDEC	6756010001	06756010	San Isidro	060756	San Isidro	ACASSUSO	6	Buenos Aires	6756
        Entidad	-34.4674159462571	-58.5400343502635	San Isidro	INDEC	6756010002	06756010	San Isidro	060756	San Isidro	BECCAR	6	Buenos Aires	6756
        Entidad	-34.4983312888498	-58.5700137209729	San Isidro	INDEC	6756010003	06756010	San Isidro	060756	San Isidro	BOULOGNE SUR MER	6	Buenos Aires	6756
        Entidad	-34.4944230772436	-58.5105732755943	San Isidro	INDEC	6756010004	06756010	San Isidro	060756	San Isidro	MARTINEZ	6	Buenos Aires	6756
        Entidad	-34.4770412162141	-58.52719519996	San Isidro	INDEC	6756010005	06756010	San Isidro	060756	San Isidro	SAN ISIDRO	6	Buenos Aires	6756
        Entidad	-34.5151197673508	-58.5457579220177	San Isidro	INDEC	6756010006	06756010	San Isidro	060756	San Isidro	VILLA ADELINA	6	Buenos Aires	6756
        Entidad	-34.5751401519414	-58.6960409885544	San Miguel	INDEC	6760010001	06760010	San Miguel	060760	San Miguel	BELLA VISTA	6	Buenos Aires	6760
        Entidad	-34.5346818189868	-58.6513860167431	San Miguel	INDEC	6760010002	06760010	San Miguel	060760	San Miguel	CAMPO DE MAYO	6	Buenos Aires	6760
        Entidad	-34.5557351629874	-58.7080227572424	San Miguel	INDEC	6760010003	06760010	San Miguel	060760	San Miguel	MUÑIZ	6	Buenos Aires	6760
        Entidad	-34.5536228677773	-58.7347875195953	San Miguel	INDEC	6760010004	06760010	San Miguel	060760	San Miguel	SAN MIGUEL	6	Buenos Aires	6760
        Localidad simple	-33.5962124822607	-60.3541264450858	San Nicolás	INDEC	6763010000	06763010	Conesa	060763	San Nicolás	CONESA	6	Buenos Aires	6763
        Localidad simple	-33.5232449410318	-60.3174454958625	San Nicolás	INDEC	6763020000	06763020	Erezcano	060763	San Nicolás	EREZCANO	6	Buenos Aires	6763
        Localidad simple	-33.4758683523604	-60.2874270636731	San Nicolás	INDEC	6763030000	06763030	General Rojo	060763	San Nicolás	GENERAL ROJO	6	Buenos Aires	6763
        Entidad	-33.3514852802661	-60.3139573529074	San Nicolás	INDEC	6763040001	06763040	La Emilia	060763	San Nicolás	LA EMILIA	6	Buenos Aires	6763
        Entidad	-33.3599587304228	-60.3000892882903	San Nicolás	INDEC	6763040002	06763040	La Emilia	060763	San Nicolás	VILLA CAMPI	6	Buenos Aires	6763
        Entidad	-33.3708479748	-60.2954116362263	San Nicolás	INDEC	6763040003	06763040	La Emilia	060763	San Nicolás	VILLA CANTO	6	Buenos Aires	6763
        Entidad	-33.3630498059477	-60.2953990898749	San Nicolás	INDEC	6763040004	06763040	La Emilia	060763	San Nicolás	VILLA RICCIO	6	Buenos Aires	6763
        Entidad	-33.4010837029564	-60.2846972878391	San Nicolás	INDEC	6763050001	06763050	San Nicolás de los Arroyos	060763	San Nicolás	CAMPOS SALLES	6	Buenos Aires	6763
        Entidad	-33.3487082868277	-60.231333927581	San Nicolás	INDEC	6763050002	06763050	San Nicolás de los Arroyos	060763	San Nicolás	SAN NICOLAS DE LOS ARROYOS	6	Buenos Aires	6763
        Localidad simple	-33.422326147095	-60.2605874904382	San Nicolás	INDEC	6763060000	06763060	Villa Esperanza	060763	San Nicolás	VILLA ESPERANZA	6	Buenos Aires	6763
        Localidad simple	-33.6605787290919	-59.8663408291494	San Pedro	INDEC	6770010000	06770010	Gobernador Castro	060770	San Pedro	GOBERNADOR CASTRO	6	Buenos Aires	6770
        Localidad simple	-33.9314631330704	-59.7482330053997	San Pedro	INDEC	6770015000	06770015	Ingeniero Moneta	060770	San Pedro	INGENIERO MONETA	6	Buenos Aires	6770
        Localidad simple	-33.5965558617631	-59.8199792397796	San Pedro	INDEC	6770020000	06770020	Obligado	060770	San Pedro	OBLIGADO	6	Buenos Aires	6770
        Localidad simple	-33.9050057189811	-59.8187532271261	San Pedro	INDEC	6770030000	06770030	Pueblo Doyle	060770	San Pedro	PUEBLO DOYLE	6	Buenos Aires	6770
        Localidad simple	-33.769589927701	-59.6383708591324	San Pedro	INDEC	6770040000	06770040	Río Tala	060770	San Pedro	RIO TALA	6	Buenos Aires	6770
        Localidad simple	-33.6791252253366	-59.6668951027895	San Pedro	INDEC	6770050000	06770050	San Pedro	060770	San Pedro	SAN PEDRO	6	Buenos Aires	6770
        Localidad simple	-33.8794559527188	-59.8753284459435	San Pedro	INDEC	6770060000	06770060	Santa Lucía	060770	San Pedro	SANTA LUCIA	6	Buenos Aires	6770
        Entidad	-35.0135125285778	-58.3865346894091	San Vicente	INDEC	6778020001	06778020	San Vicente	060778	San Vicente	ALEJANDRO KORN	6	Buenos Aires	6778
        Entidad	-35.010404143813	-58.4699705982043	San Vicente	INDEC	6778020002	06778020	San Vicente	060778	San Vicente	SAN VICENTE	6	Buenos Aires	6778
        Entidad	-35.048692550243	-58.3145745868708	San Vicente	INDEC	6778020003	06778020	San Vicente	060778	San Vicente	DOMSELAAR	6	Buenos Aires	6778
        Localidad simple	-34.6100370680434	-59.7504234207746	Suipacha	INDEC	6784010000	06784010	General Rivas	060784	Suipacha	GENERAL RIVAS	6	Buenos Aires	6784
        Localidad simple	-34.7712617839883	-59.6879181821818	Suipacha	INDEC	6784020000	06784020	Suipacha	060784	Suipacha	SUIPACHA	6	Buenos Aires	6784
        Localidad simple	-37.1293125663244	-59.105380206456	Tandil	INDEC	6791010000	06791010	De la Canal	060791	Tandil	DE LA CANAL	6	Buenos Aires	6791
        Localidad simple	-37.2823323375205	-59.3630004748452	Tandil	INDEC	6791030000	06791030	Gardey	060791	Tandil	GARDEY	6	Buenos Aires	6791
        Localidad simple	-37.4029073074266	-59.5093354449092	Tandil	INDEC	6791040000	06791040	María Ignacia	060791	Tandil	MARIA IGNACIA	6	Buenos Aires	6791
        Localidad simple	-37.3238849060878	-59.1310691770429	Tandil	INDEC	6791050000	06791050	Tandil	060791	Tandil	TANDIL	6	Buenos Aires	6791
        Localidad simple	-36.5774103919485	-60.1711185359919	Tapalqué	INDEC	6798010000	06798010	Crotto	060798	Tapalqué	CROTTO	6	Buenos Aires	6798
        Localidad simple	-36.3573669882462	-60.0247443487218	Tapalqué	INDEC	6798020000	06798020	Tapalqué	060798	Tapalqué	TAPALQUE	6	Buenos Aires	6798
        Localidad simple	-36.1215309084723	-59.6527146246682	Tapalqué	INDEC	6798030000	06798030	Velloso	060798	Tapalqué	VELLOSO	6	Buenos Aires	6798
        Entidad	-34.4104347356392	-58.6887919689512	Tigre	INDEC	6805010001	06805010	Tigre	060805	Tigre	BENAVIDEZ	6	Buenos Aires	6805
        Entidad	-34.3717750147952	-58.6917925096496	Tigre	INDEC	6805010002	06805010	Tigre	060805	Tigre	DIQUE LUJAN	6	Buenos Aires	6805
        Entidad	-34.4869370480479	-58.6159410299812	Tigre	INDEC	6805010003	06805010	Tigre	060805	Tigre	DON TORCUATO ESTE	6	Buenos Aires	6805
        Entidad	-34.5035354582885	-58.6275286549289	Tigre	INDEC	6805010004	06805010	Tigre	060805	Tigre	DON TORCUATO OESTE	6	Buenos Aires	6805
        Entidad	-34.4713213368481	-58.6570301927479	Tigre	INDEC	6805010005	06805010	Tigre	060805	Tigre	EL TALAR	6	Buenos Aires	6805
        Entidad	-34.4523088119909	-58.6448936162046	Tigre	INDEC	6805010006	06805010	Tigre	060805	Tigre	GENERAL PACHECO	6	Buenos Aires	6805
        Entidad	-34.4425672031974	-58.6174364127772	Tigre	INDEC	6805010007	06805010	Tigre	060805	Tigre	LOS TRONCOS DEL TALAR	6	Buenos Aires	6805
        Entidad	-34.4563339674448	-58.6806670320976	Tigre	INDEC	6805010008	06805010	Tigre	060805	Tigre	RICARDO ROJAS	6	Buenos Aires	6805
        Entidad	-34.4097532043357	-58.6304827023614	Tigre	INDEC	6805010009	06805010	Tigre	060805	Tigre	RINCON DE MILBERG	6	Buenos Aires	6805
        Entidad	-34.4266925110065	-58.5779717541318	Tigre	INDEC	6805010010	06805010	Tigre	060805	Tigre	TIGRE	6	Buenos Aires	6805
        Localidad simple	-36.5208587437818	-57.3249371025508	Tordillo	INDEC	6812010000	06812010	General Conesa	060812	Tordillo	GENERAL CONESA	6	Buenos Aires	6812
        Localidad simple	-38.3352258409739	-62.6424099899733	Tornquist	INDEC	6819010000	06819010	Chasicó	060819	Tornquist	CHASICO	6	Buenos Aires	6819
        Localidad simple	-38.2028131038038	-61.7678925154653	Tornquist	INDEC	6819020000	06819020	Saldungaray	060819	Tornquist	SALDUNGARAY	6	Buenos Aires	6819
        Componente de localidad compuesta	-38.1366716139365	-61.7956860399239	Tornquist	INDEC	6819030000	06819030	Sierra de la Ventana	060819	Tornquist	SIERRA DE LA VENTANA	6	Buenos Aires	6819
        Localidad simple	-38.0989983131157	-62.2218091270044	Tornquist	INDEC	6819040000	06819040	Tornquist	060819	Tornquist	TORNQUIST	6	Buenos Aires	6819
        Localidad simple	-38.2867749310339	-62.2073117423093	Tornquist	INDEC	6819050000	06819050	Tres Picos	060819	Tornquist	TRES PICOS	6	Buenos Aires	6819
        Localidad simple	-38.0568266332177	-62.0782618310425	Tornquist	INDEC	6819060000	06819060	La Gruta	060819	Tornquist	VILLA SERRANA LA GRUTA	6	Buenos Aires	6819
        Localidad simple	-38.0795765714478	-61.9311383483155	Tornquist	INDEC	6819070000	06819070	Villa Ventana	060819	Tornquist	VILLA VENTANA	6	Buenos Aires	6819
        Localidad simple	-35.8580311359835	-62.5126328995628	Trenque Lauquen	INDEC	6826010000	06826010	Berutti	060826	Trenque Lauquen	BERUTTI	6	Buenos Aires	6826
        Localidad simple	-36.367451804132	-62.3569660936558	Trenque Lauquen	INDEC	6826020000	06826020	Girodias	060231	Daireaux	GIRODIAS	6	Buenos Aires	6826
        Localidad simple	-36.1964811594442	-62.2245641400875	Trenque Lauquen	INDEC	6826030000	06826030	La Carreta	060826	Trenque Lauquen	LA CARRETA	6	Buenos Aires	6826
        Localidad simple	-36.2779720057322	-62.5453088654651	Trenque Lauquen	INDEC	6826040000	06826040	30 de Agosto	060826	Trenque Lauquen	30 DE AGOSTO	6	Buenos Aires	6826
        Localidad simple	-35.9746951559846	-62.7323099655579	Trenque Lauquen	INDEC	6826050000	06826050	Trenque Lauquen	060826	Trenque Lauquen	TRENQUE LAUQUEN	6	Buenos Aires	6826
        Localidad simple	-36.4603092402658	-62.4871229040303	Trenque Lauquen	INDEC	6826060000	06826060	Trongé	060826	Trenque Lauquen	TRONGE	6	Buenos Aires	6826
        Localidad simple	-38.8079580951783	-59.7382989446997	Tres Arroyos	INDEC	6833010000	06833010	Balneario Orense	060833	Tres Arroyos	BALNEARIO ORENSE	6	Buenos Aires	6833
        Entidad	-38.7973744243016	-60.107623035402	Tres Arroyos	INDEC	6833020001	06833020	Claromecó	060833	Tres Arroyos	CLAROMECO	6	Buenos Aires	6833
        Entidad	-38.8586780962346	-60.0873319312173	Tres Arroyos	INDEC	6833020002	06833020	Claromecó	060833	Tres Arroyos	DUNAMAR	6	Buenos Aires	6833
        Localidad simple	-38.7227403438549	-60.4519655195991	Tres Arroyos	INDEC	6833030000	06833030	Copetonas	060833	Tres Arroyos	COPETONAS	6	Buenos Aires	6833
        Localidad simple	-38.7081778337076	-60.2417246463467	Tres Arroyos	INDEC	6833040000	06833040	Lin Calel	060833	Tres Arroyos	LIN CALEL	6	Buenos Aires	6833
        Localidad simple	-38.4926790060303	-60.4684232796744	Tres Arroyos	INDEC	6833050000	06833050	Micaela Cascallares	060833	Tres Arroyos	MICAELA CASCALLARES	6	Buenos Aires	6833
        Localidad simple	-38.6855169253543	-59.7764287092023	Tres Arroyos	INDEC	6833060000	06833060	Orense	060833	Tres Arroyos	ORENSE	6	Buenos Aires	6833
        Localidad simple	-38.8970805514765	-60.343409791669	Tres Arroyos	INDEC	6833070000	06833070	Reta	060833	Tres Arroyos	RETA	6	Buenos Aires	6833
        Localidad simple	-38.6931705173547	-60.0141786926695	Tres Arroyos	INDEC	6833080000	06833080	San Francisco de Bellocq	060833	Tres Arroyos	SAN FRANCISCO DE BELLOCQ	6	Buenos Aires	6833
        Localidad simple	-38.3177365227324	-60.0258421214843	Tres Arroyos	INDEC	6833090000	06833090	San Mayol	060833	Tres Arroyos	SAN MAYOL	6	Buenos Aires	6833
        Localidad simple	-38.3771785795114	-60.2755588939396	Tres Arroyos	INDEC	6833100000	06833100	Tres Arroyos	060833	Tres Arroyos	TRES ARROYOS	6	Buenos Aires	6833
        Localidad simple	-38.3125817693893	-60.2324995777758	Tres Arroyos	INDEC	6833110000	06833110	Villa Rodríguez	060833	Tres Arroyos	VILLA RODRIGUEZ	6	Buenos Aires	6833
        Entidad	-34.608872950993	-58.5636644572416	Tres de Febrero	INDEC	6840010001	06840010	Tres de Febrero	060840	Tres de Febrero	CASEROS	6	Buenos Aires	6840
        Entidad	-34.5589664800215	-58.6228016204112	Tres de Febrero	INDEC	6840010002	06840010	Tres de Febrero	060840	Tres de Febrero	CHURRUCA	6	Buenos Aires	6840
        Entidad	-34.5961197253917	-58.5965998962097	Tres de Febrero	INDEC	6840010003	06840010	Tres de Febrero	060840	Tres de Febrero	CIUDAD JARDIN LOMAS DEL PALOMAR	6	Buenos Aires	6840
        Entidad	-34.6326965166188	-58.5424067827037	Tres de Febrero	INDEC	6840010004	06840010	Tres de Febrero	060840	Tres de Febrero	CIUDADELA	6	Buenos Aires	6840
        Entidad	-34.5564986200599	-58.622337837699	Tres de Febrero	INDEC	6840010005	06840010	Tres de Febrero	060840	Tres de Febrero	EL LIBERTADOR	6	Buenos Aires	6840
        Entidad	-34.6171528691842	-58.5342186326877	Tres de Febrero	INDEC	6840010006	06840010	Tres de Febrero	060840	Tres de Febrero	JOSE INGENIEROS	6	Buenos Aires	6840
        Entidad	-34.5684066633166	-58.603081885803	Tres de Febrero	INDEC	6840010007	06840010	Tres de Febrero	060840	Tres de Febrero	LOMA HERMOSA	6	Buenos Aires	6840
        Entidad	-34.5852038063892	-58.5918755543704	Tres de Febrero	INDEC	6840010008	06840010	Tres de Febrero	060840	Tres de Febrero	MARTIN CORONADO	6	Buenos Aires	6840
        Entidad	-34.566314345456	-58.6183600679169	Tres de Febrero	INDEC	6840010009	06840010	Tres de Febrero	060840	Tres de Febrero	11 DE SEPTIEMBRE	6	Buenos Aires	6840
        Entidad	-34.5758246152249	-58.6202497472316	Tres de Febrero	INDEC	6840010010	06840010	Tres de Febrero	060840	Tres de Febrero	PABLO PODESTA	6	Buenos Aires	6840
        Entidad	-34.5705752444729	-58.620118067161	Tres de Febrero	INDEC	6840010011	06840010	Tres de Febrero	060840	Tres de Febrero	REMEDIOS DE ESCALADA	6	Buenos Aires	6840
        Entidad	-34.5992886088748	-58.5320796402641	Tres de Febrero	INDEC	6840010012	06840010	Tres de Febrero	060840	Tres de Febrero	SAENZ PEÑA	6	Buenos Aires	6840
        Entidad	-34.5991533496562	-58.5478835120962	Tres de Febrero	INDEC	6840010013	06840010	Tres de Febrero	060840	Tres de Febrero	SANTOS LUGARES	6	Buenos Aires	6840
        Entidad	-34.5822981982887	-58.5802932642206	Tres de Febrero	INDEC	6840010014	06840010	Tres de Febrero	060840	Tres de Febrero	VILLA BOSCH (EST. JUAN MARIA BOSCH)	6	Buenos Aires	6840
        Entidad	-34.6083090753398	-58.5319718083201	Tres de Febrero	INDEC	6840010015	06840010	Tres de Febrero	060840	Tres de Febrero	VILLA RAFFO	6	Buenos Aires	6840
        Localidad simple	-36.6102541131892	-62.9109612139671	Tres Lomas	INDEC	6847010000	06847010	Ingeniero Thompson	060847	Tres Lomas	INGENIERO THOMPSON	6	Buenos Aires	6847
        Localidad simple	-36.458109497037	-62.8621355091327	Tres Lomas	INDEC	6847020000	06847020	Tres Lomas	060847	Tres Lomas	TRES LOMAS	6	Buenos Aires	6847
        Localidad simple	-35.7392169542026	-60.5590634621789	25 de Mayo	INDEC	6854010000	06854010	Agustín Mosconi	060854	25 de Mayo	AGUSTIN MOSCONI	6	Buenos Aires	6854
        Localidad simple	-35.8973453887603	-60.7316089512944	25 de Mayo	INDEC	6854020000	06854020	Del Valle	060854	25 de Mayo	DEL VALLE	6	Buenos Aires	6854
        Localidad simple	-35.2702340519789	-59.5575034078873	25 de Mayo	INDEC	6854030000	06854030	Ernestina	060854	25 de Mayo	ERNESTINA	6	Buenos Aires	6854
        Localidad simple	-35.1643973648093	-60.0813577815069	25 de Mayo	INDEC	6854040000	06854040	Gobernador Ugarte	060854	25 de Mayo	GOBERNADOR UGARTE	6	Buenos Aires	6854
        Localidad simple	-35.4838272164734	-59.9880647932831	25 de Mayo	INDEC	6854050000	06854050	Lucas Monteverde	060854	25 de Mayo	LUCAS MONTEVERDE	6	Buenos Aires	6854
        Localidad simple	-35.2727788695321	-59.7719327250509	25 de Mayo	INDEC	6854060000	06854060	Norberto de la Riestra	060854	25 de Mayo	NORBERTO DE LA RIESTRA	6	Buenos Aires	6854
        Localidad simple	-35.2666085074294	-59.6306574695384	25 de Mayo	INDEC	6854070000	06854070	Pedernales	060854	25 de Mayo	PEDERNALES	6	Buenos Aires	6854
        Localidad simple	-35.7785028686085	-60.3546454811901	25 de Mayo	INDEC	6854080000	06854080	San Enrique	060854	25 de Mayo	SAN ENRIQUE	6	Buenos Aires	6854
        Localidad simple	-35.6488128268597	-60.4672591673156	25 de Mayo	INDEC	6854090000	06854090	Valdés	060854	25 de Mayo	VALDES	6	Buenos Aires	6854
        Localidad simple	-35.4339385892588	-60.1731209454056	25 de Mayo	INDEC	6854100000	06854100	25 de Mayo	060854	25 de Mayo	25 DE MAYO	6	Buenos Aires	6854
        Entidad	-34.5259149691463	-58.5357639427634	Vicente López	INDEC	6861010001	06861010	Vicente López	060861	Vicente López	CARAPACHAY	6	Buenos Aires	6861
        Entidad	-34.5327432636609	-58.4910979599198	Vicente López	INDEC	6861010002	06861010	Vicente López	060861	Vicente López	FLORIDA	6	Buenos Aires	6861
        Entidad	-34.5394223366496	-58.5148137943065	Vicente López	INDEC	6861010003	06861010	Vicente López	060861	Vicente López	FLORIDA OESTE	6	Buenos Aires	6861
        Entidad	-34.4985433329471	-58.486582489457	Vicente López	INDEC	6861010004	06861010	Vicente López	060861	Vicente López	LA LUCILA	6	Buenos Aires	6861
        Entidad	-34.5272623078248	-58.5255060588714	Vicente López	INDEC	6861010005	06861010	Vicente López	060861	Vicente López	MUNRO	6	Buenos Aires	6861
        Entidad	-34.512161433984	-58.4985444232342	Vicente López	INDEC	6861010006	06861010	Vicente López	060861	Vicente López	OLIVOS	6	Buenos Aires	6861
        Entidad	-34.525536745172	-58.4736495025234	Vicente López	INDEC	6861010007	06861010	Vicente López	060861	Vicente López	VICENTE LOPEZ	6	Buenos Aires	6861
        Entidad	-34.5287596487564	-58.5460242623901	Vicente López	INDEC	6861010008	06861010	Vicente López	060861	Vicente López	VILLA ADELINA	6	Buenos Aires	6861
        Entidad	-34.5525979527695	-58.5091432644227	Vicente López	INDEC	6861010009	06861010	Vicente López	060861	Vicente López	VILLA MARTELLI	6	Buenos Aires	6861
        Entidad	-37.3366731576801	-57.032501468863	Villa Gesell	INDEC	6868010001	06868010	Mar Azul	060868	Villa Gesell	MAR AZUL	6	Buenos Aires	6868
        Entidad	-37.3281312355181	-57.0399070097774	Villa Gesell	INDEC	6868010002	06868010	Mar Azul	060868	Villa Gesell	MAR DE LAS PAMPAS	6	Buenos Aires	6868
        Localidad simple	-37.2464704698501	-56.9707267624406	Villa Gesell	INDEC	6868020000	06868020	Villa Gesell	060868	Villa Gesell	VILLA GESELL	6	Buenos Aires	6868
        Localidad simple	-38.7686560837266	-62.6025276771033	Villarino	INDEC	6875010000	06875010	Argerich	060875	Villarino	ARGERICH	6	Buenos Aires	6875
        Localidad simple	-39.3983952518232	-62.5711721088672	Villarino	INDEC	6875020000	06875020	Colonia San Adolfo	060875	Villarino	COLONIA SAN ADOLFO	6	Buenos Aires	6875
        Localidad simple	-38.8468445915571	-62.738741885831	Villarino	INDEC	6875025000	06875025	Country Los Medanos	060875	Villarino	COUNTRY LOS MEDANOS	6	Buenos Aires	6875
        Localidad simple	-39.3758602632663	-62.6477900877351	Villarino	INDEC	6875030000	06875030	Hilario Ascasubi	060875	Villarino	HILARIO ASCASUBI	6	Buenos Aires	6875
        Localidad simple	-38.8942604188728	-63.1361581918897	Villarino	INDEC	6875040000	06875040	Juan Cousté	060875	Villarino	JUAN COUSTE	6	Buenos Aires	6875
        Localidad simple	-39.2590946793617	-62.6157889589915	Villarino	INDEC	6875050000	06875050	Mayor Buratovich	060875	Villarino	MAYOR BURATOVICH	6	Buenos Aires	6875
        Entidad	-38.8293145512181	-62.6943321574343	Villarino	INDEC	6875060002	06875060	Médanos	060875	Villarino	MEDANOS	6	Buenos Aires	6875
        Localidad simple	-39.5007767274615	-62.6874317159849	Villarino	INDEC	6875070000	06875070	Pedro Luro	060875	Villarino	PEDRO LURO	6	Buenos Aires	6875
        Localidad simple	-39.0580586668564	-62.5697137402023	Villarino	INDEC	6875080000	06875080	Teniente Origone	060875	Villarino	TENIENTE ORIGONE	6	Buenos Aires	6875
        Localidad simple	-34.1275885141615	-59.0834596008166	Zárate	INDEC	6882020000	06882020	Country Club El Casco	060882	Zárate	COUNTRY CLUB EL CASCO	6	Buenos Aires	6882
        Localidad simple	-34.160933188334	-59.1125399836881	Zárate	INDEC	6882030000	06882030	Escalada	060882	Zárate	ESCALADA	6	Buenos Aires	6882
        Localidad simple	-34.0436335939636	-59.1973339595539	Zárate	INDEC	6882040000	06882040	Lima	060882	Zárate	LIMA	6	Buenos Aires	6882
        Localidad simple con entidad	-34.0998630672257	-59.024557255152	Zárate	INDEC	6882050000	06882050	Zárate	060882	Zárate	ZARATE	6	Buenos Aires	6882
        Entidad	-34.1263843372848	-59.020156759664	Zárate	INDEC	6882050001	06882050	Zárate	060882	Zárate	BARRIO SAAVEDRA	6	Buenos Aires	6882
        Entidad	-34.1115306481926	-59.0483426856883	Zárate	INDEC	6882050002	06882050	Zárate	060882	Zárate	ZARATE	6	Buenos Aires	6882
        Localidad simple	-27.9072844349135	-65.8265242094263	Ambato	INDEC	10007010000	10007010	Chuchucaruana	100028	Los Varela	CHUCHUCARUANA	10	Catamarca	10007
        Localidad simple	-28.056472497625	-65.8260844153652	Ambato	INDEC	10007020000	10007020	Colpes	100014	La Puerta	COLPES	10	Catamarca	10007
        Localidad simple	-27.9038743420396	-65.8884829262542	Ambato	INDEC	10007030000	10007030	El Bolsón	100028	Los Varela	EL BOLSON	10	Catamarca	10007
        Localidad simple	-28.2141516424861	-65.8738600634115	Ambato	INDEC	10007040000	10007040	El Rodeo	100007	El Rodeo	EL RODEO	10	Catamarca	10007
        Localidad simple	-28.0988458342305	-65.8147464336478	Ambato	INDEC	10007050000	10007050	Huaycama	100014	La Puerta	HUAYCAMA	10	Catamarca	10007
        Localidad simple	-28.1764379052117	-65.7863037835082	Ambato	INDEC	10007060000	10007060	La Puerta	100014	La Puerta	LA PUERTA	10	Catamarca	10007
        Localidad simple	-27.6464168267027	-65.9533446470458	Ambato	INDEC	10007070000	10007070	Las Chacritas	100028	Los Varela	LAS CHACRITAS	10	Catamarca	10007
        Localidad simple	-28.1038836314671	-65.8996513641899	Ambato	INDEC	10007080000	10007080	Las Juntas	100021	Las Juntas	LAS JUNTAS	10	Catamarca	10007
        Localidad simple	-27.9582295650792	-65.820685723313	Ambato	INDEC	10007090000	10007090	Los Castillos	100028	Los Varela	LOS CASTILLOS	10	Catamarca	10007
        Localidad simple	-27.94999754917	-65.875829814164	Ambato	INDEC	10007100000	10007100	Los Talas	100028	Los Varela	LOS TALAS	10	Catamarca	10007
        Localidad simple	-27.9279942328057	-65.8822302327591	Ambato	INDEC	10007110000	10007110	Los Varela	100028	Los Varela	LOS VARELA	10	Catamarca	10007
        Localidad simple	-27.8142168571341	-65.8670660017181	Ambato	INDEC	10007120000	10007120	Singuil	100028	Los Varela	SINGUIL	10	Catamarca	10007
        Localidad simple	-28.809829766706	-65.5021019996524	Ancasti	INDEC	10014010000	10014010	Ancasti	100035	Ancasti	ANCASTI	10	Catamarca	10014
        Localidad simple	-28.7545936474404	-65.5495102803337	Ancasti	INDEC	10014020000	10014020	Anquincila	100035	Ancasti	ANQUINCILA	10	Catamarca	10014
        Localidad simple	-28.7207622901373	-65.4106917370235	Ancasti	INDEC	10014030000	10014030	La Candelaria	100035	Ancasti	LA CANDELARIA	10	Catamarca	10014
        Localidad simple	-29.0295107636719	-65.5499567687055	Ancasti	INDEC	10014040000	10014040	La Majada	100035	Ancasti	LA MAJADA	10	Catamarca	10014
        Localidad simple	-27.5275895579827	-66.5156761677031	Andalgalá	INDEC	10021010000	10021010	Amanao	100049	Andalgalá	AMANAO	10	Catamarca	10021
        Localidad simple	-27.5732225954972	-66.3235466394645	Andalgalá	INDEC	10021020000	10021020	Andalgalá	100049	Andalgalá	ANDALGALA	10	Catamarca	10021
        Localidad simple	-27.5368955481985	-66.3350568927423	Andalgalá	INDEC	10021030000	10021030	Chaquiago	100049	Andalgalá	CHAQUIAGO	10	Catamarca	10021
        Localidad simple	-27.5210749343604	-66.4034742805443	Andalgalá	INDEC	10021040000	10021040	Choya	100049	Andalgalá	CHOYA	10	Catamarca	10021
        Entidad	-27.3391922396844	-66.0241892155379	Andalgalá	INDEC	10021050001	10021050	El Alamito	100042	Aconquija	BUENA VISTA	10	Catamarca	10021
        Entidad	-27.333537875981	-66.022985174122	Andalgalá	INDEC	10021050002	10021050	El Alamito	100042	Aconquija	EL ALAMITO	10	Catamarca	10021
        Entidad	-27.4743798884533	-66.0266884349829	Andalgalá	INDEC	10021060001	10021060	El Lindero	100042	Aconquija	ACONQUIJA	10	Catamarca	10021
        Entidad	-27.4511959792163	-66.0199688270559	Andalgalá	INDEC	10021060002	10021060	El Lindero	100042	Aconquija	ALTO DE LAS JUNTAS	10	Catamarca	10021
        Entidad	-27.4743798884533	-66.0266884349829	Andalgalá	INDEC	10021060003	10021060	El Lindero	100042	Aconquija	EL LINDERO	10	Catamarca	10021
        Entidad	-27.4511959792163	-66.0199688270559	Andalgalá	INDEC	10021060004	10021060	El Lindero	100042	Aconquija	LA MESADA	10	Catamarca	10021
        Localidad simple	-27.5162322380357	-66.3434280762552	Andalgalá	INDEC	10021070000	10021070	El Potrero	100049	Andalgalá	EL POTRERO	10	Catamarca	10021
        Localidad simple	-27.534089032104	-66.3117750484602	Andalgalá	INDEC	10021080000	10021080	La Aguada	100049	Andalgalá	LA AGUADA	10	Catamarca	10021
        Localidad simple	-26.0632957365737	-67.4116706391736	Antofagasta de la Sierra	INDEC	10028010000	10028010	Antofagasta de la Sierra	100056	Antofagasta de la Sierra	ANTOFAGASTA DE LA SIERRA	10	Catamarca	10028
        Localidad simple	-25.445326397371	-67.6583954684648	Antofagasta de la Sierra	INDEC	10028020000	10028020	Antofalla	100056	Antofagasta de la Sierra	ANTOFALLA	10	Catamarca	10028
        Localidad simple	-26.4377795455164	-67.2590953594946	Antofagasta de la Sierra	INDEC	10028030000	10028030	El Peñón	100056	Antofagasta de la Sierra	EL PEÑON	10	Catamarca	10028
        Localidad simple	-25.7592665755338	-67.3912671398198	Antofagasta de la Sierra	INDEC	10028040000	10028040	Los Nacimientos	100056	Antofagasta de la Sierra	LOS NACIMIENTOS	10	Catamarca	10028
        Localidad simple	-26.9366725902001	-66.7473736733687	Belén	INDEC	10035010000	10035010	Barranca Larga	100119	Villa Vil	BARRANCA LARGA	10	Catamarca	10035
        Localidad simple	-27.6337582271366	-67.0181224346383	Belén	INDEC	10035020000	10035020	Belén	100063	Belén	BELEN	10	Catamarca	10035
        Localidad simple	-27.4800253698881	-67.1034365555174	Belén	INDEC	10035030000	10035030	Cóndor Huasi	100091	Pozo de Piedra	CONDOR HUASI	10	Catamarca	10035
        Localidad simple	-27.1458266170631	-66.9418772140389	Belén	INDEC	10035040000	10035040	Corral Quemado	100070	Corral Quemado	CORRAL QUEMADO	10	Catamarca	10035
        Localidad simple	-27.2352160693093	-67.0644302349354	Belén	INDEC	10035050000	10035050	El Durazno	100098	Puerta de Corral Quemado	EL DURAZNO	10	Catamarca	10035
        Localidad simple	-27.297991160481	-66.6526535881206	Belén	INDEC	10035060000	10035060	Farallón Negro	100077	Hualfín	FARALLON NEGRO	10	Catamarca	10035
        Localidad simple	-27.2251089488391	-66.8257494663378	Belén	INDEC	10035070000	10035070	Hualfín	100077	Hualfín	HUALFIN	10	Catamarca	10035
        Localidad simple	-27.2232502935304	-67.0189560597067	Belén	INDEC	10035080000	10035080	Jacipunco	100098	Puerta de Corral Quemado	JACIPUNCO	10	Catamarca	10035
        Localidad simple	-27.6687999477098	-66.9831854181017	Belén	INDEC	10035090000	10035090	La Puntilla	100063	Belén	LA PUNTILLA	10	Catamarca	10035
        Localidad simple	-27.5255267279244	-67.1230327103174	Belén	INDEC	10035100000	10035100	Las Juntas	100091	Pozo de Piedra	LAS JUNTAS	10	Catamarca	10035
        Localidad simple	-27.7091441699136	-67.1521288574758	Belén	INDEC	10035110000	10035110	Londres	100084	Londres	LONDRES	10	Catamarca	10035
        Localidad simple	-27.1276313861506	-66.7125336324121	Belén	INDEC	10035120000	10035120	Los Nacimientos	100077	Hualfín	LOS NACIMIENTOS	10	Catamarca	10035
        Localidad simple	-27.2142919344438	-66.9263178640934	Belén	INDEC	10035130000	10035130	Puerta de Corral Quemado	100098	Puerta de Corral Quemado	PUERTA DE CORRAL QUEMADO	10	Catamarca	10035
        Localidad simple	-27.5397412070942	-67.0153310519752	Belén	INDEC	10035140000	10035140	Puerta de San José	100105	Puerta de San José	PUERTA DE SAN JOSE	10	Catamarca	10035
        Localidad simple	-27.0710806751114	-66.8307696967369	Belén	INDEC	10035150000	10035150	Villa Vil	100119	Villa Vil	VILLA VIL	10	Catamarca	10035
        Localidad simple	-29.0269775235925	-65.9719315369666	Capayán	INDEC	10042010000	10042010	Adolfo E. Carranza	100126	Capayán	ADOLFO E. CARRANZA	10	Catamarca	10042
        Localidad simple	-29.5589484234071	-65.5807240749041	Capayán	INDEC	10042020000	10042020	Balde de la Punta	100126	Capayán	BALDE DE LA PUNTA	10	Catamarca	10042
        Localidad simple	-28.7807106449765	-66.0386455444458	Capayán	INDEC	10042030000	10042030	Capayán	100126	Capayán	CAPAYAN	10	Catamarca	10042
        Localidad simple	-28.8475652676601	-66.2413567840968	Capayán	INDEC	10042040000	10042040	Chumbicha	100126	Capayán	CHUMBICHA	10	Catamarca	10042
        Localidad simple	-28.6659572317315	-65.8752053335172	Capayán	INDEC	10042050000	10042050	Colonia del Valle	100133	Huillapima	COLONIA DEL VALLE	10	Catamarca	10042
        Localidad simple	-28.5859218596167	-65.8384330489801	Capayán	INDEC	10042060000	10042060	Colonia Nueva Coneta	100133	Huillapima	COLONIA NUEVA CONETA	10	Catamarca	10042
        Localidad simple	-28.7027878127673	-66.0684404425234	Capayán	INDEC	10042070000	10042070	Concepción	100126	Capayán	CONCEPCION	10	Catamarca	10042
        Localidad simple	-28.5824940471212	-65.8832899522771	Capayán	INDEC	10042080000	10042080	Coneta	100133	Huillapima	CONETA	10	Catamarca	10042
        Localidad simple	-28.6492910442287	-65.8184083876597	Capayán	INDEC	10042090000	10042090	El Bañado	100133	Huillapima	EL BAÑADO	10	Catamarca	10042
        Localidad simple	-28.7326533523263	-65.9692671337206	Capayán	INDEC	10042100000	10042100	Huillapima	100133	Huillapima	HUILLAPIMA	10	Catamarca	10042
        Localidad simple con entidad	-28.4757282890296	-65.9584714095267	Capayán	INDEC	10042110000	10042110	Los Angeles	100133	Huillapima	LOS ANGELES	10	Catamarca	10042
        Entidad	-28.4130524181894	-65.9974963114274	Capayán	INDEC	10042110001	10042110	Los Angeles	100133	Huillapima	LOS ANGELES NORTE	10	Catamarca	10042
        Entidad	-28.5096259939006	-66.0134501995358	Capayán	INDEC	10042110002	10042110	Los Angeles	100133	Huillapima	LOS ANGELES SUR	10	Catamarca	10042
        Localidad simple	-28.61156437771	-65.9045510608673	Capayán	INDEC	10042120000	10042120	Miraflores	100133	Huillapima	MIRAFLORES	10	Catamarca	10042
        Localidad simple	-29.2514238184412	-65.7966971627176	Capayán	INDEC	10042130000	10042130	San Martín	100126	Capayán	SAN MARTIN	10	Catamarca	10042
        Localidad simple	-28.7185211619112	-66.0406031753627	Capayán	INDEC	10042140000	10042140	San Pablo	100133	Huillapima	SAN PABLO	10	Catamarca	10042
        Localidad simple	-28.7717177596284	-66.1240600986815	Capayán	INDEC	10042150000	10042150	San Pedro	100126	Capayán	SAN PEDRO	10	Catamarca	10042
        Localidad simple	-28.5416893432334	-65.8026632730873	Capital	INDEC	10049020000	10049020	El Pantanillo	100140	San Fernando del Valle de Catamarca	EL PANTANILLO	10	Catamarca	10049
        Componente de localidad compuesta	-28.4846581947085	-65.7867892937631	Capital	INDEC	10049030000	10049030	San Fernando del Valle de Catamarca	100140	San Fernando del Valle de Catamarca	SAN FERNANDO DEL VALLE DE CATAMARCA	10	Catamarca	10049
        Localidad simple	-28.3027477561138	-65.3693767192491	El Alto	INDEC	10056010000	10056010	El Alto	100147	El Alto	EL ALTO	10	Catamarca	10056
        Localidad simple	-28.3441266642037	-65.4127476684157	El Alto	INDEC	10056020000	10056020	Guayamba	100147	El Alto	GUAYAMBA	10	Catamarca	10056
        Localidad simple	-28.5973244077887	-65.4116602658918	El Alto	INDEC	10056030000	10056030	Infanzón	100147	El Alto	INFANZON	10	Catamarca	10056
        Localidad simple	-28.5108290239161	-65.3308772218931	El Alto	INDEC	10056040000	10056040	Los Corrales	100147	El Alto	LOS CORRALES	10	Catamarca	10056
        Componente de localidad compuesta	-28.4159041977159	-65.1086409589416	El Alto	INDEC	10056050000	10056050	Tapso	100154	Tapso	TAPSO	10	Catamarca	10056
        Localidad simple	-28.5021133153073	-65.4385489995235	El Alto	INDEC	10056060000	10056060	Vilismán	100147	El Alto	VILISMAN	10	Catamarca	10056
        Localidad simple	-28.3616776397898	-65.7282690165025	Fray Mamerto Esquiú	INDEC	10063010000	10063010	Collagasta	100161	Fray Mamerto Esquiú	COLLAGASTA	10	Catamarca	10063
        Localidad simple	-28.3087173740113	-65.7222098439933	Fray Mamerto Esquiú	INDEC	10063020000	10063020	Pomancillo Este	100161	Fray Mamerto Esquiú	POMANCILLO ESTE	10	Catamarca	10063
        Localidad simple	-28.3178432457188	-65.7423447192215	Fray Mamerto Esquiú	INDEC	10063030000	10063030	Pomancillo Oeste	100161	Fray Mamerto Esquiú	POMANCILLO OESTE	10	Catamarca	10063
        Entidad	-28.4127884506849	-65.7175369854892	Fray Mamerto Esquiú	INDEC	10063040001	10063040	San José	100161	Fray Mamerto Esquiú	EL HUECO	10	Catamarca	10063
        Entidad	-28.3495576813874	-65.7091195877043	Fray Mamerto Esquiú	INDEC	10063040002	10063040	San José	100161	Fray Mamerto Esquiú	LA CARRERA	10	Catamarca	10063
        Entidad	-28.4198487342191	-65.6988377960377	Fray Mamerto Esquiú	INDEC	10063040003	10063040	San José	100161	Fray Mamerto Esquiú	LA FALDA DE SAN ANTONIO	10	Catamarca	10063
        Entidad	-28.3734473479931	-65.7081292515981	Fray Mamerto Esquiú	INDEC	10063040004	10063040	San José	100161	Fray Mamerto Esquiú	LA TERCENA	10	Catamarca	10063
        Entidad	-28.4237766788262	-65.7062134320732	Fray Mamerto Esquiú	INDEC	10063040005	10063040	San José	100161	Fray Mamerto Esquiú	SAN ANTONIO	10	Catamarca	10063
        Entidad	-28.3887321458271	-65.7062701247999	Fray Mamerto Esquiú	INDEC	10063040006	10063040	San José	100161	Fray Mamerto Esquiú	SAN JOSE	10	Catamarca	10063
        Localidad simple	-28.2754665210832	-65.733431477509	Fray Mamerto Esquiú	INDEC	10063050000	10063050	Villa Las Pirquitas	100161	Fray Mamerto Esquiú	VILLA LAS PIRQUITAS	10	Catamarca	10063
        Localidad simple	-29.649289010725	-65.5171151597056	La Paz	INDEC	10070010000	10070010	Casa de Piedra	100175	Recreo	CASA DE PIEDRA	10	Catamarca	10070
        Localidad simple	-29.1066140404485	-65.339695207396	La Paz	INDEC	10070020000	10070020	El Aybal	100175	Recreo	EL AYBAL	10	Catamarca	10070
        Localidad simple	-29.1832354089391	-65.4161459216901	La Paz	INDEC	10070030000	10070030	El Bañado	100175	Recreo	EL BAÑADO	10	Catamarca	10070
        Localidad simple	-29.193718415728	-65.4233403523442	La Paz	INDEC	10070040000	10070040	El Divisadero	100175	Recreo	EL DIVISADERO	10	Catamarca	10070
        Localidad simple	-29.9534214435134	-65.3926406151323	La Paz	INDEC	10070050000	10070050	El Quimilo	100175	Recreo	EL QUIMILO	10	Catamarca	10070
        Localidad simple	-29.3790661944991	-65.2898287859815	La Paz	INDEC	10070060000	10070060	Esquiú	100175	Recreo	ESQUIU	10	Catamarca	10070
        Localidad simple	-28.9308886124085	-65.2902158081112	La Paz	INDEC	10070070000	10070070	Icaño	100168	Icaño	ICAÑO	10	Catamarca	10070
        Localidad simple	-29.2804387843954	-65.4766321943102	La Paz	INDEC	10070080000	10070080	La Dorada	100175	Recreo	LA DORADA	10	Catamarca	10070
        Localidad simple	-29.5496731497758	-65.4504857993817	La Paz	INDEC	10070090000	10070090	La Guardia	100175	Recreo	LA GUARDIA	10	Catamarca	10070
        Localidad simple	-28.7644628061471	-65.1120210167305	La Paz	INDEC	10070100000	10070100	Las Esquinas	100168	Icaño	LAS ESQUINAS	10	Catamarca	10070
        Localidad simple	-28.6402396947153	-64.9870716926629	La Paz	INDEC	10070110000	10070110	Las Palmitas			LAS PALMITAS	10	Catamarca	10070
        Localidad simple	-28.7883056058069	-65.1007302335708	La Paz	INDEC	10070120000	10070120	Quirós	100168	Icaño	QUIROS	10	Catamarca	10070
        Localidad simple	-29.1582844511715	-65.374945475853	La Paz	INDEC	10070130000	10070130	Ramblones	100175	Recreo	RAMBLONES	10	Catamarca	10070
        Localidad simple	-29.2768611237227	-65.0565641552447	La Paz	INDEC	10070140000	10070140	Recreo	100175	Recreo	RECREO	10	Catamarca	10070
        Localidad simple	-28.9331053161662	-65.0949655869377	La Paz	INDEC	10070150000	10070150	San Antonio	100168	Icaño	SAN ANTONIO	10	Catamarca	10070
        Localidad simple	-28.2680363798746	-65.6462108146466	Paclín	INDEC	10077010000	10077010	Amadores	100182	Paclín	AMADORES	10	Catamarca	10077
        Localidad simple	-27.9877541032226	-65.688606939529	Paclín	INDEC	10077020000	10077020	El Rosario	100182	Paclín	EL ROSARIO	10	Catamarca	10077
        Localidad simple	-28.3920524907261	-65.6282649899935	Paclín	INDEC	10077030000	10077030	La Bajada	100182	Paclín	LA BAJADA	10	Catamarca	10077
        Localidad simple	-27.9352828616507	-65.699367489363	Paclín	INDEC	10077040000	10077040	La Higuera	100182	Paclín	LA HIGUERA	10	Catamarca	10077
        Localidad simple	-28.1537649054231	-65.6696062414473	Paclín	INDEC	10077050000	10077050	La Merced	100182	Paclín	LA MERCED	10	Catamarca	10077
        Localidad simple	-28.044445782746	-65.6079383578395	Paclín	INDEC	10077060000	10077060	La Viña	100182	Paclín	LA VIÑA	10	Catamarca	10077
        Localidad simple	-27.826913357423	-65.7401079267206	Paclín	INDEC	10077070000	10077070	Las Lajas	100182	Paclín	LAS LAJAS	10	Catamarca	10077
        Localidad simple	-28.19124607288	-65.670675013192	Paclín	INDEC	10077080000	10077080	Monte Potrero	100182	Paclín	MONTE POTRERO	10	Catamarca	10077
        Localidad simple	-28.3360934480518	-65.6274299147885	Paclín	INDEC	10077090000	10077090	Palo Labrado	100182	Paclín	PALO LABRADO	10	Catamarca	10077
        Localidad simple	-28.0073083693979	-65.726850392729	Paclín	INDEC	10077100000	10077100	San Antonio	100182	Paclín	SAN ANTONIO	10	Catamarca	10077
        Localidad simple	-27.87835755933	-65.7190758944755	Paclín	INDEC	10077110000	10077110	Villa de Balcozna	100182	Paclín	VILLA DE BALCOZNA	10	Catamarca	10077
        Localidad simple	-28.3006337911705	-66.1659791753183	Pomán	INDEC	10084010000	10084010	Apoyaco	100185	Mutquín	APOYACO	10	Catamarca	10084
        Localidad simple	-28.3432877302321	-66.1222559102194	Pomán	INDEC	10084020000	10084020	Colana	100185	Mutquín	COLANA	10	Catamarca	10084
        Localidad simple	-28.0606503909839	-66.2065039006705	Pomán	INDEC	10084030000	10084030	Colpes	100196	Saujil	COLPES	10	Catamarca	10084
        Localidad simple	-28.3773148491306	-66.3017092655099	Pomán	INDEC	10084040000	10084040	El Pajonal	100189	Pomán	EL PAJONAL	10	Catamarca	10084
        Localidad simple	-28.0731019653889	-66.1435569766782	Pomán	INDEC	10084050000	10084050	Joyango	100196	Saujil	JOYANGO	10	Catamarca	10084
        Localidad simple	-28.3178455729042	-66.1420642866296	Pomán	INDEC	10084060000	10084060	Mutquin	100185	Mutquín	MUTQUIN	10	Catamarca	10084
        Localidad simple	-28.3927801149204	-66.2220823999264	Pomán	INDEC	10084070000	10084070	Pomán	100189	Pomán	POMAN	10	Catamarca	10084
        Localidad simple	-28.2022631098292	-66.148799132888	Pomán	INDEC	10084080000	10084080	Rincón	100196	Saujil	RINCON	10	Catamarca	10084
        Localidad simple	-28.1297413013666	-66.2019565174868	Pomán	INDEC	10084090000	10084090	San Miguel	100196	Saujil	SAN MIGUEL	10	Catamarca	10084
        Localidad simple	-28.173337080009	-66.2145148644181	Pomán	INDEC	10084100000	10084100	Saujil	100196	Saujil	SAUJIL	10	Catamarca	10084
        Localidad simple	-28.2623558875079	-66.2209299175292	Pomán	INDEC	10084110000	10084110	Siján	100196	Saujil	SIJAN	10	Catamarca	10084
        Localidad simple	-26.8479427341705	-66.0244068592756	Santa María	INDEC	10091010000	10091010	Andalhualá	100203	San José	ANDALHUALA	10	Catamarca	10091
        Localidad simple	-26.6859290047178	-65.970794986953	Santa María	INDEC	10091020000	10091020	Caspichango	100210	Santa María	CASPICHANGO	10	Catamarca	10091
        Entidad	-26.7588342868363	-66.0493067195716	Santa María	INDEC	10091030001	10091030	Chañar Punco	100203	San José	CHAÑAR PUNCO	10	Catamarca	10091
        Entidad	-26.7265981975072	-66.0436979128184	Santa María	INDEC	10091030002	10091030	Chañar Punco	100210	Santa María	LAMPACITO	10	Catamarca	10091
        Entidad	-26.7588342868363	-66.0493067195716	Santa María	INDEC	10091030003	10091030	Chañar Punco	100203	San José	MEDANITOS	10	Catamarca	10091
        Localidad simple	-26.3955476915097	-66.2641930164042	Santa María	INDEC	10091040000	10091040	El Cajón	100210	Santa María	EL CAJON	10	Catamarca	10091
        Localidad simple	-26.9077168676094	-66.020423153794	Santa María	INDEC	10091050000	10091050	El Desmonte	100203	San José	EL DESMONTE	10	Catamarca	10091
        Localidad simple	-26.6307679478768	-66.0140418967533	Santa María	INDEC	10091060000	10091060	El Puesto	100210	Santa María	EL PUESTO	10	Catamarca	10091
        Entidad	-26.8101195558413	-66.0595221384282	Santa María	INDEC	10091070001	10091070	Famatanca	100203	San José	FAMATANCA	10	Catamarca	10091
        Entidad	-26.8101195558413	-66.0595221384282	Santa María	INDEC	10091070002	10091070	Famatanca	100203	San José	SAN JOSE BANDA	10	Catamarca	10091
        Localidad simple	-26.6304336405934	-66.0644373734469	Santa María	INDEC	10091080000	10091080	Fuerte Quemado	100210	Santa María	FUERTE QUEMADO	10	Catamarca	10091
        Localidad simple	-26.5189083514476	-66.3686109740362	Santa María	INDEC	10091090000	10091090	La Hoyada	100203	San José	LA HOYADA	10	Catamarca	10091
        Componente de localidad compuesta	-26.7574990827117	-66.0331064865258	Santa María	INDEC	10091100000	10091100	La Loma	100203	San José	LA LOMA	10	Catamarca	10091
        Entidad	-26.6988604981977	-66.0387334407325	Santa María	INDEC	10091110001	10091110	Las Mojarras	100210	Santa María	EL CERRITO	10	Catamarca	10091
        Entidad	-26.6988604981977	-66.0387334407325	Santa María	INDEC	10091110002	10091110	Las Mojarras	100210	Santa María	LAS MOJARRAS	10	Catamarca	10091
        Componente de localidad compuesta	-26.7361383729613	-66.0217845814201	Santa María	INDEC	10091120000	10091120	Loro Huasi	100210	Santa María	LORO HUASI	10	Catamarca	10091
        Localidad simple	-26.9300943985158	-66.1487294264287	Santa María	INDEC	10091130000	10091130	Punta de Balasto	100203	San José	PUNTA DE BALASTO	10	Catamarca	10091
        Entidad	-26.8274550484771	-66.0506274507575	Santa María	INDEC	10091140001	10091140	San José	100203	San José	CASA DE PIEDRA	10	Catamarca	10091
        Entidad	-26.8274550484771	-66.0506274507575	Santa María	INDEC	10091140002	10091140	San José	100203	San José	LA PUNTILLA	10	Catamarca	10091
        Entidad	-26.8274550484771	-66.0506274507575	Santa María	INDEC	10091140003	10091140	San José	100203	San José	PALO SECO	10	Catamarca	10091
        Entidad	-26.7745985033315	-66.0362576892132	Santa María	INDEC	10091140004	10091140	San José	100203	San José	SAN JOSE NORTE	10	Catamarca	10091
        Entidad	-26.7919331343022	-66.0378776334838	Santa María	INDEC	10091140005	10091140	San José	100203	San José	SAN JOSE VILLA	10	Catamarca	10091
        Localidad simple	-26.6891167120231	-66.018884441311	Santa María	INDEC	10091150000	10091150	Santa María	100210	Santa María	SANTA MARIA	10	Catamarca	10091
        Localidad simple	-26.8289862929732	-66.0179166770413	Santa María	INDEC	10091160000	10091160	Yapes	100203	San José	YAPES	10	Catamarca	10091
        Localidad simple	-28.1771812692249	-65.4915924205872	Santa Rosa	INDEC	10098010000	10098010	Alijilán	100213	Los Altos	ALIJILAN	10	Catamarca	10098
        Localidad simple	-28.1034003361447	-65.3076846046355	Santa Rosa	INDEC	10098020000	10098020	Bañado de Ovanta	100217	Santa Rosa	BAÑADO DE OVANTA	10	Catamarca	10098
        Localidad simple	-28.2098696025062	-65.2230167049514	Santa Rosa	INDEC	10098030000	10098030	Las Cañas	100217	Santa Rosa	LAS CAÑAS	10	Catamarca	10098
        Componente de localidad compuesta	-28.1946338127178	-65.1137806266473	Santa Rosa	INDEC	10098040000	10098040	Lavalle	100217	Santa Rosa	LAVALLE	10	Catamarca	10098
        Localidad simple	-28.0488590493489	-65.4973640431533	Santa Rosa	INDEC	10098050000	10098050	Los Altos	100213	Los Altos	LOS ALTOS	10	Catamarca	10098
        Localidad simple	-28.1469656455994	-65.5073235747446	Santa Rosa	INDEC	10098060000	10098060	Manantiales	100213	Los Altos	MANANTIALES	10	Catamarca	10098
        Componente de localidad compuesta	-27.9608485883022	-65.1680076958397	Santa Rosa	INDEC	10098070000	10098070	San Pedro	100217	Santa Rosa	SAN PEDRO	10	Catamarca	10098
        Localidad simple	-27.9001528461069	-67.6142838741591	Tinogasta	INDEC	10105010000	10105010	Anillaco	100231	Tinogasta	ANILLACO	10	Catamarca	10105
        Localidad simple	-27.231445564254	-67.6080549409746	Tinogasta	INDEC	10105020000	10105020	Antinaco	100224	Fiambalá	ANTINACO	10	Catamarca	10105
        Localidad simple	-28.0687850626962	-67.50770242056	Tinogasta	INDEC	10105030000	10105030	Banda de Lucero	100231	Tinogasta	BANDA DE LUCERO	10	Catamarca	10105
        Localidad simple	-28.2432405441597	-67.144273179127	Tinogasta	INDEC	10105040000	10105040	Cerro Negro	100231	Tinogasta	CERRO NEGRO	10	Catamarca	10105
        Entidad	-28.1243914662106	-67.4981013989976	Tinogasta	INDEC	10105050001	10105050	Copacabana	100231	Tinogasta	COPACABANA	10	Catamarca	10105
        Entidad	-28.1243914662106	-67.4981013989976	Tinogasta	INDEC	10105050002	10105050	Copacabana	100231	Tinogasta	LA PUNTILLA	10	Catamarca	10105
        Localidad simple	-28.2979798704965	-67.1670904449903	Tinogasta	INDEC	10105060000	10105060	Cordobita	100231	Tinogasta	CORDOBITA	10	Catamarca	10105
        Localidad simple	-28.294959923009	-67.702902490024	Tinogasta	INDEC	10105070000	10105070	Costa de Reyes	100231	Tinogasta	COSTA DE REYES	10	Catamarca	10105
        Localidad simple	-28.2888183254668	-67.1234522983543	Tinogasta	INDEC	10105080000	10105080	El Pueblito	100231	Tinogasta	EL PUEBLITO	10	Catamarca	10105
        Localidad simple	-27.9267621470675	-67.6304002049274	Tinogasta	INDEC	10105090000	10105090	El Puesto	100231	Tinogasta	EL PUESTO	10	Catamarca	10105
        Localidad simple	-28.3120206339513	-67.250879321266	Tinogasta	INDEC	10105100000	10105100	El Salado	100231	Tinogasta	EL SALADO	10	Catamarca	10105
        Entidad	-27.69316213413	-67.608574901701	Tinogasta	INDEC	10105110001	10105110	Fiambalá	100224	Fiambalá	FIAMBALA	10	Catamarca	10105
        Entidad	-27.6442427673373	-67.6139458012753	Tinogasta	INDEC	10105110002	10105110	Fiambalá	100224	Fiambalá	LA RAMADITA	10	Catamarca	10105
        Entidad	-27.6354340349652	-67.6168389660358	Tinogasta	INDEC	10105110003	10105110	Fiambalá	100224	Fiambalá	PAMPA BLANCA	10	Catamarca	10105
        Localidad simple	-28.2769854029709	-67.1074444099184	Tinogasta	INDEC	10105120000	10105120	Los Balverdis	100231	Tinogasta	LOS BALVERDIS	10	Catamarca	10105
        Localidad simple	-27.5239130706008	-67.5891477326484	Tinogasta	INDEC	10105130000	10105130	Medanitos	100224	Fiambalá	MEDANITOS	10	Catamarca	10105
        Localidad simple	-27.3395852802531	-67.7592295432626	Tinogasta	INDEC	10105140000	10105140	Palo Blanco	100224	Fiambalá	PALO BLANCO	10	Catamarca	10105
        Localidad simple	-27.2106668219369	-67.7317928557182	Tinogasta	INDEC	10105150000	10105150	Punta del Agua	100224	Fiambalá	PUNTA DEL AGUA	10	Catamarca	10105
        Localidad simple	-27.5632127581426	-67.6355130611556	Tinogasta	INDEC	10105160000	10105160	Saujil	100224	Fiambalá	SAUJIL	10	Catamarca	10105
        Localidad simple	-27.3270122428844	-67.4747701838904	Tinogasta	INDEC	10105170000	10105170	Tatón	100224	Fiambalá	TATON	10	Catamarca	10105
        Localidad simple	-28.0637510698675	-67.5802695760226	Tinogasta	INDEC	10105180000	10105180	Tinogasta	100231	Tinogasta	TINOGASTA	10	Catamarca	10105
        Localidad simple	-28.4818680419511	-65.6351326652418	Valle Viejo	INDEC	10112010000	10112010	El Portezuelo	100238	Valle Viejo	EL PORTEZUELO	10	Catamarca	10112
        Localidad simple	-28.5334483576648	-65.6821279512165	Valle Viejo	INDEC	10112020000	10112020	Huaycama	100238	Valle Viejo	HUAYCAMA	10	Catamarca	10112
        Localidad simple	-28.6468889609952	-65.7889935499028	Valle Viejo	INDEC	10112030000	10112030	Las Tejas	100238	Valle Viejo	LAS TEJAS	10	Catamarca	10112
        Entidad	-28.4594352492075	-65.7113717209433	Valle Viejo	INDEC	10112040001	10112040	San Isidro	100238	Valle Viejo	EL BAÑADO	10	Catamarca	10112
        Entidad	-28.4333815878035	-65.7202973350365	Valle Viejo	INDEC	10112040002	10112040	San Isidro	100238	Valle Viejo	POLCOS	10	Catamarca	10112
        Entidad	-28.4689789857859	-65.7195047318519	Valle Viejo	INDEC	10112040003	10112040	San Isidro	100238	Valle Viejo	POZO DEL MISTOL	10	Catamarca	10112
        Entidad	-28.4583109666735	-65.726757673457	Valle Viejo	INDEC	10112040004	10112040	San Isidro	100238	Valle Viejo	SAN ISIDRO	10	Catamarca	10112
        Entidad	-28.447802287271	-65.7055328995515	Valle Viejo	INDEC	10112040005	10112040	San Isidro	100238	Valle Viejo	SANTA ROSA	10	Catamarca	10112
        Entidad	-28.4746455518307	-65.7433480027028	Valle Viejo	INDEC	10112040006	10112040	San Isidro	100238	Valle Viejo	SUMALAO	10	Catamarca	10112
        Entidad	-28.4434739220039	-65.7215360640125	Valle Viejo	INDEC	10112040007	10112040	San Isidro	100238	Valle Viejo	VILLA DOLORES	10	Catamarca	10112
        Localidad simple	-28.4928946549812	-65.6744465587279	Valle Viejo	INDEC	10112050000	10112050	Santa Cruz	100238	Valle Viejo	SANTA CRUZ	10	Catamarca	10112
        Localidad simple	-32.1759165218621	-64.5765483175138	Calamuchita	INDEC	14007010000	14007010	Amboy	142007	Amboy	AMBOY	14	Córdoba	14007
        Componente de localidad compuesta	-32.26205146004	-64.5937253212731	Calamuchita	INDEC	14007020000	14007020	Arroyo San Antonio			ARROYO SAN ANTONIO	14	Córdoba	14007
        Localidad simple	-32.3679991604313	-64.6425223427633	Calamuchita	INDEC	14007030000	14007030	Cañada del Sauce	142021	Cañada del Sauce	CAÑADA DEL SAUCE	14	Córdoba	14007
        Localidad simple	-31.942027416529	-64.6165406145348	Calamuchita	INDEC	14007040000	14007040	Capilla Vieja	140049	Villa General Belgrano	CAPILLA VIEJA	14	Córdoba	14007
        Localidad simple	-32.149759071844	-64.5015914694579	Calamuchita	INDEC	14007050000	14007050	El Corcovado - El Torreón	140063	Villa Rumipal	EL CORCOVADO - EL TORREON	14	Córdoba	14007
        Localidad simple	-32.1695656120552	-64.7747710529989	Calamuchita	INDEC	14007055000	14007055	El Durazno	140070	Villa Yacanto	EL DURAZNO	14	Córdoba	14007
        Localidad simple	-32.2065076875762	-64.4006226825819	Calamuchita	INDEC	14007060000	14007060	Embalse	140007	Embalse	EMBALSE	14	Córdoba	14007
        Localidad simple	-32.3034055718452	-64.4831089740345	Calamuchita	INDEC	14007070000	14007070	La Cruz	140014	La Cruz	LA CRUZ	14	Córdoba	14007
        Localidad simple	-31.8969643877578	-64.7751589433589	Calamuchita	INDEC	14007080000	14007080	La Cumbrecita	143015	La Cumbrecita	LA CUMBRECITA	14	Córdoba	14007
        Localidad simple	-32.0954063583092	-64.3310535546374	Calamuchita	INDEC	14007090000	14007090	Las Bajadas	142028	Las Bajadas	LAS BAJADAS	14	Córdoba	14007
        Localidad simple	-32.3893612457104	-64.5185923418535	Calamuchita	INDEC	14007100000	14007100	Las Caleras	142035	Las Caleras	LAS CALERAS	14	Córdoba	14007
        Localidad simple	-32.3211277679392	-64.2810080327514	Calamuchita	INDEC	14007110000	14007110	Los Cóndores	140021	Los Cóndores	LOS CONDORES	14	Córdoba	14007
        Localidad simple con entidad	-31.8568223164309	-64.3779521586489	Calamuchita	INDEC	14007120000	14007120	Los Molinos	142042	Los Molinos	LOS MOLINOS	14	Córdoba	14007
        Entidad	-31.8582901636165	-64.3750577906576	Calamuchita	INDEC	14007120001	14007120	Los Molinos	142042	Los Molinos	LOS MOLINOS	14	Córdoba	14007
        Entidad	-31.8582901636165	-64.3750577906576	Calamuchita	INDEC	14007120002	14007120	Los Molinos	142042	Los Molinos	VILLA SAN MIGUEL	14	Córdoba	14007
        Componente de localidad compuesta	-31.919856077953	-64.5755037073336	Calamuchita	INDEC	14007130000	14007130	Los Reartes	142049	Los Reartes	LOS REARTES	14	Córdoba	14007
        Localidad simple	-32.2989441032587	-64.7254379234594	Calamuchita	INDEC	14007140000	14007140	Lutti	142056	Lutti	LUTTI	14	Córdoba	14007
        Localidad simple	-32.0237443074993	-64.4641636844138	Calamuchita	INDEC	14007160000	14007160	Parque Calmayo	142014	Calmayo	PARQUE CALMAYO	14	Córdoba	14007
        Localidad simple	-32.5265595269976	-64.5869530802431	Calamuchita	INDEC	14007170000	14007170	Río de los Sauces	140028	Río de los Sauces	RIO DE LOS SAUCES	14	Córdoba	14007
        Localidad simple	-31.9763155149128	-64.3733067164283	Calamuchita	INDEC	14007180000	14007180	San Agustín	140056	San Agustín	SAN AGUSTIN	14	Córdoba	14007
        Localidad simple	-32.1667856733263	-64.516397206098	Calamuchita	INDEC	14007190000	14007190	San Ignacio (Loteo San Javier)	142063	San Ignacio	SAN IGNACIO (LOTEO SAN JAVIER)	14	Córdoba	14007
        Localidad simple con entidad	-32.0700578177618	-64.537633731877	Calamuchita	INDEC	14007210000	14007210	Santa Rosa de Calamuchita	140035	Santa Rosa de Calamuchita	SANTA ROSA DE CALAMUCHITA	14	Córdoba	14007
        Entidad	-32.0665951444652	-64.5791018557419	Calamuchita	INDEC	14007210001	14007210	Santa Rosa de Calamuchita	140035	Santa Rosa de Calamuchita	SANTA MONICA	14	Córdoba	14007
        Entidad	-32.0731573746398	-64.5447323761644	Calamuchita	INDEC	14007210002	14007210	Santa Rosa de Calamuchita	140035	Santa Rosa de Calamuchita	SANTA ROSA DE CALAMUCHITA	14	Córdoba	14007
        Entidad	-32.0994512671733	-64.5337591760097	Calamuchita	INDEC	14007210003	14007210	Santa Rosa de Calamuchita	140035	Santa Rosa de Calamuchita	SAN IGNACIO (LOTEO VELEZ CRESPO)	14	Córdoba	14007
        Localidad simple	-32.1650425977053	-64.3784225873001	Calamuchita	INDEC	14007220000	14007220	Segunda Usina	142070	Segunda Usina	SEGUNDA USINA	14	Córdoba	14007
        Localidad simple	-31.8262216703829	-64.5197802668561	Calamuchita	INDEC	14007230000	14007230	Solar de los Molinos	142084	Villa Ciudad Parque los Reartes	SOLAR DE LOS MOLINOS	14	Córdoba	14007
        Localidad simple	-31.9532611007669	-64.8132541353652	Calamuchita	INDEC	14007240000	14007240	Villa Alpina			VILLA ALPINA	14	Córdoba	14007
        Localidad simple	-32.1863928332037	-64.570452981186	Calamuchita	INDEC	14007250000	14007250	Villa Amancay	142077	Villa Amancay	VILLA AMANCAY	14	Córdoba	14007
        Localidad simple	-31.9052382568315	-64.7428823583405	Calamuchita	INDEC	14007260000	14007260	Villa Berna	143015	La Cumbrecita	VILLA BERNA	14	Córdoba	14007
        Componente de localidad compuesta con entidad	-31.9118704947274	-64.5279613493097	Calamuchita	INDEC	14007270000	14007270	Villa Ciudad Parque Los Reartes (1a. Sección)	142084	Villa Ciudad Parque los Reartes	VILLA CIUDAD PARQUE LOS REARTES (1a.SECC	14	Córdoba	14007
        Entidad	-31.9091576117526	-64.5456887371347	Calamuchita	INDEC	14007270001	14007270	Villa Ciudad Parque Los Reartes (1a. Sección)	142084	Villa Ciudad Parque los Reartes	VILLA CIUDAD PARQUE LOS REARTES	14	Córdoba	14007
        Entidad	-31.9091576117526	-64.5456887371347	Calamuchita	INDEC	14007270002	14007270	Villa Ciudad Parque Los Reartes (1a. Sección)	142084	Villa Ciudad Parque los Reartes	VILLA CIUDAD PARQUES LOS REARTES (1° SECCION)	14	Córdoba	14007
        Entidad	-31.9091576117526	-64.5456887371347	Calamuchita	INDEC	14007270003	14007270	Villa Ciudad Parque Los Reartes (1a. Sección)	142084	Villa Ciudad Parque los Reartes	VILLA CIUDAD PARQUE LOS REARTES (3° SECCION)	14	Córdoba	14007
        Componente de localidad compuesta	-32.1696837164743	-64.4567952849232	Calamuchita	INDEC	14007290000	14007290	Villa del Dique	140042	Villa del Dique	VILLA DEL DIQUE	14	Córdoba	14007
        Componente de localidad compuesta	-32.2542673612565	-64.5850039184628	Calamuchita	INDEC	14007300000	14007300	Villa El Tala			VILLA EL TALA	14	Córdoba	14007
        Localidad simple	-31.9808236449718	-64.5606191505919	Calamuchita	INDEC	14007310000	14007310	Villa General Belgrano	140049	Villa General Belgrano	VILLA GENERAL BELGRANO	14	Córdoba	14007
        Localidad simple	-32.2667329359208	-64.5204928765463	Calamuchita	INDEC	14007320000	14007320	Villa La Rivera	142091	Villa Quillinzo	VILLA LA RIVERA	14	Córdoba	14007
        Localidad simple	-32.2384365356542	-64.5210498971139	Calamuchita	INDEC	14007330000	14007330	Villa Quillinzo	142091	Villa Quillinzo	VILLA QUILLINZO	14	Córdoba	14007
        Componente de localidad compuesta	-32.1893813417324	-64.4792063354191	Calamuchita	INDEC	14007340000	14007340	Villa Rumipal	140063	Villa Rumipal	VILLA RUMIPAL	14	Córdoba	14007
        Localidad simple	-32.1037825310006	-64.7541028295247	Calamuchita	INDEC	14007360000	14007360	Villa Yacanto	140070	Villa Yacanto	VILLA YACANTO	14	Córdoba	14007
        Componente de localidad compuesta con entidad	-31.4138166206931	-64.1833384346292	Capital	INDEC	14014010000	14014010	Córdoba	140077	Córdoba	CORDOBA	14	Córdoba	14014
        Entidad	-31.3686406343815	-64.0603031964104	Capital	INDEC	14014010001	14014010	Córdoba	140077	Córdoba	JARDIN ARENALES	14	Córdoba	14014
        Entidad	-31.3961494977945	-64.0609143527134	Capital	INDEC	14014010002	14014010	Córdoba	140077	Córdoba	LA FLORESTA	14	Córdoba	14014
        Entidad	-31.4177432635316	-64.189601351685	Capital	INDEC	14014010003	14014010	Córdoba	140077	Córdoba	CORDOBA	14	Córdoba	14014
        Componente de localidad compuesta	-31.058228127494	-64.2955793576311	Colón	INDEC	14021010000	14021010	Agua de Oro	140084	Agua de Oro	AGUA DE ORO	14	Córdoba	14021
        Localidad simple	-30.9594645513035	-64.2754165610863	Colón	INDEC	14021020000	14021020	Ascochinga	140126	La Granja	ASCOCHINGA	14	Córdoba	14021
        Componente de localidad compuesta	-31.1980230004722	-64.2887924252949	Colón	INDEC	14021025000	14021025	Barrio Nuevo Río Ceballos	140147	Río Ceballos	BARRIO NUEVO RIO CEBALLOS	14	Córdoba	14021
        Componente de localidad compuesta	-31.0864140054075	-64.3145341004157	Colón	INDEC	14021030000	14021030	Canteras El Sauce	142105	El Manzano	CANTERAS EL SAUCE	14	Córdoba	14021
        Localidad simple	-31.3429017095306	-64.3992718801553	Colón	INDEC	14021040000	14021040	Casa Bamba	140119	La Calera	CASA BAMBA	14	Córdoba	14021
        Componente de localidad compuesta	-31.0172322466264	-64.066728610829	Colón	INDEC	14021050000	14021050	Colonia Caroya	140091	Colonia Caroya	COLONIA CAROYA	14	Córdoba	14021
        Localidad simple	-31.2357859283773	-64.0672541009396	Colón	INDEC	14021060000	14021060	Colonia Tirolesa	140098	Colonia Tirolesa	COLONIA TIROLESA	14	Córdoba	14021
        Localidad simple	-31.0277849308523	-64.019045653731	Colón	INDEC	14021070000	14021070	Colonia Vicente Agüero	142098	Colonia Vicente Agüero	COLONIA VICENTE AGUERO	14	Córdoba	14021
        Localidad simple	-31.4435294401245	-63.9963793951592	Colón	INDEC	14021075000	14021075	Villa Corazón de María	140133	Malvinas Argentinas	VILLA CORAZON DE MARIA	14	Córdoba	14021
        Localidad simple	-30.9890353478112	-64.3778448899044	Colón	INDEC	14021080000	14021080	Corral Quemado			CORRAL QUEMADO	14	Córdoba	14021
        Localidad simple con entidad	-31.3015080091569	-64.2382229714889	Colón	INDEC	14021090000	14021090	Country San Isidro - Country Chacras de la Villa	140175	Villa Allende	COUNTRY CHACRAS DE LA VILLA - COUNTRY SA	14	Córdoba	14021
        Entidad	-31.2982310728982	-64.2371416516445	Colón	INDEC	14021090001	14021090	Country San Isidro - Country Chacras de la Villa	140175	Villa Allende	COUNTRY CHACRAS DE LA VILLA	14	Córdoba	14021
        Entidad	-31.3055336354525	-64.2480169288216	Colón	INDEC	14021090002	14021090	Country San Isidro - Country Chacras de la Villa	140175	Villa Allende	COUNTRY SAN ISIDRO	14	Córdoba	14021
        Componente de localidad compuesta	-31.0817617139175	-64.2998324164847	Colón	INDEC	14021110000	14021110	El Manzano	142105	El Manzano	EL MANZANO	14	Córdoba	14021
        Localidad simple	-31.2735550500587	-64.0150545730464	Colón	INDEC	14021120000	14021120	Estación Colonia Tirolesa	140098	Colonia Tirolesa	ESTACION COLONIA TIROLESA	14	Córdoba	14021
        Localidad simple	-31.1341189126982	-64.1410056588479	Colón	INDEC	14021130000	14021130	General Paz	142112	Estación General Paz	GENERAL PAZ	14	Córdoba	14021
        Componente de localidad compuesta	-30.9811937384049	-64.095771286873	Colón	INDEC	14021140000	14021140	Jesús María	140112	Jesús María	JESUS MARIA	14	Córdoba	14021
        Componente de localidad compuesta con entidad	-31.3441541784042	-64.3368093736089	Colón	INDEC	14021150000	14021150	La Calera	140119	La Calera	LA CALERA	14	Córdoba	14021
        Entidad	-31.3321162961153	-64.3336598560636	Colón	INDEC	14021150001	14021150	La Calera	140119	La Calera	DUMESNIL	14	Córdoba	14021
        Entidad	-31.3430963762885	-64.3302275470709	Colón	INDEC	14021150002	14021150	La Calera	140119	La Calera	LA CALERA	14	Córdoba	14021
        Entidad	-31.3589143636745	-64.3650932467319	Colón	INDEC	14021150003	14021150	La Calera	140119	La Calera	EL DIQUECITO	14	Córdoba	14021
        Componente de localidad compuesta	-31.0054374122172	-64.2616783510445	Colón	INDEC	14021160000	14021160	La Granja	140126	La Granja	LA GRANJA	14	Córdoba	14021
        Componente de localidad compuesta	-31.3050726647191	-64.2625844071662	Colón	INDEC	14021165000	14021165	La Morada	140175	Villa Allende	LA MORADA	14	Córdoba	14021
        Localidad simple	-31.1419300602666	-64.0402188172603	Colón	INDEC	14021170000	14021170	La Puerta	140098	Colonia Tirolesa	LA PUERTA	14	Córdoba	14021
        Localidad simple	-31.240896079449	-64.2618872007094	Colón	INDEC	14021175000	14021175	Las Corzuelas	140168	Unquillo	LAS CORZUELAS	14	Córdoba	14021
        Localidad simple	-31.0167070305726	-64.225388080483	Colón	INDEC	14021180000	14021180	Los Molles	140126	La Granja	LOS MOLLES	14	Córdoba	14021
        Localidad simple	-31.3677025435362	-64.0503196448495	Colón	INDEC	14021190000	14021190	Malvinas Argentinas	140133	Malvinas Argentinas	MALVINAS ARGENTINAS	14	Córdoba	14021
        Componente de localidad compuesta	-31.2634679794013	-64.3038336466706	Colón	INDEC	14021200000	14021200	Mendiolaza	140140	Mendiolaza	MENDIOLAZA	14	Córdoba	14021
        Localidad simple	-31.3501106609981	-63.9996450992295	Colón	INDEC	14021210000	14021210	Mi Granja	142119	Mi Granja	MI GRANJA	14	Córdoba	14021
        Localidad simple	-31.2146356684786	-64.2768259906649	Colón	INDEC	14021220000	14021220	Pajas Blancas	140147	Río Ceballos	PAJAS BLANCAS	14	Córdoba	14021
        Componente de localidad compuesta	-31.1748535571499	-64.3096761754849	Colón	INDEC	14021230000	14021230	Río Ceballos	140147	Río Ceballos	RIO CEBALLOS	14	Córdoba	14021
        Componente de localidad compuesta	-31.3142696814132	-64.3129043036137	Colón	INDEC	14021240000	14021240	Saldán	140154	Saldán	SALDAN	14	Córdoba	14021
        Componente de localidad compuesta con entidad	-31.1388344121698	-64.2906610433299	Colón	INDEC	14021250000	14021250	Salsipuedes	140161	Salsipuedes	SALSIPUEDES	14	Córdoba	14021
        Entidad	-31.1065564116392	-64.2971945109864	Colón	INDEC	14021250001	14021250	Salsipuedes	140161	Salsipuedes	EL PUEBLITO	14	Córdoba	14021
        Entidad	-31.1349269310989	-64.2873331074367	Colón	INDEC	14021250002	14021250	Salsipuedes	140161	Salsipuedes	SALSIPUEDES	14	Córdoba	14021
        Localidad simple	-31.2593058004875	-64.0753189644633	Colón	INDEC	14021260000	14021260	Santa Elena	140098	Colonia Tirolesa	SANTA ELENA	14	Córdoba	14021
        Localidad simple	-31.1238790204144	-63.8923777817115	Colón	INDEC	14021270000	14021270	Tinoco	142728	Tinoco	TINOCO	14	Córdoba	14021
        Componente de localidad compuesta	-31.2319725034056	-64.3177425598673	Colón	INDEC	14021280000	14021280	Unquillo	140168	Unquillo	UNQUILLO	14	Córdoba	14021
        Componente de localidad compuesta	-31.2922067561376	-64.2950077746202	Colón	INDEC	14021290000	14021290	Villa Allende	140175	Villa Allende	VILLA ALLENDE	14	Córdoba	14021
        Localidad simple	-31.0702139869894	-64.3197333591217	Colón	INDEC	14021300000	14021300	Villa Cerro Azul	142126	Villa Cerro Azul	VILLA CERRO AZUL	14	Córdoba	14021
        Componente de localidad compuesta con entidad	-31.3101307241869	-64.1805270805742	Colón	INDEC	14021310000	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140077	Córdoba	VILLA EL FACHINAL - PARQUE NORTE - GUIÑA	14	Córdoba	14021
        Entidad	-31.3067152892491	-64.1703253616993	Colón	INDEC	14021310001	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	GUIÑAZU NORTE	14	Córdoba	14021
        Entidad	-31.3000754366056	-64.1767428650772	Colón	INDEC	14021310002	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	PARQUE NORTE	14	Córdoba	14021
        Entidad	-31.306907347736	-64.1785314598263	Colón	INDEC	14021310004	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	1 DE AGOSTO	14	Córdoba	14021
        Entidad	-31.3075672143524	-64.1814827461648	Colón	INDEC	14021310005	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	ALMIRANTE BROWN	14	Córdoba	14021
        Entidad	-31.2957196524063	-64.1768685276575	Colón	INDEC	14021310006	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	CIUDAD DE LOS NIÑOS	14	Córdoba	14021
        Entidad	-31.306907347736	-64.1785314598263	Colón	INDEC	14021310007	14021310	Parque Norte - Ciudad de los Niños - Villa Pastora - Almirante Brown - Guiñazú N	140105	Estación Juárez Celman	VILLA PASTORA	14	Córdoba	14021
        Localidad simple con entidad	-31.2742571242585	-64.1641142793009	Colón	INDEC	14021320000	14021320	Villa Los Llanos - Juárez Celman	140105	Estación Juárez Celman	VILLA LOS LLANOS	14	Córdoba	14021
        Entidad	-31.2570227263756	-64.1651661967333	Colón	INDEC	14021320001	14021320	Villa Los Llanos - Juárez Celman	140105	Estación Juárez Celman	JUAREZ CELMAN	14	Córdoba	14021
        Entidad	-31.2757010937435	-64.1626835394284	Colón	INDEC	14021320002	14021320	Villa Los Llanos - Juárez Celman	140105	Estación Juárez Celman	VILLA LOS LLANOS	14	Córdoba	14021
        Localidad simple	-30.5409658147192	-65.0384387721916	Cruz del Eje	INDEC	14028010000	14028010	Alto de los Quebrachos	142133	Alto de los Quebrachos	ALTO DE LOS QUEBRACHOS	14	Córdoba	14028
        Localidad simple	-30.8044357869451	-65.0436620185917	Cruz del Eje	INDEC	14028020000	14028020	Bañado de Soto	142140	Bañado de Soto	BAÑADO DE SOTO	14	Córdoba	14028
        Localidad simple	-30.8666932853441	-64.6829010647536	Cruz del Eje	INDEC	14028030000	14028030	Canteras Quilpo			CANTERAS QUILPO	14	Córdoba	14028
        Localidad simple	-31.0662466251544	-64.9425321672363	Cruz del Eje	INDEC	14028040000	14028040	Cruz de Caña	142147	Cruz de Caña	CRUZ DE CAÑA	14	Córdoba	14028
        Localidad simple	-30.7218592173102	-64.8077377312137	Cruz del Eje	INDEC	14028050000	14028050	Cruz del Eje	140182	Cruz del Eje	CRUZ DEL EJE	14	Córdoba	14028
        Localidad simple	-30.6722100581192	-64.8699070292303	Cruz del Eje	INDEC	14028060000	14028060	El Brete	142154	El Brete	EL BRETE	14	Córdoba	14028
        Localidad simple	-30.7397207125925	-64.6484924752741	Cruz del Eje	INDEC	14028070000	14028070	El Rincón			EL RINCON	14	Córdoba	14028
        Localidad simple	-30.4794131800612	-65.0597627738017	Cruz del Eje	INDEC	14028080000	14028080	Guanaco Muerto	142161	Guanaco Muerto	GUANACO MUERTO	14	Córdoba	14028
        Localidad simple	-30.7628592235779	-64.6459839334075	Cruz del Eje	INDEC	14028090000	14028090	La Banda	140189	San Marcos Sierras	LA BANDA	14	Córdoba	14028
        Localidad simple	-30.4417646532675	-65.4238386532105	Cruz del Eje	INDEC	14028100000	14028100	La Batea			LA BATEA	14	Córdoba	14028
        Localidad simple	-31.0139548417914	-65.1020313666951	Cruz del Eje	INDEC	14028110000	14028110	La Higuera	142175	La Higuera	LA HIGUERA	14	Córdoba	14028
        Localidad simple	-30.9332479488458	-64.7189758691612	Cruz del Eje	INDEC	14028120000	14028120	Las Cañadas			LAS CAÑADAS	14	Córdoba	14028
        Localidad simple	-30.6895900139602	-64.8508831281017	Cruz del Eje	INDEC	14028130000	14028130	Las Playas	142189	Las Playas	LAS PLAYAS	14	Córdoba	14028
        Localidad simple	-30.5724823864554	-64.9410778222467	Cruz del Eje	INDEC	14028140000	14028140	Los Chañaritos	142819	Los Chañaritos	LOS CHAÑARITOS	14	Córdoba	14028
        Localidad simple	-30.6233104657952	-64.9515406139404	Cruz del Eje	INDEC	14028150000	14028150	Media Naranja	142203	Media Naranja	MEDIA NARANJA	14	Córdoba	14028
        Localidad simple	-30.7686835768001	-65.1864700189142	Cruz del Eje	INDEC	14028160000	14028160	Paso Viejo			PASO VIEJO	14	Córdoba	14028
        Localidad simple	-30.7803420622583	-64.6468515131076	Cruz del Eje	INDEC	14028170000	14028170	San Marcos Sierra	140189	San Marcos Sierras	SAN MARCOS SIERRA	14	Córdoba	14028
        Localidad simple	-30.6392026300348	-65.3813009621884	Cruz del Eje	INDEC	14028180000	14028180	Serrezuela	140196	Serrezuela	SERREZUELA	14	Córdoba	14028
        Localidad simple	-30.7485284753417	-65.2375410689391	Cruz del Eje	INDEC	14028190000	14028190	Tuclame	142217	Tuclame	TUCLAME	14	Córdoba	14028
        Localidad simple	-30.852977256889	-64.9924997261449	Cruz del Eje	INDEC	14028200000	14028200	Villa de Soto	140203	Villa de Soto	VILLA DE SOTO	14	Córdoba	14028
        Localidad simple	-34.3760847098309	-64.4945399243505	General Roca	INDEC	14035010000	14035010	Del Campillo	140217	Del Campillo	DEL CAMPILLO	14	Córdoba	14035
        Localidad simple	-34.4964110409998	-64.8094621973323	General Roca	INDEC	14035020000	14035020	Estación Lecueder			ESTACION LECUEDER	14	Córdoba	14035
        Localidad simple	-34.7223142041085	-63.508013061936	General Roca	INDEC	14035030000	14035030	Hipólito Bouchard	140210	Buchardo	HIPOLITO BOUCHARD	14	Córdoba	14035
        Localidad simple	-34.8397251237332	-64.3724876795015	General Roca	INDEC	14035040000	14035040	Huinca Renancó	140224	Huinca Renancó	HUINCA RENANCO	14	Córdoba	14035
        Localidad simple	-34.7911820710534	-63.781208388865	General Roca	INDEC	14035050000	14035050	Italó	140231	Italó	ITALO	14	Córdoba	14035
        Localidad simple	-34.4803867338234	-64.1695033049234	General Roca	INDEC	14035060000	14035060	Mattaldi	140245	Mattaldi	MATTALDI	14	Córdoba	14035
        Localidad simple	-34.4382295005707	-64.3383707319069	General Roca	INDEC	14035070000	14035070	Nicolás Bruzzone	142224	Nicolás Bruzzone	NICOLAS BRUZZONE	14	Córdoba	14035
        Localidad simple	-34.7703021224105	-63.67032307176	General Roca	INDEC	14035080000	14035080	Onagoity	142231	Onagoity	ONAGOITY	14	Córdoba	14035
        Localidad simple	-34.8379291437488	-63.9155804696192	General Roca	INDEC	14035090000	14035090	Pincén	142238	Pincen	PINCEN	14	Córdoba	14035
        Localidad simple	-34.8436937843761	-64.0987740916452	General Roca	INDEC	14035100000	14035100	Ranqueles	142245	Ranqueles	RANQUELES	14	Córdoba	14035
        Localidad simple	-34.514736598064	-63.941510935076	General Roca	INDEC	14035110000	14035110	Santa Magdalena	140238	Jovita	SANTA MAGDALENA	14	Córdoba	14035
        Localidad simple	-34.8371817717375	-64.5833571665395	General Roca	INDEC	14035120000	14035120	Villa Huidobro	140252	Villa Huidobro	VILLA HUIDOBRO	14	Córdoba	14035
        Localidad simple	-34.1216195744231	-64.7240499364674	General Roca	INDEC	14035130000	14035130	Villa Sarmiento	141120	Villa Sarmiento (S. A.)	VILLA SARMIENTO	14	Córdoba	14035
        Localidad simple	-34.3408530354994	-64.917844943457	General Roca	INDEC	14035140000	14035140	Villa Valeria	140259	Villa Valeria	VILLA VALERIA	14	Córdoba	14035
        Localidad simple	-32.2019665986816	-63.1627861860009	General San Martín	INDEC	14042010000	14042010	Arroyo Algodón			ARROYO ALGODON	14	Córdoba	14042
        Localidad simple	-32.4889824965456	-63.4014794487713	General San Martín	INDEC	14042020000	14042020	Arroyo Cabral	140273	Arroyo Cabral	ARROYO CABRAL	14	Córdoba	14042
        Localidad simple	-32.6613825801545	-63.2447973807791	General San Martín	INDEC	14042030000	14042030	Ausonia	140280	Ausonia	AUSONIA	14	Córdoba	14042
        Localidad simple	-33.0772598274988	-63.275435286184	General San Martín	INDEC	14042040000	14042040	Chazón	140287	Chazón	CHAZON	14	Córdoba	14042
        Localidad simple	-32.9405157092885	-63.2472565147	General San Martín	INDEC	14042050000	14042050	Etruria	140294	Etruria	ETRURIA	14	Córdoba	14042
        Localidad simple	-32.8014149822474	-63.2440045658431	General San Martín	INDEC	14042060000	14042060	La Laguna	140301	La Laguna	LA LAGUNA	14	Córdoba	14042
        Localidad simple	-32.6155884790714	-63.4092352057166	General San Martín	INDEC	14042070000	14042070	La Palestina	140308	La Palestina	LA PALESTINA	14	Córdoba	14042
        Localidad simple	-32.099694860079	-63.0325289648087	General San Martín	INDEC	14042080000	14042080	La Playosa	140315	La Playosa	LA PLAYOSA	14	Córdoba	14042
        Localidad simple	-32.3029687109385	-63.2328555816575	General San Martín	INDEC	14042090000	14042090	Las Mojarras			LAS MOJARRAS	14	Córdoba	14042
        Localidad simple	-32.5401979602741	-63.4762536378135	General San Martín	INDEC	14042100000	14042100	Luca	140322	Luca	LUCA	14	Córdoba	14042
        Localidad simple	-32.7470044961114	-63.3411254262064	General San Martín	INDEC	14042110000	14042110	Pasco	140329	Pasco	PASCO	14	Córdoba	14042
        Localidad simple	-32.527560043626	-63.2479616144958	General San Martín	INDEC	14042120000	14042120	Sanabria	140280	Ausonia	SANABRIA	14	Córdoba	14042
        Localidad simple	-32.2506338091324	-62.931650118919	General San Martín	INDEC	14042130000	14042130	Silvio Pellico	140336	Silvio Pellico	SILVIO PELLICO	14	Córdoba	14042
        Localidad simple	-32.6919271380136	-63.4353044375428	General San Martín	INDEC	14042140000	14042140	Ticino	140343	Ticino	TICINO	14	Córdoba	14042
        Localidad simple	-32.2863739057236	-63.3540179546817	General San Martín	INDEC	14042150000	14042150	Tío Pujio	140350	Tío Pujio	TIO PUJIO	14	Córdoba	14042
        Localidad simple	-32.4342175966013	-63.1844586471364	General San Martín	INDEC	14042160000	14042160	Villa Albertina	140357	Villa María	VILLA ALBERTINA	14	Córdoba	14042
        Componente de localidad compuesta	-32.4120836110321	-63.2499951238659	General San Martín	INDEC	14042170000	14042170	Villa María	140357	Villa María	VILLA MARIA	14	Córdoba	14042
        Componente de localidad compuesta	-32.4288251783807	-63.249359249877	General San Martín	INDEC	14042180000	14042180	Villa Nueva	140364	Villa Nueva	VILLA NUEVA	14	Córdoba	14042
        Localidad simple	-32.4343319670367	-63.2875591644345	General San Martín	INDEC	14042190000	14042190	Villa Oeste	140364	Villa Nueva	VILLA OESTE	14	Córdoba	14042
        Localidad simple	-30.5946762022718	-64.2078393373412	Ischilín	INDEC	14049010000	14049010	Avellaneda	142259	Avellaneda	AVELLANEDA	14	Córdoba	14049
        Localidad simple	-30.7759183214925	-64.2182971976615	Ischilín	INDEC	14049020000	14049020	Cañada de Río Pinto	142266	Cañada de Río Pinto	CAÑADA DE RIO PINTO	14	Córdoba	14049
        Localidad simple	-30.4687274606224	-64.6712287665168	Ischilín	INDEC	14049030000	14049030	Chuña	142273	Chuña	CHUÑA	14	Córdoba	14049
        Localidad simple	-30.6113486219317	-64.5555688574614	Ischilín	INDEC	14049040000	14049040	Copacabana			COPACABANA	14	Córdoba	14049
        Localidad simple	-30.4229409365773	-64.3516697664768	Ischilín	INDEC	14049050000	14049050	Deán Funes	140371	Deán Funes	DEAN FUNES	14	Córdoba	14049
        Localidad simple	-30.6016118281727	-64.9074033309966	Ischilín	INDEC	14049060000	14049060	Esquina del Alambre	142294	Olivares de San Nicolás	ESQUINA DEL ALAMBRE	14	Córdoba	14049
        Localidad simple	-30.5154516695053	-64.2664449882016	Ischilín	INDEC	14049080000	14049080	Los Pozos	142287	Los Pozos	LOS POZOS	14	Córdoba	14049
        Localidad simple	-30.6020503748658	-64.8433653744314	Ischilín	INDEC	14049090000	14049090	Olivares de San Nicolás	142294	Olivares de San Nicolás	OLIVARES DE SAN NICOLAS	14	Córdoba	14049
        Localidad simple	-30.2159552214688	-64.5029777045333	Ischilín	INDEC	14049100000	14049100	Quilino	140378	Quilino	QUILINO	14	Córdoba	14049
        Localidad simple	-30.4541583004868	-64.4475688737827	Ischilín	INDEC	14049110000	14049110	San Pedro de Toyos			SAN PEDRO DE TOYOS	14	Córdoba	14049
        Localidad simple	-30.6569511707803	-64.18195908099	Ischilín	INDEC	14049120000	14049120	Villa Gutiérrez			VILLA GUTIERREZ	14	Córdoba	14049
        Localidad simple	-30.2101157475483	-64.4775674155262	Ischilín	INDEC	14049130000	14049130	Villa Quilino	140378	Quilino	VILLA QUILINO	14	Córdoba	14049
        Localidad simple	-33.3564514451723	-63.7205503922441	Juárez Celman	INDEC	14056010000	14056010	Alejandro Roca	140385	Alejandro Roca	ALEJANDRO ROCA	14	Córdoba	14056
        Localidad simple	-33.6332962011646	-63.2259060913548	Juárez Celman	INDEC	14056020000	14056020	Assunta	142308	Assunta	ASSUNTA	14	Córdoba	14056
        Localidad simple	-33.0274173144801	-63.6719277875696	Juárez Celman	INDEC	14056030000	14056030	Bengolea	140392	Bengolea	BENGOLEA	14	Córdoba	14056
        Localidad simple	-32.9153142058652	-64.0256580552867	Juárez Celman	INDEC	14056040000	14056040	Carnerillo	140399	Carnerillo	CARNERILLO	14	Córdoba	14056
        Localidad simple	-33.0241677315378	-64.0458262411649	Juárez Celman	INDEC	14056050000	14056050	Charras	140406	Charras	CHARRAS	14	Córdoba	14056
        Localidad simple	-33.6644787319553	-63.5392368036406	Juárez Celman	INDEC	14056060000	14056060	El Rastreador	142315	El Rastreador	EL RASTREADOR	14	Córdoba	14056
        Localidad simple	-32.8118910840567	-63.8736965709556	Juárez Celman	INDEC	14056070000	14056070	General Cabrera	140413	General Cabrera	GENERAL CABRERA	14	Córdoba	14056
        Localidad simple	-32.7549291159098	-63.7850383518255	Juárez Celman	INDEC	14056080000	14056080	General Deheza	140420	General Deheza	GENERAL DEHEZA	14	Córdoba	14056
        Localidad simple	-33.6655227252595	-63.6372618363763	Juárez Celman	INDEC	14056090000	14056090	Huanchillas	140427	Huanchilla	HUANCHILLAS	14	Córdoba	14056
        Localidad simple	-33.4201679372505	-63.2969802619056	Juárez Celman	INDEC	14056100000	14056100	La Carlota	140434	La Carlota	LA CARLOTA	14	Córdoba	14056
        Localidad simple	-33.400060095449	-63.4716515559202	Juárez Celman	INDEC	14056110000	14056110	Los Cisnes	140441	Los Cisnes	LOS CISNES	14	Córdoba	14056
        Localidad simple	-33.0434821211836	-63.9085957407616	Juárez Celman	INDEC	14056120000	14056120	Olaeta	140448	Olaeta	OLAETA	14	Córdoba	14056
        Localidad simple	-33.7600575092431	-63.4898589767857	Juárez Celman	INDEC	14056130000	14056130	Pacheco de Melo	142322	Pacheco de Melo	PACHECO DE MELO	14	Córdoba	14056
        Componente de localidad compuesta	-33.1704554487519	-64.0478670082552	Juárez Celman	INDEC	14056140000	14056140	Paso del Durazno	142329	Paso del Durazno	PASO DEL DURAZNO	14	Córdoba	14056
        Localidad simple	-33.1767529632621	-63.2820358699256	Juárez Celman	INDEC	14056150000	14056150	Santa Eufemia	140462	Santa Eufemia	SANTA EUFEMIA	14	Córdoba	14056
        Localidad simple	-33.0334392795817	-63.5082571588932	Juárez Celman	INDEC	14056160000	14056160	Ucacha	140469	Ucacha	UCACHA	14	Córdoba	14056
        Localidad simple	-33.2014556304775	-63.8622207209792	Juárez Celman	INDEC	14056170000	14056170	Villa Reducción	140455	Reducción	VILLA REDUCCION	14	Córdoba	14056
        Localidad simple	-33.6076125942499	-62.6261405718946	Marcos Juárez	INDEC	14063010000	14063010	Alejo Ledesma	140476	Alejo Ledesma	ALEJO LEDESMA	14	Córdoba	14063
        Localidad simple	-33.6411632781096	-62.402789011452	Marcos Juárez	INDEC	14063020000	14063020	Arias	140483	Arias	ARIAS	14	Córdoba	14063
        Localidad simple	-33.123740825534	-62.0965954602144	Marcos Juárez	INDEC	14063030000	14063030	Camilo Aldao	140490	Camilo Aldao	CAMILO ALDAO	14	Córdoba	14063
        Localidad simple	-33.247202805036	-62.269738358968	Marcos Juárez	INDEC	14063040000	14063040	Capitán General Bernardo O-Higgins	140497	Capitán General B. O-Higgins	CAPITAN GENERAL BERNARDO O`HIGGINS	14	Córdoba	14063
        Localidad simple	-33.478334898944	-62.3393464555145	Marcos Juárez	INDEC	14063050000	14063050	Cavanagh	140504	Cavanagh	CAVANAGH	14	Córdoba	14063
        Localidad simple	-33.2585411549016	-62.6081628269792	Marcos Juárez	INDEC	14063060000	14063060	Colonia Barge	142336	Colonia Barge	COLONIA BARGE	14	Córdoba	14063
        Localidad simple	-33.3119180942558	-62.1807987939012	Marcos Juárez	INDEC	14063070000	14063070	Colonia Italiana	140511	Colonia Italiana	COLONIA ITALIANA	14	Córdoba	14063
        Localidad simple	-32.8883679292315	-61.9347825911775	Marcos Juárez	INDEC	14063080000	14063080	Colonia Veinticinco			COLONIA VEINTICINCO	14	Córdoba	14063
        Localidad simple	-33.2816219895104	-62.1854508942409	Marcos Juárez	INDEC	14063090000	14063090	Corral de Bustos	140518	Corral de Bustos	CORRAL DE BUSTOS	14	Córdoba	14063
        Localidad simple	-33.0069947278727	-61.8109726038419	Marcos Juárez	INDEC	14063100000	14063100	Cruz Alta	140525	Cruz Alta	CRUZ ALTA	14	Córdoba	14063
        Localidad simple	-33.1220171765357	-62.3037212558104	Marcos Juárez	INDEC	14063110000	14063110	General Baldissera	140532	General Baldissera	GENERAL BALDISSERA	14	Córdoba	14063
        Localidad simple	-32.7305115296671	-61.917138712509	Marcos Juárez	INDEC	14063120000	14063120	General Roca	140539	General Roca	GENERAL ROCA	14	Córdoba	14063
        Localidad simple	-33.4617411292085	-62.4391434502619	Marcos Juárez	INDEC	14063130000	14063130	Guatimozín	140546	Guatimozín	GUATIMOZIN	14	Córdoba	14063
        Localidad simple	-32.9438405235327	-62.2305487525417	Marcos Juárez	INDEC	14063140000	14063140	Inriville	140553	Inriville	INRIVILLE	14	Córdoba	14063
        Localidad simple	-33.2401071501959	-62.404426547367	Marcos Juárez	INDEC	14063150000	14063150	Isla Verde	140560	Isla Verde	ISLA VERDE	14	Córdoba	14063
        Localidad simple	-32.658391411409	-62.299914625293	Marcos Juárez	INDEC	14063160000	14063160	Leones	140567	Leones	LEONES	14	Córdoba	14063
        Localidad simple	-32.9843826304567	-62.0237039883189	Marcos Juárez	INDEC	14063170000	14063170	Los Surgentes	140574	Los Surgentes	LOS SURGENTES	14	Córdoba	14063
        Localidad simple	-32.6913099811557	-62.1057946726991	Marcos Juárez	INDEC	14063180000	14063180	Marcos Juárez	140581	Marcos Juárez	MARCOS JUAREZ	14	Córdoba	14063
        Localidad simple	-32.9175280341379	-62.4576576002351	Marcos Juárez	INDEC	14063190000	14063190	Monte Buey	140588	Monte Buey	MONTE BUEY	14	Córdoba	14063
        Localidad simple	-32.406411636801	-62.1029831790036	Marcos Juárez	INDEC	14063210000	14063210	Saira	140595	Saira	SAIRA	14	Córdoba	14063
        Localidad simple	-32.9331604883654	-62.3428774336317	Marcos Juárez	INDEC	14063220000	14063220	Saladillo	142343	Saladillo	SALADILLO	14	Córdoba	14063
        Localidad simple	-32.7487775757302	-62.3306744044274	Marcos Juárez	INDEC	14063230000	14063230	Villa Elisa			VILLA ELISA	14	Córdoba	14063
        Localidad simple	-31.0381142705456	-65.2775888503175	Minas	INDEC	14070010000	14070010	Ciénaga del Coro	142357	Ciénaga del Coro	CIENAGA DEL CORO	14	Córdoba	14070
        Localidad simple	-30.8017974058313	-65.6440521440399	Minas	INDEC	14070020000	14070020	El Chacho	142364	El Chacho	EL CHACHO	14	Córdoba	14070
        Localidad simple	-31.1242101609074	-65.2269002056273	Minas	INDEC	14070030000	14070030	Estancia de Guadalupe	142371	Estancia de Guadalupe	ESTANCIA DE GUADALUPE	14	Córdoba	14070
        Localidad simple	-31.0975357099584	-65.3281875063158	Minas	INDEC	14070040000	14070040	Guasapampa	142378	Guasapampa	GUASAPAMPA	14	Córdoba	14070
        Localidad simple	-31.0350257440514	-65.3453122247049	Minas	INDEC	14070050000	14070050	La Playa	142385	La Playa	LA PLAYA	14	Córdoba	14070
        Localidad simple	-31.175590415787	-65.1017054267171	Minas	INDEC	14070060000	14070060	San Carlos Minas	140602	San Carlos Minas	SAN CARLOS MINAS	14	Córdoba	14070
        Localidad simple	-31.2496924733149	-65.1672000423356	Minas	INDEC	14070070000	14070070	Talaini	142392	Talaini	TALAINI	14	Córdoba	14070
        Localidad simple	-30.9499425576932	-65.3099277411768	Minas	INDEC	14070080000	14070080	Tosno	142399	Tosno	TOSNO	14	Córdoba	14070
        Localidad simple	-31.4172820195639	-65.4453421341012	Pocho	INDEC	14077010000	14077010	Chancani	142406	Chancaní	CHANCANI	14	Córdoba	14077
        Localidad simple	-31.3800076236386	-65.2899757237495	Pocho	INDEC	14077020000	14077020	Las Palmas			LAS PALMAS	14	Córdoba	14077
        Localidad simple	-31.3754115021879	-65.0386011461094	Pocho	INDEC	14077030000	14077030	Los Talares	142434	Tala Cañada	LOS TALARES	14	Córdoba	14077
        Localidad simple	-31.3151616749444	-65.0910260595287	Pocho	INDEC	14077040000	14077040	Salsacate	140609	Salsacate	SALSACATE	14	Córdoba	14077
        Localidad simple	-31.3409519996631	-64.9131949666644	Pocho	INDEC	14077050000	14077050	San Gerónimo	142427	San Gerónimo	SAN GERONIMO	14	Córdoba	14077
        Localidad simple	-31.3570289681593	-64.9764519289305	Pocho	INDEC	14077060000	14077060	Tala Cañada	142434	Tala Cañada	TALA CAÑADA	14	Córdoba	14077
        Localidad simple	-31.3454000529726	-65.0801168738369	Pocho	INDEC	14077070000	14077070	Taninga	140609	Salsacate	TANINGA	14	Córdoba	14077
        Localidad simple	-31.4880894840309	-65.2830353856188	Pocho	INDEC	14077080000	14077080	Villa de Pocho	142441	Villa de Pocho	VILLA DE POCHO	14	Córdoba	14077
        Localidad simple	-34.0098324798955	-63.9225367502507	Presidente Roque Sáenz Peña	INDEC	14084010000	14084010	General Levalle	140616	General Levalle	GENERAL LEVALLE	14	Córdoba	14084
        Localidad simple	-33.9518611160055	-62.9744894136507	Presidente Roque Sáenz Peña	INDEC	14084020000	14084020	La Cesira	140623	La Cesira	LA CESIRA	14	Córdoba	14084
        Localidad simple	-34.1236122063832	-63.388646306069	Presidente Roque Sáenz Peña	INDEC	14084030000	14084030	Laboulaye	140630	Laboulaye	LABOULAYE	14	Córdoba	14084
        Localidad simple	-34.2040788458157	-62.9768889543714	Presidente Roque Sáenz Peña	INDEC	14084040000	14084040	Leguizamón	142448	Leguizamón	LEGUIZAMON	14	Córdoba	14084
        Localidad simple	-34.3483191246018	-63.4471714447308	Presidente Roque Sáenz Peña	INDEC	14084050000	14084050	Melo	140637	Melo	MELO	14	Córdoba	14084
        Localidad simple	-34.0511211181075	-63.7321532881296	Presidente Roque Sáenz Peña	INDEC	14084060000	14084060	Río Bamba	142455	Río Bamba	RIO BAMBA	14	Córdoba	14084
        Localidad simple	-34.171790725852	-63.1534798469172	Presidente Roque Sáenz Peña	INDEC	14084070000	14084070	Rosales	140644	Rosales	ROSALES	14	Córdoba	14084
        Localidad simple	-34.5106395562101	-63.7132746964365	Presidente Roque Sáenz Peña	INDEC	14084080000	14084080	San Joaquín	142462	San Joaquín	SAN JOAQUIN	14	Córdoba	14084
        Localidad simple	-34.4699818959404	-63.5375595280644	Presidente Roque Sáenz Peña	INDEC	14084090000	14084090	Serrano	140651	Serrano	SERRANO	14	Córdoba	14084
        Localidad simple	-34.297937327836	-63.2685397142969	Presidente Roque Sáenz Peña	INDEC	14084100000	14084100	Villa Rossi	140658	Villa Rossi	VILLA ROSSI	14	Córdoba	14084
        Localidad simple	-30.8375267087623	-64.5367004570805	Punilla	INDEC	14091010000	14091010	Barrio Santa Isabel	140672	Capilla del Monte	BARRIO SANTA ISABEL	14	Córdoba	14091
        Componente de localidad compuesta con entidad	-31.3123081567618	-64.4629696370028	Punilla	INDEC	14091020000	14091020	Bialet Massé	140665	Bialet Massé	BIALET MASSE	14	Córdoba	14091
        Entidad	-31.3214285741587	-64.4818703245544	Punilla	INDEC	14091020001	14091020	Bialet Massé	140665	Bialet Massé	BIALET MASSE	14	Córdoba	14091
        Entidad	-31.3266874438793	-64.4544689502096	Punilla	INDEC	14091020002	14091020	Bialet Massé	140665	Bialet Massé	SAN ROQUE DEL LAGO	14	Córdoba	14091
        Localidad simple	-31.3931049014855	-64.5635652642982	Punilla	INDEC	14091030000	14091030	Cabalango	142469	Cabalango	CABALANGO	14	Córdoba	14091
        Localidad simple	-30.8563966713395	-64.526268881497	Punilla	INDEC	14091040000	14091040	Capilla del Monte	140672	Capilla del Monte	CAPILLA DEL MONTE	14	Córdoba	14091
        Componente de localidad compuesta	-31.1697129911083	-64.4776214321437	Punilla	INDEC	14091050000	14091050	Casa Grande	142476	Casa Grande	CASA GRANDE	14	Córdoba	14091
        Localidad simple	-30.7720869099195	-64.5441595530858	Punilla	INDEC	14091060000	14091060	Charbonier	142483	Charbonier	CHARBONIER	14	Córdoba	14091
        Componente de localidad compuesta	-31.240571224569	-64.4655312574209	Punilla	INDEC	14091070000	14091070	Cosquín	140679	Cosquín	COSQUIN	14	Córdoba	14091
        Componente de localidad compuesta	-31.4787781890782	-64.5773466914484	Punilla	INDEC	14091080000	14091080	Cuesta Blanca	142490	Cuesta Blanca	CUESTA BLANCA	14	Córdoba	14091
        Componente de localidad compuesta	-31.3842597063571	-64.517330819559	Punilla	INDEC	14091090000	14091090	Estancia Vieja	142497	Estancia Vieja	ESTANCIA VIEJA	14	Córdoba	14091
        Componente de localidad compuesta	-31.0600927199176	-64.484304266589	Punilla	INDEC	14091100000	14091100	Huerta Grande	140686	Huerta Grande	HUERTA GRANDE	14	Córdoba	14091
        Componente de localidad compuesta	-30.9792461523826	-64.4909087135044	Punilla	INDEC	14091110000	14091110	La Cumbre	140693	La Cumbre	LA CUMBRE	14	Córdoba	14091
        Componente de localidad compuesta	-31.0919649906581	-64.4864417754562	Punilla	INDEC	14091120000	14091120	La Falda	140700	La Falda	LA FALDA	14	Córdoba	14091
        Localidad simple	-31.5182256602189	-64.5345928843013	Punilla	INDEC	14091130000	14091130	Las Jarillas	142511	San Antonio de Arredondo	LAS JARILLAS	14	Córdoba	14091
        Componente de localidad compuesta	-30.9269774865861	-64.5026123921004	Punilla	INDEC	14091140000	14091140	Los Cocos	140707	Los Cocos	LOS COCOS	14	Córdoba	14091
        Localidad simple	-31.2976747453985	-64.5749813483232	Punilla	INDEC	14091150000	14091150	Mallín	140721	Santa María de Punilla	MALLIN	14	Córdoba	14091
        Componente de localidad compuesta	-31.4668646402709	-64.5427634762868	Punilla	INDEC	14091160000	14091160	Mayu Sumaj	142504	Mayu Sumaj	MAYU SUMAJ	14	Córdoba	14091
        Localidad simple	-30.7949898871398	-64.5210978856737	Punilla	INDEC	14091170000	14091170	Quebrada de Luna	140679	Cosquín	QUEBRADA DE LUNA	14	Córdoba	14091
        Componente de localidad compuesta	-31.4782264688487	-64.5289350434399	Punilla	INDEC	14091180000	14091180	San Antonio de Arredondo	142511	San Antonio de Arredondo	SAN ANTONIO DE ARREDONDO	14	Córdoba	14091
        Componente de localidad compuesta	-30.9199784063317	-64.5360036651851	Punilla	INDEC	14091190000	14091190	San Esteban	140714	San Esteban	SAN ESTEBAN	14	Córdoba	14091
        Componente de localidad compuesta	-31.3496904364626	-64.4599293921174	Punilla	INDEC	14091200000	14091200	San Roque	142518	San Roque	SAN ROQUE	14	Córdoba	14091
        Componente de localidad compuesta	-31.2703319860361	-64.4653357678432	Punilla	INDEC	14091210000	14091210	Santa María de Punilla	140721	Santa María de Punilla	SANTA MARIA DE PUNILLA	14	Córdoba	14091
        Componente de localidad compuesta	-31.472446933222	-64.5651507693433	Punilla	INDEC	14091220000	14091220	Tala Huasi	142525	Tala Huasi	TALA HUASI	14	Córdoba	14091
        Componente de localidad compuesta	-31.3549072437345	-64.5909558305817	Punilla	INDEC	14091230000	14091230	Tanti	140728	Tanti	TANTI	14	Córdoba	14091
        Componente de localidad compuesta	-31.1172888298585	-64.484252831532	Punilla	INDEC	14091240000	14091240	Valle Hermoso	140735	Valle Hermoso	VALLE HERMOSO	14	Córdoba	14091
        Componente de localidad compuesta	-31.4182380208919	-64.4933448063141	Punilla	INDEC	14091250000	14091250	Villa Carlos Paz	140742	Villa Carlos Paz	VILLA CARLOS PAZ	14	Córdoba	14091
        Localidad simple	-31.3864690388309	-64.6003659348122	Punilla	INDEC	14091260000	14091260	Villa Flor Serrana	140728	Tanti	VILLA FLOR SERRANA	14	Córdoba	14091
        Componente de localidad compuesta	-31.0362773938945	-64.4928899121054	Punilla	INDEC	14091270000	14091270	Villa Giardino	140749	Villa Giardino	VILLA GIARDINO	14	Córdoba	14091
        Localidad simple	-31.3740257221359	-64.4831122938584	Punilla	INDEC	14091280000	14091280	Villa Lago Azul	142539	Villa Santa Cruz del Lago	VILLA LAGO AZUL	14	Córdoba	14091
        Componente de localidad compuesta	-31.3457170881093	-64.4802571053108	Punilla	INDEC	14091290000	14091290	Villa Parque Siquimán	142532	Villa Parque Siquiman	VILLA PARQUE SIQUIMAN	14	Córdoba	14091
        Componente de localidad compuesta	-31.4791065590312	-64.562747406585	Punilla	INDEC	14091300000	14091300	Villa Río Icho Cruz	142546	Villa Río Icho Cruz	VILLA RIO ICHO CRUZ	14	Córdoba	14091
        Localidad simple	-31.279612799499	-64.5653436907589	Punilla	INDEC	14091310000	14091310	Villa San José	140721	Santa María de Punilla	VILLA SAN JOSE	14	Córdoba	14091
        Componente de localidad compuesta	-31.369322851246	-64.5205370832482	Punilla	INDEC	14091320000	14091320	Villa Santa Cruz del Lago	142539	Villa Santa Cruz del Lago	VILLA SANTA CRUZ DEL LAGO	14	Córdoba	14091
        Localidad simple	-33.1770175916926	-64.9944684969757	Río Cuarto	INDEC	14098010000	14098010	Achiras	140756	Achiras	ACHIRAS	14	Córdoba	14098
        Localidad simple	-33.631620222358	-64.0208372956378	Río Cuarto	INDEC	14098020000	14098020	Adelia María	140763	Adelia María	ADELIA MARIA	14	Córdoba	14098
        Localidad simple	-32.757065291399	-64.3378599293347	Río Cuarto	INDEC	14098030000	14098030	Alcira Gigena	140770	Alcira	ALCIRA	14	Córdoba	14098
        Localidad simple	-32.6904036665231	-64.721171054893	Río Cuarto	INDEC	14098040000	14098040	Alpa Corral	140777	Alpa Corral	ALPA CORRAL	14	Córdoba	14098
        Localidad simple	-32.4528669215341	-64.3854404675021	Río Cuarto	INDEC	14098050000	14098050	Berrotarán	140784	Berrotarán	BERROTARAN	14	Córdoba	14098
        Localidad simple	-33.5032818212674	-64.6755735163666	Río Cuarto	INDEC	14098060000	14098060	Bulnes	140791	Bulnes	BULNES	14	Córdoba	14098
        Localidad simple	-33.5563361347485	-65.0052699166312	Río Cuarto	INDEC	14098070000	14098070	Chaján	140798	Chaján	CHAJAN	14	Córdoba	14098
        Localidad simple	-33.0089546768665	-64.1712493406755	Río Cuarto	INDEC	14098080000	14098080	Chucul	142553	Chucul	CHUCUL	14	Córdoba	14098
        Localidad simple	-32.8495478948519	-64.3598591374051	Río Cuarto	INDEC	14098090000	14098090	Coronel Baigorria	140805	Coronel Baigorria	CORONEL BAIGORRIA	14	Córdoba	14098
        Localidad simple	-33.6230868735031	-64.5971033510391	Río Cuarto	INDEC	14098100000	14098100	Coronel Moldes	140812	Coronel Moldes	CORONEL MOLDES	14	Córdoba	14098
        Localidad simple	-32.5720684109952	-64.3929518423935	Río Cuarto	INDEC	14098110000	14098110	Elena	140819	Elena	ELENA	14	Córdoba	14098
        Localidad simple	-33.1868433713045	-64.7251129655857	Río Cuarto	INDEC	14098120000	14098120	La Carolina	142560	La Carolina El Potosi	LA CAROLINA	14	Córdoba	14098
        Localidad simple	-33.97859138783	-64.0842989461185	Río Cuarto	INDEC	14098130000	14098130	La Cautiva	140826	La Cautiva	LA CAUTIVA	14	Córdoba	14098
        Localidad simple	-33.2082959166527	-64.2584448995097	Río Cuarto	INDEC	14098140000	14098140	La Gilda			LA GILDA	14	Córdoba	14098
        Localidad simple	-33.2822486969948	-63.9758763865889	Río Cuarto	INDEC	14098150000	14098150	Las Acequias	140833	Las Acequias	LAS ACEQUIAS	14	Córdoba	14098
        Localidad simple	-32.8924933762193	-64.8435915248656	Río Cuarto	INDEC	14098160000	14098160	Las Albahacas	142567	Las Albahacas	LAS ALBAHACAS	14	Córdoba	14098
        Componente de localidad compuesta	-33.0892422210207	-64.2868227686533	Río Cuarto	INDEC	14098170000	14098170	Las Higueras	140840	Las Higueras	LAS HIGUERAS	14	Córdoba	14098
        Localidad simple	-32.5348511864127	-64.1052291964295	Río Cuarto	INDEC	14098180000	14098180	Las Peñas	142574	Las Peñas Sud	LAS PEÑAS	14	Córdoba	14098
        Localidad simple	-33.2839463852241	-64.5781462257606	Río Cuarto	INDEC	14098190000	14098190	Las Vertientes	140847	Las Vertientes	LAS VERTIENTES	14	Córdoba	14098
        Localidad simple	-33.4893410861497	-64.4320008051115	Río Cuarto	INDEC	14098200000	14098200	Malena	142581	Malena	MALENA	14	Córdoba	14098
        Localidad simple	-33.636887956776	-63.8900068799972	Río Cuarto	INDEC	14098210000	14098210	Monte de los Gauchos	140854	Monte de los Gauchos	MONTE DE LOS GAUCHOS	14	Córdoba	14098
        Componente de localidad compuesta	-33.170068435327	-64.049630767807	Río Cuarto	INDEC	14098220000	14098220	Paso del Durazno			PASO DEL DURAZNO	14	Córdoba	14098
        Componente de localidad compuesta	-33.1242631220064	-64.3487377033754	Río Cuarto	INDEC	14098230000	14098230	Río Cuarto	140861	Río Cuarto	RIO CUARTO	14	Córdoba	14098
        Localidad simple	-33.3845382952352	-64.7219849539761	Río Cuarto	INDEC	14098240000	14098240	Sampacho	140868	Sampacho	SAMPACHO	14	Córdoba	14098
        Localidad simple	-33.4978542515606	-64.3151828240087	Río Cuarto	INDEC	14098250000	14098250	San Basilio	140875	San Basilio	SAN BASILIO	14	Córdoba	14098
        Localidad simple	-33.2059384521037	-64.4348164483493	Río Cuarto	INDEC	14098260000	14098260	Santa Catalina Holmberg	140882	Santa Catalina	SANTA CATALINA	14	Córdoba	14098
        Localidad simple	-33.4394729739475	-64.8316610855999	Río Cuarto	INDEC	14098270000	14098270	Suco	142588	Suco	SUCO	14	Córdoba	14098
        Localidad simple	-33.8188248224493	-64.4569327410668	Río Cuarto	INDEC	14098280000	14098280	Tosquitas	140889	Tosquita	TOSQUITAS	14	Córdoba	14098
        Localidad simple	-33.917235746816	-64.3902222715013	Río Cuarto	INDEC	14098290000	14098290	Vicuña Mackenna	140896	Vicuña Mackenna	VICUÑA MACKENNA	14	Córdoba	14098
        Localidad simple	-32.893726660666	-64.8675140784316	Río Cuarto	INDEC	14098300000	14098300	Villa El Chacay	142595	Villa el Chacay	VILLA EL CHACAY	14	Córdoba	14098
        Localidad simple	-32.6651066386532	-64.741501810378	Río Cuarto	INDEC	14098310000	14098310	Villa Santa Eugenia	140777	Alpa Corral	VILLA SANTA EUGENIA	14	Córdoba	14098
        Localidad simple	-33.8733676407196	-64.6886182213475	Río Cuarto	INDEC	14098320000	14098320	Washington	142602	Washington	WASHINGTON	14	Córdoba	14098
        Localidad simple	-30.9035316228673	-63.7055651181425	Río Primero	INDEC	14105010000	14105010	Atahona			ATAHONA	14	Córdoba	14105
        Localidad simple	-31.4289242714312	-63.5870264507761	Río Primero	INDEC	14105020000	14105020	Cañada de Machado	142616	Cañada de Machado	CAÑADA DE MACHADO	14	Córdoba	14105
        Localidad simple	-31.4302065756542	-63.8321496909141	Río Primero	INDEC	14105030000	14105030	Capilla de los Remedios	142623	Capilla de los Remedios	CAPILLA DE LOS REMEDIOS	14	Córdoba	14105
        Localidad simple	-30.7545707267715	-63.5682265940856	Río Primero	INDEC	14105040000	14105040	Chalacea			CHALACEA	14	Córdoba	14105
        Localidad simple	-31.1735851610445	-63.3375921895433	Río Primero	INDEC	14105050000	14105050	Colonia Las Cuatro Esquinas			COLONIA LAS CUATRO ESQUINAS	14	Córdoba	14105
        Localidad simple	-31.0286404171341	-63.3402795519709	Río Primero	INDEC	14105060000	14105060	Diego de Rojas	142651	Diego de Rojas	DIEGO DE ROJAS	14	Córdoba	14105
        Localidad simple	-31.1161396833417	-63.6017410478522	Río Primero	INDEC	14105070000	14105070	El Alcalde			EL ALCALDE	14	Córdoba	14105
        Localidad simple	-31.017971601362	-63.6051650588702	Río Primero	INDEC	14105080000	14105080	El Crispín	142658	El Crispín	EL CRISPIN	14	Córdoba	14105
        Localidad simple	-31.0772911263196	-63.7935627786301	Río Primero	INDEC	14105090000	14105090	Esquina	142665	Esquina	ESQUINA	14	Córdoba	14105
        Localidad simple	-31.3701809412977	-63.5326025508152	Río Primero	INDEC	14105100000	14105100	Kilómetro 658	142672	Kilómetro 658	KILOMETRO 658	14	Córdoba	14105
        Localidad simple	-30.8925359716793	-63.0010662681495	Río Primero	INDEC	14105110000	14105110	La Para	140903	La Para	LA PARA	14	Córdoba	14105
        Localidad simple	-30.5653596004713	-63.5163053686029	Río Primero	INDEC	14105120000	14105120	La Posta	142679	La Posta	LA POSTA	14	Córdoba	14105
        Localidad simple	-30.8926051154777	-63.2532712015227	Río Primero	INDEC	14105130000	14105130	La Puerta	140910	La Puerta	LA PUERTA	14	Córdoba	14105
        Localidad simple	-31.0622588456023	-63.1501281830965	Río Primero	INDEC	14105140000	14105140	La Quinta	142686	La Quinta	LA QUINTA	14	Córdoba	14105
        Localidad simple	-31.0882555128663	-63.2418444621471	Río Primero	INDEC	14105150000	14105150	Las Gramillas			LAS GRAMILLAS	14	Córdoba	14105
        Localidad simple	-30.7594681012857	-63.2035027286926	Río Primero	INDEC	14105160000	14105160	Las Saladas	142700	Las Saladas	LAS SALADAS	14	Córdoba	14105
        Localidad simple	-30.9074419738178	-63.532118614378	Río Primero	INDEC	14105170000	14105170	Maquinista Gallini	142707	Maquinista Gallini	MAQUINISTA GALLINI	14	Córdoba	14105
        Localidad simple	-30.9826026339688	-63.6017850424963	Río Primero	INDEC	14105180000	14105180	Monte del Rosario			MONTE DEL ROSARIO	14	Córdoba	14105
        Localidad simple	-31.3438538707604	-63.9457735584091	Río Primero	INDEC	14105190000	14105190	Montecristo	140917	Monte Cristo	MONTECRISTO	14	Córdoba	14105
        Localidad simple	-30.7811924488335	-63.4130494343907	Río Primero	INDEC	14105200000	14105200	Obispo Trejo	140924	Obispo Trejo	OBISPO TREJO	14	Córdoba	14105
        Localidad simple	-31.2995844445842	-63.7591050718367	Río Primero	INDEC	14105210000	14105210	Piquillín	140931	Piquillín	PIQUILLIN	14	Córdoba	14105
        Localidad simple	-30.9780514540426	-63.2596192028417	Río Primero	INDEC	14105220000	14105220	Plaza de Mercedes	142714	Plaza de Mercedes	PLAZA DE MERCEDES	14	Córdoba	14105
        Localidad simple	-31.1685485898925	-63.6075820921855	Río Primero	INDEC	14105230000	14105230	Pueblo Comechingones	142644	Comechingones	PUEBLO COMECHINGONES	14	Córdoba	14105
        Localidad simple	-31.3291838493004	-63.621866727412	Río Primero	INDEC	14105240000	14105240	Río Primero	140938	Río Primero	RIO PRIMERO	14	Córdoba	14105
        Localidad simple	-31.2897282303946	-63.445471703469	Río Primero	INDEC	14105250000	14105250	Sagrada Familia			SAGRADA FAMILIA	14	Córdoba	14105
        Localidad simple	-31.1514772066717	-63.4015912555355	Río Primero	INDEC	14105260000	14105260	Santa Rosa de Río Primero	140945	Santa Rosa de Río Primero	SANTA ROSA DE RIO PRIMERO	14	Córdoba	14105
        Localidad simple	-32.0030492517654	-58.4934832589352	Colón	INDEC	30008070000	30008070	Pueblo Cazes			PUEBLO CAZES	30	Entre Ríos	30008
        Localidad simple	-30.8940088267342	-63.1159181990178	Río Primero	INDEC	14105270000	14105270	Villa Fontana	140952	Villa Fontana	VILLA FONTANA	14	Córdoba	14105
        Localidad simple	-30.0960599330651	-63.9287731727735	Río Seco	INDEC	14112010000	14112010	Cerro Colorado	142735	Cerro Colorado	CERRO COLORADO	14	Córdoba	14112
        Localidad simple	-30.0139606979963	-63.8503752152119	Río Seco	INDEC	14112020000	14112020	Chañar Viejo			CHAÑAR VIEJO	14	Córdoba	14112
        Localidad simple	-29.9247226351086	-63.5889152129175	Río Seco	INDEC	14112030000	14112030	Eufrasio Loza	142749	Eufrasio Loza	EUFRASIO LOZA	14	Córdoba	14112
        Localidad simple	-29.7227092489555	-63.5149951918634	Río Seco	INDEC	14112040000	14112040	Gütemberg	142756	Gütemberg	GUTEMBERG	14	Córdoba	14112
        Localidad simple	-30.1846537889428	-62.8301426342643	Río Seco	INDEC	14112050000	14112050	La Rinconada			LA RINCONADA	14	Córdoba	14112
        Localidad simple	-29.802434071812	-63.6273622842684	Río Seco	INDEC	14112060000	14112060	Los Hoyos	142770	Los Hoyos	LOS HOYOS	14	Córdoba	14112
        Localidad simple	-30.2390823848323	-63.4916854103812	Río Seco	INDEC	14112070000	14112070	Puesto de Castro			PUESTO DE CASTRO	14	Córdoba	14112
        Localidad simple	-30.0742593288829	-63.8249818238142	Río Seco	INDEC	14112080000	14112080	Rayo Cortado	142784	Rayo Cortado	RAYO CORTADO	14	Córdoba	14112
        Localidad simple	-29.698228417088	-63.5610809474438	Río Seco	INDEC	14112090000	14112090	San Pedro de Gütemberg	142756	Gütemberg	SAN PEDRO DE GUTEMBERG	14	Córdoba	14112
        Localidad simple	-30.1174756551011	-63.8438054710488	Río Seco	INDEC	14112100000	14112100	Santa Elena	142791	Santa Elena	SANTA ELENA	14	Córdoba	14112
        Localidad simple	-30.1614462636479	-63.5934503863753	Río Seco	INDEC	14112110000	14112110	Sebastián Elcano	140959	Sebastián Elcano	SEBASTIAN ELCANO	14	Córdoba	14112
        Localidad simple	-29.8162963199276	-63.3548391354924	Río Seco	INDEC	14112120000	14112120	Villa Candelaria	142798	Villa Candelaria Norte	VILLA CANDELARIA NORTE	14	Córdoba	14112
        Localidad simple	-29.9043583402484	-63.722318985926	Río Seco	INDEC	14112130000	14112130	Villa de María	140966	Villa de María	VILLA DE MARIA	14	Córdoba	14112
        Localidad simple	-31.6679359912419	-63.2006870937546	Río Segundo	INDEC	14119010000	14119010	Calchín	140973	Calchín	CALCHIN	14	Córdoba	14119
        Localidad simple	-31.8633868408967	-63.278168375262	Río Segundo	INDEC	14119020000	14119020	Calchín Oeste	140980	Calchín Oeste	CALCHIN OESTE	14	Córdoba	14119
        Localidad simple	-31.5081678166164	-63.3421354529106	Río Segundo	INDEC	14119030000	14119030	Capilla del Carmen	140987	Capilla del Carmen	CAPILLA DEL CARMEN	14	Córdoba	14119
        Localidad simple	-31.8716468802323	-63.1165074420857	Río Segundo	INDEC	14119040000	14119040	Carrilobo	140994	Carrilobo	CARRILOBO	14	Córdoba	14119
        Localidad simple	-31.964293093898	-63.3834011052136	Río Segundo	INDEC	14119050000	14119050	Colazo	141001	Colazo	COLAZO	14	Córdoba	14119
        Localidad simple	-31.9175044736895	-63.5047159461534	Río Segundo	INDEC	14119060000	14119060	Colonia Videla	142805	Colonia Videla	COLONIA VIDELA	14	Córdoba	14119
        Localidad simple	-31.6470984739179	-63.7598955842163	Río Segundo	INDEC	14119070000	14119070	Costasacate	141008	Costasacate	COSTASACATE	14	Córdoba	14119
        Localidad simple	-31.7965929244084	-63.6511207667299	Río Segundo	INDEC	14119080000	14119080	Impira	142812	Impira	IMPIRA	14	Córdoba	14119
        Localidad simple	-31.7783987221778	-63.8027369015332	Río Segundo	INDEC	14119090000	14119090	Laguna Larga	141015	Laguna Larga	LAGUNA LARGA	14	Córdoba	14119
        Localidad simple	-31.8313972998615	-63.4506364545889	Río Segundo	INDEC	14119100000	14119100	Las Junturas	141022	Las Junturas	LAS JUNTURAS	14	Córdoba	14119
        Localidad simple	-31.4021377541587	-63.3321030427196	Río Segundo	INDEC	14119110000	14119110	Los Chañaritos	142196	Los Chañaritos (C.D. Eje)	LOS CHAÑARITOS	14	Córdoba	14119
        Localidad simple	-31.6468736294787	-63.344798299585	Río Segundo	INDEC	14119120000	14119120	Luque	141029	Luque	LUQUE	14	Córdoba	14119
        Localidad simple	-31.8440585633394	-63.7460746070431	Río Segundo	INDEC	14119130000	14119130	Manfredi	141036	Manfredi	MANFREDI	14	Córdoba	14119
        Localidad simple	-31.7144720415401	-63.5118521462999	Río Segundo	INDEC	14119140000	14119140	Matorrales	141043	Matorrales	MATORRALES	14	Córdoba	14119
        Localidad simple	-31.912835805369	-63.6836820317482	Río Segundo	INDEC	14119150000	14119150	Oncativo	141050	Oncativo	ONCATIVO	14	Córdoba	14119
        Componente de localidad compuesta	-31.6804516863719	-63.8814979795567	Río Segundo	INDEC	14119160000	14119160	Pilar	141057	Pilar	PILAR	14	Córdoba	14119
        Localidad simple	-32.0194389864602	-62.9199182599484	Río Segundo	INDEC	14119170000	14119170	Pozo del Molle	141064	Pozo del Molle	POZO DEL MOLLE	14	Córdoba	14119
        Localidad simple	-31.595385474428	-63.6155414282074	Río Segundo	INDEC	14119180000	14119180	Rincón	142826	Rincón	RINCON	14	Córdoba	14119
        Componente de localidad compuesta	-31.650153972407	-63.9118630162229	Río Segundo	INDEC	14119190000	14119190	Río Segundo	141071	Río Segundo	RIO SEGUNDO	14	Córdoba	14119
        Localidad simple	-31.3871253007234	-63.4182078006181	Río Segundo	INDEC	14119200000	14119200	Santiago Temple	141078	Santiago Temple	SANTIAGO TEMPLE	14	Córdoba	14119
        Localidad simple	-31.5540113344661	-63.5341489014562	Río Segundo	INDEC	14119210000	14119210	Villa del Rosario	141085	Villa del Rosario	VILLA DEL ROSARIO	14	Córdoba	14119
        Localidad simple	-31.489683021508	-65.0566540377037	San Alberto	INDEC	14126010000	14126010	Ambul	142833	Ambul	AMBUL	14	Córdoba	14126
        Localidad simple	-31.7500816583302	-65.004300188015	San Alberto	INDEC	14126020000	14126020	Arroyo Los Patos	142840	Arroyo los Patos	ARROYO LOS PATOS	14	Córdoba	14126
        Localidad simple	-31.845848320458	-64.9560921756071	San Alberto	INDEC	14126030000	14126030	El Huayco	142847	Las Calles	EL HUAYCO	14	Córdoba	14126
        Localidad simple	-31.668668399569	-65.37239422356	San Alberto	INDEC	14126040000	14126040	La Cortadera			LA CORTADERA	14	Córdoba	14126
        Localidad simple	-31.8206855464004	-64.9717608825205	San Alberto	INDEC	14126050000	14126050	Las Calles	142847	Las Calles	LAS CALLES	14	Córdoba	14126
        Localidad simple	-31.6633718662216	-65.3190950145101	San Alberto	INDEC	14126060000	14126060	Las Oscuras			LAS OSCURAS	14	Córdoba	14126
        Localidad simple	-31.8544494669466	-64.9870970596913	San Alberto	INDEC	14126070000	14126070	Las Rabonas	142854	Las Rabonas	LAS RABONAS	14	Córdoba	14126
        Localidad simple	-31.9322689128265	-65.2330653421552	San Alberto	INDEC	14126080000	14126080	Los Callejones	141106	San Pedro	LOS CALLEJONES	14	Córdoba	14126
        Componente de localidad compuesta	-31.7267843574619	-65.0055332639059	San Alberto	INDEC	14126090000	14126090	Mina Clavero	141092	Mina Clavero	MINA CLAVERO	14	Córdoba	14126
        Localidad simple	-31.4273241562001	-65.0756894821312	San Alberto	INDEC	14126100000	14126100	Mussi			MUSSI	14	Córdoba	14126
        Localidad simple	-31.795570031823	-65.0034036260171	San Alberto	INDEC	14126110000	14126110	Nono	141099	Nono	NONO	14	Córdoba	14126
        Localidad simple	-31.626892878253	-65.058665894714	San Alberto	INDEC	14126120000	14126120	Panaholma	142861	Panaholma	PANAHOLMA	14	Córdoba	14126
        Localidad simple	-31.832529380563	-64.9856729137672	San Alberto	INDEC	14126130000	14126130	San Huberto	142847	Las Calles	SAN HUBERTO	14	Córdoba	14126
        Localidad simple	-31.6822276756771	-65.0255685400222	San Alberto	INDEC	14126140000	14126140	San Lorenzo	142868	San Lorenzo	SAN LORENZO	14	Córdoba	14126
        Localidad simple	-31.8969863219692	-65.5246625976026	San Alberto	INDEC	14126150000	14126150	San Martín			SAN MARTIN	14	Córdoba	14126
        Componente de localidad compuesta	-31.9368244076607	-65.2192402223011	San Alberto	INDEC	14126160000	14126160	San Pedro	141106	San Pedro	SAN PEDRO	14	Córdoba	14126
        Localidad simple	-31.8549846523947	-65.4304499825783	San Alberto	INDEC	14126170000	14126170	San Vicente	142875	San Vicente	SAN VICENTE	14	Córdoba	14126
        Localidad simple	-31.9143833881487	-65.1687928322254	San Alberto	INDEC	14126180000	14126180	Sauce Arriba	142882	Sauce Arriba	SAUCE ARRIBA	14	Córdoba	14126
        Localidad simple	-31.6303406921333	-65.1483381584252	San Alberto	INDEC	14126190000	14126190	Tasna			TASNA	14	Córdoba	14126
        Componente de localidad compuesta	-31.7063690825109	-65.0191109777329	San Alberto	INDEC	14126200000	14126200	Villa Cura Brochero	141113	Villa Cura Brochero	VILLA CURA BROCHERO	14	Córdoba	14126
        Componente de localidad compuesta	-31.9366572471396	-65.191796702404	San Alberto	INDEC	14126210000	14126210	Villa Sarmiento	142252	Villa Sarmiento (G.R.)	VILLA SARMIENTO	14	Córdoba	14126
        Localidad simple	-32.0788609958395	-65.2312586416728	San Javier	INDEC	14133010000	14133010	Conlara	142889	Conlara	CONLARA	14	Córdoba	14133
        Localidad simple	-32.2779029026256	-65.0273777504727	San Javier	INDEC	14133030000	14133030	Cruz Caña	141127	La Paz	CRUZ CAÑA	14	Córdoba	14133
        Localidad simple	-31.8716867538421	-64.992749639447	San Javier	INDEC	14133040000	14133040	Dos Arroyos	142917	Los Hornillos	DOS ARROYOS	14	Córdoba	14133
        Localidad simple	-31.8862653496977	-64.990651569992	San Javier	INDEC	14133050000	14133050	El Pantanillo	142917	Los Hornillos	EL PANTANILLO	14	Córdoba	14133
        Componente de localidad compuesta	-32.2172752387548	-65.0511157108409	San Javier	INDEC	14133060000	14133060	La Paz	141127	La Paz	LA PAZ	14	Córdoba	14133
        Localidad simple	-32.0660031804969	-65.0309086009182	San Javier	INDEC	14133070000	14133070	La Población	142896	La Población	LA POBLACION	14	Córdoba	14133
        Localidad simple	-32.2996521283095	-65.0361512187387	San Javier	INDEC	14133080000	14133080	La Ramada	141127	La Paz	LA RAMADA	14	Córdoba	14133
        Localidad simple	-32.1066758248056	-65.063758957899	San Javier	INDEC	14133090000	14133090	La Travesía	142924	Luyaba	LA TRAVESIA	14	Córdoba	14133
        Componente de localidad compuesta	-32.2418447787663	-65.0340964238205	San Javier	INDEC	14133095000	14133095	Las Chacras	141127	La Paz	LAS CHACRAS	14	Córdoba	14133
        Componente de localidad compuesta	-31.9522279195169	-65.1014219744873	San Javier	INDEC	14133100000	14133100	Las Tapias	142903	Las Tapias	LAS TAPIAS	14	Córdoba	14133
        Componente de localidad compuesta	-32.2189295558758	-65.0285126897579	San Javier	INDEC	14133105000	14133105	Loma Bola	141127	La Paz	LOMA BOLA	14	Córdoba	14133
        Localidad simple	-31.9737899960039	-65.4376442516279	San Javier	INDEC	14133110000	14133110	Los Cerrillos	142910	Los Cerrillos	LOS CERRILLOS	14	Córdoba	14133
        Localidad simple	-31.9017353099654	-64.9900890034519	San Javier	INDEC	14133120000	14133120	Los Hornillos	142917	Los Hornillos	LOS HORNILLOS	14	Córdoba	14133
        Localidad simple	-31.9620954005051	-65.0383138664304	San Javier	INDEC	14133130000	14133130	Los Molles	141148	Villa de las Rosas	LOS MOLLES	14	Córdoba	14133
        Localidad simple	-32.1483422464594	-65.056618698571	San Javier	INDEC	14133150000	14133150	Luyaba	142924	Luyaba	LUYABA	14	Córdoba	14133
        Componente de localidad compuesta	-32.2570957550243	-65.0309211927709	San Javier	INDEC	14133155000	14133155	Quebracho Ladeado	141127	La Paz	QUEBRACHO LADEADO	14	Córdoba	14133
        Localidad simple	-31.9074953420069	-65.0344580207268	San Javier	INDEC	14133160000	14133160	Quebrada de los Pozos	141148	Villa de las Rosas	QUEBRADA DE LOS POZOS	14	Córdoba	14133
        Localidad simple	-32.0266518585481	-65.027552227227	San Javier	INDEC	14133170000	14133170	San Javier y Yacanto	141134	San Javier y Yacanto	SAN JAVIER Y YACANTO	14	Córdoba	14133
        Localidad simple	-31.9573259005881	-65.3152083482463	San Javier	INDEC	14133180000	14133180	San José	141141	San José	SAN JOSE	14	Córdoba	14133
        Componente de localidad compuesta con entidad	-31.9484733205417	-65.0550181621034	San Javier	INDEC	14133190000	14133190	Villa de las Rosas	141148	Villa de las Rosas	VILLA DE LAS ROSAS	14	Córdoba	14133
        Entidad	-31.9620894324618	-65.0677903537373	San Javier	INDEC	14133190001	14133190	Villa de las Rosas	141148	Villa de las Rosas	ALTO RESBALOSO - EL BARRIAL	14	Córdoba	14133
        Entidad	-31.951097322144	-65.0721507920682	San Javier	INDEC	14133190002	14133190	Villa de las Rosas	141148	Villa de las Rosas	EL PUEBLITO	14	Córdoba	14133
        Entidad	-31.951097322144	-65.0721507920682	San Javier	INDEC	14133190003	14133190	Villa de las Rosas	141148	Villa de las Rosas	EL VALLE	14	Córdoba	14133
        Entidad	-31.9402016355042	-65.0211563854361	San Javier	INDEC	14133190004	14133190	Villa de las Rosas	141148	Villa de las Rosas	LAS CHACRAS	14	Córdoba	14133
        Entidad	-31.9521742409328	-65.053914111613	San Javier	INDEC	14133190005	14133190	Villa de las Rosas	141148	Villa de las Rosas	VILLA DE LAS ROSAS	14	Córdoba	14133
        Componente de localidad compuesta	-31.9440434116077	-65.1961395608591	San Javier	INDEC	14133200000	14133200	Villa Dolores	141155	Villa Dolores	VILLA DOLORES	14	Córdoba	14133
        Localidad simple	-31.8727711509831	-65.0372746344972	San Javier	INDEC	14133210000	14133210	Villa La Viña	141148	Villa de las Rosas	VILLA LA VIÑA	14	Córdoba	14133
        Localidad simple	-31.9387491680744	-62.4657945680095	San Justo	INDEC	14140010000	14140010	Alicia	141162	Alicia	ALICIA	14	Córdoba	14140
        Localidad simple	-30.9563507625723	-62.3378881220879	San Justo	INDEC	14140020000	14140020	Altos de Chipión	141169	Altos de Chipión	ALTOS DE CHIPION	14	Córdoba	14140
        Localidad simple	-31.4193908735633	-63.0503444103203	San Justo	INDEC	14140030000	14140030	Arroyito	141176	Arroyito	ARROYITO	14	Córdoba	14140
        Localidad simple	-31.0107075696975	-62.6671044005114	San Justo	INDEC	14140040000	14140040	Balnearia	141183	Balnearia	BALNEARIA	14	Córdoba	14140
        Localidad simple	-30.8665250177702	-62.0356522438995	San Justo	INDEC	14140050000	14140050	Brinkmann	141190	Brinkmann	BRINCKMANN	14	Córdoba	14140
        Localidad simple	-31.1438629464364	-62.2135862922774	San Justo	INDEC	14140060000	14140060	Colonia Anita			COLONIA ANITA	14	Córdoba	14140
        Localidad simple	-30.5273759974763	-62.114218229406	San Justo	INDEC	14140070000	14140070	Colonia 10 de Julio			COLONIA 10 DE JULIO	14	Córdoba	14140
        Localidad simple	-31.2454066292387	-62.9256664887207	San Justo	INDEC	14140080000	14140080	Colonia Las Pichanas	142945	Colonia las Pichanas	COLONIA LAS PICHANAS	14	Córdoba	14140
        Localidad simple	-31.2485066335845	-62.3639645596989	San Justo	INDEC	14140090000	14140090	Colonia Marina	141197	Colonia Marina	COLONIA MARINA	14	Córdoba	14140
        Localidad simple	-31.6304966252155	-62.3663613505205	San Justo	INDEC	14140100000	14140100	Colonia Prosperidad	141204	Colonia Prosperidad	COLONIA PROSPERIDAD	14	Córdoba	14140
        Localidad simple	-31.528322298444	-62.7244933856141	San Justo	INDEC	14140110000	14140110	Colonia San Bartolomé	141211	Colonia San Bartolomé	COLONIA SAN BARTOLOME	14	Córdoba	14140
        Localidad simple	-30.7836021597954	-61.9175643185455	San Justo	INDEC	14140120000	14140120	Colonia San Pedro	142952	Colonia San Pedro	COLONIA SAN PEDRO	14	Córdoba	14140
        Localidad simple	-31.6057747904501	-62.4278882105043	San Justo	INDEC	14140130000	14140130	Colonia Santa María	141204	Colonia Prosperidad	COLONIA SANTA MARIA	14	Córdoba	14140
        Localidad simple	-31.0529548297979	-62.235437860737	San Justo	INDEC	14140140000	14140140	Colonia Valtelina	142959	Colonia Valtelina	COLONIA VALTELINA	14	Córdoba	14140
        Localidad simple	-30.8416242298498	-61.9558386203663	San Justo	INDEC	14140150000	14140150	Colonia Vignaud	141218	Colonia Vignaud	COLONIA VIGNAUD	14	Córdoba	14140
        Localidad simple	-31.403980918137	-62.3061393858824	San Justo	INDEC	14140160000	14140160	Devoto	141225	Devoto	DEVOTO	14	Córdoba	14140
        Localidad simple	-31.7412330671687	-62.8933443705701	San Justo	INDEC	14140170000	14140170	El Arañado	141232	El Arañado	EL ARAÑADO	14	Córdoba	14140
        Localidad simple	-31.9672502352148	-62.3026285942112	San Justo	INDEC	14140180000	14140180	El Fortín	141239	El Fortín	EL FORTIN	14	Córdoba	14140
        Localidad simple	-31.4039349300198	-62.9733657676524	San Justo	INDEC	14140190000	14140190	El Fuertecito	141176	Arroyito	EL FUERTECITO	14	Córdoba	14140
        Localidad simple	-31.3845486215618	-62.8284737646901	San Justo	INDEC	14140200000	14140200	El Tío	141246	El Tío	EL TIO	14	Córdoba	14140
        Localidad simple	-31.3047488843392	-62.1333023360613	San Justo	INDEC	14140210000	14140210	Estación Luxardo	142966	Plaza Luxardo	ESTACION LUXARDO	14	Córdoba	14140
        Localidad simple	-31.2071433242951	-62.1099182033011	San Justo	INDEC	14140215000	14140215	Colonia Iturraspe	142938	Colonia Iturraspe	COLONIA ITURRASPE	14	Córdoba	14140
        Localidad simple	-31.1647319320813	-62.0976333908888	San Justo	INDEC	14140220000	14140220	Freyre	141253	Freyre	FREYRE	14	Córdoba	14140
        Localidad simple	-31.406437919327	-62.6343581010891	San Justo	INDEC	14140230000	14140230	La Francia	141260	La Francia	LA FRANCIA	14	Córdoba	14140
        Localidad simple	-30.9070545771133	-62.2154361817056	San Justo	INDEC	14140240000	14140240	La Paquita	141267	La Paquita	LA PAQUITA	14	Córdoba	14140
        Localidad simple	-31.2352452196552	-63.0599042713799	San Justo	INDEC	14140250000	14140250	La Tordilla	141274	La Tordilla	LA TORDILLA	14	Córdoba	14140
        Localidad simple	-31.801292158779	-62.6171047243489	San Justo	INDEC	14140260000	14140260	Las Varas	141281	Las Varas	LAS VARAS	14	Córdoba	14140
        Localidad simple	-31.8731135581313	-62.7187948274612	San Justo	INDEC	14140270000	14140270	Las Varillas	141288	Las Varillas	LAS VARILLAS	14	Córdoba	14140
        Localidad simple	-30.9945226321227	-62.8258401081139	San Justo	INDEC	14140280000	14140280	Marull	141295	Marull	MARULL	14	Córdoba	14140
        Localidad simple	-30.9145163516027	-62.6749183796469	San Justo	INDEC	14140290000	14140290	Miramar	141302	Miramar	MIRAMAR	14	Córdoba	14140
        Localidad simple	-30.7107058083835	-62.0044437379159	San Justo	INDEC	14140300000	14140300	Morteros	141309	Morteros	MORTEROS	14	Córdoba	14140
        Localidad simple	-31.301747140591	-62.2291672872465	San Justo	INDEC	14140310000	14140310	Plaza Luxardo	142966	Plaza Luxardo	PLAZA LUXARDO	14	Córdoba	14140
        Localidad simple	-31.3698057980989	-62.0980386090508	San Justo	INDEC	14140320000	14140320	Plaza San Francisco	141337	San Francisco	PLAZA SAN FRANCISCO	14	Córdoba	14140
        Localidad simple	-31.0139211475279	-62.0633288002735	San Justo	INDEC	14140330000	14140330	Porteña	141316	Porteña	PORTEÑA	14	Córdoba	14140
        Localidad simple	-31.5496022220548	-62.2257312576183	San Justo	INDEC	14140340000	14140340	Quebracho Herrado	141323	Quebracho Herrado	QUEBRACHO HERRADO	14	Córdoba	14140
        Localidad simple	-31.6633035739729	-63.0453212093259	San Justo	INDEC	14140350000	14140350	Sacanta	141330	Sacanta	SACANTA	14	Córdoba	14140
        Componente de localidad compuesta	-31.4276088869788	-62.0866336146078	San Justo	INDEC	14140360000	14140360	San Francisco	141337	San Francisco	SAN FRANCISCO	14	Córdoba	14140
        Localidad simple	-31.7029319509565	-62.4840180855351	San Justo	INDEC	14140370000	14140370	Saturnino María Laspiur	141344	Saturnino María Laspiur	SATURNINO MARIA LASPIUR	14	Córdoba	14140
        Localidad simple	-30.9239726451413	-61.9737374276269	San Justo	INDEC	14140380000	14140380	Seeber	141351	Seeber	SEEBER	14	Córdoba	14140
        Localidad simple	-31.1090401829574	-62.9876506224993	San Justo	INDEC	14140390000	14140390	Toro Pujio	142973	Toro Pujio	TORO PUJIO	14	Córdoba	14140
        Localidad simple	-31.4251109532295	-63.1954038579264	San Justo	INDEC	14140400000	14140400	Tránsito	141358	Tránsito	TRANSITO	14	Córdoba	14140
        Localidad simple	-31.3224689015774	-62.8144745758859	San Justo	INDEC	14140420000	14140420	Villa Concepción del Tío	141365	Villa Concepción del Tío	VILLA CONCEPCION DEL TIO	14	Córdoba	14140
        Localidad simple	-31.4474037687006	-63.1940139744669	San Justo	INDEC	14140430000	14140430	Villa del Tránsito	141358	Tránsito	VILLA DEL TRANSITO	14	Córdoba	14140
        Localidad simple	-31.6335474004986	-62.896766816574	San Justo	INDEC	14140440000	14140440	Villa San Esteban	142980	Villa San Esteban	VILLA SAN ESTEBAN	14	Córdoba	14140
        Componente de localidad compuesta	-31.6576798267691	-64.4288214061936	Santa María	INDEC	14147010000	14147010	Alta Gracia	141372	Alta Gracia	ALTA GRACIA	14	Córdoba	14147
        Componente de localidad compuesta	-31.7231378713901	-64.4144863418681	Santa María	INDEC	14147020000	14147020	Anisacate	142987	Anisacate	ANISACATE	14	Córdoba	14147
        Localidad simple con entidad	-31.4426508165936	-64.3178623084579	Santa María	INDEC	14147030000	14147030	Barrio Gilbert (1º de Mayo) - Tejas Tres	141393	Malagueño	BARRIO GILBERT	14	Córdoba	14147
        Entidad	-31.4406013293568	-64.3177468950882	Santa María	INDEC	14147030001	14147030	Barrio Gilbert (1º de Mayo) - Tejas Tres	141393	Malagueño	BARRIO GILBERT (1° DE MAYO)	14	Córdoba	14147
        Entidad	-31.4661292884087	-64.3670949660514	Santa María	INDEC	14147030002	14147030	Barrio Gilbert (1º de Mayo) - Tejas Tres	141393	Malagueño	TEJAS TRES	14	Córdoba	14147
        Localidad simple	-31.557666956067	-64.194465844878	Santa María	INDEC	14147050000	14147050	Bouwer	142994	Bouwer	BOUWER	14	Córdoba	14147
        Localidad simple	-31.5854354142154	-64.3439770074277	Santa María	INDEC	14147055000	14147055	Campos del Virrey	143106	Villa Parque Santa Ana	CAMPOS DEL VIRREY	14	Córdoba	14147
        Localidad simple	-31.5292561486201	-64.1688666057858	Santa María	INDEC	14147060000	14147060	Caseros Centro	142994	Bouwer	CASEROS CENTRO	14	Córdoba	14147
        Componente de localidad compuesta	-31.4637911559576	-64.4124514041777	Santa María	INDEC	14147065000	14147065	Causana	141393	Malagueño	CAUSANA	14	Córdoba	14147
        Localidad simple	-31.7247289371172	-64.3939272186065	Santa María	INDEC	14147070000	14147070	Costa Azul	142987	Anisacate	COSTA AZUL	14	Córdoba	14147
        Localidad simple	-31.8170515932731	-64.2889894059973	Santa María	INDEC	14147080000	14147080	Despeñaderos	141379	Despeñaderos	DESPEÑADEROS	14	Córdoba	14147
        Localidad simple	-31.751852051978	-64.3627643049016	Santa María	INDEC	14147090000	14147090	Dique Chico	143001	Dique Chico	DIQUE CHICO	14	Córdoba	14147
        Componente de localidad compuesta	-31.6456181955204	-64.481617153406	Santa María	INDEC	14147095000	14147095	El Potrerillo	141372	Alta Gracia	EL POTRERILLO	14	Córdoba	14147
        Localidad simple	-31.5345237877237	-64.4559553621678	Santa María	INDEC	14147100000	14147100	Falda del Cañete	141393	Malagueño	FALDA DEL CAÑETE	14	Córdoba	14147
        Localidad simple	-31.5854632680747	-64.4548814536225	Santa María	INDEC	14147110000	14147110	Falda del Carmen	143008	Falda del Carmen	FALDA DEL CARMEN	14	Córdoba	14147
        Componente de localidad compuesta	-31.8034930461757	-64.418856525597	Santa María	INDEC	14147115000	14147115	José de la Quintana	143113	Villa San Isidro	JOSE DE LA QUINTANA	14	Córdoba	14147
        Localidad simple	-31.8374172963205	-64.4336411746815	Santa María	INDEC	14147120000	14147120	La Boca del Río	143113	Villa San Isidro	LA BOCA DEL RIO	14	Córdoba	14147
        Localidad simple	-31.5285694623422	-64.0712556356294	Santa María	INDEC	14147130000	14147130	La Carbonada			LA CARBONADA	14	Córdoba	14147
        Localidad simple	-31.7194206060414	-64.4779150030479	Santa María	INDEC	14147150000	14147150	La Paisanita	143022	La Paisanita	LA PAISANITA	14	Córdoba	14147
        Localidad simple	-31.4425579240341	-64.3484859265831	Santa María	INDEC	14147160000	14147160	La Perla	141393	Malagueño	LA PERLA	14	Córdoba	14147
        Componente de localidad compuesta	-31.7574675409558	-64.4486902777249	Santa María	INDEC	14147170000	14147170	La Rancherita y Las Cascadas	143113	Villa San Isidro	LA RANCHERITA	14	Córdoba	14147
        Componente de localidad compuesta	-31.7331340814564	-64.4564154524522	Santa María	INDEC	14147180000	14147180	La Serranita	143036	La Serranita	LA SERRANITA	14	Córdoba	14147
        Localidad simple con entidad	-31.5262509877113	-64.2847584167114	Santa María	INDEC	14147190000	14147190	Los Cedros	143043	Los Cedros	LOS CEDROS - LAS QUINTAS	14	Córdoba	14147
        Entidad	-31.5502925188794	-64.4334256167366	Santa María	INDEC	14147190001	14147190	Los Cedros	143008	Falda del Carmen	BARRIO LAS QUINTAS	14	Córdoba	14147
        Entidad	-31.5571765800385	-64.4028321480993	Santa María	INDEC	14147190002	14147190	Los Cedros			LOS CEDROS	14	Córdoba	14147
        Localidad simple	-31.6484545317081	-64.0899796115028	Santa María	INDEC	14147200000	14147200	Lozada	141386	Lozada	LOZADA	14	Córdoba	14147
        Localidad simple	-31.4648051043666	-64.3584261973277	Santa María	INDEC	14147210000	14147210	Malagueño	141393	Malagueño	MALAGUEÑO	14	Córdoba	14147
        Localidad simple	-31.4572735024583	-64.4057106148379	Santa María	INDEC	14147217000	14147217	Milenica	141393	Malagueño	MILENICA	14	Córdoba	14147
        Localidad simple	-31.9115749813288	-64.2399918461068	Santa María	INDEC	14147220000	14147220	Monte Ralo	141400	Monte Ralo	MONTE RALO	14	Córdoba	14147
        Componente de localidad compuesta	-31.7824159665775	-64.5424068778316	Santa María	INDEC	14147230000	14147230	Potrero de Garay	143050	Potrero de Garay	POTRERO DE GARAY	14	Córdoba	14147
        Localidad simple	-31.6465373949134	-64.2584787728338	Santa María	INDEC	14147240000	14147240	Rafael García	143057	Rafael García	RAFAEL GARCIA	14	Córdoba	14147
        Localidad simple	-31.7166546515515	-64.6265869046185	Santa María	INDEC	14147250000	14147250	San Clemente	143064	San Clemente	SAN CLEMENTE	14	Córdoba	14147
        Localidad simple con entidad	-31.435151387072	-64.4492154097951	Santa María	INDEC	14147260000	14147260	San Nicolás - Tierra Alta	141393	Malagueño	SAN NICOLAS	14	Córdoba	14147
        Entidad	-31.4364876977282	-64.4538955732489	Santa María	INDEC	14147260001	14147260	San Nicolás - Tierra Alta	141393	Malagueño	SAN NICOLAS	14	Córdoba	14147
        Entidad	-31.4723029527477	-64.4707945856239	Santa María	INDEC	14147260002	14147260	San Nicolás - Tierra Alta	141393	Malagueño	TIERRA ALTA	14	Córdoba	14147
        Localidad simple	-31.5300866657118	-64.1457832241514	Santa María	INDEC	14147270000	14147270	Socavones			SOCAVONES	14	Córdoba	14147
        Localidad simple	-31.5560967583723	-64.0080543306962	Santa María	INDEC	14147280000	14147280	Toledo	141407	Toledo	TOLEDO	14	Córdoba	14147
        Localidad simple	-31.608213303048	-64.4403684727464	Santa María	INDEC	14147290000	14147290	Valle Alegre	143008	Falda del Carmen	VALLE ALEGRE	14	Córdoba	14147
        Componente de localidad compuesta	-31.7314776926852	-64.4129622125593	Santa María	INDEC	14147300000	14147300	Valle de Anisacate	143071	Valle de Anisacate	VALLE DE ANISACATE	14	Córdoba	14147
        Componente de localidad compuesta con entidad	-31.7944839463173	-64.5122651994167	Santa María	INDEC	14147310000	14147310	Villa Ciudad de América	143078	Villa Ciudad de América	VILLA CIUDAD DE AMERICA (LOTEO DIEGO DE	14	Córdoba	14147
        Entidad	-31.7772193262534	-64.532077974826	Santa María	INDEC	14147310001	14147310	Villa Ciudad de América	143078	Villa Ciudad de América	BARRIO VILLA DEL PARQUE	14	Córdoba	14147
        Entidad	-31.7932195162073	-64.5139255175446	Santa María	INDEC	14147310002	14147310	Villa Ciudad de América	143078	Villa Ciudad de América	VILLA CIUDAD DE AMERICA	14	Córdoba	14147
        Localidad simple con entidad	-31.6179397578028	-64.3924925248834	Santa María	INDEC	14147320000	14147320	Villa del Prado	143085	Villa del Prado	VILLA DEL PRADO	14	Córdoba	14147
        Entidad	-31.6174543235156	-64.391062873902	Santa María	INDEC	14147320001	14147320	Villa del Prado	143085	Villa del Prado	VILLA DEL PRADO	14	Córdoba	14147
        Entidad	-31.6430306930417	-64.3453826897825	Santa María	INDEC	14147320002	14147320	Villa del Prado	141372	Alta Gracia	LA DONOSA	14	Córdoba	14147
        Componente de localidad compuesta	-31.7287879568356	-64.4324174982752	Santa María	INDEC	14147330000	14147330	Villa La Bolsa	143092	Villa la Bolsa	VILLA LA BOLSA	14	Córdoba	14147
        Componente de localidad compuesta	-31.7359598057037	-64.4389279396961	Santa María	INDEC	14147340000	14147340	Villa Los Aromos	143099	Villa los Aromos	VILLA LOS AROMOS	14	Córdoba	14147
        Localidad simple con entidad	-31.5893075812486	-64.3536920462417	Santa María	INDEC	14147350000	14147350	Villa Parque Santa Ana	143106	Villa Parque Santa Ana	VILLA PARQUE SANTA ANA	14	Córdoba	14147
        Entidad	-31.5725913753684	-64.3341910295503	Santa María	INDEC	14147350001	14147350	Villa Parque Santa Ana	143106	Villa Parque Santa Ana	MI VALLE	14	Córdoba	14147
        Entidad	-31.5917319016207	-64.3503003378206	Santa María	INDEC	14147350002	14147350	Villa Parque Santa Ana	143106	Villa Parque Santa Ana	VILLA PARQUE SANTA ANA	14	Córdoba	14147
        Componente de localidad compuesta	-31.8208264119355	-64.3935275639835	Santa María	INDEC	14147360000	14147360	Villa San Isidro	143113	Villa San Isidro	VILLA SAN ISIDRO - JOSE DE LA QUINTANA	14	Córdoba	14147
        Componente de localidad compuesta	-31.4579361723038	-64.4217153267522	Santa María	INDEC	14147370000	14147370	Villa Sierras De Oro	141393	Malagueño	VILLA SIERRAS DE ORO	14	Córdoba	14147
        Localidad simple	-31.4470577243833	-64.3660748415952	Santa María	INDEC	14147380000	14147380	Yocsina	141393	Malagueño	YOCSINA	14	Córdoba	14147
        Localidad simple	-30.0682250779624	-64.052875898278	Sobremonte	INDEC	14154010000	14154010	Caminiaga	143120	Caminiaga	CAMINIAGA	14	Córdoba	14154
        Localidad simple	-29.9138372593106	-64.1299817960277	Sobremonte	INDEC	14154030000	14154030	Chuña Huasi			CHUÑA HUASI	14	Córdoba	14154
        Localidad simple	-29.5775456904692	-64.1070996245776	Sobremonte	INDEC	14154040000	14154040	Pozo Nuevo	143134	Pozo Nuevo	POZO NUEVO	14	Córdoba	14154
        Localidad simple	-29.7882609409722	-63.9430703616826	Sobremonte	INDEC	14154050000	14154050	San Francisco del Chañar	141414	San Francisco del Chañar	SAN FRANCISCO DEL CHAÑAR	14	Córdoba	14154
        Localidad simple	-32.1934604986786	-64.2543871859511	Tercero Arriba	INDEC	14161010000	14161010	Almafuerte	141421	Almafuerte	ALMAFUERTE	14	Córdoba	14161
        Localidad simple	-32.033345652856	-63.8628846933814	Tercero Arriba	INDEC	14161020000	14161020	Colonia Almada	141428	Colonia Almada	COLONIA ALMADA	14	Córdoba	14161
        Localidad simple	-32.0252572445237	-64.1931588929625	Tercero Arriba	INDEC	14161030000	14161030	Corralito	141435	Corralito	CORRALITO	14	Córdoba	14161
        Localidad simple	-32.6108732524704	-63.5798837158318	Tercero Arriba	INDEC	14161040000	14161040	Dalmacio Vélez	141442	Dalmacio Vélez	DALMACIO VELEZ	14	Córdoba	14161
        Localidad simple	-32.3234295842043	-63.8704257430147	Tercero Arriba	INDEC	14161050000	14161050	General Fotheringham	143141	General Fotheringham	GENERAL FOTHERINGHAM	14	Córdoba	14161
        Localidad simple	-32.4276148348373	-63.7330119093142	Tercero Arriba	INDEC	14161060000	14161060	Hernando	141449	Hernando	HERNANDO	14	Córdoba	14161
        Localidad simple	-32.1613056379775	-63.4651919500633	Tercero Arriba	INDEC	14161070000	14161070	James Craik	141456	James Craik	JAMES CRAIK	14	Córdoba	14161
        Localidad simple	-32.5100979867632	-63.9290229356551	Tercero Arriba	INDEC	14161080000	14161080	Las Isletillas	143148	Las Isletillas	LAS ISLETILLAS	14	Córdoba	14161
        Localidad simple	-32.6981884459632	-63.7083103176214	Tercero Arriba	INDEC	14161090000	14161090	Las Perdices	141463	Las Perdices	LAS PERDICES	14	Córdoba	14161
        Localidad simple	-32.045928188462	-63.2017981667251	Tercero Arriba	INDEC	14161100000	14161100	Los Zorros	141470	Los Zorros	LOS ZORROS	14	Córdoba	14161
        Localidad simple	-32.0413174021447	-63.5693820664827	Tercero Arriba	INDEC	14161110000	14161110	Oliva	141477	Oliva	OLIVA	14	Córdoba	14161
        Componente de localidad compuesta	-32.2416827296709	-63.6421868735368	Tercero Arriba	INDEC	14161120000	14161120	Pampayasta Norte	143155	Pampayasta Norte	PAMPAYASTA NORTE	14	Córdoba	14161
        Componente de localidad compuesta	-32.2507581145055	-63.6510140335346	Tercero Arriba	INDEC	14161130000	14161130	Pampayasta Sud	141484	Pampayasta Sud	PAMPAYASTA SUR	14	Córdoba	14161
        Localidad simple	-32.5754281748334	-63.8101580899516	Tercero Arriba	INDEC	14161140000	14161140	Punta del Agua	143162	Punta del Agua	PUNTA DEL AGUA	14	Córdoba	14161
        Localidad simple	-32.173100971278	-64.1130560562283	Tercero Arriba	INDEC	14161150000	14161150	Río Tercero	141491	Río Tercero	RIO TERCERO	14	Córdoba	14161
        Localidad simple	-32.2402070251544	-63.9799466045503	Tercero Arriba	INDEC	14161160000	14161160	Tancacha	141498	Tancacha	TANCACHA	14	Córdoba	14161
        Localidad simple	-32.1643583032298	-63.892558867184	Tercero Arriba	INDEC	14161170000	14161170	Villa Ascasubi	141505	Villa Ascasubi	VILLA ASCASUBI	14	Córdoba	14161
        Localidad simple	-30.8392305968427	-63.8008465946487	Totoral	INDEC	14168010000	14168010	Candelaria Sur	143169	Candelaria Sud	CANDELARIA SUR	14	Córdoba	14168
        Localidad simple	-30.7370875150032	-63.723661877713	Totoral	INDEC	14168020000	14168020	Cañada de Luque	141512	Cañada de Luque	CAÑADA DE LUQUE	14	Córdoba	14168
        Localidad simple	-30.5729640848008	-63.6517416910945	Totoral	INDEC	14168030000	14168030	Capilla de Sitón	143176	Capilla del Sitón	CAPILLA DE SITON	14	Córdoba	14168
        Localidad simple	-30.943220474797	-64.2765349210302	Totoral	INDEC	14168040000	14168040	La Pampa	143183	La Pampa	LA PAMPA	14	Córdoba	14168
        Localidad simple	-30.5617525961006	-64.0019842072006	Totoral	INDEC	14168060000	14168060	Las Peñas	141519	Las Peñas	LAS PEÑAS	14	Córdoba	14168
        Localidad simple	-30.6259742943516	-63.886727301445	Totoral	INDEC	14168070000	14168070	Los Mistoles	143190	Los Mistoles	LOS MISTOLES	14	Córdoba	14168
        Localidad simple	-30.8726236468488	-64.2313503284229	Totoral	INDEC	14168080000	14168080	Santa Catalina			SANTA CATALINA	14	Córdoba	14168
        Localidad simple	-30.7741941000543	-64.1089868115808	Totoral	INDEC	14168090000	14168090	Sarmiento	141526	Sarmiento	SARMIENTO	14	Córdoba	14168
        Localidad simple	-30.4752563998131	-63.9850395218446	Totoral	INDEC	14168100000	14168100	Simbolar	143197	Simbolar	SIMBOLAR	14	Córdoba	14168
        Localidad simple	-30.9428574787407	-64.0884974374818	Totoral	INDEC	14168110000	14168110	Sinsacate	141533	Sinsacate	SINSACATE	14	Córdoba	14168
        Localidad simple	-30.7038437425366	-64.0682991778579	Totoral	INDEC	14168120000	14168120	Villa del Totoral	141540	Villa del Totoral	VILLA DEL TOTORAL	14	Córdoba	14168
        Localidad simple	-30.1681571983317	-63.9295889316832	Tulumba	INDEC	14175020000	14175020	Churqui Cañada			CHURQUI CAÑADA	14	Córdoba	14175
        Localidad simple	-30.176079345889	-63.8679636143828	Tulumba	INDEC	14175030000	14175030	El Rodeo	143211	El Rodeo	EL RODEO	14	Córdoba	14175
        Localidad simple	-29.7574368770199	-64.5298988550679	Tulumba	INDEC	14175040000	14175040	El Tuscal			EL TUSCAL	14	Córdoba	14175
        Localidad simple	-30.3812826841011	-63.5966635615372	Tulumba	INDEC	14175050000	14175050	Las Arrias	141547	Las Arrias	LAS ARRIAS	14	Córdoba	14175
        Localidad simple	-29.8063717196573	-64.7065412644276	Tulumba	INDEC	14175060000	14175060	Lucio V. Mansilla	141554	Lucio V. Mansilla	LUCIO V. MANSILLA	14	Córdoba	14175
        Localidad simple	-30.4293369124895	-63.4478615181188	Tulumba	INDEC	14175070000	14175070	Rosario del Saladillo			ROSARIO DEL SALADILLO	14	Córdoba	14175
        Localidad simple	-30.3546018393412	-63.9466529209876	Tulumba	INDEC	14175080000	14175080	San José de la Dormida	141561	San José de la Dormida	SAN JOSE DE LA DORMIDA	14	Córdoba	14175
        Localidad simple	-30.0090773891027	-64.6251344233407	Tulumba	INDEC	14175090000	14175090	San José de las Salinas	141568	San José de las Salinas	SAN JOSE DE LAS SALINAS	14	Córdoba	14175
        Localidad simple	-30.0887589979373	-64.1559536726827	Tulumba	INDEC	14175100000	14175100	San Pedro Norte	141575	San Pedro Norte	SAN PEDRO NORTE	14	Córdoba	14175
        Localidad simple	-30.397481563929	-64.1231771567642	Tulumba	INDEC	14175110000	14175110	Villa Tulumba	141582	Villa Tulumba	VILLA TULUMBA	14	Córdoba	14175
        Localidad simple	-33.6948816087071	-62.9114758842793	Unión	INDEC	14182010000	14182010	Aldea Santa María	143225	Aldea Santa María	ALDEA SANTA MARIA	14	Córdoba	14182
        Localidad simple	-32.3460951978736	-62.8853485991764	Unión	INDEC	14182020000	14182020	Alto Alegre	141589	Alto Alegre	ALTO ALEGRE	14	Córdoba	14182
        Localidad simple	-32.3908244034289	-63.0574835050696	Unión	INDEC	14182030000	14182030	Ana Zumarán	143232	Ana Zumarán	ANA ZUMARAN	14	Córdoba	14182
        Localidad simple	-32.5453815879853	-62.9833005213374	Unión	INDEC	14182040000	14182040	Ballesteros	141596	Ballesteros	BALLESTEROS	14	Córdoba	14182
        Localidad simple	-32.5885971215357	-63.027038782482	Unión	INDEC	14182050000	14182050	Ballesteros Sud	141603	Ballesteros Sud	BALLESTEROS SUR	14	Córdoba	14182
        Localidad simple	-32.6285600750708	-62.6891149083321	Unión	INDEC	14182060000	14182060	Bell Ville	141610	Bell Ville	BELL VILLE	14	Córdoba	14182
        Localidad simple	-33.5901195408333	-62.7303890735446	Unión	INDEC	14182070000	14182070	Benjamín Gould	141617	Benjamín Gould	BENJAMIN GOULD	14	Córdoba	14182
        Localidad simple	-33.562382718352	-62.8855974037259	Unión	INDEC	14182080000	14182080	Canals	141624	Canals	CANALS	14	Córdoba	14182
        Localidad simple	-32.3325969254244	-62.5135995097258	Unión	INDEC	14182090000	14182090	Chilibroste	141631	Chilibroste	CHILIBROSTE	14	Córdoba	14182
        Localidad simple	-32.3081476332499	-62.6531184151953	Unión	INDEC	14182100000	14182100	Cintra	141638	Cintra	CINTRA	14	Córdoba	14182
        Localidad simple	-33.3003017093034	-62.7132986409449	Unión	INDEC	14182110000	14182110	Colonia Bismarck	141645	Colonia Bismarck	COLONIA BISMARCK	14	Córdoba	14182
        Localidad simple	-33.4634972191589	-62.7323851196295	Unión	INDEC	14182120000	14182120	Colonia Bremen	143239	Colonia Bremen	COLONIA BREMEN	14	Córdoba	14182
        Localidad simple	-32.813142666622	-63.0329101219103	Unión	INDEC	14182130000	14182130	Idiazabal	141652	Idiazabal	IDIAZABAL	14	Córdoba	14182
        Localidad simple	-32.883580112369	-62.6802767037884	Unión	INDEC	14182140000	14182140	Justiniano Posse	141659	Justiniano Posse	JUSTINIANO POSSE	14	Córdoba	14182
        Localidad simple	-33.1529891830182	-62.8560737781526	Unión	INDEC	14182150000	14182150	Laborde	141666	Laborde	LABORDE	14	Córdoba	14182
        Localidad simple	-32.6112897765277	-62.5903410387947	Unión	INDEC	14182160000	14182160	Monte Leña	141673	Monte Leña	MONTE LEÑA	14	Córdoba	14182
        Localidad simple	-33.2045620901114	-62.601248151355	Unión	INDEC	14182170000	14182170	Monte Maíz	141680	Monte Maíz	MONTE MAIZ	14	Córdoba	14182
        Localidad simple	-32.5936423075986	-62.8360084604177	Unión	INDEC	14182180000	14182180	Morrison	141687	Morrison	MORRISON	14	Córdoba	14182
        Localidad simple	-32.3667416426436	-62.312071766995	Unión	INDEC	14182190000	14182190	Noetinger	141694	Noetinger	NOETINGER	14	Córdoba	14182
        Localidad simple	-32.8412715334934	-62.866054921116	Unión	INDEC	14182200000	14182200	Ordoñez	141701	Ordóñez	ORDOÑEZ	14	Córdoba	14182
        Localidad simple	-33.1249872931372	-63.0426957377869	Unión	INDEC	14182210000	14182210	Pascanas	141708	Pascanas	PASCANAS	14	Córdoba	14182
        Localidad simple	-33.880722767451	-62.8407250305139	Unión	INDEC	14182220000	14182220	Pueblo Italiano	141715	Pueblo Italiano	PUEBLO ITALIANO	14	Córdoba	14182
        Localidad simple	-32.4911089118919	-63.1028075144056	Unión	INDEC	14182230000	14182230	Ramón J. Cárcano			RAMON J. CARCANO	14	Córdoba	14182
        Localidad simple	-32.2128605395629	-62.6330068495678	Unión	INDEC	14182240000	14182240	San Antonio de Litín	141722	San Antonio de Litín	SAN ANTONIO DE LITIN	14	Córdoba	14182
        Localidad simple	-32.6303275526998	-62.4819712615844	Unión	INDEC	14182250000	14182250	San Marcos	141729	San Marcos Sud	SAN MARCOS	14	Córdoba	14182
        Localidad simple	-33.5383254710795	-63.0479276785208	Unión	INDEC	14182260000	14182260	San Severo			SAN SEVERO	14	Córdoba	14182
        Localidad simple	-33.7470669728167	-63.0989062265371	Unión	INDEC	14182270000	14182270	Viamonte	141736	Viamonte	VIAMONTE	14	Córdoba	14182
        Localidad simple	-32.763745038404	-62.7277954886855	Unión	INDEC	14182280000	14182280	Villa Los Patos	143246	Villa los Patos	VILLA LOS PATOS	14	Córdoba	14182
        Localidad simple	-33.1720228484368	-62.7700003268955	Unión	INDEC	14182290000	14182290	Wenceslao Escalante	141743	Wenceslao Escalante	WENCESLAO ESCALANTE	14	Córdoba	14182
        Localidad simple	-28.507677249655	-59.04433283502	Bella Vista	INDEC	18007010000	18007010	Bella Vista	180007	Bella Vista	BELLA VISTA	18	Corrientes	18007
        Localidad simple	-27.5506233626678	-57.5376245501398	Berón de Astrada	INDEC	18014010000	18014010	Berón de Astrada	180014	Berón de Astrada	BERON DE ASTRADA	18	Corrientes	18014
        Localidad simple	-27.3704269216251	-57.6552249966379	Berón de Astrada	INDEC	18014020000	18014020	Yahapé	180014	Berón de Astrada	YAHAPE	18	Corrientes	18014
        Localidad simple	-27.4632821641043	-58.8392333481757	Capital	INDEC	18021020000	18021020	Corrientes	180021	Corrientes	CORRIENTES	18	Corrientes	18021
        Localidad simple	-27.492827539732	-58.7167656641361	Capital	INDEC	18021030000	18021030	Laguna Brava	180021	Corrientes	LAGUNA BRAVA	18	Corrientes	18021
        Localidad simple	-27.5811452851025	-58.7419831223036	Capital	INDEC	18021040000	18021040	Riachuelo	180028	Riachuelo	RIACHUELO	18	Corrientes	18021
        Localidad simple	-27.5712103716288	-58.6958799100026	Capital	INDEC	18021050000	18021050	San Cayetano	180028	Riachuelo	SAN CAYETANO	18	Corrientes	18021
        Localidad simple	-28.3924910085097	-57.8866807708097	Concepción	INDEC	18028010000	18028010	Concepción	180042	Concepción	CONCEPCION	18	Corrientes	18028
        Localidad simple	-28.2674256970164	-58.1220612497619	Concepción	INDEC	18028020000	18028020	Santa Rosa	180035	Colonia Santa Rosa	SANTA ROSA	18	Corrientes	18028
        Localidad simple	-28.3062678179647	-58.2862966985736	Concepción	INDEC	18028030000	18028030	Tabay	180049	Tabay	TABAY	18	Corrientes	18028
        Localidad simple	-28.3720748439642	-58.3252896634835	Concepción	INDEC	18028040000	18028040	Tatacua	180056	Tatacuá	TATACUA	18	Corrientes	18028
        Localidad simple	-29.9787827263917	-58.3024356720991	Curuzu Cuatia	INDEC	18035010000	18035010	Cazadores Correntinos	180063	Curuzú Cuatiá	CAZADORES CORRENTINOS	18	Corrientes	18035
        Localidad simple	-29.7915233554051	-58.049945341682	Curuzu Cuatia	INDEC	18035020000	18035020	Curuzú Cuatiá	180063	Curuzú Cuatiá	CURUZU CUATIA	18	Corrientes	18035
        Localidad simple	-29.3404796154785	-58.6080890462901	Curuzu Cuatia	INDEC	18035030000	18035030	Perugorría	180070	Perugorría	PERUGORRIA	18	Corrientes	18035
        Localidad simple	-27.7035440870919	-58.7686060583955	Empedrado	INDEC	18042010000	18042010	El Sombrero	180077	Empedrado	EL SOMBRERO	18	Corrientes	18042
        Localidad simple	-27.9524556932224	-58.8074763893306	Empedrado	INDEC	18042020000	18042020	Empedrado	180077	Empedrado	EMPEDRADO	18	Corrientes	18042
        Localidad simple	-30.0159284150174	-59.5309812132883	Esquina	INDEC	18049010000	18049010	Esquina	180084	Esquina	ESQUINA	18	Corrientes	18049
        Localidad simple	-30.2195813152624	-59.3906028568407	Esquina	INDEC	18049020000	18049020	Pueblo Libertador	180091	Pueblo Libertador	PUEBLO LIBERTADOR	18	Corrientes	18049
        Localidad simple	-29.0985990956679	-56.5521631297617	General Alvear	INDEC	18056010000	18056010	Alvear	180098	Alvear	ALVEAR	18	Corrientes	18056
        Localidad simple	-28.8266239157245	-56.469525963544	General Alvear	INDEC	18056020000	18056020	Estación Torrent	180105	Estación Torrent	ESTACION TORRENT	18	Corrientes	18056
        Localidad simple	-27.4250661277127	-57.3376993601456	General Paz	INDEC	18063010000	18063010	Itá Ibaté	180119	Itá Ibaté	ITA IBATE	18	Corrientes	18063
        Localidad simple	-27.7329656323888	-57.9193852921423	General Paz	INDEC	18063020000	18063020	Lomas de Vallejos	180126	Lomas de Vallejos	LOMAS DE VALLEJOS	18	Corrientes	18063
        Localidad simple	-27.751995828158	-57.6225136238666	General Paz	INDEC	18063030000	18063030	Nuestra Señora del Rosario de Caá Catí	180112	Caá Catí	NUESTRA SEÑORA DEL ROSARIO DE CAA CATI	18	Corrientes	18063
        Localidad simple	-27.9407694115665	-57.9009156630285	General Paz	INDEC	18063040000	18063040	Palmar Grande	180133	Palmar Grande	PALMAR GRANDE	18	Corrientes	18063
        Localidad simple	-29.1457706796124	-59.1820838282047	Goya	INDEC	18070010000	18070010	Carolina	180137	Carolina	COLONIA CAROLINA	18	Corrientes	18070
        Localidad simple	-29.1413439330685	-59.2605311638707	Goya	INDEC	18070020000	18070020	Goya	180140	Goya	GOYA	18	Corrientes	18070
        Localidad simple	-27.2693038533077	-58.2434782721969	Itatí	INDEC	18077010000	18077010	Itatí	180147	Itatí	ITATI	18	Corrientes	18077
        Localidad simple	-27.3659289314983	-58.3003087514316	Itatí	INDEC	18077020000	18077020	Ramada Paso	180154	Ramada Paso	RAMADA PASO	18	Corrientes	18077
        Componente de localidad compuesta	-27.9156591543749	-55.8233285990026	Ituzaingó	INDEC	18084010000	18084010	Colonia Liebig-s	180161	Colonia Liebig-S	COLONIA LIEBIG-S	18	Corrientes	18084
        Localidad simple	-27.5910429413741	-56.7039739448011	Ituzaingó	INDEC	18084020000	18084020	Ituzaingó	180168	Ituzaingó	ITUZAINGO	18	Corrientes	18084
        Localidad simple	-27.5073854602181	-56.7411670700869	Ituzaingó	INDEC	18084030000	18084030	San Antonio	180175	San Antonio	SAN ANTONIO	18	Corrientes	18084
        Localidad simple	-27.745785086345	-55.9000479407003	Ituzaingó	INDEC	18084040000	18084040	San Carlos	180182	San Carlos	SAN CARLOS	18	Corrientes	18084
        Localidad simple	-27.6329473311043	-56.9062014827101	Ituzaingó	INDEC	18084050000	18084050	Villa Olivari	180186	Villa Olivari	VILLA OLIVARI	18	Corrientes	18084
        Localidad simple	-28.8357350715385	-59.0068578339405	Lavalle	INDEC	18091010000	18091010	Cruz de los Milagros	180189	Cruz de los Milagros	CRUZ DE LOS MILAGROS	18	Corrientes	18091
        Localidad simple	-28.9108688742576	-58.9359577546112	Lavalle	INDEC	18091020000	18091020	Gobernador Juan E. Martínez	180196	Gobernador Martínez	GOBERNADOR JUAN E. MARTINEZ	18	Corrientes	18091
        Localidad simple	-29.0249812495642	-59.1818570100087	Lavalle	INDEC	18091030000	18091030	Lavalle	180203	Lavalle	LAVALLE	18	Corrientes	18091
        Localidad simple	-28.9847966992846	-59.1017576429994	Lavalle	INDEC	18091040000	18091040	Santa Lucía	180210	Santa Lucía	SANTA LUCIA	18	Corrientes	18091
        Localidad simple	-28.9940335487267	-59.0774380130144	Lavalle	INDEC	18091050000	18091050	Villa Córdoba	180210	Santa Lucía	VILLA CORDOBA	18	Corrientes	18091
        Localidad simple	-29.0295902166451	-58.9097321884449	Lavalle	INDEC	18091060000	18091060	Yatayti Calle	180217	Yataytí Calle	YATAYTI CALLE	18	Corrientes	18091
        Localidad simple	-28.0460572855636	-58.224984006822	Mburucuyá	INDEC	18098010000	18098010	Mburucuyá	180224	Mburucuyá	MBURUCUYA	18	Corrientes	18098
        Localidad simple	-29.105919764542	-58.3424746747141	Mercedes	INDEC	18105010000	18105010	Felipe Yofré	180231	Felipe Yofré	FELIPE YOFRE	18	Corrientes	18105
        Localidad simple	-29.3763665588886	-58.1960231004583	Mercedes	INDEC	18105020000	18105020	Mariano I. Loza	180238	Mariano I. Loza	MARIANO I. LOZA	18	Corrientes	18105
        Localidad simple	-29.1833885579996	-58.0742364424806	Mercedes	INDEC	18105030000	18105030	Mercedes	180245	Mercedes	MERCEDES	18	Corrientes	18105
        Localidad simple	-30.0439760349315	-57.8235193980386	Monte Caseros	INDEC	18112010000	18112010	Colonia Libertad	180252	Colonia Libertad	COLONIA LIBERTAD	18	Corrientes	18112
        Localidad simple	-30.0125285200771	-57.8591295180443	Monte Caseros	INDEC	18112020000	18112020	Estación Libertad	180252	Colonia Libertad	ESTACION LIBERTAD	18	Corrientes	18112
        Localidad simple	-30.4178964519869	-57.8560694385919	Monte Caseros	INDEC	18112030000	18112030	Juan Pujol	180259	Juan Pujol	JUAN PUJOL	18	Corrientes	18112
        Localidad simple	-30.6176804049267	-57.9628254585589	Monte Caseros	INDEC	18112040000	18112040	Mocoretá	180266	Mocoretá	MOCORETA	18	Corrientes	18112
        Localidad simple	-30.2515527236356	-57.6388140007913	Monte Caseros	INDEC	18112050000	18112050	Monte Caseros	180273	Monte Caseros	MONTE CASEROS	18	Corrientes	18112
        Localidad simple	-29.9084817138799	-57.9581770148793	Monte Caseros	INDEC	18112060000	18112060	Parada Acuña	180252	Colonia Libertad	PARADA ACUÑA	18	Corrientes	18112
        Localidad simple	-30.3190400199696	-57.7289868202181	Monte Caseros	INDEC	18112070000	18112070	Parada Labougle	180273	Monte Caseros	PARADA LABOUGLE	18	Corrientes	18112
        Localidad simple	-29.8203735190576	-57.4296479379825	Paso de los Libres	INDEC	18119010000	18119010	Bonpland	180280	Bonpland	BONPLAND	18	Corrientes	18119
        Localidad simple	-29.9053454011034	-57.5743693513377	Paso de los Libres	INDEC	18119020000	18119020	Parada Pucheta	180287	Parada Pucheta	PARADA PUCHETA	18	Corrientes	18119
        Localidad simple	-29.7116998596983	-57.0877441027999	Paso de los Libres	INDEC	18119030000	18119030	Paso de los Libres	180294	Paso de los Libres	PASO DE LOS LIBRES	18	Corrientes	18119
        Localidad simple	-29.5043114402955	-56.9760306946844	Paso de los Libres	INDEC	18119040000	18119040	Tapebicuá	180301	Tapebicuá	TAPEBICUA	18	Corrientes	18119
        Localidad simple	-28.2553374256059	-58.6238010038908	Saladas	INDEC	18126010000	18126010	Saladas	180308	Saladas	SALADAS	18	Corrientes	18126
        Localidad simple	-28.1314603295453	-58.7668321022746	Saladas	INDEC	18126020000	18126020	San Lorenzo	180315	San Lorenzo	SAN LORENZO	18	Corrientes	18126
        Localidad simple	-27.4336721947021	-58.624327887603	San Cosme	INDEC	18133010000	18133010	Ingenio Primer Correntino	180336	Santa Ana	INGENIO PRIMER CORRENTINO	18	Corrientes	18133
        Localidad simple	-27.3150060127599	-58.5720142980631	San Cosme	INDEC	18133020000	18133020	Paso de la Patria	180322	Paso de la Patria	PASO DE LA PATRIA	18	Corrientes	18133
        Localidad simple	-27.3711801624716	-58.5115291113063	San Cosme	INDEC	18133030000	18133030	San Cosme	180329	San Cosme	SAN COSME	18	Corrientes	18133
        Localidad simple	-27.455091402543	-58.6530388459631	San Cosme	INDEC	18133040000	18133040	Santa Ana	180336	Santa Ana	SANTA ANA	18	Corrientes	18133
        Localidad simple	-27.5081078409756	-58.5554744159758	San Luis del Palmar	INDEC	18140010000	18140010	San Luis del Palmar	180350	San Luis del Palmar	SAN LUIS DEL PALMAR	18	Corrientes	18140
        Localidad simple	-28.5373400329858	-57.1712310407172	San Martín	INDEC	18147010000	18147010	Colonia Carlos Pellegrini	180357	Colonia Carlos Pellegrini	COLONIA CARLOS PELLEGRINI	18	Corrientes	18147
        Localidad simple	-29.3669865639555	-56.8292389472207	San Martín	INDEC	18147020000	18147020	Guaviraví	180364	Guaviraví	GUAVIRAVI	18	Corrientes	18147
        Localidad simple	-29.1736584106926	-56.6450161726372	San Martín	INDEC	18147030000	18147030	La Cruz	180371	La Cruz	LA CRUZ	18	Corrientes	18147
        Localidad simple	-29.4706323042238	-56.8158358918793	San Martín	INDEC	18147040000	18147040	Yapeyú	180378	Yapeyú	YAPEYU	18	Corrientes	18147
        Localidad simple	-27.7684514067067	-57.274839083927	San Miguel	INDEC	18154010000	18154010	Loreto	180385	Loreto	LORETO	18	Corrientes	18154
        Localidad simple	-27.9947735055436	-57.5919539782996	San Miguel	INDEC	18154020000	18154020	San Miguel	180392	San Miguel	SAN MIGUEL	18	Corrientes	18154
        Localidad simple	-28.9549218176889	-58.5716489831846	San Roque	INDEC	18161010000	18161010	Chavarría	180413	Chavarría	CHAVARRIA	18	Corrientes	18161
        Localidad simple	-28.5252148833089	-58.4869345494056	San Roque	INDEC	18161020000	18161020	Colonia Pando	180417	Colonia Pando	COLONIA PANDO	18	Corrientes	18161
        Localidad simple	-28.8418348631681	-58.8280463835778	San Roque	INDEC	18161030000	18161030	9 de Julio	180399	9 de Julio	9 DE JULIO	18	Corrientes	18161
        Localidad simple	-28.7505433489253	-58.6545368651224	San Roque	INDEC	18161040000	18161040	Pedro R. Fernández	180406	Pedro R. Fernández	PEDRO R. FERNANDEZ	18	Corrientes	18161
        Localidad simple	-28.5732308799035	-58.7100567505645	San Roque	INDEC	18161050000	18161050	San Roque	180420	San Roque	SAN ROQUE	18	Corrientes	18161
        Localidad simple	-28.2260143622167	-55.7844092003668	Santo Tomé	INDEC	18168010000	18168010	José Rafael Gómez	180441	Jose Rafael Gomez	JOSE R. GOMEZ	18	Corrientes	18168
        Localidad simple	-28.1729435857266	-55.6513324031087	Santo Tomé	INDEC	18168020000	18168020	Garruchos	180427	Garruchos	GARRUCHOS	18	Corrientes	18168
        Localidad simple	-28.0455566790186	-56.0190197167242	Santo Tomé	INDEC	18168030000	18168030	Gobernador Igr. Valentín Virasoro	180434	Gobernador Ing. Valentín Virasoro	GOBERNADOR IGR.VALENTIN VIRASORO	18	Corrientes	18168
        Localidad simple	-28.5511588178368	-56.0420862814163	Santo Tomé	INDEC	18168040000	18168040	Santo Tomé	180448	Santo Tomé	SANTO TOME	18	Corrientes	18168
        Localidad simple	-30.0867528651818	-58.7879617250662	Sauce	INDEC	18175010000	18175010	Sauce	180455	Sauce	SAUCE	18	Corrientes	18175
        Localidad simple	-26.602273964006	-60.9492636999567	Almirante Brown	INDEC	22007010000	22007010	Concepción del Bermejo	220007	Concepción del Bermejo	CONCEPCION DEL BERMEJO	22	Chaco	22007
        Localidad simple	-26.4082976307567	-61.4134271371597	Almirante Brown	INDEC	22007020000	22007020	Los Frentones	220014	Los Frentones	LOS FRENTONES	22	Chaco	22007
        Localidad simple	-26.5063974406178	-61.1764901971888	Almirante Brown	INDEC	22007030000	22007030	Pampa del Infierno	220021	Pampa del Infierno	PAMPA DEL INFIERNO	22	Chaco	22007
        Localidad simple	-26.3078818113872	-61.6540440649869	Almirante Brown	INDEC	22007040000	22007040	Río Muerto	220014	Los Frentones	RIO MUERTO	22	Chaco	22007
        Localidad simple	-25.6156598937138	-63.2692964997065	Almirante Brown	INDEC	22007050000	22007050	Taco Pozo	220028	Taco Pozo	TACO POZO	22	Chaco	22007
        Localidad simple	-26.9349378591637	-58.6612848328678	Bermejo	INDEC	22014010000	22014010	General Vedia	220035	General Vedia	GENERAL VEDIA	22	Chaco	22014
        Localidad simple	-27.2927852739485	-58.6178377359072	Bermejo	INDEC	22014020000	22014020	Isla del Cerrito	220042	Isla del Cerrito	ISLA DEL CERRITO	22	Chaco	22014
        Componente de localidad compuesta	-27.0379596283785	-58.7069377183708	Bermejo	INDEC	22014030000	22014030	La Leonesa	220049	La Leonesa	LA LEONESA	22	Chaco	22014
        Componente de localidad compuesta	-27.0478975207771	-58.6795739267563	Bermejo	INDEC	22014040000	22014040	Las Palmas	220056	Las Palmas	LAS PALMAS	22	Chaco	22014
        Localidad simple	-26.9073753724695	-58.5428316633796	Bermejo	INDEC	22014050000	22014050	Puerto Bermejo Nuevo	220063	Puerto Bermejo	PUERTO BERMEJO NUEVO	22	Chaco	22014
        Localidad simple	-26.9285481385672	-58.5063036590574	Bermejo	INDEC	22014060000	22014060	Puerto Bermejo Viejo	220063	Puerto Bermejo	PUERTO BERMEJO VIEJO	22	Chaco	22014
        Localidad simple	-26.661480092829	-58.6355818176747	Bermejo	INDEC	22014070000	22014070	Puerto Eva Perón	220070	Puerto Eva Perón	PUERTO EVA PERON	22	Chaco	22014
        Localidad simple	-26.7916058929378	-60.4421462814095	Comandante Fernández	INDEC	22021010000	22021010	Presidencia Roque Sáenz Peña	220077	Presidencia Roque Sáenz Peña	PRESIDENCIA ROQUE SAENZ PENA	22	Chaco	22021
        Localidad simple	-27.2200458502784	-61.1915854495204	Chacabuco	INDEC	22028010000	22028010	Charata	220084	Charata	CHARATA	22	Chaco	22028
        Localidad simple	-27.4896487904756	-61.6738771708385	12 de Octubre	INDEC	22036010000	22036010	Gancedo	220091	Gancedo	GANCEDO	22	Chaco	22036
        Localidad simple	-27.4231812966856	-61.4765845551068	12 de Octubre	INDEC	22036020000	22036020	General Capdevila	220098	General Capdevila	GENERAL CAPDEVILA	22	Chaco	22036
        Localidad simple	-27.3252979421708	-61.282210419911	12 de Octubre	INDEC	22036030000	22036030	General Pinedo	220105	General Pinedo	GENERAL PINEDO	22	Chaco	22036
        Localidad simple	-27.4312285767758	-61.0177584158265	12 de Octubre	INDEC	22036040000	22036040	Mesón de Fierro	220105	General Pinedo	MESON DE FIERRO	22	Chaco	22036
        Localidad simple	-27.3957449255406	-61.1029787390413	12 de Octubre	INDEC	22036050000	22036050	Pampa Landriel	220105	General Pinedo	PAMPA LANDRIEL	22	Chaco	22036
        Localidad simple	-27.610539212014	-61.344844244037	2 de Abril	INDEC	22039010000	22039010	Hermoso Campo	220112	Hermoso Campo	HERMOSO CAMPO	22	Chaco	22039
        Localidad simple	-27.4876216159572	-61.3238818419592	2 de Abril	INDEC	22039020000	22039020	Itín	220112	Hermoso Campo	ITIN	22	Chaco	22039
        Localidad simple	-27.9175852858656	-61.3995694680726	Fray Justo Santa María de Oro	INDEC	22043010000	22043010	Chorotis	220119	Chorotis	CHOROTIS	22	Chaco	22043
        Localidad simple	-27.8356008575455	-61.1361742191871	Fray Justo Santa María de Oro	INDEC	22043020000	22043020	Santa Sylvina	220126	Santa Sylvina	SANTA SYLVINA	22	Chaco	22043
        Localidad simple	-27.8181539157701	-61.3815664200405	Fray Justo Santa María de Oro	INDEC	22043030000	22043030	Venados Grandes	220119	Chorotis	VENADOS GRANDES	22	Chaco	22043
        Localidad simple	-26.9556760087163	-60.9707574059512	General Belgrano	INDEC	22049010000	22049010	Corzuela	220113	Corzuela	CORZUELA	22	Chaco	22049
        Localidad simple	-27.1073248470025	-59.4475325100431	General Donovan	INDEC	22056010000	22056010	La Escondida	220140	La Escondida	LA ESCONDIDA	22	Chaco	22056
        Localidad simple	-27.1297934337807	-59.3774619894492	General Donovan	INDEC	22056020000	22056020	La Verde	220154	La Verde	LA VERDE	22	Chaco	22056
        Localidad simple	-27.1587903465778	-59.3903975007013	General Donovan	INDEC	22056030000	22056030	Lapachito	220147	Lapachito	LAPACHITO	22	Chaco	22056
        Localidad simple	-27.211618544441	-59.2883662132688	General Donovan	INDEC	22056040000	22056040	Makallé	220161	Makallé	MAKALLE	22	Chaco	22056
        Localidad simple	-25.4176698636006	-60.4139677023547	General Güemes	INDEC	22063010000	22063010	El Espinillo	220203	Villa Río Bermejito	EL ESPINILLO	22	Chaco	22063
        Localidad simple	-24.579149375301	-61.5461702165927	General Güemes	INDEC	22063020000	22063020	El Sauzal	220168	El Sauzalito	EL SAUZAL	22	Chaco	22063
        Localidad simple	-24.4345499393074	-61.6813716975806	General Güemes	INDEC	22063030000	22063030	El Sauzalito	220168	El Sauzalito	EL SAUZALITO	22	Chaco	22063
        Localidad simple	-25.7056308542578	-60.2037478681132	General Güemes	INDEC	22063040000	22063040	Fortín Lavalle	220203	Villa Río Bermejito	FORTIN LAVALLE	22	Chaco	22063
        Localidad simple	-25.1560600566745	-61.8424104268078	General Güemes	INDEC	22063050000	22063050	Fuerte Esperanza	220175	Fuerte Esperanza	FUERTE ESPERANZA	22	Chaco	22063
        Localidad simple	-25.9504150377594	-60.6243211030425	General Güemes	INDEC	22063060000	22063060	Juan José Castelli	220182	Juan José Castelli	JUAN JOSE CASTELLI	22	Chaco	22063
        Localidad simple	-24.9334418837191	-61.4846998398146	General Güemes	INDEC	22063080000	22063080	Nueva Pompeya	220169	Misión Nueva Pompeya	NUEVA POMPEYA	22	Chaco	22063
        Localidad simple	-25.6424413894079	-60.2629438807651	General Güemes	INDEC	22063100000	22063100	Villa Río Bermejito	220203	Villa Río Bermejito	VILLA RIO BERMEJITO	22	Chaco	22063
        Localidad simple	-24.6913977720534	-61.4304454802334	General Güemes	INDEC	22063110000	22063110	Wichi	220168	El Sauzalito	WICHI	22	Chaco	22063
        Localidad simple	-26.0673623556601	-60.5633873019222	General Güemes	INDEC	22063120000	22063120	Zaparinqui	220182	Juan José Castelli	ZAPARINQUI	22	Chaco	22063
        Localidad simple	-26.6904269113097	-60.7309487066584	Independencia	INDEC	22070010000	22070010	Avia Terai	220210	Avia Terai	AVIA TERAI	22	Chaco	22070
        Localidad simple	-26.8038644067827	-60.8423032131182	Independencia	INDEC	22070020000	22070020	Campo Largo	220217	Campo Largo	CAMPO LARGO	22	Chaco	22070
        Localidad simple	-26.8891042551114	-60.908152214423	Independencia	INDEC	22070030000	22070030	Fortín Las Chuñas	220217	Campo Largo	FORTIN LAS CHUÑAS	22	Chaco	22070
        Localidad simple	-26.7314687114399	-60.6190285151237	Independencia	INDEC	22070040000	22070040	Napenay	220224	Napenay	NAPENAY	22	Chaco	22070
        Localidad simple	-27.2759309408353	-59.1523781564389	Libertad	INDEC	22077010000	22077010	Colonia Popular	220231	Colonia Popular	COLONIA POPULAR	22	Chaco	22077
        Localidad simple	-27.4128679939929	-59.4201579706051	Libertad	INDEC	22077020000	22077020	Estación General Obligado	220254	Puerto Tirol	ESTACION GENERAL OBLIGADO	22	Chaco	22077
        Localidad simple	-27.2572195505018	-59.2340486127892	Libertad	INDEC	22077030000	22077030	Laguna Blanca	220238	Laguna Blanca	LAGUNA BLANCA	22	Chaco	22077
        Localidad simple	-27.3745125614532	-59.0953159917862	Libertad	INDEC	22077040000	22077040	Puerto Tirol	220254	Puerto Tirol	PUERTO TIROL	22	Chaco	22077
        Localidad simple	-26.5815849580294	-59.6329803967089	Libertador General San Martín	INDEC	22084010000	22084010	Ciervo Petiso	220252	Ciervo Petiso	CIERVO PETISO	22	Chaco	22084
        Localidad simple	-26.5340730622708	-59.334711358946	Libertador General San Martín	INDEC	22084020000	22084020	General José de San Martín	220259	Gral. San Martengeneral San Martín	GENERAL JOSE DE SAN MARTIN	22	Chaco	22084
        Localidad simple	-26.8374120457599	-59.0641175796047	Libertador General San Martín	INDEC	22084030000	22084030	La Eduvigis	220266	La Eduvigis	LA EDUVIGIS	22	Chaco	22084
        Localidad simple	-26.4967013914467	-59.6799372880349	Libertador General San Martín	INDEC	22084040000	22084040	Laguna Limpia	220273	Laguna Limpia	LAGUNA LIMPIA	22	Chaco	22084
        Localidad simple	-26.702247857191	-59.1237850343206	Libertador General San Martín	INDEC	22084050000	22084050	Pampa Almirón	220280	Pampa Almirón	PAMPA ALMIRON	22	Chaco	22084
        Localidad simple	-26.050714758193	-59.9412241077467	Libertador General San Martín	INDEC	22084060000	22084060	Pampa del Indio	220287	Pampa del Indio	PAMPA DEL INDIO	22	Chaco	22084
        Localidad simple	-26.1402007626997	-59.5968452905131	Libertador General San Martín	INDEC	22084070000	22084070	Presidencia Roca	220294	Presidencia Roca	PRESIDENCIA ROCA	22	Chaco	22084
        Localidad simple	-26.8044755779716	-58.9585454452623	Libertador General San Martín	INDEC	22084080000	22084080	Selvas del Río de Oro	220266	La Eduvigis	SELVAS DEL RIO DE ORO	22	Chaco	22084
        Localidad simple	-26.3378349285309	-60.4299349548752	Maipú	INDEC	22091010000	22091010	Tres Isletas	220301	Tres Isletas	TRES ISLETAS	22	Chaco	22091
        Localidad simple	-27.682571155615	-60.9091956314644	Mayor Luis J. Fontana	INDEC	22098010000	22098010	Coronel Du Graty	220308	Coronel Du Graty	CORONEL DU GRATY	22	Chaco	22098
        Localidad simple	-27.5587251493486	-60.5259907543736	Mayor Luis J. Fontana	INDEC	22098020000	22098020	Enrique Urien	220315	Enrique Urien	ENRIQUE URIEN	22	Chaco	22098
        Localidad simple	-27.5788592432947	-60.7141120066309	Mayor Luis J. Fontana	INDEC	22098030000	22098030	Villa Angela	220322	Villa Ángela	VILLA ANGELA	22	Chaco	22098
        Localidad simple	-27.0885167236059	-61.0836993088858	9 de Julio	INDEC	22105010000	22105010	Las Breñas	220329	Las Breñas	LAS BREÑAS	22	Chaco	22105
        Localidad simple	-27.1781993384686	-60.6315741848516	O-Higgins	INDEC	22112010000	22112010	La Clotilde	220336	La Clotilde	LA CLOTILDE	22	Chaco	22112
        Localidad simple	-27.1157899755692	-60.5898941741226	O-Higgins	INDEC	22112020000	22112020	La Tigra	220343	La Tigra	LA TIGRA	22	Chaco	22112
        Localidad simple	-27.2904384132605	-60.7149736332962	O-Higgins	INDEC	22112030000	22112030	San Bernardo	220350	San Bernardo	SAN BERNARDO	22	Chaco	22112
        Localidad simple	-27.0029714359347	-59.847600385659	Presidencia de la Plaza	INDEC	22119010000	22119010	Presidencia de la Plaza	220357	Presidencia de la Plaza	PRESIDENCIA DE LA PLAZA	22	Chaco	22119
        Localidad simple	-27.4480426212168	-58.8551013275047	1° de Mayo	INDEC	22126010000	22126010	Barrio de los Pescadores	220364	Colonia Benitez	BARRIO DE LOS PESCADORES	22	Chaco	22126
        Localidad simple	-27.3305884379906	-58.9450102746869	1° de Mayo	INDEC	22126020000	22126020	Colonia Benítez	220364	Colonia Benitez	COLONIA BENITEZ	22	Chaco	22126
        Localidad simple	-27.2616473234151	-58.9741473116095	1° de Mayo	INDEC	22126030000	22126030	Margarita Belén	220371	Margarita Belén	MARGARITA BELEN	22	Chaco	22126
        Localidad simple	-26.8732071732978	-60.2185241226399	Quitilipi	INDEC	22133010000	22133010	Quitilipi	220378	Quitilipi	QUITILIPI	22	Chaco	22133
        Localidad simple	-26.4551186226266	-60.1646165913523	Quitilipi	INDEC	22133020000	22133020	Villa El Palmar	220378	Quitilipi	VILLA EL PALMAR	22	Chaco	22133
        Componente de localidad compuesta	-27.4877739289761	-58.9327416886365	San Fernando	INDEC	22140010000	22140010	Barranqueras	220385	Barranqueras	BARRANQUERAS	22	Chaco	22140
        Localidad simple	-27.8868655966917	-59.2791003619491	San Fernando	INDEC	22140020000	22140020	Basail	220392	Basail	BASAIL	22	Chaco	22140
        Localidad simple	-27.5620449432874	-59.3096911774268	San Fernando	INDEC	22140030000	22140030	Colonia Baranda	220413	Resistencia	COLONIA BARANDA	22	Chaco	22140
        Componente de localidad compuesta	-27.4167127425858	-59.04393778912	San Fernando	INDEC	22140040000	22140040	Fontana	220399	Fontana	FONTANA	22	Chaco	22140
        Componente de localidad compuesta	-27.5106090846354	-58.938994465923	San Fernando	INDEC	22140050000	22140050	Puerto Vilelas	220406	Puerto Vilelas	PUERTO VILELAS	22	Chaco	22140
        Componente de localidad compuesta	-27.4521194584549	-58.9876174408016	San Fernando	INDEC	22140060000	22140060	Resistencia	220413	Resistencia	RESISTENCIA	22	Chaco	22140
        Localidad simple	-27.5222254234698	-60.3941746057505	San Lorenzo	INDEC	22147010000	22147010	Samuhú	220420	Samuhú	SAMUHU	22	Chaco	22147
        Localidad simple	-27.2895492409257	-60.4155962080604	San Lorenzo	INDEC	22147020000	22147020	Villa Berthet	220427	Villa Berthet	VILLA BERTHET	22	Chaco	22147
        Localidad simple	-26.8050732181614	-59.5596523744138	Sargento Cabral	INDEC	22154010000	22154010	Capitán Solari	220434	Capitán Solari	CAPITAN SOLARI	22	Chaco	22154
        Localidad simple	-26.9324550960675	-59.5204851339372	Sargento Cabral	INDEC	22154020000	22154020	Colonia Elisa	220441	Colonias Elisa	COLONIA ELISA	22	Chaco	22154
        Localidad simple	-26.7000971775462	-59.6277421824927	Sargento Cabral	INDEC	22154030000	22154030	Colonias Unidas	220448	Colonias Unidas	COLONIAS UNIDAS	22	Chaco	22154
        Localidad simple	-27.0032121063146	-59.4825136520473	Sargento Cabral	INDEC	22154040000	22154040	Ingeniero Barbet	220441	Colonias Elisa	INGENIERO BARBET	22	Chaco	22154
        Localidad simple	-26.6193460346699	-59.8042763819042	Sargento Cabral	INDEC	22154050000	22154050	Las Garcitas	220455	Las Garcitas	LAS GARCITAS	22	Chaco	22154
        Localidad simple	-27.6553304709616	-59.8624460245382	Tapenagá	INDEC	22161010000	22161010	Charadai	220469	Charadai	CHARADAI	22	Chaco	22161
        Localidad simple	-27.5303116601138	-59.5765171513905	Tapenagá	INDEC	22161020000	22161020	Cote Lai	220462	Cote Lai	COTE LAI	22	Chaco	22161
        Localidad simple	-27.5077849029352	-60.1635277537413	Tapenagá	INDEC	22161030000	22161030	Haumonia	220469	Charadai	HAUMONIA	22	Chaco	22161
        Localidad simple	-27.5427589336639	-59.9578541039413	Tapenagá	INDEC	22161040000	22161040	Horquilla	220469	Charadai	HORQUILLA	22	Chaco	22161
        Localidad simple	-27.8738009106984	-59.939569589112	Tapenagá	INDEC	22161050000	22161050	La Sabana	220469	Charadai	LA SABANA	22	Chaco	22161
        Localidad simple	-26.9583436350996	-60.1902370459592	25 de Mayo	INDEC	22168010000	22168010	Colonia Aborigen	220476	Machagai	COLONIA ABORIGEN	22	Chaco	22168
        Localidad simple	-26.9287335504143	-60.0477196130638	25 de Mayo	INDEC	22168020000	22168020	Machagai	220476	Machagai	MACHAGAI	22	Chaco	22168
        Localidad simple	-26.9032617040064	-60.1173839257014	25 de Mayo	INDEC	22168030000	22168030	Napalpí	220476	Machagai	NAPALPI	22	Chaco	22168
        Localidad simple	-42.0119886969656	-65.3064500926092	Biedma	INDEC	26007010000	26007010	Arroyo Verde			ARROYO VERDE	26	Chubut	26007
        Localidad simple	-42.7550996783449	-65.0422298178163	Biedma	INDEC	26007020000	26007020	Puerto Madryn	260007	Puerto Madryn	PUERTO MADRYN	26	Chubut	26007
        Localidad simple	-42.5736171931039	-64.2836893467339	Biedma	INDEC	26007030000	26007030	Puerto Pirámides			PUERTO PIRAMIDE	26	Chubut	26007
        Localidad simple	-42.811590013144	-65.051417803805	Biedma	INDEC	26007040000	26007040	Quintas El Mirador	260007	Puerto Madryn	QUINTA EL MIRADOR	26	Chubut	26007
        Localidad simple	-42.6456158957863	-65.0647229672572	Biedma	INDEC	26007050000	26007050	Reserva Area Protegida El Doradillo	260007	Puerto Madryn	RESERVA AREA PROTEGIDA EL DORADILLO	26	Chubut	26007
        Localidad simple	-42.0687961260085	-71.2158343137726	Cushamen	INDEC	26014010000	26014010	Buenos Aires Chico	260028	El Maitén	BUENOS AIRES CHICO	26	Chubut	26014
        Localidad simple	-42.5105313648355	-71.4351548288659	Cushamen	INDEC	26014020000	26014020	Cholila	260014	Cholila	CHOLILA	26	Chubut	26014
        Localidad simple	-42.6016255836041	-70.4575737273538	Cushamen	INDEC	26014025000	26014025	Costa del Chubut			COSTA DE CHUBUT	26	Chubut	26014
        Localidad simple	-42.1766611028137	-70.6626188429181	Cushamen	INDEC	26014030000	26014030	Cushamen Centro	268014	Cushamen	CUSHAMEN CENTRO	26	Chubut	26014
        Localidad simple	-42.0679666637038	-71.5206708370904	Cushamen	INDEC	26014040000	26014040	El Hoyo	260021	El Hoyo	EL HOYO	26	Chubut	26014
        Localidad simple	-42.0542854358373	-71.1673153308386	Cushamen	INDEC	26014050000	26014050	El Maitén	260028	El Maitén	EL MAITEN	26	Chubut	26014
        Localidad simple	-42.2329247123472	-71.3695066579513	Cushamen	INDEC	26014060000	26014060	Epuyén	260035	Epuyén	EPUYEN	26	Chubut	26014
        Localidad simple	-42.3910620005992	-70.5780784399414	Cushamen	INDEC	26014065000	26014065	Fofo Cahuel			FOFO CAHUEL	26	Chubut	26014
        Localidad simple	-42.7267578946733	-70.5354876126711	Cushamen	INDEC	26014070000	26014070	Gualjaina	265007	Gualjaina	GUALJAINA	26	Chubut	26014
        Localidad simple	-42.2135356830147	-71.4296625433553	Cushamen	INDEC	26014080000	26014080	Lago Epuyén	260035	Epuyén	LAGO EPUYEN	26	Chubut	26014
        Localidad simple	-42.0672923130861	-71.5981575625236	Cushamen	INDEC	26014090000	26014090	Lago Puelo	260042	Lago Puelo	LAGO PUELO	26	Chubut	26014
        Localidad simple	-42.4288626216315	-71.0683951630343	Cushamen	INDEC	26014100000	26014100	Leleque			LELEQUE	26	Chubut	26014
        Localidad simple	-45.7366075458208	-67.485214728265	Escalante	INDEC	26021010000	26021010	Astra	260049	Comodoro Rivadavia	ASTRA	26	Chubut	26021
        Localidad simple	-45.1143552826119	-66.5349166167103	Escalante	INDEC	26021020000	26021020	Bahía Bustamante			BAHIA BUSTAMANTE	26	Chubut	26021
        Entidad	-45.782807331545	-67.5033367870766	Escalante	INDEC	26021030001	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	ACCESO NORTE	26	Chubut	26021
        Entidad	-45.7482508559011	-67.3786501769463	Escalante	INDEC	26021030002	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO CALETA CORDOVA	26	Chubut	26021
        Entidad	-45.7757274867383	-67.3895609391029	Escalante	INDEC	26021030003	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO CALETA OLIVARES	26	Chubut	26021
        Entidad	-45.8180472017947	-67.4820283811333	Escalante	INDEC	26021030004	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO CASTELLI	26	Chubut	26021
        Entidad	-45.7969335159784	-67.5038537987439	Escalante	INDEC	26021030005	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO CIUDADELA	26	Chubut	26021
        Entidad	-45.7935756857887	-67.5039634957522	Escalante	INDEC	26021030006	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO GASODUCTO	26	Chubut	26021
        Entidad	-45.8217123319455	-67.4921204994732	Escalante	INDEC	26021030007	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO GÜEMES	26	Chubut	26021
        Entidad	-45.8286806171316	-67.5429175806012	Escalante	INDEC	26021030008	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO LAPRIDA	26	Chubut	26021
        Entidad	-45.8171962363307	-67.5384037096511	Escalante	INDEC	26021030009	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO MANANTIAL ROSALES	26	Chubut	26021
        Entidad	-45.7880202044185	-67.4666859492816	Escalante	INDEC	26021030010	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO MILITAR - AEROPUERTO MILITAR	26	Chubut	26021
        Entidad	-45.7954205855384	-67.4728320436648	Escalante	INDEC	26021030011	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO PROSPERO PALAZZO	26	Chubut	26021
        Entidad	-45.7933095274399	-67.4097861221166	Escalante	INDEC	26021030012	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO RESTINGA ALI	26	Chubut	26021
        Entidad	-45.8042084863804	-67.4855016639952	Escalante	INDEC	26021030013	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO RODRIGUEZ PEÑA	26	Chubut	26021
        Entidad	-45.8455307615478	-67.5145852993993	Escalante	INDEC	26021030014	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO SAAVEDRA	26	Chubut	26021
        Entidad	-45.8191333517328	-67.502587140919	Escalante	INDEC	26021030015	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO SARMIENTO	26	Chubut	26021
        Entidad	-45.8248454635041	-67.4616495988676	Escalante	INDEC	26021030016	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO 25 DE MAYO	26	Chubut	26021
        Entidad	-45.8367380263826	-67.5021112026914	Escalante	INDEC	26021030017	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	BARRIO VILLA S.U.P.E.	26	Chubut	26021
        Entidad	-45.8729846778063	-67.5430559979427	Escalante	INDEC	26021030018	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	COMODORO RIVADAVIA	26	Chubut	26021
        Entidad	-45.7875522789201	-67.4695736235974	Escalante	INDEC	26021030019	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	KM. 5 - PRESIDENTE ORTIZ	26	Chubut	26021
        Entidad	-45.7988982385959	-67.4314970230436	Escalante	INDEC	26021030020	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	KM. 8 - DON BOSCO	26	Chubut	26021
        Entidad	-45.7707679612545	-67.4358046744231	Escalante	INDEC	26021030021	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	KM. 11 - CUARTELES	26	Chubut	26021
        Entidad	-45.8318281251079	-67.4917096424434	Escalante	INDEC	26021030022	26021030	Comodoro Rivadavia	260049	Comodoro Rivadavia	KM. 3 - GENERAL MOSCONI	26	Chubut	26021
        Localidad simple	-45.7906089158021	-67.6738925726169	Escalante	INDEC	26021040000	26021040	Diadema Argentina	260049	Comodoro Rivadavia	DIADEMA ARGENTINA	26	Chubut	26021
        Localidad simple	-45.9368019185633	-67.5653960236573	Escalante	INDEC	26021050000	26021050	Rada Tilly	260056	Rada Tilly	RADA TILLY	26	Chubut	26021
        Localidad simple	-44.79829087317	-65.7105992934951	Florentino Ameghino	INDEC	26028010000	26028010	Camarones	260063	Camarones	CAMARONES	26	Chubut	26028
        Localidad simple	-44.6795783728661	-66.6097364550235	Florentino Ameghino	INDEC	26028020000	26028020	Garayalde			GARAYALDE	26	Chubut	26028
        Localidad simple	-43.1198187614025	-71.5588967458005	Futaleufú	INDEC	26035010000	26035010	Aldea Escolar (Los Rápidos)	260084	Trevelín	ALDEA ESCOLAR	26	Chubut	26035
        Localidad simple	-43.5380021657326	-71.4659616215841	Futaleufú	INDEC	26035020000	26035020	Corcovado	260070	Corcovado	CORCOVADO	26	Chubut	26035
        Localidad simple	-42.9133238858291	-71.3185116319277	Futaleufú	INDEC	26035030000	26035030	Esquel	260077	Esquel	ESQUEL	26	Chubut	26035
        Localidad simple	-43.2500168518714	-71.3512318442886	Futaleufú	INDEC	26035040000	26035040	Lago Rosario	260084	Trevelín	LAGO ROSARIO	26	Chubut	26035
        Localidad simple	-43.1847146210617	-71.6413919295155	Futaleufú	INDEC	26035050000	26035050	Los Cipreses	260084	Trevelín	LOS CIPRESES	26	Chubut	26035
        Localidad simple	-43.0908711905976	-71.4654853699539	Futaleufú	INDEC	26035060000	26035060	Trevelín	260084	Trevelín	TREVELIN	26	Chubut	26035
        Localidad simple	-42.9006375858067	-71.6061535113717	Futaleufú	INDEC	26035070000	26035070	Villa Futalaufquen			VILLA FUTALAUFQUEN	26	Chubut	26035
        Localidad simple	-43.7032847513538	-66.479400323535	Gaiman	INDEC	26042010000	26042010	Dique Florentino Ameghino	268028	Dique Florentino Ameghino	DIQUE FLORENTINO AMEGHINO	26	Chubut	26042
        Localidad simple	-43.309297578868	-65.7087388385691	Gaiman	INDEC	26042020000	26042020	Dolavon	260091	Dolavon	DOLAVON	26	Chubut	26042
        Localidad simple	-43.288807480447	-65.4924135000744	Gaiman	INDEC	26042030000	26042030	Gaiman	260098	Gaiman	GAIMAN	26	Chubut	26042
        Localidad simple	-43.3809771295585	-65.8386877428492	Gaiman	INDEC	26042040000	26042040	28 de Julio	265014	28 de Julio	28 DE JULIO	26	Chubut	26042
        Localidad simple	-42.5683892291525	-68.9190916237139	Gastre	INDEC	26049010000	26049010	Blancuntre			BLANCUNTRE	26	Chubut	26049
        Localidad simple	-43.098070041959	-68.5596033354947	Gastre	INDEC	26049020000	26049020	El Escorial			EL ESCORIAL	26	Chubut	26049
        Localidad simple	-42.2656204565429	-69.2210978977662	Gastre	INDEC	26049030000	26049030	Gastre	268035	Gastre	GASTRE	26	Chubut	26049
        Localidad simple	-42.7167792838299	-69.1884723935703	Gastre	INDEC	26049040000	26049040	Lagunita Salada			LAGUNITA SALADA	26	Chubut	26049
        Localidad simple	-42.7671354457615	-68.875421794475	Gastre	INDEC	26049050000	26049050	Yala Laubat			YALA LAUBAT	26	Chubut	26049
        Localidad simple	-43.2341165952859	-69.7112937770404	Languiñeo	INDEC	26056010000	26056010	Aldea Epulef			ALDEA EPULEF	26	Chubut	26056
        Localidad simple	-43.5856885437306	-71.7009020245021	Languiñeo	INDEC	26056020000	26056020	Carrenleufú	268056	Carrenleufú	CARRENLEUFU	26	Chubut	26056
        Localidad simple	-43.2425977048335	-69.9302181856069	Languiñeo	INDEC	26056030000	26056030	Colan Conhué	268063	Colan Conhué	COLAN CONHUE	26	Chubut	26056
        Localidad simple	-42.7371109950872	-69.6110020875554	Languiñeo	INDEC	26056040000	26056040	Paso del Sapo	268070	Paso del Sapo	PASO DEL SAPO	26	Chubut	26056
        Localidad simple	-43.4935820815258	-70.8135608321009	Languiñeo	INDEC	26056050000	26056050	Tecka	260105	Tecka	TECKA	26	Chubut	26056
        Localidad simple	-43.2852932712541	-67.7603113819649	Mártires	INDEC	26063010000	26063010	El Mirasol			EL MIRASOL	26	Chubut	26063
        Localidad simple	-43.7223979636171	-67.2869956666141	Mártires	INDEC	26063020000	26063020	Las Plumas	268077	Las Plumas	LAS PLUMAS	26	Chubut	26063
        Localidad simple	-43.4233198653988	-69.1640923476749	Paso de Indios	INDEC	26070010000	26070010	Cerro Cóndor			CERRO CONDOR	26	Chubut	26070
        Localidad simple	-43.8711929981581	-68.4301168776514	Paso de Indios	INDEC	26070020000	26070020	Los Altares	268084	Los Altares	LOS ALTARES	26	Chubut	26070
        Localidad simple	-43.8663054117658	-69.0448870902309	Paso de Indios	INDEC	26070030000	26070030	Paso de Indios	265021	Paso de Indios	PASO DE INDIOS	26	Chubut	26070
        Localidad simple	-43.3821208618862	-65.0449325683674	Rawson	INDEC	26077010000	26077010	Playa Magagna	260112	Rawson	PLAYA MAGAGNA	26	Chubut	26077
        Localidad simple	-43.3219408530217	-65.0475987350977	Rawson	INDEC	26077020000	26077020	Playa Unión	260112	Rawson	PLAYA UNION	26	Chubut	26077
        Localidad simple	-43.3010516778945	-65.0955202340428	Rawson	INDEC	26077030000	26077030	Rawson	260112	Rawson	RAWSON	26	Chubut	26077
        Localidad simple	-43.2483538570309	-65.3103813319694	Rawson	INDEC	26077040000	26077040	Trelew	260119	Trelew	TRELEW	26	Chubut	26077
        Localidad simple	-44.7052521139583	-70.8460010136593	Río Senguer	INDEC	26084010000	26084010	Aldea Apeleg	260126	Alto Río Senguer	ALDEA APELEG	26	Chubut	26084
        Localidad simple	-45.5614644681207	-71.5181726162484	Río Senguer	INDEC	26084020000	26084020	Aldea Beleiro	268091	Aldea Beleiro	ALDEA BELEIRO	26	Chubut	26084
        Localidad simple	-45.0476417520383	-70.8227552077123	Río Senguer	INDEC	26084030000	26084030	Alto Río Senguer	260126	Alto Río Senguer	ALTO RIO SENGUER	26	Chubut	26084
        Localidad simple	-45.5870084306305	-71.0290968422414	Río Senguer	INDEC	26084040000	26084040	Doctor Ricardo Rojas	268098	Doctor Ricardo Rojas	DOCTOR RICARDO ROJAS	26	Chubut	26084
        Localidad simple	-45.3192710383686	-69.9721127349678	Río Senguer	INDEC	26084050000	26084050	Facundo	268105	Facundo	FACUNDO	26	Chubut	26084
        Localidad simple	-45.9468594190828	-71.2641106643113	Río Senguer	INDEC	26084060000	26084060	Lago Blanco			LAGO BLANCO	26	Chubut	26084
        Localidad simple	-45.6964538171738	-70.2559804482547	Río Senguer	INDEC	26084070000	26084070	Río Mayo	260133	Río Mayo	RIO MAYO	26	Chubut	26084
        Localidad simple	-45.0804225633305	-69.4497777721279	Sarmiento	INDEC	26091010000	26091010	Buen Pasto	268119	Buen Pasto	BUEN PASTO	26	Chubut	26091
        Localidad simple	-45.590519720018	-69.0706825167205	Sarmiento	INDEC	26091020000	26091020	Sarmiento	260140	Sarmiento	SARMIENTO	26	Chubut	26091
        Localidad simple	-44.1988556500986	-71.6666681641388	Tehuelches	INDEC	26098010000	26098010	Doctor Oscar Atilio Viglione (Frontera de Río Pico)	268147	Dr. Atilio Oscar Viglione	FRONTERA DE RIO PICO	26	Chubut	26098
        Localidad simple	-44.0529826063177	-70.597920256446	Tehuelches	INDEC	26098020000	26098020	Gobernador Costa	260147	Gobernador Costa	GOBERNADOR COSTA	26	Chubut	26098
        Localidad simple	-44.0545030861499	-70.4698423450266	Tehuelches	INDEC	26098030000	26098030	José de San Martín	260154	José de San Martín	JOSE DE SAN MARTIN	26	Chubut	26098
        Localidad simple	-44.1829932413496	-71.3700565360866	Tehuelches	INDEC	26098040000	26098040	Río Pico	260161	Río Pico	RIO PICO	26	Chubut	26098
        Localidad simple	-42.5232330288476	-68.2828542288869	Telsen	INDEC	26105010000	26105010	Gan Gan	268126	Gan Gan	GAN GAN	26	Chubut	26105
        Localidad simple	-42.4387511614213	-66.941427996482	Telsen	INDEC	26105020000	26105020	Telsen			TELSEN	26	Chubut	26105
        Localidad simple	-31.8673630759862	-58.445702857466	Colón	INDEC	30008010000	30008010	Arroyo Barú			ARROYO BARU	30	Entre Ríos	30008
        Componente de localidad compuesta	-32.2232180852093	-58.1419674849484	Colón	INDEC	30008020000	30008020	Colón			COLON	30	Entre Ríos	30008
        Componente de localidad compuesta	-32.2963657704418	-58.2329681221353	Colón	INDEC	30008030000	30008030	Colonia Hugues			COLONIA HUGUES	30	Entre Ríos	30008
        Localidad simple	-31.9629513486876	-58.5082059489741	Colón	INDEC	30008040000	30008040	Hambis			HAMBIS	30	Entre Ríos	30008
        Localidad simple	-32.1570049045312	-58.1976616890773	Colón	INDEC	30008080000	30008080	Pueblo Liebig-s			PUEBLO LIEBIG-S	30	Entre Ríos	30008
        Entidad	-32.1797669801643	-58.2122328834059	Colón	INDEC	30008090001	30008090	San José			EL BRILLANTE	30	Entre Ríos	30008
        Entidad	-32.1819017485871	-58.1918561863469	Colón	INDEC	30008090002	30008090	San José			EL COLORADO	30	Entre Ríos	30008
        Entidad	-32.2021613289668	-58.2095931555666	Colón	INDEC	30008090003	30008090	San José			SAN JOSE	30	Entre Ríos	30008
        Localidad simple	-31.7925728023428	-58.3158517356	Colón	INDEC	30008100000	30008100	Ubajay			UBAJAY	30	Entre Ríos	30008
        Localidad simple	-32.1606202225925	-58.4037483450693	Colón	INDEC	30008110000	30008110	Villa Elisa			VILLA ELISA	30	Entre Ríos	30008
        Localidad simple	-31.507626297952	-58.1334346597166	Concordia	INDEC	30015010000	30015010	Calabacilla			CALABACILLA	30	Entre Ríos	30015
        Localidad simple	-31.5794028169306	-58.1813678170213	Concordia	INDEC	30015020000	30015020	Clodomiro Ledesma			CLODOMIRO LEDESMA	30	Entre Ríos	30015
        Localidad simple	-31.2050901632153	-58.0338899223591	Concordia	INDEC	30015030000	30015030	Colonia Ayuí			COLONIA AYUI	30	Entre Ríos	30015
        Localidad simple	-31.3244065210985	-58.1214096714805	Concordia	INDEC	30015040000	30015040	Colonia General Roca			COLONIA GENERAL ROCA	30	Entre Ríos	30015
        Entidad	-31.4288786267036	-58.0768061386463	Concordia	INDEC	30015060001	30015060	Concordia			BENITO LEGEREN	30	Entre Ríos	30015
        Entidad	-31.3687044068789	-58.0450288431718	Concordia	INDEC	30015060002	30015060	Concordia			CONCORDIA	30	Entre Ríos	30015
        Entidad	-31.4119399624827	-58.0740082494429	Concordia	INDEC	30015060003	30015060	Concordia			LAS TEJAS	30	Entre Ríos	30015
        Entidad	-31.4037426459166	-58.0394128271546	Concordia	INDEC	30015060004	30015060	Concordia			VILLA ADELA	30	Entre Ríos	30015
        Entidad	-31.3299511832527	-58.0174848453444	Concordia	INDEC	30015060005	30015060	Concordia			VILLA ZORRAQUIN	30	Entre Ríos	30015
        Localidad simple	-31.469433434517	-58.2636681024626	Concordia	INDEC	30015080000	30015080	Estación Yeruá			ESTACION YERUA	30	Entre Ríos	30015
        Localidad simple	-31.3963812386954	-58.1611535438718	Concordia	INDEC	30015083000	30015083	Estación Yuquerí			ESTACION YUQUERI	30	Entre Ríos	30015
        Localidad simple	-31.4400282680775	-58.1246631255854	Concordia	INDEC	30015087000	30015087	Estancia Grande			ESTANCIA GRANDE	30	Entre Ríos	30015
        Localidad simple	-31.2693712880357	-58.1060425422369	Concordia	INDEC	30015090000	30015090	La Criolla			LA CRIOLLA	30	Entre Ríos	30015
        Localidad simple	-31.1707840748941	-58.1873842951633	Concordia	INDEC	30015100000	30015100	Los Charrúas			LOS CHARRUAS	30	Entre Ríos	30015
        Localidad simple	-31.6473163855612	-58.0158126069679	Concordia	INDEC	30015110000	30015110	Nueva Escocia			NUEVA ESCOCIA	30	Entre Ríos	30015
        Localidad simple	-31.6714729659455	-58.2307912741944	Concordia	INDEC	30015130000	30015130	Pedernal			PEDERNAL	30	Entre Ríos	30015
        Localidad simple	-31.530833509471	-58.0128947749058	Concordia	INDEC	30015140000	30015140	Puerto Yeruá			PUERTO YERUA	30	Entre Ríos	30015
        Localidad simple	-31.8922864518526	-60.591797746941	Diamante	INDEC	30021010000	30021010	Aldea Brasilera			ALDEA BRASILERA	30	Entre Ríos	30021
        Localidad simple	-31.9563723140333	-60.4961051979678	Diamante	INDEC	30021015000	30021015	Aldea Grapschental			ALDEA GRAPSCHENTAL	30	Entre Ríos	30021
        Localidad simple	-32.0308328904873	-60.5643359117847	Diamante	INDEC	30021020000	30021020	Aldea Protestante			ALDEA PROTESTANTE	30	Entre Ríos	30021
        Localidad simple	-31.9260358583332	-60.5483852721123	Diamante	INDEC	30021030000	30021030	Aldea Salto			ALDEA SALTO	30	Entre Ríos	30021
        Localidad simple	-31.9625681226479	-60.635713481626	Diamante	INDEC	30021040000	30021040	Aldea San Francisco			ALDEA SAN FRANCISCO	30	Entre Ríos	30021
        Localidad simple	-31.9485292712546	-60.5803966416062	Diamante	INDEC	30021050000	30021050	Aldea Spatzenkutter			ALDEA SPATZENKUTTER	30	Entre Ríos	30021
        Localidad simple	-31.9922440087904	-60.5878502274446	Diamante	INDEC	30021060000	30021060	Aldea Valle María			ALDEA VALLE MARIA	30	Entre Ríos	30021
        Localidad simple	-31.8672572611199	-60.5752901869571	Diamante	INDEC	30021070000	30021070	Colonia Ensayo			COLONIA ENSAYO	30	Entre Ríos	30021
        Entidad	-32.0671549441222	-60.6377365188118	Diamante	INDEC	30021080001	30021080	Diamante			DIAMANTE	30	Entre Ríos	30021
        Entidad	-32.0585362988015	-60.6108078415946	Diamante	INDEC	30021080002	30021080	Diamante			STROBEL	30	Entre Ríos	30021
        Localidad simple	-32.1133207438253	-60.2299017967384	Diamante	INDEC	30021090000	30021090	Estación Camps			ESTACION CAMPS	30	Entre Ríos	30021
        Localidad simple	-31.9494541080354	-60.6779497259324	Diamante	INDEC	30021100000	30021100	General Alvear			GENERAL ALVEAR	30	Entre Ríos	30021
        Localidad simple	-31.9840164487261	-60.4083912285494	Diamante	INDEC	30021110000	30021110	General Racedo (El Carmen)			GENERAL RACEDO	30	Entre Ríos	30021
        Localidad simple	-32.1772714430842	-60.1985605811767	Diamante	INDEC	30021120000	30021120	General Ramírez			GENERAL RAMIREZ	30	Entre Ríos	30021
        Localidad simple	-31.8753768018271	-60.649121973368	Diamante	INDEC	30021123000	30021123	La Juanita			LA JUANITA	30	Entre Ríos	30021
        Localidad simple	-31.8327184836082	-60.6048471558247	Diamante	INDEC	30021127000	30021127	Las Jaulas			LA JAULA	30	Entre Ríos	30021
        Localidad simple	-31.917362571918	-60.6531968809921	Diamante	INDEC	30021130000	30021130	Paraje La Virgen			PARAJE LA VIRGEN	30	Entre Ríos	30021
        Localidad simple	-32.3342284848162	-60.4872902471305	Diamante	INDEC	30021140000	30021140	Puerto Las Cuevas			PUERTO LAS CUEVAS	30	Entre Ríos	30021
        Entidad	-32.0602299925107	-60.4435729044204	Diamante	INDEC	30021150001	30021150	Villa Libertador San Martín			ESTACION PUIGGARI	30	Entre Ríos	30021
        Entidad	-32.0697561751369	-60.4624463940416	Diamante	INDEC	30021150002	30021150	Villa Libertador San Martín			VILLA LIBERTADOR SAN MARTIN	30	Entre Ríos	30021
        Localidad simple	-30.7540759107669	-57.9841625878637	Federación	INDEC	30028010000	30028010	Chajarí			CHAJARI	30	Entre Ríos	30028
        Localidad simple	-30.896158506292	-58.0221576342783	Federación	INDEC	30028020000	30028020	Colonia Alemana			COLONIA ALEMANA	30	Entre Ríos	30028
        Localidad simple	-30.7974915997552	-58.1756384659062	Federación	INDEC	30028050000	30028050	Colonia Peña			COLONIA PEÑA	30	Entre Ríos	30028
        Localidad simple	-30.990072444489	-57.9183475208406	Federación	INDEC	30028070000	30028070	Federación			FEDERACION	30	Entre Ríos	30028
        Localidad simple	-30.5944074579969	-58.4682627057869	Federación	INDEC	30028080000	30028080	Los Conquistadores			LOS CONQUISTADORES	30	Entre Ríos	30028
        Localidad simple	-30.3396273493524	-58.3080915973688	Federación	INDEC	30028090000	30028090	San Jaime de la Frontera			SAN JAIME DE LA FRONTERA	30	Entre Ríos	30028
        Localidad simple	-30.7571887237222	-58.0818713823153	Federación	INDEC	30028100000	30028100	San Pedro			SAN PEDRO	30	Entre Ríos	30028
        Localidad simple	-30.8091644325467	-58.2191269101013	Federación	INDEC	30028105000	30028105	San Ramón			SAN RAMON	30	Entre Ríos	30028
        Localidad simple	-30.9004970305733	-57.9310809529514	Federación	INDEC	30028110000	30028110	Santa Ana			SANTA ANA	30	Entre Ríos	30028
        Localidad simple	-30.7968318611671	-57.9115719165535	Federación	INDEC	30028120000	30028120	Villa del Rosario			VILLA DEL ROSARIO	30	Entre Ríos	30028
        Localidad simple	-31.0477778936084	-59.0867391405808	Federal	INDEC	30035010000	30035010	Conscripto Bernardi			CONSCRIPTO BERNARDI	30	Entre Ríos	30035
        Localidad simple	-30.9868629826869	-58.9777569104134	Federal	INDEC	30035020000	30035020	Aldea San Isidro (El Cimarrón)			EL CIMARRON	30	Entre Ríos	30035
        Localidad simple	-30.9513342178715	-58.7851418943148	Federal	INDEC	30035030000	30035030	Federal			FEDERAL	30	Entre Ríos	30035
        Localidad simple	-30.9685149773302	-58.6127479285248	Federal	INDEC	30035040000	30035040	Nueva Vizcaya			NUEVA VIZCAYA	30	Entre Ríos	30035
        Localidad simple	-31.2384740579796	-59.2202829564802	Federal	INDEC	30035050000	30035050	Sauce de Luna			SAUCE DE LUNA	30	Entre Ríos	30035
        Localidad simple	-30.3852713114912	-58.7515719602207	Feliciano	INDEC	30042010000	30042010	San José de Feliciano			SAN JOSE DE FELICIANO	30	Entre Ríos	30042
        Localidad simple	-30.4869283596556	-59.0316519541684	Feliciano	INDEC	30042020000	30042020	San Víctor			SAN VICTOR	30	Entre Ríos	30042
        Localidad simple	-32.825171529429	-59.2312379231862	Gualeguay	INDEC	30049010000	30049010	Aldea Asunción			ALDEA ASUNCION	30	Entre Ríos	30049
        Localidad simple	-32.8718397608117	-59.4223491853546	Gualeguay	INDEC	30049020000	30049020	Estación Lazo			ESTACION LAZO	30	Entre Ríos	30049
        Localidad simple	-32.7212713061819	-59.3958887031115	Gualeguay	INDEC	30049030000	30049030	General Galarza			GENERAL GALARZA	30	Entre Ríos	30049
        Localidad simple	-33.1485556234267	-59.3150160418816	Gualeguay	INDEC	30049040000	30049040	Gualeguay			GUALEGUAY	30	Entre Ríos	30049
        Localidad simple	-33.2198401773573	-59.3630338659967	Gualeguay	INDEC	30049050000	30049050	Puerto Ruiz			PUERTO RUIZ	30	Entre Ríos	30049
        Localidad simple	-32.6253281653841	-58.703196864174	Gualeguaychú	INDEC	30056010000	30056010	Aldea San Antonio			ALDEA SAN ANTONIO	30	Entre Ríos	30056
        Localidad simple	-32.703788501225	-58.7790625010106	Gualeguaychú	INDEC	30056020000	30056020	Aldea San Juan			ALDEA SAN JUAN	30	Entre Ríos	30056
        Localidad simple	-33.1478483564668	-59.2089401138297	Gualeguaychú	INDEC	30056030000	30056030	Enrique Carbó			ENRIQUE CARBO	30	Entre Ríos	30056
        Localidad simple	-32.5932358304352	-58.9037416509557	Gualeguaychú	INDEC	30056035000	30056035	Estación Escriña			ESTACION ESCRIÑA	30	Entre Ríos	30056
        Localidad simple	-32.8044314283598	-58.8826333992369	Gualeguaychú	INDEC	30056040000	30056040	Faustino M. Parera			FAUSTINO M. PARERA	30	Entre Ríos	30056
        Localidad simple	-32.8376334754538	-58.8038160467091	Gualeguaychú	INDEC	30056050000	30056050	General Almada			GENERAL ALMADA	30	Entre Ríos	30056
        Localidad simple	-32.5306030521064	-58.9339533000982	Gualeguaychú	INDEC	30056060000	30056060	Gilbert			GILBERT	30	Entre Ríos	30056
        Componente de localidad compuesta	-33.0100328267382	-58.5164257946352	Gualeguaychú	INDEC	30056070000	30056070	Gualeguaychú			GUALEGUAYCHU	30	Entre Ríos	30056
        Localidad simple	-32.9269373297111	-58.9534834763678	Gualeguaychú	INDEC	30056080000	30056080	Irazusta			IRAZUSTA	30	Entre Ríos	30056
        Localidad simple	-33.0354242763647	-59.001853656082	Gualeguaychú	INDEC	30056090000	30056090	Larroque			LARROQUE	30	Entre Ríos	30056
        Localidad simple	-32.7697426128614	-58.9070200410514	Gualeguaychú	INDEC	30056095000	30056095	Pastor Britos			PASTOR BRITOS	30	Entre Ríos	30056
        Componente de localidad compuesta	-33.0162888459347	-58.476043760345	Gualeguaychú	INDEC	30056100000	30056100	Pueblo General Belgrano			PUEBLO GENERAL BELGRANO	30	Entre Ríos	30056
        Localidad simple	-32.6881311554333	-58.888994553976	Gualeguaychú	INDEC	30056110000	30056110	Urdinarrain			URDINARRAIN	30	Entre Ríos	30056
        Localidad simple	-33.4994124052794	-58.8003541709834	Islas del Ibicuy	INDEC	30063020000	30063020	Ceibas			CEIBAS	30	Entre Ríos	30063
        Localidad simple	-33.7437863303553	-59.1550366922315	Islas del Ibicuy	INDEC	30063030000	30063030	Ibicuy			IBICUY	30	Entre Ríos	30063
        Localidad simple	-33.4360995740998	-59.0675952112197	Islas del Ibicuy	INDEC	30063040000	30063040	Médanos			MEDANOS	30	Entre Ríos	30063
        Localidad simple	-33.7156244223002	-58.6597631447303	Islas del Ibicuy	INDEC	30063060000	30063060	Villa Paranacito			VILLA PARANACITO	30	Entre Ríos	30063
        Localidad simple	-31.4565889671918	-59.5991388684545	La Paz	INDEC	30070005000	30070005	Alcaraz			ALCARAZ	30	Entre Ríos	30070
        Localidad simple	-31.3428914409424	-59.4467309737899	La Paz	INDEC	30070010000	30070010	Bovril			BOVRIL	30	Entre Ríos	30070
        Localidad simple	-31.1853384671792	-59.4079822910182	La Paz	INDEC	30070020000	30070020	Colonia Avigdor			COLONIA AVIGDOR	30	Entre Ríos	30070
        Localidad simple	-31.1810124666205	-59.7328844569416	La Paz	INDEC	30070030000	30070030	El Solar			EL SOLAR	30	Entre Ríos	30070
        Localidad simple	-30.741541104376	-59.6433535241897	La Paz	INDEC	30070040000	30070040	La Paz			LA PAZ	30	Entre Ríos	30070
        Localidad simple	-31.1859575955508	-59.9521591252044	La Paz	INDEC	30070050000	30070050	Piedras Blancas			PIEDRAS BLANCAS	30	Entre Ríos	30070
        Localidad simple	-30.6905067150943	-59.3994540133514	La Paz	INDEC	30070070000	30070070	San Gustavo			SAN GUSTAVO	30	Entre Ríos	30070
        Localidad simple	-30.9466589584952	-59.7882850384119	La Paz	INDEC	30070080000	30070080	Santa Elena			SANTA ELENA	30	Entre Ríos	30070
        Localidad simple	-31.3896679471814	-59.5032123815164	La Paz	INDEC	30070090000	30070090	Sir Leonard			SIR LEONARD	30	Entre Ríos	30070
        Localidad simple	-32.2443130059944	-60.1627988186884	Nogoyá	INDEC	30077010000	30077010	Aranguren			ARANGUREN	30	Entre Ríos	30077
        Localidad simple	-32.374100868006	-59.9380818002549	Nogoyá	INDEC	30077020000	30077020	Betbeder			BETBEDER	30	Entre Ríos	30077
        Localidad simple	-32.0752594049271	-59.9943230195983	Nogoyá	INDEC	30077030000	30077030	Don Cristóbal			DON CRISTOBAL	30	Entre Ríos	30077
        Localidad simple	-32.4774515995652	-59.9217117300676	Nogoyá	INDEC	30077040000	30077040	Febré			FEBRE	30	Entre Ríos	30077
        Localidad simple	-32.3380692970598	-60.0301404781048	Nogoyá	INDEC	30077050000	30077050	Hernández			HERNANDEZ	30	Entre Ríos	30077
        Localidad simple	-32.3859289481651	-59.531300464703	Nogoyá	INDEC	30077060000	30077060	Lucas González			LUCAS GONZALEZ	30	Entre Ríos	30077
        Localidad simple	-32.3956416421841	-59.7880764157544	Nogoyá	INDEC	30077070000	30077070	Nogoyá			NOGOYA	30	Entre Ríos	30077
        Localidad simple	-32.3866241398753	-59.6630736582897	Nogoyá	INDEC	30077080000	30077080	XX de Setiembre			XX DE SETIEMBRE	30	Entre Ríos	30077
        Localidad simple	-31.8847292300203	-60.4087456869806	Paraná	INDEC	30084010000	30084010	Aldea María Luisa			ALDEA MARIA LUISA	30	Entre Ríos	30084
        Localidad simple	-31.9982237404715	-60.3583819889242	Paraná	INDEC	30084015000	30084015	Aldea San Juan			ALDEA SAN JUAN	30	Entre Ríos	30084
        Localidad simple	-31.9598299451355	-60.2558755485286	Paraná	INDEC	30084020000	30084020	Aldea San Rafael			ALDEA SAN RAFAEL	30	Entre Ríos	30084
        Localidad simple	-31.6128701885629	-60.0070721806963	Paraná	INDEC	30084030000	30084030	Aldea Santa María			ALDEA SANTA MARIA	30	Entre Ríos	30084
        Localidad simple	-32.0164544602725	-60.2411073474122	Paraná	INDEC	30084040000	30084040	Aldea Santa Rosa			ALDEA SANTA ROSA	30	Entre Ríos	30084
        Entidad	-31.5821711222967	-60.0740223148253	Paraná	INDEC	30084050001	30084050	Cerrito			CERRITO	30	Entre Ríos	30084
        Entidad	-31.5884913847857	-60.0648929343735	Paraná	INDEC	30084050002	30084050	Cerrito			PUEBLO MORENO	30	Entre Ríos	30084
        Componente de localidad compuesta	-31.7680690511493	-60.4050220629258	Paraná	INDEC	30084060000	30084060	Colonia Avellaneda			COLONIA AVELLANEDA	30	Entre Ríos	30084
        Localidad simple	-31.6777727008412	-60.2436880885317	Paraná	INDEC	30084065000	30084065	Colonia Crespo			COLONIA CRESPO	30	Entre Ríos	30084
        Localidad simple	-32.0346491846505	-60.3107514290928	Paraná	INDEC	30084070000	30084070	Crespo			CRESPO	30	Entre Ríos	30084
        Localidad simple	-31.6625748086746	-60.1751144821058	Paraná	INDEC	30084080000	30084080	El Palenque			EL PALENQUE	30	Entre Ríos	30084
        Localidad simple	-31.5838497016925	-59.8938069366259	Paraná	INDEC	30084090000	30084090	El Pingo			EL PINGO	30	Entre Ríos	30084
        Localidad simple	-31.8480473768248	-60.0927487719843	Paraná	INDEC	30084095000	30084095	El Ramblón			EL RAMBLON	30	Entre Ríos	30084
        Localidad simple	-31.5133052410614	-59.83696962349	Paraná	INDEC	30084100000	30084100	Hasenkamp			HASENKAMP	30	Entre Ríos	30084
        Localidad simple	-31.2324500702018	-59.9872576438234	Paraná	INDEC	30084110000	30084110	Hernandarias			HERNANDARIAS	30	Entre Ríos	30084
        Localidad simple	-31.7267100818149	-60.2971793004448	Paraná	INDEC	30084120000	30084120	La Picada			LA PICADA	30	Entre Ríos	30084
        Localidad simple	-31.8706095724666	-59.7324361083485	Paraná	INDEC	30084130000	30084130	Las Tunas			LAS TUNAS	30	Entre Ríos	30084
        Localidad simple	-31.6660715037636	-59.9044379252459	Paraná	INDEC	30084140000	30084140	María Grande			MARIA GRANDE	30	Entre Ríos	30084
        Componente de localidad compuesta	-31.8257355466309	-60.5182728163031	Paraná	INDEC	30084150000	30084150	Oro Verde			ORO VERDE	30	Entre Ríos	30084
        Componente de localidad compuesta	-31.7415676426411	-60.5284145917589	Paraná	INDEC	30084160000	30084160	Paraná			PARANA	30	Entre Ríos	30084
        Localidad simple	-31.4287140394702	-59.7457885927193	Paraná	INDEC	30084170000	30084170	Pueblo Bellocq (Las Garzas)			PUEBLO BELLOCQ	30	Entre Ríos	30084
        Localidad simple	-31.3883015926493	-60.0938334043815	Paraná	INDEC	30084180000	30084180	Pueblo Brugo			PUEBLO BRUGO	30	Entre Ríos	30084
        Localidad simple	-31.4636064114686	-60.1679618601982	Paraná	INDEC	30084190000	30084190	Pueblo General San Martín			PUEBLO GENERAL SAN MARTIN	30	Entre Ríos	30084
        Componente de localidad compuesta	-31.7815218098022	-60.4419739913356	Paraná	INDEC	30084200000	30084200	San Benito			SAN BENITO	30	Entre Ríos	30084
        Componente de localidad compuesta	-31.7463194997657	-60.3552297078863	Paraná	INDEC	30084210000	30084210	Sauce Montrull			SAUCE MONTRULL	30	Entre Ríos	30084
        Localidad simple	-31.8442990730164	-60.3747483050584	Paraná	INDEC	30084220000	30084220	Sauce Pinto			SAUCE PINTO	30	Entre Ríos	30084
        Localidad simple	-31.9588750821276	-60.1269829104478	Paraná	INDEC	30084230000	30084230	Seguí			SEGUI	30	Entre Ríos	30084
        Localidad simple	-31.7385742726697	-59.9115081436489	Paraná	INDEC	30084240000	30084240	Sosa			SOSA	30	Entre Ríos	30084
        Localidad simple	-31.8047077554997	-59.9379151601641	Paraná	INDEC	30084250000	30084250	Tabossi			TABOSSI	30	Entre Ríos	30084
        Localidad simple	-31.8735456198919	-60.4970235321195	Paraná	INDEC	30084260000	30084260	Tezanos Pinto			TEZANOS PINTO	30	Entre Ríos	30084
        Localidad simple	-31.8714330822777	-60.0099225269048	Paraná	INDEC	30084270000	30084270	Viale			VIALE	30	Entre Ríos	30084
        Localidad simple	-31.908647496665	-60.468352081106	Paraná	INDEC	30084280000	30084280	Villa Fontana			VILLA FONTANA	30	Entre Ríos	30084
        Localidad simple	-31.93428563973	-60.4279737732991	Paraná	INDEC	30084290000	30084290	Villa Gdor. Luis F. Etchevehere			VILLA GOBERNADOR LUIS F. ETCHEVEHERE	30	Entre Ríos	30084
        Localidad simple	-31.6507506100701	-60.3775855159669	Paraná	INDEC	30084300000	30084300	Villa Urquiza			VILLA URQUIZA	30	Entre Ríos	30084
        Localidad simple	-31.5246078338723	-58.4047735134447	San Salvador	INDEC	30088010000	30088010	General Campos			GENERAL CAMPOS	30	Entre Ríos	30088
        Localidad simple	-31.6255225523021	-58.5040738167896	San Salvador	INDEC	30088020000	30088020	San Salvador			SAN SALVADOR	30	Entre Ríos	30088
        Localidad simple	-32.0888342815838	-59.1740705545307	Tala	INDEC	30091010000	30091010	Altamirano Sur			ALTAMIRANO SUR	30	Entre Ríos	30091
        Localidad simple	-31.9865854200416	-59.2804623070462	Tala	INDEC	30091020000	30091020	Durazno			DURAZNO	30	Entre Ríos	30091
        Localidad simple	-32.6338905298532	-59.4016108911944	Tala	INDEC	30091030000	30091030	Estación Arroyo Clé			ESTACION ARROYO CLE	30	Entre Ríos	30091
        Localidad simple	-32.3933701328502	-59.2758886814116	Tala	INDEC	30091040000	30091040	Gobernador Echagüe			GOBERNADOR ECHAGUE	30	Entre Ríos	30091
        Localidad simple	-32.5464913620505	-59.3561472624329	Tala	INDEC	30091050000	30091050	Gobernador Mansilla			GOBERNADOR MANSILLA	30	Entre Ríos	30091
        Localidad simple	-32.3372059083888	-59.3710906213647	Tala	INDEC	30091060000	30091060	Gobernador Solá			GOBERNADOR SOLA	30	Entre Ríos	30091
        Localidad simple	-32.0826358698135	-59.3082772238093	Tala	INDEC	30091070000	30091070	Guardamonte			GUARDAMONTE	30	Entre Ríos	30091
        Localidad simple	-32.4700075443165	-59.1726625031425	Tala	INDEC	30091080000	30091080	Las Guachas			LAS GUACHAS	30	Entre Ríos	30091
        Localidad simple	-32.1724413881098	-59.3986787086128	Tala	INDEC	30091090000	30091090	Maciá			MACIA	30	Entre Ríos	30091
        Localidad simple	-32.3026339163322	-59.1445792095518	Tala	INDEC	30091100000	30091100	Rosario del Tala			ROSARIO DEL TALA	30	Entre Ríos	30091
        Localidad simple	-32.3725729351065	-58.8785609437917	Uruguay	INDEC	30098010000	30098010	Basavilbaso			BASAVILBASO	30	Entre Ríos	30098
        Localidad simple	-32.4642772562474	-58.4780718727049	Uruguay	INDEC	30098020000	30098020	Caseros			CASEROS	30	Entre Ríos	30098
        Localidad simple	-32.6723717845853	-58.325119237234	Uruguay	INDEC	30098030000	30098030	Colonia Elía			COLONIA ELIA	30	Entre Ríos	30098
        Localidad simple	-32.4853601673728	-58.2320517380782	Uruguay	INDEC	30098040000	30098040	Concepción del Uruguay			CONCEPCION DEL URUGUAY	30	Entre Ríos	30098
        Localidad simple	-32.434613979879	-58.6330137118779	Uruguay	INDEC	30098060000	30098060	Herrera			HERRERA	30	Entre Ríos	30098
        Localidad simple	-32.0926666859344	-58.9575923552082	Uruguay	INDEC	30098070000	30098070	Las Moscas			LAS MOSCAS	30	Entre Ríos	30098
        Localidad simple	-32.2629479332194	-58.9066108120783	Uruguay	INDEC	30098080000	30098080	Líbaros			LIBAROS	30	Entre Ríos	30098
        Localidad simple	-32.2570116072535	-58.422728628517	Uruguay	INDEC	30098090000	30098090	1º de Mayo			1 DE MAYO	30	Entre Ríos	30098
        Localidad simple	-32.3456507831337	-58.4438591145895	Uruguay	INDEC	30098100000	30098100	Pronunciamiento			PRONUNCIAMIENTO	30	Entre Ríos	30098
        Localidad simple	-32.3459729612346	-58.9697454142681	Uruguay	INDEC	30098110000	30098110	Rocamora			ROCAMORA	30	Entre Ríos	30098
        Localidad simple	-32.1762466320214	-58.7864822456477	Uruguay	INDEC	30098120000	30098120	Santa Anita			SANTA ANITA	30	Entre Ríos	30098
        Localidad simple	-32.3987091260597	-58.7440638984338	Uruguay	INDEC	30098130000	30098130	Villa Mantero			VILLA MANTERO	30	Entre Ríos	30098
        Localidad simple	-32.446319897702	-58.4359138343848	Uruguay	INDEC	30098140000	30098140	Villa San Justo			VILLA SAN JUSTO	30	Entre Ríos	30098
        Localidad simple	-32.1800624013874	-58.9301272035017	Uruguay	INDEC	30098150000	30098150	Villa San Marcial (Est. Gobernador Urquiza)			VILLA SAN MARCIAL	30	Entre Ríos	30098
        Localidad simple	-32.5338102554011	-60.0356966118049	Victoria	INDEC	30105010000	30105010	Antelo			ANTELO	30	Entre Ríos	30105
        Localidad simple	-32.3100409280054	-60.4202063551195	Victoria	INDEC	30105040000	30105040	Molino Doll			MOLINO DOLL	30	Entre Ríos	30105
        Localidad simple	-32.6205968368011	-60.1533126380173	Victoria	INDEC	30105060000	30105060	Victoria			VICTORIA	30	Entre Ríos	30105
        Localidad simple	-31.908248192653	-59.2606926522048	Villaguay	INDEC	30113010000	30113010	Estación Raíces			ESTACION RAICES	30	Entre Ríos	30113
        Localidad simple	-31.9569336301554	-58.8491174614017	Villaguay	INDEC	30113020000	30113020	Ingeniero Miguel Sajaroff			INGENIERO MIGUEL SAJAROFF	30	Entre Ríos	30113
        Localidad simple	-31.7336733349136	-58.634038044354	Villaguay	INDEC	30113030000	30113030	Jubileo			JUBILEO	30	Entre Ríos	30113
        Localidad simple	-31.8057649065599	-59.1651613714524	Villaguay	INDEC	30113050000	30113050	Paso de la Laguna			PASO DE LA LAGUNA	30	Entre Ríos	30113
        Localidad simple	-31.8301004555882	-58.8233903183527	Villaguay	INDEC	30113060000	30113060	Villa Clara			VILLA CLARA	30	Entre Ríos	30113
        Localidad simple	-31.9870146859479	-58.9634179145279	Villaguay	INDEC	30113070000	30113070	Villa Domínguez			VILLA DOMINGUEZ	30	Entre Ríos	30113
        Localidad simple	-31.8654413738655	-59.0290628351274	Villaguay	INDEC	30113080000	30113080	Villaguay			VILLAGUAY	30	Entre Ríos	30113
        Localidad simple	-24.1490607210153	-60.692324164757	Bermejo	INDEC	34007003000	34007003	Fortín Soledad			LA SOLEDAD	34	Formosa	34007
        Localidad simple	-23.6823938545951	-61.1611089476784	Bermejo	INDEC	34007005000	34007005	Guadalcazar			GUADALCAZAR	34	Formosa	34007
        Localidad simple	-23.4942751905754	-61.5763888694601	Bermejo	INDEC	34007007000	34007007	La Rinconada			LA RINCONADA	34	Formosa	34007
        Localidad simple	-24.2554647197914	-61.2439980075436	Bermejo	INDEC	34007010000	34007010	Laguna Yema	340007	Laguna Yema	LAGUNA YEMA	34	Formosa	34007
        Localidad simple	-23.9376982637237	-60.7400985635583	Bermejo	INDEC	34007015000	34007015	Lamadrid			LAMADRID	34	Formosa	34007
        Localidad simple	-24.0986835294011	-61.4675867695849	Bermejo	INDEC	34007020000	34007020	Los Chiriguanos	345007	Los Chiriguanos	LOS CHIRIGUANOS	34	Formosa	34007
        Localidad simple	-23.5691832483278	-61.7055334817331	Bermejo	INDEC	34007030000	34007030	Pozo de Maza			POZO DE MAZA	34	Formosa	34007
        Localidad simple	-24.4064403681891	-61.031313748118	Bermejo	INDEC	34007040000	34007040	Pozo del Mortero			POZO DEL MORTERO	34	Formosa	34007
        Localidad simple	-23.4948646893285	-61.6499982689001	Bermejo	INDEC	34007050000	34007050	Vaca Perdida			VACA PERDIDA	34	Formosa	34007
        Localidad simple	-25.6701404606648	-58.2626302834096	Formosa	INDEC	34014010000	34014010	Colonia Pastoril	345014	Colonia Pastoril	COLONIA PASTORIL	34	Formosa	34014
        Localidad simple	-26.1828223055764	-58.1733930549121	Formosa	INDEC	34014020000	34014020	Formosa	340028	Formosa	FORMOSA	34	Formosa	34014
        Localidad simple	-25.8628496341956	-58.8859915019649	Formosa	INDEC	34014030000	34014030	Gran Guardia	345021	Gran Guardia	GRAN GUARDIA	34	Formosa	34014
        Localidad simple	-26.1106357408727	-58.4884270518243	Formosa	INDEC	34014040000	34014040	Mariano Boedo			MARIANO BOEDO	34	Formosa	34014
        Localidad simple	-26.0345119719636	-58.0499307616902	Formosa	INDEC	34014050000	34014050	Mojón de Fierro			MOJON DE FIERRO	34	Formosa	34014
        Localidad simple	-26.0248676792093	-58.6500726228772	Formosa	INDEC	34014060000	34014060	San Hilario	345028	San Hilario	SAN HILARIO	34	Formosa	34014
        Localidad simple	-26.2522590977589	-58.252552869015	Formosa	INDEC	34014070000	34014070	Villa del Carmen	340028	Formosa	VILLA DEL CARMEN	34	Formosa	34014
        Localidad simple	-26.7071297025561	-58.3390745827256	Laishí	INDEC	34021010000	34021010	Banco Payaguá			BANCO PAYAGUA	34	Formosa	34021
        Localidad simple	-26.654180225538	-58.6293214756534	Laishí	INDEC	34021020000	34021020	General Lucio V. Mansilla	340049	General Lucio Victorio Mansilla	GENERAL LUCIO V MANSILLA	34	Formosa	34021
        Localidad simple	-26.4874646396691	-58.3122424597995	Laishí	INDEC	34021030000	34021030	Herradura	340056	Herradura	HERRADURA	34	Formosa	34021
        Localidad simple	-26.2423010252437	-58.6300642415106	Laishí	INDEC	34021040000	34021040	San Francisco de Laishi	340063	Misión San Francisco de Laishí	SAN FRANCISCO DE LAISHI	34	Formosa	34021
        Localidad simple	-26.3987186827879	-58.3575600493034	Laishí	INDEC	34021050000	34021050	Tatané			TATANE	34	Formosa	34021
        Localidad simple	-26.6211844819298	-58.6718336940894	Laishí	INDEC	34021060000	34021060	Villa Escolar	340070	Villa Escolar	VILLA ESCOLAR	34	Formosa	34021
        Localidad simple	-23.8976004129254	-61.8538220483946	Matacos	INDEC	34028010000	34028010	Ingeniero Guillermo N. Juárez	340077	Ingeniero Guillermo N. Juárez	INGENIERO GUILLERMO N. JUAREZ	34	Formosa	34028
        Localidad simple con entidad	-25.3474022268881	-59.6181476016645	Patiño	INDEC	34035010000	34035010	Bartolomé de las Casas			BARTOLOME DE LAS CASAS	34	Formosa	34035
        Entidad	-25.4941218117267	-59.6120583687409	Patiño	INDEC	34035010001	34035010	Bartolomé de las Casas			BARTOLOME DE LAS CASAS	34	Formosa	34035
        Entidad	-25.3482562961789	-59.6147617547837	Patiño	INDEC	34035010002	34035010	Bartolomé de las Casas			COMUNIDAD ABORIGEN BARTOLOME DE LAS CASAS	34	Formosa	34035
        Localidad simple	-24.6444789665474	-59.4332808273711	Patiño	INDEC	34035020000	34035020	Colonia Sarmiento			COLONIA SARMIENTO	34	Formosa	34035
        Localidad simple	-25.3347934740298	-59.6828071882955	Patiño	INDEC	34035030000	34035030	Comandante Fontana	340091	Comandante Fontana	COMANDANTE FONTANA	34	Formosa	34035
        Localidad simple	-25.0663152545433	-59.2513514627224	Patiño	INDEC	34035040000	34035040	El Recreo			EL RECREO	34	Formosa	34035
        Localidad simple	-25.0531922647351	-60.0939271832043	Patiño	INDEC	34035050000	34035050	Estanislao del Campo	340098	Estanislao del Campo	ESTANISLAO DEL CAMPO	34	Formosa	34035
        Localidad simple	-24.2854864616665	-59.8282499173384	Patiño	INDEC	34035060000	34035060	Fortín Cabo 1º Lugones	345042	Fortín Lugones	FORTIN CABO 1° LUGONES	34	Formosa	34035
        Localidad simple	-24.5503048524758	-59.390271557059	Patiño	INDEC	34035070000	34035070	Fortín Sargento 1º Leyes			FORTIN SARGENTO 1° LEYES	34	Formosa	34035
        Localidad simple	-25.2113191232301	-59.8570398440914	Patiño	INDEC	34035080000	34035080	Ibarreta	340126	Ibarreta	IBARRETA	34	Formosa	34035
        Localidad simple	-24.5418137126365	-60.8341896995338	Patiño	INDEC	34035090000	34035090	Juan G. Bazán			JUAN G. BAZAN	34	Formosa	34035
        Localidad simple	-24.7105776136691	-60.5937892586839	Patiño	INDEC	34035100000	34035100	Las Lomitas	340133	Las Lomitas	LAS LOMITAS	34	Formosa	34035
        Localidad simple	-24.2115848629554	-60.198666969414	Patiño	INDEC	34035110000	34035110	Posta Cambio Zalazar			POSTA CAMBIO ZALAZAR	34	Formosa	34035
        Localidad simple	-24.8975997693171	-60.3187890218463	Patiño	INDEC	34035120000	34035120	Pozo del Tigre	340140	Pozo del Tigre	POZO DEL TIGRE	34	Formosa	34035
        Localidad simple	-24.5319053014019	-59.902051229705	Patiño	INDEC	34035130000	34035130	San Martín I			SAN MARTIN I	34	Formosa	34035
        Localidad simple	-24.4331529800639	-59.656351890373	Patiño	INDEC	34035140000	34035140	San Martín II	340147	San Martín Dos	SAN MARTIN II	34	Formosa	34035
        Localidad simple	-25.5350397293764	-60.0190827630116	Patiño	INDEC	34035150000	34035150	Subteniente Perín	345049	Subteniente Perín	SUBTENIENTE PERIN	34	Formosa	34035
        Localidad simple	-24.7529456908497	-59.4916405606824	Patiño	INDEC	34035160000	34035160	Villa General Güemes	340119	General Güemes	VILLA GENERAL GUEMES	34	Formosa	34035
        Localidad simple	-24.9388283555888	-59.0290877277901	Patiño	INDEC	34035170000	34035170	Villa General Manuel Belgrano	340112	General Belgrano	VILLA GENERAL MANUEL BELGRANO	34	Formosa	34035
        Localidad simple	-25.0712122663672	-58.3867799081037	Pilagás	INDEC	34042010000	34042010	Buena Vista	345056	Buena Vista	BUENA VISTA	34	Formosa	34042
        Localidad simple	-24.9799888263685	-58.5537877142505	Pilagás	INDEC	34042020000	34042020	El Espinillo	340168	Espinillo	EL ESPINILLO	34	Formosa	34042
        Localidad simple	-25.2677752833691	-58.7427948347143	Pilagás	INDEC	34042030000	34042030	Laguna Gallo			LAGUNA GALLO	34	Formosa	34042
        Localidad simple	-24.979650567657	-58.8227434439732	Pilagás	INDEC	34042040000	34042040	Misión Tacaaglé	340175	Misión Taacaglé	MISION TACAAGLE	34	Formosa	34042
        Localidad simple	-24.9663598975615	-58.7419749100008	Pilagás	INDEC	34042050000	34042050	Portón Negro	349105	Portón Negro	PORTON NEGRO	34	Formosa	34042
        Localidad simple	-25.2153644371658	-58.5132694906705	Pilagás	INDEC	34042060000	34042060	Tres Lagunas	345063	Tres Lagunas	TRES LAGUNAS	34	Formosa	34042
        Localidad simple	-25.2921612747741	-57.7178091082588	Pilcomayo	INDEC	34049010000	34049010	Clorinda	340189	Clorinda	CLORINDA	34	Formosa	34049
        Localidad simple	-25.1302522059542	-58.2458430258241	Pilcomayo	INDEC	34049020000	34049020	Laguna Blanca	340169	Laguna Blanca	LAGUNA BLANCA	34	Formosa	34049
        Localidad simple	-25.2193910506962	-58.1230791260523	Pilcomayo	INDEC	34049030000	34049030	Laguna Naick-Neck	340203	Laguna Naik Neck	LAGUNA NAICK-NECK	34	Formosa	34049
        Localidad simple	-25.2475512345955	-57.9768403788083	Pilcomayo	INDEC	34049040000	34049040	Palma Sola			PALMA SOLA	34	Formosa	34049
        Localidad simple	-25.3688131700972	-57.6524943008573	Pilcomayo	INDEC	34049050000	34049050	Puerto Pilcomayo	340189	Clorinda	PUERTO PILCOMAYO	34	Formosa	34049
        Localidad simple	-25.3617117019838	-58.2782518825352	Pilcomayo	INDEC	34049060000	34049060	Riacho He-He	340210	Riacho He-He	RIACHO HE-HE	34	Formosa	34049
        Localidad simple	-25.4224320225992	-57.7914545139812	Pilcomayo	INDEC	34049070000	34049070	Riacho Negro	340189	Clorinda	RIACHO NEGRO	34	Formosa	34049
        Localidad simple	-25.2015076619063	-58.330676377416	Pilcomayo	INDEC	34049080000	34049080	Siete Palmas	345070	Siete Palmas	SIETE PALMAS	34	Formosa	34049
        Localidad simple	-26.2048681517277	-59.0780331803401	Pirané	INDEC	34056010000	34056010	Colonia Campo Villafañe	340231	Mayor Vicente E. Villafañe	COLONIA CAMPO VILLAFAÑE	34	Formosa	34056
        Localidad simple	-26.3117354640006	-59.3684434678409	Pirané	INDEC	34056020000	34056020	El Colorado	340224	El Colorado	EL COLORADO	34	Formosa	34056
        Localidad simple	-25.5639063797961	-59.3360059836081	Pirané	INDEC	34056030000	34056030	Palo Santo	340238	Palo Santo	PALO SANTO	34	Formosa	34056
        Localidad simple	-25.7306417902346	-59.1075205904775	Pirané	INDEC	34056040000	34056040	Pirané	340245	Pirané	PIRANE	34	Formosa	34056
        Localidad simple	-26.1864626491659	-59.3683950578867	Pirané	INDEC	34056050000	34056050	Villa Kilómetro 213	340252	Villa Dos Trece	VILLA KILOMETRO 213	34	Formosa	34056
        Localidad simple	-23.1607663192891	-62.0107787024286	Ramón Lista	INDEC	34063010000	34063010	El Potrillo			EL POTRILLO	34	Formosa	34063
        Localidad simple	-23.1827186246626	-62.304068544241	Ramón Lista	INDEC	34063020000	34063020	General Mosconi	340259	General Mosconi	GENERAL MOSCONI	34	Formosa	34063
        Localidad simple	-23.3394869143818	-61.8734659544108	Ramón Lista	INDEC	34063030000	34063030	El Quebracho			EL QUEBRACHO	34	Formosa	34063
        Localidad simple	-23.3419368713503	-66.0901014487309	Cochinoca	INDEC	38007010000	38007010	Abdón Castro Tolay	386007	Abdón Castro Tolay	ABDON CASTRO TOLAY	38	Jujuy	38007
        Localidad simple	-22.7223526298672	-65.6965045525232	Cochinoca	INDEC	38007020000	38007020	Abra Pampa	380014	Abra Pampa	ABRA PAMPA	38	Jujuy	38007
        Localidad simple	-23.1692063444784	-65.7944004862785	Cochinoca	INDEC	38007030000	38007030	Abralaite	386014	Abralaite	ABRALAITE	38	Jujuy	38007
        Localidad simple	-23.2167374833476	-65.8082738847531	Cochinoca	INDEC	38007035000	38007035	Agua de Castilla	386014	Abralaite	AGUA DE CASTILLA	38	Jujuy	38007
        Localidad simple	-22.9850219724833	-66.0328013633041	Cochinoca	INDEC	38007040000	38007040	Casabindo	380014	Abra Pampa	CASABINDO	38	Jujuy	38007
        Localidad simple	-22.744265021174	-65.8951221139841	Cochinoca	INDEC	38007050000	38007050	Cochinoca	380014	Abra Pampa	COCHINOCA	38	Jujuy	38007
        Localidad simple	-22.5294608585997	-65.5222832606241	Cochinoca	INDEC	38007055000	38007055	La Redonda	386021	Puesto del Marqués	LA REDONDA	38	Jujuy	38007
        Localidad simple	-22.5384288906185	-65.6978923774993	Cochinoca	INDEC	38007060000	38007060	Puesto del Marquéz	386021	Puesto del Marqués	PUESTO DEL MARQUEZ	38	Jujuy	38007
        Localidad simple	-23.2857891128733	-65.7701494793729	Cochinoca	INDEC	38007063000	38007063	Quebraleña	386014	Abralaite	QUEBRALEÑA	38	Jujuy	38007
        Localidad simple	-23.100830176506	-65.7627638222671	Cochinoca	INDEC	38007067000	38007067	Quera	386014	Abralaite	QUERA	38	Jujuy	38007
        Localidad simple	-23.3846029198326	-65.9573754338264	Cochinoca	INDEC	38007070000	38007070	Rinconadillas	386007	Abdón Castro Tolay	RINCONADILLAS	38	Jujuy	38007
        Localidad simple	-23.3198701399198	-65.9744058851841	Cochinoca	INDEC	38007080000	38007080	San Francisco de Alfarcito	386007	Abdón Castro Tolay	SAN FRANCISCO DE ALFARCITO	38	Jujuy	38007
        Localidad simple	-23.1248833823314	-66.05216103631	Cochinoca	INDEC	38007085000	38007085	Santa Ana de la Puna	386007	Abdón Castro Tolay	SANTA ANA DE LA PUNA	38	Jujuy	38007
        Localidad simple	-23.5332448464011	-65.9632841858024	Cochinoca	INDEC	38007090000	38007090	Santuario de Tres Pozos	386007	Abdón Castro Tolay	SANTUARIO DE TRES POZOS	38	Jujuy	38007
        Localidad simple	-22.896870936112	-65.9620225137437	Cochinoca	INDEC	38007095000	38007095	Tambillos	380014	Abra Pampa	TAMBILLOS	38	Jujuy	38007
        Localidad simple	-23.1901128134571	-65.9890162373631	Cochinoca	INDEC	38007100000	38007100	Tusaquillas	386007	Abdón Castro Tolay	TUSAQUILLAS	38	Jujuy	38007
        Entidad	-24.5838759624546	-64.9235272487523	El Carmen	INDEC	38014010001	38014010	Aguas Calientes	386035	Aguas Calientes	AGUAS CALIENTES	38	Jujuy	38014
        Entidad	-24.587376342521	-64.924057792361	El Carmen	INDEC	38014010002	38014010	Aguas Calientes	386035	Aguas Calientes	FLEMING	38	Jujuy	38014
        Entidad	-24.5598827881681	-64.9141975517301	El Carmen	INDEC	38014010003	38014010	Aguas Calientes	386035	Aguas Calientes	PILA PARDO	38	Jujuy	38014
        Localidad simple	-24.4610014305425	-65.1190583597652	El Carmen	INDEC	38014020000	38014020	Barrio El Milagro	380063	Monterrico	BARRIO EL MILAGRO	38	Jujuy	38014
        Localidad simple	-24.4043300097514	-65.0697401829896	El Carmen	INDEC	38014030000	38014030	Barrio La Unión	380077	Perico	BARRIO LA UNION	38	Jujuy	38014
        Localidad simple	-24.3891095885225	-65.2605453068598	El Carmen	INDEC	38014040000	38014040	El Carmen	380056	El Carmen	EL CARMEN	38	Jujuy	38014
        Localidad simple	-24.4759200783409	-65.0776012050617	El Carmen	INDEC	38014050000	38014050	Los Lapachos	380063	Monterrico	LOS LAPACHOS	38	Jujuy	38014
        Localidad simple	-24.4293248380693	-65.1843971543033	El Carmen	INDEC	38014055000	38014055	Loteo San Vicente	380063	Monterrico	SAN VICENTE	38	Jujuy	38014
        Localidad simple	-24.5336970280067	-64.9771546670321	El Carmen	INDEC	38014060000	38014060	Manantiales	386049	Puesto Viejo	MANANTIALES	38	Jujuy	38014
        Localidad simple	-24.4421177051028	-65.1622505537209	El Carmen	INDEC	38014070000	38014070	Monterrico	380063	Monterrico	MONTERRICO	38	Jujuy	38014
        Localidad simple	-24.5325323540548	-65.0742522158109	El Carmen	INDEC	38014080000	38014080	Pampa Blanca	386042	Pampa Blanca	PAMPA BLANCA	38	Jujuy	38014
        Localidad simple	-24.3807802774746	-65.1162073560982	El Carmen	INDEC	38014090000	38014090	Perico	380077	Perico	PERICO	38	Jujuy	38014
        Localidad simple	-24.485003513907	-64.9670262152006	El Carmen	INDEC	38014100000	38014100	Puesto Viejo	386049	Puesto Viejo	PUESTO VIEJO	38	Jujuy	38014
        Localidad simple	-24.5556368462513	-64.9424207944567	El Carmen	INDEC	38014110000	38014110	San Isidro	386035	Aguas Calientes	SAN ISIDRO	38	Jujuy	38014
        Localidad simple	-24.3843856940085	-64.9937381095943	El Carmen	INDEC	38014120000	38014120	San Juancito	380077	Perico	SAN JUANCITO	38	Jujuy	38014
        Localidad simple	-24.1859719091941	-65.4487115603426	Dr. Manuel Belgrano	INDEC	38021010000	38021010	Guerrero	380035	San Salvador de Jujuy	GUERRERO	38	Jujuy	38021
        Localidad simple	-24.2656799176145	-65.3972038835293	Dr. Manuel Belgrano	INDEC	38021020000	38021020	La Almona	380035	San Salvador de Jujuy	LA ALMONA	38	Jujuy	38021
        Localidad simple	-24.0395227299023	-65.4309577730475	Dr. Manuel Belgrano	INDEC	38021030000	38021030	León	386028	Yala	LEON	38	Jujuy	38021
        Localidad simple	-24.0820553565565	-65.4037790153252	Dr. Manuel Belgrano	INDEC	38021040000	38021040	Lozano	386028	Yala	LOZANO	38	Jujuy	38021
        Localidad simple	-23.9440584396018	-65.2322154882925	Dr. Manuel Belgrano	INDEC	38021050000	38021050	Ocloyas	386028	Yala	OCLOYAS	38	Jujuy	38021
        Componente de localidad compuesta	-24.1844139008337	-65.3039986701092	Dr. Manuel Belgrano	INDEC	38021060000	38021060	San Salvador de Jujuy	380035	San Salvador de Jujuy	SAN SALVADOR DE JUJUY	38	Jujuy	38021
        Localidad simple	-23.9486188183993	-65.2985111585154	Dr. Manuel Belgrano	INDEC	38021065000	38021065	Tesorero	386028	Yala	TESORERO	38	Jujuy	38021
        Entidad	-24.0840270539675	-65.4760846258348	Dr. Manuel Belgrano	INDEC	38021070001	38021070	Yala	386028	Yala	LOS NOGALES	38	Jujuy	38021
        Entidad	-24.1436588948106	-65.482919981479	Dr. Manuel Belgrano	INDEC	38021070002	38021070	Yala	386028	Yala	SAN PABLO DE REYES	38	Jujuy	38021
        Entidad	-24.1217546163942	-65.4145726152103	Dr. Manuel Belgrano	INDEC	38021070003	38021070	Yala	386028	Yala	YALA	38	Jujuy	38021
        Localidad simple	-23.0992150250753	-65.1865385997584	Humahuaca	INDEC	38028003000	38028003	Aparzo	380105	Humahuaca	APARZO	38	Jujuy	38028
        Localidad simple	-23.1732331272464	-65.1578176759527	Humahuaca	INDEC	38028007000	38028007	Cianzo	380105	Humahuaca	CIANZO	38	Jujuy	38028
        Localidad simple	-23.1543348556287	-65.2936644075552	Humahuaca	INDEC	38028010000	38028010	Coctaca	380105	Humahuaca	COCTACA	38	Jujuy	38028
        Localidad simple	-23.2139846798174	-65.6788754303526	Humahuaca	INDEC	38028020000	38028020	El Aguilar	380091	El Aguilar	EL AGUILAR	38	Jujuy	38028
        Localidad simple	-22.9790987916947	-65.3527979015935	Humahuaca	INDEC	38028030000	38028030	Hipólito Yrigoyen	386056	Hipólito Yrigoyen	HIPOLITO YRIGOYEN	38	Jujuy	38028
        Localidad simple	-23.2118256384836	-65.3507419495251	Humahuaca	INDEC	38028040000	38028040	Humahuaca	380105	Humahuaca	HUMAHUACA	38	Jujuy	38028
        Localidad simple	-23.1220406414082	-65.134806337775	Humahuaca	INDEC	38028043000	38028043	Palca de Aparzo	380105	Humahuaca	PALCA DE APARZO	38	Jujuy	38028
        Localidad simple	-23.1018612642193	-65.112920847023	Humahuaca	INDEC	38028045000	38028045	Palca de Varas	380105	Humahuaca	PALCA DE VARAS	38	Jujuy	38028
        Localidad simple	-23.0621839336364	-65.3260425196353	Humahuaca	INDEC	38028047000	38028047	Rodero	380105	Humahuaca	RODERO	38	Jujuy	38028
        Localidad simple	-22.9169380002989	-65.5878327366614	Humahuaca	INDEC	38028050000	38028050	Tres Cruces	386063	Tres Cruces	TRES CRUCES	38	Jujuy	38028
        Localidad simple	-23.3041905968327	-65.356558164038	Humahuaca	INDEC	38028060000	38028060	Uquía	380105	Humahuaca	UQUIA	38	Jujuy	38028
        Localidad simple	-23.565439613584	-64.5011631978961	Ledesma	INDEC	38035010000	38035010	Bananal	380147	Yuto	BANANAL	38	Jujuy	38035
        Localidad simple	-23.7881113454008	-64.73005792215	Ledesma	INDEC	38035020000	38035020	Bermejito	380126	Calilegua	BERMEJITO	38	Jujuy	38035
        Localidad simple	-23.7390273358675	-64.5927674367986	Ledesma	INDEC	38035030000	38035030	Caimancito	380119	Caimancito	CAIMANCITO	38	Jujuy	38035
        Localidad simple	-23.77580785145	-64.7714502012243	Ledesma	INDEC	38035040000	38035040	Calilegua	380126	Calilegua	CALILEGUA	38	Jujuy	38035
        Localidad simple	-24.0701319470485	-64.8068636697633	Ledesma	INDEC	38035050000	38035050	Chalicán	380133	Fraile Pintado	CHALICAN	38	Jujuy	38035
        Localidad simple	-23.9420214191485	-64.8029446573235	Ledesma	INDEC	38035060000	38035060	Fraile Pintado	380133	Fraile Pintado	FRAILE PINTADO	38	Jujuy	38035
        Localidad simple	-23.7623858141283	-64.7259945367992	Ledesma	INDEC	38035070000	38035070	Libertad	380126	Calilegua	LIBERTAD	38	Jujuy	38035
        Localidad simple con entidad	-23.8091072493712	-64.7927821518223	Ledesma	INDEC	38035080000	38035080	Libertador General San Martín	380140	Libertador General San Martín	LIBERTADOR GENERAL SAN MARTIN	38	Jujuy	38035
        Entidad	-23.8226030728583	-64.9000065559959	Ledesma	INDEC	38035080001	38035080	Libertador General San Martín	380140	Libertador General San Martín	LIBERTADOR GENERAL SAN MARTIN	38	Jujuy	38035
        Entidad	-23.8273072049676	-64.791360563704	Ledesma	INDEC	38035080002	38035080	Libertador General San Martín	380140	Libertador General San Martín	PUEBLO LEDESMA	38	Jujuy	38035
        Localidad simple	-23.9506323797642	-64.7736232797616	Ledesma	INDEC	38035090000	38035090	Maíz Negro	380133	Fraile Pintado	MAIZ NEGRO	38	Jujuy	38035
        Localidad simple	-23.8445381270952	-64.7389846268417	Ledesma	INDEC	38035100000	38035100	Paulina	380140	Libertador General San Martín	PAULINA	38	Jujuy	38035
        Localidad simple	-23.6473910528443	-64.4683378490048	Ledesma	INDEC	38035110000	38035110	Yuto	380147	Yuto	YUTO	38	Jujuy	38035
        Localidad simple	-24.3076479727425	-65.0834468981217	Palpalá	INDEC	38042010000	38042010	Carahunco	380154	Palpalá	CARAHUNCO	38	Jujuy	38042
        Localidad simple	-24.2287296415511	-65.1776468508489	Palpalá	INDEC	38042020000	38042020	Centro Forestal	380154	Palpalá	CENTRO FORESTAL	38	Jujuy	38042
        Entidad	-24.2660503354304	-65.2120271030598	Palpalá	INDEC	38042040001	38042040	Palpalá	380154	Palpalá	PALPALA	38	Jujuy	38042
        Entidad	-24.2342342593785	-65.2300747773282	Palpalá	INDEC	38042040002	38042040	Palpalá	380154	Palpalá	RIO BLANCO	38	Jujuy	38042
        Localidad simple	-22.3253946072654	-66.2837654791341	Rinconada	INDEC	38049003000	38049003	Casa Colorada	386077	Rinconada	CASA COLORADA	38	Jujuy	38049
        Localidad simple	-22.7704435619992	-66.440426993556	Rinconada	INDEC	38049007000	38049007	Coyaguaima	386070	Mina Pirquitas	COYAGUAIMA	38	Jujuy	38049
        Localidad simple	-22.4621492240335	-66.6281060495323	Rinconada	INDEC	38049010000	38049010	Lagunillas de Farallón	386140	Cusi Cusi	LAGUNILLAS DE FARALLON	38	Jujuy	38049
        Localidad simple	-22.5205427089875	-66.3370942259576	Rinconada	INDEC	38049020000	38049020	Liviara	386070	Mina Pirquitas	LIVIARA	38	Jujuy	38049
        Localidad simple	-22.4715310141327	-66.4842002316312	Rinconada	INDEC	38049025000	38049025	Loma Blanca	386070	Mina Pirquitas	LOMA BLANCA	38	Jujuy	38049
        Localidad simple	-22.6879554218994	-66.4563756677863	Rinconada	INDEC	38049030000	38049030	Nuevo Pirquitas	386070	Mina Pirquitas	NUEVO PIRQUITAS	38	Jujuy	38049
        Localidad simple	-22.5570555914003	-66.3563627312909	Rinconada	INDEC	38049035000	38049035	Orosmayo	386070	Mina Pirquitas	OROSMAYO	38	Jujuy	38049
        Localidad simple	-22.4403477816105	-66.1673735179392	Rinconada	INDEC	38049040000	38049040	Rinconada	386077	Rinconada	RINCONADA	38	Jujuy	38049
        Localidad simple	-24.3013918074401	-65.2794378200693	San Antonio	INDEC	38056010000	38056010	El Ceibal	386084	San Antonio	EL CEIBAL	38	Jujuy	38056
        Localidad simple	-24.2694294471429	-65.3038293509073	San Antonio	INDEC	38056017000	38056017	Los Alisos	386084	San Antonio	LOS ALISOS	38	Jujuy	38056
        Localidad simple	-24.2701433897522	-65.2740648045537	San Antonio	INDEC	38056020000	38056020	Loteo Navea	386084	San Antonio	LOTEO NAVEA	38	Jujuy	38056
        Localidad simple	-24.3184045981955	-65.400922691233	San Antonio	INDEC	38056025000	38056025	Nuestra Señora del Rosario	386084	San Antonio	NUESTRA SE?ORA DEL ROSARIO	38	Jujuy	38056
        Localidad simple	-24.3672400343176	-65.3377007673345	San Antonio	INDEC	38056030000	38056030	San Antonio	386084	San Antonio	SAN ANTONIO	38	Jujuy	38056
        Localidad simple	-24.1768075323298	-64.8403333563822	San Pedro	INDEC	38063010000	38063010	Arrayanal	386091	Arrayanal	ARRAYANAL	38	Jujuy	38063
        Localidad simple	-24.3365556568725	-64.6635805195007	San Pedro	INDEC	38063020000	38063020	Arroyo Colorado	380224	San Pedro de Jujuy	ARROYO COLORADO	38	Jujuy	38063
        Localidad simple	-24.3167328574824	-64.9078893331684	San Pedro	INDEC	38063030000	38063030	Don Emilio	386112	Rosario de Río Grande	DON EMILIO	38	Jujuy	38063
        Localidad simple	-24.4035872902004	-64.8010495450204	San Pedro	INDEC	38063040000	38063040	El Acheral	380224	San Pedro de Jujuy	EL ACHERAL	38	Jujuy	38063
        Localidad simple	-24.1989198465405	-64.7892891441781	San Pedro	INDEC	38063050000	38063050	El Puesto	380196	La Esperanza	EL PUESTO	38	Jujuy	38063
        Localidad simple	-24.1058565563838	-64.823062158756	San Pedro	INDEC	38063060000	38063060	El Quemado	386091	Arrayanal	EL QUEMADO	38	Jujuy	38063
        Localidad simple	-22.8263430234688	-65.2018356755618	Iruya	INDEC	66070030000	66070030	Pueblo Viejo	660175	Iruya	PUEBLO VIEJO	66	Salta	66070
        Componente de localidad compuesta con entidad	-24.2237083446708	-64.8373717906107	San Pedro	INDEC	38063070000	38063070	La Esperanza	380196	La Esperanza	LA ESPERANZA	38	Jujuy	38063
        Entidad	-24.1691296094135	-64.7828725492928	San Pedro	INDEC	38063070001	38063070	La Esperanza	386091	Arrayanal	LA ESPERANZA	38	Jujuy	38063
        Localidad simple	-24.191027398496	-64.847140304232	San Pedro	INDEC	38063080000	38063080	La Manga	386091	Arrayanal	LA MANGA	38	Jujuy	38063
        Localidad simple	-24.3164922129456	-64.9670192886888	San Pedro	INDEC	38063090000	38063090	La Mendieta	380203	La Mendieta	LA MENDIETA	38	Jujuy	38063
        Componente de localidad compuesta	-24.2247852710015	-64.8201208754985	San Pedro	INDEC	38063100000	38063100	Miraflores	380196	La Esperanza	MIRAFLORES	38	Jujuy	38063
        Localidad simple	-24.3269093157963	-64.9472509634032	San Pedro	INDEC	38063110000	38063110	Palos Blancos	386112	Rosario de Río Grande	PALOS BLANCOS	38	Jujuy	38063
        Componente de localidad compuesta	-24.236443947266	-64.8448511951718	San Pedro	INDEC	38063120000	38063120	Parapetí	380196	La Esperanza	PARAPETI	38	Jujuy	38063
        Localidad simple	-24.2961714666534	-64.8821863479764	San Pedro	INDEC	38063130000	38063130	Piedritas	386112	Rosario de Río Grande	PIEDRITAS	38	Jujuy	38063
        Localidad simple	-24.2716140097952	-64.768970964685	San Pedro	INDEC	38063140000	38063140	Rodeito	386105	Rodeíto	RODEITO	38	Jujuy	38063
        Localidad simple	-24.3085245850739	-64.9316446809993	San Pedro	INDEC	38063150000	38063150	Rosario de Río Grande (ex Barro Negro)	386112	Rosario de Río Grande	ROSARIO DE RIO GRANDE	38	Jujuy	38063
        Localidad simple	-24.219671559876	-64.8045172910273	San Pedro	INDEC	38063160000	38063160	San Antonio	380196	La Esperanza	SAN ANTONIO	38	Jujuy	38063
        Localidad simple	-24.2685961573007	-64.8642893202695	San Pedro	INDEC	38063170000	38063170	San Lucas	386105	Rodeíto	SAN LUCAS	38	Jujuy	38063
        Componente de localidad compuesta	-24.2313021129282	-64.8681693070463	San Pedro	INDEC	38063180000	38063180	San Pedro	380224	San Pedro de Jujuy	SAN PEDRO	38	Jujuy	38063
        Localidad simple	-24.2987583243037	-64.9571556712013	San Pedro	INDEC	38063190000	38063190	Sauzal	380203	La Mendieta	SAUZAL	38	Jujuy	38063
        Localidad simple	-24.260560497029	-64.4155132039794	Santa Bárbara	INDEC	38070010000	38070010	El Fuerte	386098	El Fuerte	EL FUERTE	38	Jujuy	38070
        Localidad simple	-24.1791481712823	-64.6776330087428	Santa Bárbara	INDEC	38070020000	38070020	El Piquete	386119	El Piquete	EL PIQUETE	38	Jujuy	38070
        Localidad simple	-23.5555611045113	-64.3643099072085	Santa Bárbara	INDEC	38070030000	38070030	El Talar	380238	El Talar	EL TALAR	38	Jujuy	38070
        Localidad simple	-23.9678426401893	-64.3034683351392	Santa Bárbara	INDEC	38070040000	38070040	Palma Sola	380245	Palma Sola	PALMA SOLA	38	Jujuy	38070
        Localidad simple	-24.2725269338812	-64.7161865903699	Santa Bárbara	INDEC	38070050000	38070050	Puente Lavayén	380252	Santa Clara	PUENTE LAVAYEN	38	Jujuy	38070
        Localidad simple	-24.3078151766845	-64.6610648577922	Santa Bárbara	INDEC	38070060000	38070060	Santa Clara	380252	Santa Clara	SANTA CLARA	38	Jujuy	38070
        Localidad simple	-23.6681883228337	-64.4131178374229	Santa Bárbara	INDEC	38070070000	38070070	Vinalito	386126	Vinalito	VINALITO	38	Jujuy	38070
        Localidad simple	-21.9788187103851	-65.8958558436093	Santa Catalina	INDEC	38077010000	38077010	Casira	386133	Cieneguillas	CASIRA	38	Jujuy	38077
        Localidad simple	-22.1769689683858	-66.4139607069096	Santa Catalina	INDEC	38077020000	38077020	Ciénega de Paicone	386140	Cusi Cusi	CIENEGA	38	Jujuy	38077
        Localidad simple	-22.1009002170764	-65.867209693443	Santa Catalina	INDEC	38077030000	38077030	Cieneguillas	386133	Cieneguillas	CIENEGUILLAS	38	Jujuy	38077
        Localidad simple	-22.3402234558008	-66.4926397388327	Santa Catalina	INDEC	38077040000	38077040	Cusi Cusi	386140	Cusi Cusi	CUSI CUSI	38	Jujuy	38077
        Localidad simple	-21.8764898712784	-66.1886427089451	Santa Catalina	INDEC	38077045000	38077045	El Angosto	386147	Santa Catalina	EL ANGOSTO	38	Jujuy	38077
        Localidad simple	-21.9606332568994	-66.263084676456	Santa Catalina	INDEC	38077050000	38077050	La Ciénega	386147	Santa Catalina	LA CIENEGA	38	Jujuy	38077
        Localidad simple	-22.2593865040609	-66.3668608819379	Santa Catalina	INDEC	38077060000	38077060	Misarrumi	386140	Cusi Cusi	MISARRUMI	38	Jujuy	38077
        Localidad simple	-22.0991710039884	-66.1325561087962	Santa Catalina	INDEC	38077070000	38077070	Oratorio	386147	Santa Catalina	ORATORIO	38	Jujuy	38077
        Localidad simple	-22.2193202745887	-66.4252604137157	Santa Catalina	INDEC	38077080000	38077080	Paicone	386140	Cusi Cusi	PAICONE	38	Jujuy	38077
        Localidad simple	-22.2243859011206	-66.2489981842614	Santa Catalina	INDEC	38077090000	38077090	San Juan de Oros	386140	Cusi Cusi	SAN JUAN DE OROS	38	Jujuy	38077
        Localidad simple	-21.9457402673178	-66.0524460482788	Santa Catalina	INDEC	38077100000	38077100	Santa Catalina	386147	Santa Catalina	SANTA CATALINA	38	Jujuy	38077
        Localidad simple	-22.1671932548934	-66.0247356350832	Santa Catalina	INDEC	38077110000	38077110	Yoscaba	386133	Cieneguillas	YOSCABA	38	Jujuy	38077
        Localidad simple	-23.8697878292198	-67.0052751921339	Susques	INDEC	38084010000	38084010	Catua	386154	Catua	CATUA	38	Jujuy	38084
        Localidad simple	-23.0145482730193	-66.3666374411625	Susques	INDEC	38084020000	38084020	Coranzuli	386161	Coranzuli	CORANZULI	38	Jujuy	38084
        Localidad simple	-23.0836526940797	-66.7015910904293	Susques	INDEC	38084030000	38084030	El Toro	386161	Coranzuli	EL TORO	38	Jujuy	38084
        Localidad simple	-23.5638430752997	-66.4093156495626	Susques	INDEC	38084040000	38084040	Huáncar	386168	Susques	HUANCAR	38	Jujuy	38084
        Localidad simple	-23.2381696240536	-67.0272646457146	Susques	INDEC	38084045000	38084045	Jama	386161	Coranzuli	JAMA	38	Jujuy	38084
        Localidad simple	-23.2654412559675	-66.6556621241901	Susques	INDEC	38084050000	38084050	Mina Providencia	386168	Susques	MINA PROVIDENCIA	38	Jujuy	38084
        Localidad simple	-24.1152805507803	-66.7186508694002	Susques	INDEC	38084055000	38084055	Olacapato	386168	Susques	OLACAPATO	38	Jujuy	38084
        Localidad simple	-23.3934649138842	-66.8017391151812	Susques	INDEC	38084060000	38084060	Olaroz Chico	386161	Coranzuli	OLAROZ CHICO	38	Jujuy	38084
        Localidad simple	-23.7667799522763	-66.4362241723231	Susques	INDEC	38084070000	38084070	Pastos Chicos	386168	Susques	PASTOS CHICOS	38	Jujuy	38084
        Localidad simple	-23.9450800745364	-66.4880705176388	Susques	INDEC	38084080000	38084080	Puesto Sey	386168	Susques	PUESTO SEY	38	Jujuy	38084
        Localidad simple	-23.2303525084842	-66.3437115747179	Susques	INDEC	38084090000	38084090	San Juan de Quillaqués	386161	Coranzuli	SAN JUAN DE QUILLAQUES	38	Jujuy	38084
        Localidad simple	-23.3993487788994	-66.3663509046119	Susques	INDEC	38084100000	38084100	Susques	386161	Coranzuli	SUSQUES	38	Jujuy	38084
        Entidad	-23.4023544678311	-65.3910451552268	Tilcara	INDEC	38094010001	38094010	Colonia San José	386175	Huacalera	COLONIA SAN JOSE	38	Jujuy	38094
        Entidad	-23.4023544678311	-65.3910451552268	Tilcara	INDEC	38094010002	38094010	Colonia San José	386175	Huacalera	YACORAITE	38	Jujuy	38094
        Localidad simple	-23.4369569456923	-65.3498233567527	Tilcara	INDEC	38094020000	38094020	Huacalera	386175	Huacalera	HUACALERA	38	Jujuy	38094
        Localidad simple	-23.5175106247741	-65.4081712327054	Tilcara	INDEC	38094030000	38094030	Juella	380329	Tilcara	JUELLA	38	Jujuy	38094
        Localidad simple	-23.6251650641141	-65.4090898914489	Tilcara	INDEC	38094040000	38094040	Maimará	386182	Maimará	MAIMARA	38	Jujuy	38094
        Localidad simple	-23.5758626116635	-65.3936940685486	Tilcara	INDEC	38094050000	38094050	Tilcara	380329	Tilcara	TILCARA	38	Jujuy	38094
        Localidad simple	-23.9826097875936	-65.4550931589626	Tumbaya	INDEC	38098010000	38098010	Bárcena	386203	Volcán	BARCENA	38	Jujuy	38098
        Localidad simple	-23.8509115379981	-65.8316510262887	Tumbaya	INDEC	38098020000	38098020	El Moreno	386189	Purmamarca	EL MORENO	38	Jujuy	38098
        Localidad simple	-23.5715104796996	-65.698000202945	Tumbaya	INDEC	38098025000	38098025	Puerta de Colorados	386189	Purmamarca	PUERTA DE COLORADOS	38	Jujuy	38098
        Localidad simple	-23.7450544260753	-65.5003903899528	Tumbaya	INDEC	38098030000	38098030	Purmamarca	386189	Purmamarca	PURMAMARCA	38	Jujuy	38098
        Localidad simple	-23.8561961637236	-65.4663650677457	Tumbaya	INDEC	38098040000	38098040	Tumbaya	386196	Tumbaya	TUMBAYA	38	Jujuy	38098
        Localidad simple	-23.9165986512201	-65.4655058903446	Tumbaya	INDEC	38098050000	38098050	Volcán	386203	Volcán	VOLCAN	38	Jujuy	38098
        Localidad simple	-23.3626169910686	-65.0914951382906	Valle Grande	INDEC	38105010000	38105010	Caspalá	386210	Caspalá	CASPALA	38	Jujuy	38105
        Localidad simple	-23.5548845300142	-65.0066887909796	Valle Grande	INDEC	38105020000	38105020	Pampichuela	386217	Pampichuela	PAMPICHUELA	38	Jujuy	38105
        Localidad simple	-23.6213393482903	-64.9501640840905	Valle Grande	INDEC	38105030000	38105030	San Francisco	386224	San Francisco	SAN FRANCISCO	38	Jujuy	38105
        Localidad simple	-23.3564321535763	-64.9877247699547	Valle Grande	INDEC	38105040000	38105040	Santa Ana	386231	Santa Ana	SANTA ANA	38	Jujuy	38105
        Localidad simple	-23.4139544374567	-64.93377255055	Valle Grande	INDEC	38105050000	38105050	Valle Colorado	386231	Santa Ana	VALLE COLORADO	38	Jujuy	38105
        Localidad simple	-23.4758465611018	-64.9469047343163	Valle Grande	INDEC	38105060000	38105060	Valle Grande	386238	Valle Grande	VALLE GRANDE	38	Jujuy	38105
        Localidad simple	-22.2477578344269	-65.529042968307	Yaví	INDEC	38112010000	38112010	Barrios	386245	Barrios	BARRIOS	38	Jujuy	38112
        Localidad simple	-22.423791437897	-65.579872144671	Yaví	INDEC	38112020000	38112020	Cangrejillos	386252	Cangrejillos	CANGREJILLOS	38	Jujuy	38112
        Localidad simple	-22.3866192862254	-65.3395952168589	Yaví	INDEC	38112030000	38112030	El Cóndor	386259	El Cóndor	EL CONDOR	38	Jujuy	38112
        Localidad simple	-22.4230485492938	-65.7004227358985	Yaví	INDEC	38112040000	38112040	La Intermedia	386266	Pumahuasi	LA INTERMEDIA	38	Jujuy	38112
        Localidad simple	-22.1064369293997	-65.5957257876868	Yaví	INDEC	38112050000	38112050	La Quiaca	380406	La Quiaca	LA QUIACA	38	Jujuy	38112
        Localidad simple	-22.5507612616611	-65.3872645925388	Yaví	INDEC	38112060000	38112060	Llulluchayoc	386021	Puesto del Marqués	LLULLUCHAYOC	38	Jujuy	38112
        Localidad simple	-22.2899363240929	-65.6798827753743	Yaví	INDEC	38112070000	38112070	Pumahuasi	386266	Pumahuasi	PUMAHUASI	38	Jujuy	38112
        Entidad	-22.1378271107898	-65.3097886156379	Yaví	INDEC	38112080001	38112080	Yavi	386273	Yavi	SAN JOSE	38	Jujuy	38112
        Localidad simple	-22.0983777844843	-65.4559189939558	Yaví	INDEC	38112090000	38112090	Yavi Chico	386273	Yavi	YAVI CHICO	38	Jujuy	38112
        Localidad simple	-37.1521838816608	-64.0140550927574	Atreucó	INDEC	42007010000	42007010	Doblas	420112	Doblas	DOBLAS	42	La Pampa	42007
        Localidad simple	-37.1369555361687	-63.667141835534	Atreucó	INDEC	42007020000	42007020	Macachín	420231	Macachín	MACACHIN	42	La Pampa	42007
        Localidad simple	-36.8538749058938	-63.6881846143541	Atreucó	INDEC	42007030000	42007030	Miguel Riglos	420259	Miguel Riglos	MIGUEL RIGLOS	42	La Pampa	42007
        Localidad simple	-37.166824214775	-63.4171582009534	Atreucó	INDEC	42007040000	42007040	Rolón	420322	Rolón	ROLON	42	La Pampa	42007
        Localidad simple	-36.8406606874148	-63.5205021645149	Atreucó	INDEC	42007050000	42007050	Tomás M. Anchorena	420364	Tomás Manuel Anchorena	TOMAS M. ANCHORENA	42	La Pampa	42007
        Localidad simple	-38.9630526765691	-63.8608882456791	Caleu Caleu	INDEC	42014010000	42014010	Anzoátegui	420189	La Adela	ANZOATEGUI	42	La Pampa	42014
        Componente de localidad compuesta	-38.9739618507806	-64.0893166949512	Caleu Caleu	INDEC	42014020000	42014020	La Adela	420189	La Adela	LA ADELA	42	La Pampa	42014
        Localidad simple	-36.527922625355	-64.010555897973	Capital	INDEC	42021010000	42021010	Anguil	420028	Anguil	ANGUIL	42	La Pampa	42021
        Componente de localidad compuesta	-36.61828979857	-64.2916770389461	Capital	INDEC	42021020000	42021020	Santa Rosa	420336	Santa Rosa	SANTA ROSA	42	La Pampa	42021
        Localidad simple	-36.4077407331528	-63.4231236479695	Catriló	INDEC	42028010000	42028010	Catriló	420077	Catriló	CATRILO	42	La Pampa	42028
        Localidad simple	-36.5079177159884	-63.7444083139952	Catriló	INDEC	42028020000	42028020	La Gloria	420378	Uriburu	LA GLORIA	42	La Pampa	42028
        Localidad simple	-36.4676263417811	-63.6237223449231	Catriló	INDEC	42028030000	42028030	Lonquimay	420217	Lonquimay	LONQUIMAY	42	La Pampa	42028
        Localidad simple	-36.5077574745038	-63.8626307655783	Catriló	INDEC	42028040000	42028040	Uriburu	420378	Uriburu	URIBURU	42	La Pampa	42028
        Localidad simple	-35.9994878462166	-64.5959233383525	Conhelo	INDEC	42035010000	42035010	Conhelo	420098	Conhelo	CONHELO	42	La Pampa	42035
        Localidad simple	-35.916589710926	-64.2945868368038	Conhelo	INDEC	42035020000	42035020	Eduardo Castex	420119	Eduardo Castex	EDUARDO CASTEX	42	La Pampa	42035
        Localidad simple	-36.2106631640542	-64.0335412257945	Conhelo	INDEC	42035030000	42035030	Mauricio Mayer	420238	Mauricio Mayer	MAURICIO MAYER	42	La Pampa	42035
        Localidad simple	-35.8617464058389	-64.1569675208376	Conhelo	INDEC	42035040000	42035040	Monte Nievas	420266	Monte Nievas	MONTE NIEVAS	42	La Pampa	42035
        Localidad simple	-36.0429376779565	-64.8353214769324	Conhelo	INDEC	42035050000	42035050	Rucanelo	425133	Rucanelo	RUCANELO	42	La Pampa	42035
        Localidad simple	-36.2272741396174	-64.2348767956417	Conhelo	INDEC	42035060000	42035060	Winifreda	420413	Winifreda	WINIFREDA	42	La Pampa	42035
        Localidad simple	-38.7413407663938	-66.4360653362481	Curacó	INDEC	42042010000	42042010	Gobernador Duval	425070	Gobernador Duval	GOBERNADOR DUVAL	42	La Pampa	42042
        Localidad simple	-38.1437722310811	-65.9102790812435	Curacó	INDEC	42042020000	42042020	Puelches	420280	Puelches	PUELCHES	42	La Pampa	42042
        Localidad simple	-36.2298585551973	-66.9416696902043	Chalileo	INDEC	42049010000	42049010	Santa Isabel	420329	Santa Isabel	SANTA ISABEL	42	La Pampa	42049
        Localidad simple	-35.0240766140268	-63.5814786778188	Chapaleufú	INDEC	42056010000	42056010	Bernardo Larroude	420049	Bernardo Larroude	BERNARDO LARROUDE	42	La Pampa	42056
        Localidad simple	-35.2904849982905	-63.77586064487	Chapaleufú	INDEC	42056020000	42056020	Ceballos	420084	Ceballos	CEBALLOS	42	La Pampa	42056
        Localidad simple	-35.0223098759754	-63.9123145859878	Chapaleufú	INDEC	42056030000	42056030	Coronel Hilario Lagos	420105	Coronel Hilario Lagos	CORONEL HILARIO LAGOS	42	La Pampa	42056
        Localidad simple	-35.2368693365619	-63.5923274522769	Chapaleufú	INDEC	42056040000	42056040	Intendente Alvear	420175	Intendente Alvear	INTENDENTE ALVEAR	42	La Pampa	42056
        Localidad simple	-35.0246923056998	-63.686962377693	Chapaleufú	INDEC	42056050000	42056050	Sarah	425140	Sarah	SARAH	42	La Pampa	42056
        Localidad simple	-35.4262411079929	-63.9063646669037	Chapaleufú	INDEC	42056060000	42056060	Vértiz	420392	Vértiz	VERTIZ	42	La Pampa	42056
        Localidad simple	-36.4011467185658	-67.1484015946157	Chical Co	INDEC	42063010000	42063010	Algarrobo del Águila	420011	Algarrobo del Águila	ALGARROBO DEL AGUILA	42	La Pampa	42063
        Localidad simple	-36.3500276379509	-68.0141950027482	Chical Co	INDEC	42063020000	42063020	La Humada	420196	La Humada	LA HUMADA	42	La Pampa	42063
        Localidad simple	-37.3758811926005	-63.7738735909085	Guatraché	INDEC	42070010000	42070010	Alpachiri	420014	Alpachiri	ALPACHIRI	42	La Pampa	42070
        Localidad simple	-37.4589894326191	-63.5872408548874	Guatraché	INDEC	42070020000	42070020	General Manuel J. Campos	420140	General Campos	GENERAL MANUEL J. CAMPOS	42	La Pampa	42070
        Localidad simple	-37.6669652272263	-63.5415367289386	Guatraché	INDEC	42070030000	42070030	Guatraché	420161	Guatraché	GUATRACHE	42	La Pampa	42070
        Localidad simple	-37.6623849438401	-64.1373213494442	Guatraché	INDEC	42070040000	42070040	Perú	425105	Perú	PERU	42	La Pampa	42070
        Localidad simple	-37.5749339058948	-63.4328864695669	Guatraché	INDEC	42070050000	42070050	Santa Teresa	420343	Santa Teresa	SANTA TERESA	42	La Pampa	42070
        Localidad simple	-37.8943313295474	-63.8515025914131	Hucal	INDEC	42077010000	42077010	Abramo	420007	Abramo	ABRAMO	42	La Pampa	42077
        Localidad simple	-37.9020681912485	-63.7450793526802	Hucal	INDEC	42077020000	42077020	Bernasconi	420056	Bernasconi	BERNASCONI	42	La Pampa	42077
        Localidad simple	-37.9785301335454	-63.6065854529977	Hucal	INDEC	42077030000	42077030	General San Martín	420154	General San Martín	GENERAL SAN MARTIN	42	La Pampa	42077
        Localidad simple	-37.7849629183535	-64.0306677804584	Hucal	INDEC	42077040000	42077040	Hucal	420007	Abramo	HUCAL	42	La Pampa	42077
        Localidad simple	-38.0837587172211	-63.4321816643775	Hucal	INDEC	42077050000	42077050	Jacinto Aráuz	420182	Jacinto Arauz	JACINTO ARAUZ	42	La Pampa	42077
        Localidad simple	-38.3336784745408	-64.6422526958764	Lihuel Calel	INDEC	42084010000	42084010	Cuchillo Co	425042	Cuchillo Có	CUCHILLO CO	42	La Pampa	42084
        Localidad simple	-37.5520049423349	-66.2268538972728	Limay Mahuida	INDEC	42091010000	42091010	La Reforma	425077	La Reforma	LA REFORMA	42	La Pampa	42091
        Localidad simple	-37.1597120530545	-66.6745400356471	Limay Mahuida	INDEC	42091020000	42091020	Limay Mahuida	425084	Limay Mahuida	LIMAY MAHUIDA	42	La Pampa	42091
        Localidad simple	-36.47556498406	-65.3429160249895	Loventué	INDEC	42098010000	42098010	Carro Quemado	420070	Carro Quemado	CARRO QUEMADO	42	La Pampa	42098
        Localidad simple	-36.1887459763907	-65.2899702728719	Loventué	INDEC	42098020000	42098020	Loventué	425091	Loventué	LOVENTUE	42	La Pampa	42098
        Localidad simple	-36.2016818772905	-65.0972782402489	Loventué	INDEC	42098030000	42098030	Luan Toro	420224	Luan Toro	LUAN TORO	42	La Pampa	42098
        Localidad simple	-36.2640564040186	-65.5097731802402	Loventué	INDEC	42098040000	42098040	Telén	420350	Telén	TELEN	42	La Pampa	42098
        Localidad simple	-36.2048593679219	-65.4403752727095	Loventué	INDEC	42098050000	42098050	Victorica	420399	Victorica	VICTORICA	42	La Pampa	42098
        Localidad simple	-35.7811018772957	-63.3932493460357	Maracó	INDEC	42105010000	42105010	Agustoni	425014	Agustoni	AGUSTONI	42	La Pampa	42105
        Localidad simple	-35.7763229509013	-63.716840693317	Maracó	INDEC	42105020000	42105020	Dorila	420116	Dorila	DORILA	42	La Pampa	42105
        Localidad simple	-35.6633805937206	-63.760929267739	Maracó	INDEC	42105030000	42105030	General Pico	420147	General Pico	GENERAL PICO	42	La Pampa	42105
        Localidad simple	-35.547293621716	-63.8200403343494	Maracó	INDEC	42105040000	42105040	Speluzzi	425147	Speluzzi	SPELUZZI	42	La Pampa	42105
        Localidad simple	-35.5855840986961	-63.5887521403772	Maracó	INDEC	42105050000	42105050	Trebolares	420147	General Pico	TREBOLARES	42	La Pampa	42105
        Localidad simple	-38.2230515311115	-67.1709263654639	Puelén	INDEC	42112005000	42112005	Casa de Piedra	422007	Casa de Piedra	CASA DE PIEDRA	42	La Pampa	42112
        Localidad simple	-37.3400655492209	-67.6218500509991	Puelén	INDEC	42112010000	42112010	Puelén	420287	Puelén	PUELEN	42	La Pampa	42112
        Localidad simple	-37.7697053748681	-67.7172958236186	Puelén	INDEC	42112020000	42112020	25 de Mayo	420385	Veinticinco de Mayo	25 DE MAYO	42	La Pampa	42112
        Localidad simple	-36.1513889624763	-63.8541959060258	Quemú Quemú	INDEC	42119010000	42119010	Colonia Barón	420091	Colonia Barón	COLONIA BARON	42	La Pampa	42119
        Localidad simple	-36.1170514464671	-63.9040708614432	Quemú Quemú	INDEC	42119020000	42119020	Colonia San José	420091	Colonia Barón	COLONIA SAN JOSE	42	La Pampa	42119
        Localidad simple	-36.1549581794141	-63.5121543730908	Quemú Quemú	INDEC	42119030000	42119030	Miguel Cané	420252	Miguel Cané	MIGUEL CANE	42	La Pampa	42119
        Localidad simple	-36.053677480752	-63.5632432919433	Quemú Quemú	INDEC	42119040000	42119040	Quemú Quemú	420301	Quemú Quemú	QUEMU QUEMU	42	La Pampa	42119
        Localidad simple	-36.2573837868412	-63.4481302030919	Quemú Quemú	INDEC	42119050000	42119050	Relmo	425126	Relmo	RELMO	42	La Pampa	42119
        Localidad simple	-36.0757513459043	-63.8875837941037	Quemú Quemú	INDEC	42119060000	42119060	Villa Mirasol	420406	Villa Mirasol	VILLA MIRASOL	42	La Pampa	42119
        Localidad simple	-35.5928646334622	-64.5586842581366	Rancul	INDEC	42126010000	42126010	Caleufú	420063	Caleufú	CALEUFU	42	La Pampa	42126
        Localidad simple	-35.7014889174834	-65.1025535202338	Rancul	INDEC	42126020000	42126020	Ingeniero Foster	420210	La Maruja	INGENIERO FOSTER	42	La Pampa	42126
        Localidad simple	-35.671688678266	-64.940569826581	Rancul	INDEC	42126030000	42126030	La Maruja	420210	La Maruja	LA MARUJA	42	La Pampa	42126
        Localidad simple	-35.1462930750947	-64.5006491231723	Rancul	INDEC	42126040000	42126040	Parera	420273	Parera	PARERA	42	La Pampa	42126
        Localidad simple	-35.6473423932767	-64.7695280662632	Rancul	INDEC	42126050000	42126050	Pichi Huinca	425112	Pichi Huinca	PICHI HUINCA	42	La Pampa	42126
        Localidad simple	-35.0548439319726	-64.5213693396743	Rancul	INDEC	42126060000	42126060	Quetrequén	425119	Quetrequén	QUETREQUEN	42	La Pampa	42126
        Localidad simple	-35.0661985558406	-64.683114985952	Rancul	INDEC	42126070000	42126070	Rancul	420308	Rancul	RANCUL	42	La Pampa	42126
        Localidad simple	-35.0179130302315	-64.035117861781	Realicó	INDEC	42133010000	42133010	Adolfo Van Praet	425007	Adolfo Van Praet	ADOLFO VAN PRAET	42	La Pampa	42133
        Localidad simple	-35.3338595551664	-64.1182405361085	Realicó	INDEC	42133020000	42133020	Alta Italia	420021	Alta Italia	ALTA ITALIA	42	La Pampa	42133
        Localidad simple	-35.0415558502239	-64.3847126106129	Realicó	INDEC	42133030000	42133030	Damián Maisonave	425098	Maisonnave	DAMIAN MAISONAVE	42	La Pampa	42133
        Localidad simple	-35.3861854808904	-64.2836857257322	Realicó	INDEC	42133040000	42133040	Embajador Martini	420126	Embajador Martini	EMBAJADOR MARTINI	42	La Pampa	42133
        Localidad simple	-35.1890814426625	-64.1038732251149	Realicó	INDEC	42133050000	42133050	Falucho	425063	Falucho	FALUCHO	42	La Pampa	42133
        Localidad simple	-35.3837504384968	-64.4685685991593	Realicó	INDEC	42133060000	42133060	Ingeniero Luiggi	420168	Ingeniero Luiggi	INGENIERO LUIGGI	42	La Pampa	42133
        Localidad simple	-35.3068277686526	-64.0054725550363	Realicó	INDEC	42133070000	42133070	Ojeda	420021	Alta Italia	OJEDA	42	La Pampa	42133
        Localidad simple	-35.0368857536117	-64.2454209673953	Realicó	INDEC	42133080000	42133080	Realicó	420315	Realicó	REALICO	42	La Pampa	42133
        Localidad simple	-36.7473961516096	-64.3673907018325	Toay	INDEC	42140005000	42140005	Cachirulo	420357	Toay	CACHIRULO	42	La Pampa	42140
        Localidad simple	-36.9283865222889	-64.3952508587586	Toay	INDEC	42140010000	42140010	Naicó	420042	Ataliva Roca	NAICO	42	La Pampa	42140
        Componente de localidad compuesta	-36.6751577652887	-64.3803253806581	Toay	INDEC	42140020000	42140020	Toay	420357	Toay	TOAY	42	La Pampa	42140
        Localidad simple	-35.6381231858073	-64.3574125644643	Trenel	INDEC	42147010000	42147010	Arata	420035	Arata	ARATA	42	La Pampa	42147
        Localidad simple	-35.7732438729278	-63.9428308886673	Trenel	INDEC	42147020000	42147020	Metileo	420245	Metileo	METILEO	42	La Pampa	42147
        Localidad simple	-35.6941743318846	-64.1358999676104	Trenel	INDEC	42147030000	42147030	Trenel	420371	Trenel	TRENEL	42	La Pampa	42147
        Localidad simple	-37.0323315728651	-64.2865724433513	Utracán	INDEC	42154010000	42154010	Ataliva Roca	420042	Ataliva Roca	ATALIVA ROCA	42	La Pampa	42154
        Localidad simple	-37.3318147762102	-65.650772794634	Utracán	INDEC	42154020000	42154020	Chacharramendi	425049	Chacharramendi	CHACHARRAMENDI	42	La Pampa	42154
        Localidad simple	-37.4952435783299	-64.2248805481774	Utracán	INDEC	42154030000	42154030	Colonia Santa María	425028	Colonia Santa María	COLONIA SANTA MARIA	42	La Pampa	42154
        Localidad simple	-37.373672668717	-64.6038964711256	Utracán	INDEC	42154040000	42154040	General Acha	420133	General Acha	GENERAL ACHA	42	La Pampa	42154
        Localidad simple	-37.1212005028742	-64.5133661628312	Utracán	INDEC	42154050000	42154050	Quehué	420294	Quehué	QUEHUE	42	La Pampa	42154
        Localidad simple	-37.5439767222425	-64.3525554864311	Utracán	INDEC	42154060000	42154060	Unanué	425154	Unanue	UNANUE	42	La Pampa	42154
        Entidad	-28.5589898446523	-66.8272851017638	Arauco	INDEC	46007010001	46007010	Aimogasta	460007	Arauco	AIMOGASTA	46	La Rioja	46007
        Entidad	-28.5410843774808	-66.8070296105313	Arauco	INDEC	46007010002	46007010	Aimogasta	460007	Arauco	MACHIGASTA	46	La Rioja	46007
        Entidad	-28.5553801376497	-66.8013856528183	Arauco	INDEC	46007010003	46007010	Aimogasta	460007	Arauco	SAN ANTONIO	46	La Rioja	46007
        Localidad simple	-28.5834031870202	-66.8036412937626	Arauco	INDEC	46007020000	46007020	Arauco	460007	Arauco	ARAUCO	46	La Rioja	46007
        Localidad simple	-28.3871788034279	-66.8369122348367	Arauco	INDEC	46007030000	46007030	Bañado de los Pantanos	460007	Arauco	BAÑADO DE LOS PANTANOS	46	La Rioja	46007
        Localidad simple	-28.6648262993633	-66.5166195609666	Arauco	INDEC	46007040000	46007040	Estación Mazán	460007	Arauco	ESTACION MAZAN	46	La Rioja	46007
        Localidad simple	-28.591774966521	-66.5563885931113	Arauco	INDEC	46007045000	46007045	Termas de Santa Teresita	460007	Arauco	TERMAS DE SANTA TERESITA	46	La Rioja	46007
        Localidad simple	-28.6586281834455	-66.5552758852995	Arauco	INDEC	46007050000	46007050	Villa Mazán	460007	Arauco	VILLA MAZAN	46	La Rioja	46007
        Localidad simple	-29.4217827668094	-66.856675379963	Capital	INDEC	46014010000	46014010	La Rioja	460014	Capital	LA RIOJA	46	La Rioja	46014
        Localidad simple	-28.8554609845772	-66.9376617661779	Castro Barros	INDEC	46021010000	46021010	Aminga	460021	Castro Barros	AMINGA	46	La Rioja	46021
        Localidad simple	-28.8155900262519	-66.9439245714904	Castro Barros	INDEC	46021020000	46021020	Anillaco	460021	Castro Barros	ANILLACO	46	La Rioja	46021
        Localidad simple	-28.7272509428901	-66.9328944677286	Castro Barros	INDEC	46021030000	46021030	Anjullón	460021	Castro Barros	ANJULLON	46	La Rioja	46021
        Localidad simple	-28.8979801822511	-66.9765194957537	Castro Barros	INDEC	46021040000	46021040	Chuquis	460021	Castro Barros	CHUQUIS	46	La Rioja	46021
        Localidad simple	-28.7544152281739	-66.9389202939919	Castro Barros	INDEC	46021050000	46021050	Los Molinos	460021	Castro Barros	LOS MOLINOS	46	La Rioja	46021
        Localidad simple	-28.9370760269909	-66.9665171496043	Castro Barros	INDEC	46021060000	46021060	Pinchas	460021	Castro Barros	PINCHAS	46	La Rioja	46021
        Localidad simple	-28.6697090457958	-66.9281338379098	Castro Barros	INDEC	46021070000	46021070	San Pedro	460021	Castro Barros	SAN PEDRO	46	La Rioja	46021
        Localidad simple	-28.683504219205	-66.9654939868506	Castro Barros	INDEC	46021080000	46021080	Santa Vera Cruz	460021	Castro Barros	SANTA VERA CRUZ	46	La Rioja	46021
        Localidad simple	-29.4772470519152	-67.7729134098149	Coronel Felipe Varela	INDEC	46028010000	46028010	Aicuñá	460028	Coronel Felipe Varela	AICUÑA	46	La Rioja	46028
        Entidad	-29.509859321691	-68.5522045398452	Coronel Felipe Varela	INDEC	46028020001	46028020	Guandacol	460028	Coronel Felipe Varela	GUANDACOL	46	La Rioja	46028
        Entidad	-29.361377257847	-68.6264098036917	Coronel Felipe Varela	INDEC	46028020002	46028020	Guandacol	460028	Coronel Felipe Varela	SANTA CLARA	46	La Rioja	46028
        Localidad simple	-29.3713119289112	-68.2271328398885	Coronel Felipe Varela	INDEC	46028030000	46028030	Los Palacios	460028	Coronel Felipe Varela	LOS PALACIOS	46	La Rioja	46028
        Localidad simple	-29.5412536132819	-68.0970404734465	Coronel Felipe Varela	INDEC	46028040000	46028040	Pagancillo	460028	Coronel Felipe Varela	PAGANCILLO	46	La Rioja	46028
        Entidad	-29.3032949590649	-68.2439876146285	Coronel Felipe Varela	INDEC	46028050001	46028050	Villa Unión	460028	Coronel Felipe Varela	BANDA FLORIDA	46	La Rioja	46028
        Entidad	-29.3227046223336	-68.2230741292594	Coronel Felipe Varela	INDEC	46028050002	46028050	Villa Unión	460028	Coronel Felipe Varela	VILLA UNION	46	La Rioja	46028
        Localidad simple	-30.3772951613355	-66.3240368838483	Chamical	INDEC	46035010000	46035010	Chamical	460035	Chamical	CHAMICAL	46	La Rioja	46035
        Localidad simple	-30.4293153810224	-66.3586422456665	Chamical	INDEC	46035020000	46035020	Polco	460035	Chamical	POLCO	46	La Rioja	46035
        Entidad	-29.2060142258143	-67.4589845307511	Chilecito	INDEC	46042010001	46042010	Chilecito	460042	Chilecito	ANGUINAN	46	La Rioja	46042
        Entidad	-29.1634978575196	-67.5074284990176	Chilecito	INDEC	46042010002	46042010	Chilecito	460042	Chilecito	CHILECITO	46	La Rioja	46042
        Entidad	-29.1484698105368	-67.4191244361359	Chilecito	INDEC	46042010003	46042010	Chilecito	460042	Chilecito	LA PUNTILLA	46	La Rioja	46042
        Entidad	-29.1517467165263	-67.4826010369502	Chilecito	INDEC	46042010004	46042010	Chilecito	460042	Chilecito	LOS SARMIENTOS	46	La Rioja	46042
        Entidad	-29.184674818415	-67.4780826682806	Chilecito	INDEC	46042010005	46042010	Chilecito	460042	Chilecito	SAN MIGUEL	46	La Rioja	46042
        Localidad simple	-29.2540980171571	-67.426136513409	Chilecito	INDEC	46042020000	46042020	Colonia Anguinán	460042	Chilecito	COLONIA ANGUINAN	46	La Rioja	46042
        Localidad simple	-29.6731660020358	-67.3823669132229	Chilecito	INDEC	46042030000	46042030	Colonia Catinzaco	460042	Chilecito	COLONIA CATINZACO	46	La Rioja	46042
        Localidad simple	-29.2029666175252	-67.4003467202303	Chilecito	INDEC	46042040000	46042040	Colonia Malligasta	460042	Chilecito	COLONIA MALLIGASTA	46	La Rioja	46042
        Localidad simple	-29.4490716382323	-67.4914198732182	Chilecito	INDEC	46042050000	46042050	Colonia Vichigasta	460042	Chilecito	COLONIA VICHIGASTA	46	La Rioja	46042
        Localidad simple	-29.1927256872976	-67.6392754274079	Chilecito	INDEC	46042060000	46042060	Guanchín	460042	Chilecito	GUANCHIN	46	La Rioja	46042
        Localidad simple	-29.1772024890585	-67.4408316312776	Chilecito	INDEC	46042070000	46042070	Malligasta	460042	Chilecito	MALLIGASTA	46	La Rioja	46042
        Localidad simple	-29.3410380679447	-67.6618699588305	Chilecito	INDEC	46042080000	46042080	Miranda	460042	Chilecito	MIRANDA	46	La Rioja	46042
        Localidad simple	-29.3040959439682	-67.5072784622018	Chilecito	INDEC	46042090000	46042090	Nonogasta	460042	Chilecito	NONOGASTA	46	La Rioja	46042
        Localidad simple	-29.1217634888802	-67.475895961327	Chilecito	INDEC	46042100000	46042100	San Nicolás	460042	Chilecito	SAN NICOLAS	46	La Rioja	46042
        Localidad simple	-29.1330615805931	-67.5576081781931	Chilecito	INDEC	46042110000	46042110	Santa Florentina	460042	Chilecito	SANTA FLORENTINA	46	La Rioja	46042
        Localidad simple	-29.3203738957214	-67.6277959527272	Chilecito	INDEC	46042120000	46042120	Sañogasta	460042	Chilecito	SAÑOGASTA	46	La Rioja	46042
        Localidad simple	-29.1494438672162	-67.4296645756575	Chilecito	INDEC	46042130000	46042130	Tilimuqui	460042	Chilecito	TILIMUQUI	46	La Rioja	46042
        Localidad simple	-29.4885973737241	-67.50228520978	Chilecito	INDEC	46042140000	46042140	Vichigasta	460042	Chilecito	VICHIGASTA	46	La Rioja	46042
        Localidad simple	-28.8736691237645	-67.5689979264386	Famatina	INDEC	46049010000	46049010	Alto Carrizal	460049	Famatina	ALTO CARRIZAL	46	La Rioja	46049
        Localidad simple	-28.6595753462725	-67.6529605556859	Famatina	INDEC	46049020000	46049020	Angulos	460049	Famatina	ANGULOS	46	La Rioja	46049
        Localidad simple	-28.8250781693493	-67.3233196534937	Famatina	INDEC	46049030000	46049030	Antinaco	460049	Famatina	ANTINACO	46	La Rioja	46049
        Localidad simple	-28.8911007689177	-67.5667461563502	Famatina	INDEC	46049040000	46049040	Bajo Carrizal	460049	Famatina	BAJO CARRIZAL	46	La Rioja	46049
        Localidad simple	-28.5560208289878	-67.6264406513676	Famatina	INDEC	46049050000	46049050	Campanas	460049	Famatina	CAMPANAS	46	La Rioja	46049
        Localidad simple	-28.6123449106977	-67.5874723425836	Famatina	INDEC	46049060000	46049060	Chañarmuyo	460049	Famatina	CHAÑARMUYO	46	La Rioja	46049
        Localidad simple	-28.9291000348798	-67.5207596756722	Famatina	INDEC	46049070000	46049070	Famatina	460049	Famatina	FAMATINA	46	La Rioja	46049
        Localidad simple	-28.4724817643376	-67.6918652569621	Famatina	INDEC	46049080000	46049080	La Cuadra	460049	Famatina	LA CUADRA	46	La Rioja	46049
        Localidad simple	-28.5815077306519	-67.4508379497994	Famatina	INDEC	46049090000	46049090	Pituil	460049	Famatina	PITUIL	46	La Rioja	46049
        Localidad simple	-28.9731598381662	-67.5201315513043	Famatina	INDEC	46049100000	46049100	Plaza Vieja	460049	Famatina	PLAZA VIEJA	46	La Rioja	46049
        Localidad simple	-28.4907371198	-67.6899252647169	Famatina	INDEC	46049110000	46049110	Santa Cruz	460049	Famatina	SANTA CRUZ	46	La Rioja	46049
        Localidad simple	-28.5600668428725	-67.6855704208219	Famatina	INDEC	46049120000	46049120	Santo Domingo	460049	Famatina	SANTO DOMINGO	46	La Rioja	46049
        Localidad simple	-30.165433857594	-66.556575245663	General Ángel V. Peñaloza	INDEC	46056010000	46056010	Punta de los Llanos	460056	General Ángel Vicente Peñaloza	PUNTA DE LOS LLANOS	46	La Rioja	46056
        Localidad simple	-30.5173084388038	-66.5413792482074	General Ángel V. Peñaloza	INDEC	46056020000	46056020	Tama	460056	General Ángel Vicente Peñaloza	TAMA	46	La Rioja	46056
        Localidad simple	-30.5956924271806	-65.7419372748158	General Belgrano	INDEC	46063010000	46063010	Castro Barros	460063	General Belgrano	CASTRO BARROS	46	La Rioja	46063
        Localidad simple	-30.5590304532238	-65.9735931205601	General Belgrano	INDEC	46063020000	46063020	Chañar	460063	General Belgrano	CHAÑAR	46	La Rioja	46063
        Localidad simple	-30.6446137810742	-66.238741686799	General Belgrano	INDEC	46063030000	46063030	Loma Blanca	460063	General Belgrano	LOMA BLANCA	46	La Rioja	46063
        Localidad simple	-30.6399759885817	-66.278060412461	General Belgrano	INDEC	46063040000	46063040	Olta	460063	General Belgrano	OLTA	46	La Rioja	46063
        Localidad simple	-30.815543887629	-66.6194814951279	General Juan F. Quiroga	INDEC	46070010000	46070010	Malanzán	460070	General Juan Facundo Quiroga	MALANZAN	46	La Rioja	46070
        Localidad simple	-30.8640381344546	-66.4051056083957	General Juan F. Quiroga	INDEC	46070020000	46070020	Nácate	460070	General Juan Facundo Quiroga	NACATE	46	La Rioja	46070
        Localidad simple	-30.847619186484	-66.7186798501751	General Juan F. Quiroga	INDEC	46070030000	46070030	Portezuelo	460070	General Juan Facundo Quiroga	PORTEZUELO	46	La Rioja	46070
        Localidad simple	-31.0900907205412	-66.7571869922571	General Juan F. Quiroga	INDEC	46070040000	46070040	San Antonio	460070	General Juan Facundo Quiroga	SAN ANTONIO	46	La Rioja	46070
        Localidad simple	-29.0207515543035	-68.2253713917754	General Lamadrid	INDEC	46077010000	46077010	Villa Castelli	460077	General Lamadrid	VILLA CASTELLI	46	La Rioja	46077
        Localidad simple	-31.1413359277957	-66.3603819377386	General Ocampo	INDEC	46084010000	46084010	Ambil	460084	General Ocampo	AMBIL	46	La Rioja	46084
        Localidad simple	-30.9752909491233	-66.1953883794961	General Ocampo	INDEC	46084020000	46084020	Colonia Ortiz de Ocampo	460084	General Ocampo	COLONIA ORTIZ DE OCAMPO	46	La Rioja	46084
        Localidad simple	-31.0131717520524	-65.9882554540382	General Ocampo	INDEC	46084030000	46084030	Milagro	460084	General Ocampo	MILAGRO	46	La Rioja	46084
        Localidad simple	-30.8195242375591	-66.2483100669124	General Ocampo	INDEC	46084040000	46084040	Olpas	460084	General Ocampo	OLPAS	46	La Rioja	46084
        Localidad simple	-30.9665198359206	-66.2356607957536	General Ocampo	INDEC	46084050000	46084050	Santa Rita de Catuna	460084	General Ocampo	SANTA RITA DE CATUNA	46	La Rioja	46084
        Localidad simple	-31.582978877023	-66.2514026305989	General San Martín	INDEC	46091010000	46091010	Ulapes	460091	General San Martín	ULAPES	46	La Rioja	46091
        Localidad simple	-28.6604900543905	-68.3668741365882	Vinchina	INDEC	46098010000	46098010	Jagüé	460098	Vinchina	JAGUE	46	La Rioja	46098
        Entidad	-32.9057059086968	-68.7753107154796	Guaymallén	INDEC	50028020003	50028020	Guaymallén	500028	Guaymallén	CAPILLA DEL ROSARIO	50	Mendoza	50028
        Localidad simple	-28.7797111463416	-68.2060368408699	Vinchina	INDEC	46098020000	46098020	Villa San José de Vinchina	460098	Vinchina	VILLA SAN JOSE DE VINCHINA	46	La Rioja	46098
        Localidad simple	-30.0611119791655	-67.5084950612514	Independencia	INDEC	46105010000	46105010	Amaná	460105	Independencia	AMANA	46	La Rioja	46105
        Localidad simple	-30.0522114405959	-66.8915886798437	Independencia	INDEC	46105020000	46105020	Patquía	460105	Independencia	PATQUIA	46	La Rioja	46105
        Localidad simple	-31.3506186314416	-66.6046417930744	Rosario Vera Peñaloza	INDEC	46112010000	46112010	Chepes	460112	Rosario Vera Peñaloza	CHEPES	46	La Rioja	46112
        Localidad simple	-31.2240295500516	-66.3334915975105	Rosario Vera Peñaloza	INDEC	46112020000	46112020	Desiderio Tello	460112	Rosario Vera Peñaloza	DESIDERIO TELLO	46	La Rioja	46112
        Entidad	-28.3536422425472	-67.080433367311	San Blas de Los Sauces	INDEC	46119010001	46119010	Salicas - San Blas	460119	San Blas de los Sauces	ALPASINCHE	46	La Rioja	46119
        Entidad	-28.5555816291232	-67.1592836516078	San Blas de Los Sauces	INDEC	46119010002	46119010	Salicas - San Blas	460119	San Blas de los Sauces	AMUSCHINA	46	La Rioja	46119
        Entidad	-28.5555816291232	-67.1592836516078	San Blas de Los Sauces	INDEC	46119010003	46119010	Salicas - San Blas	460119	San Blas de los Sauces	ANDOLUCAS	46	La Rioja	46119
        Entidad	-28.3536422425472	-67.080433367311	San Blas de Los Sauces	INDEC	46119010004	46119010	Salicas - San Blas	460119	San Blas de los Sauces	CHAUPIHUASI	46	La Rioja	46119
        Entidad	-28.4517974906601	-67.1178978512143	San Blas de Los Sauces	INDEC	46119010005	46119010	Salicas - San Blas	460119	San Blas de los Sauces	CUIPAN	46	La Rioja	46119
        Entidad	-28.4517974906601	-67.1178978512143	San Blas de Los Sauces	INDEC	46119010006	46119010	Salicas - San Blas	460119	San Blas de los Sauces	LAS TALAS	46	La Rioja	46119
        Entidad	-28.4517974906601	-67.1178978512143	San Blas de Los Sauces	INDEC	46119010007	46119010	Salicas - San Blas	460119	San Blas de los Sauces	LOS ROBLES	46	La Rioja	46119
        Entidad	-28.407625810512	-67.0961546311905	San Blas de Los Sauces	INDEC	46119010008	46119010	Salicas - San Blas	460119	San Blas de los Sauces	SALICAS	46	La Rioja	46119
        Entidad	-28.407625810512	-67.0961546311905	San Blas de Los Sauces	INDEC	46119010009	46119010	Salicas - San Blas	460119	San Blas de los Sauces	SAN BLAS	46	La Rioja	46119
        Entidad	-28.4812201375784	-67.128235105005	San Blas de Los Sauces	INDEC	46119010010	46119010	Salicas - San Blas	460119	San Blas de los Sauces	SHAQUI	46	La Rioja	46119
        Entidad	-28.5555816291232	-67.1592836516078	San Blas de Los Sauces	INDEC	46119010011	46119010	Salicas - San Blas	460119	San Blas de los Sauces	SURIYACO	46	La Rioja	46119
        Entidad	-28.5555816291232	-67.1592836516078	San Blas de Los Sauces	INDEC	46119010012	46119010	Salicas - San Blas	460119	San Blas de los Sauces	TUYUBIL	46	La Rioja	46119
        Localidad simple	-29.3064491456943	-67.0414097362521	Sanagasta	INDEC	46126010000	46126010	Villa Sanagasta	460126	Sanagasta	VILLA SANAGASTA	46	La Rioja	46126
        Entidad	-32.8774938474965	-68.852787067524	Capital	INDEC	50007010001	50007010	Mendoza	500007	Capital	1A. SECCION	50	Mendoza	50007
        Entidad	-32.8939366401965	-68.8548989896162	Capital	INDEC	50007010002	50007010	Mendoza	500007	Capital	2A. SECCION	50	Mendoza	50007
        Entidad	-32.8852234170157	-68.8445606513402	Capital	INDEC	50007010003	50007010	Mendoza	500007	Capital	3A. SECCION	50	Mendoza	50007
        Entidad	-32.8682492511423	-68.842426668283	Capital	INDEC	50007010004	50007010	Mendoza	500007	Capital	4A. SECCION	50	Mendoza	50007
        Entidad	-32.8897126457887	-68.8671660840729	Capital	INDEC	50007010005	50007010	Mendoza	500007	Capital	5A. SECCION	50	Mendoza	50007
        Entidad	-32.8699135628239	-68.8623511106204	Capital	INDEC	50007010006	50007010	Mendoza	500007	Capital	6A. SECCION	50	Mendoza	50007
        Entidad	-32.8737448660325	-68.8758699221604	Capital	INDEC	50007010007	50007010	Mendoza	500007	Capital	7A. SECCION	50	Mendoza	50007
        Entidad	-32.8663164516233	-68.8830572695415	Capital	INDEC	50007010008	50007010	Mendoza	500007	Capital	8A. SECCION	50	Mendoza	50007
        Entidad	-32.8888290596505	-68.8943435432101	Capital	INDEC	50007010009	50007010	Mendoza	500007	Capital	9A. SECCION	50	Mendoza	50007
        Entidad	-32.8762926131736	-68.935890793212	Capital	INDEC	50007010010	50007010	Mendoza	500007	Capital	10A. SECCION	50	Mendoza	50007
        Entidad	-32.8885015214853	-68.9052495878294	Capital	INDEC	50007010011	50007010	Mendoza	500007	Capital	11A. SECCION	50	Mendoza	50007
        Localidad simple	-35.0009124317209	-67.5161818289008	General Alvear	INDEC	50014010000	50014010	Bowen	500014	General Alvear	BOWEN	50	Mendoza	50014
        Localidad simple	-35.1449057898791	-67.662955044003	General Alvear	INDEC	50014020000	50014020	Carmensa	500014	General Alvear	CARMENSA	50	Mendoza	50014
        Localidad simple	-34.9804694766564	-67.7009950828176	General Alvear	INDEC	50014030000	50014030	General Alvear	500014	General Alvear	GENERAL ALVEAR	50	Mendoza	50014
        Localidad simple	-34.9792604557582	-67.6590893207424	General Alvear	INDEC	50014040000	50014040	Los Compartos	500014	General Alvear	LOS COMPARTOS	50	Mendoza	50014
        Entidad	-32.9215283150576	-68.8549231831208	Godoy Cruz	INDEC	50021010001	50021010	Godoy Cruz	500021	Godoy Cruz	GODOY CRUZ	50	Mendoza	50021
        Entidad	-32.9443750737376	-68.8651880637399	Godoy Cruz	INDEC	50021010002	50021010	Godoy Cruz	500021	Godoy Cruz	GOBERNADOR BENEGAS	50	Mendoza	50021
        Entidad	-32.9453107154249	-68.8411734730396	Godoy Cruz	INDEC	50021010003	50021010	Godoy Cruz	500021	Godoy Cruz	LAS TORTUGAS	50	Mendoza	50021
        Entidad	-32.9171352448748	-68.9190971058586	Godoy Cruz	INDEC	50021010004	50021010	Godoy Cruz	500021	Godoy Cruz	PRESIDENTE SARMIENTO	50	Mendoza	50021
        Entidad	-32.9301248190877	-68.8333388830804	Godoy Cruz	INDEC	50021010005	50021010	Godoy Cruz	500021	Godoy Cruz	SAN FRANCISCO DEL MONTE	50	Mendoza	50021
        Entidad	-32.9085519196216	-68.8709990197701	Godoy Cruz	INDEC	50021010006	50021010	Godoy Cruz	500021	Godoy Cruz	VILLA HIPODROMO	50	Mendoza	50021
        Entidad	-32.9368994348648	-68.8625261619583	Godoy Cruz	INDEC	50021010007	50021010	Godoy Cruz	500021	Godoy Cruz	VILLA MARINI	50	Mendoza	50021
        Localidad simple	-32.8445720739406	-68.7264015008637	Guaymallén	INDEC	50028010000	50028010	Colonia Segovia	500028	Guaymallén	COLONIA SEGOVIA	50	Mendoza	50028
        Entidad	-32.8674494392665	-68.8015983577909	Guaymallén	INDEC	50028020001	50028020	Guaymallén	500028	Guaymallén	BERMEJO	50	Mendoza	50028
        Entidad	-32.887610360379	-68.7797113648865	Guaymallén	INDEC	50028020002	50028020	Guaymallén	500028	Guaymallén	BUENA NUEVA	50	Mendoza	50028
        Entidad	-32.9079284079055	-68.8402487586896	Guaymallén	INDEC	50028020004	50028020	Guaymallén	500021	Godoy Cruz	DORREGO	50	Mendoza	50028
        Entidad	-32.866493937014	-68.7583334039687	Guaymallén	INDEC	50028020005	50028020	Guaymallén	500028	Guaymallén	EL SAUCE	50	Mendoza	50028
        Entidad	-32.8819026438146	-68.8087568548896	Guaymallén	INDEC	50028020006	50028020	Guaymallén	500028	Guaymallén	GENERAL BELGRANO	50	Mendoza	50028
        Entidad	-32.9208013873904	-68.7868066982545	Guaymallén	INDEC	50028020007	50028020	Guaymallén	500028	Guaymallén	JESUS NAZARENO	50	Mendoza	50028
        Entidad	-32.9057702142765	-68.8263412149075	Guaymallén	INDEC	50028020008	50028020	Guaymallén	500028	Guaymallén	LAS CAÑAS	50	Mendoza	50028
        Entidad	-32.8925289639529	-68.820068537927	Guaymallén	INDEC	50028020009	50028020	Guaymallén	500028	Guaymallén	GUAYMALLEN	50	Mendoza	50028
        Entidad	-32.8749826070419	-68.8287743942338	Guaymallén	INDEC	50028020010	50028020	Guaymallén	500007	Capital	PEDRO MOLINA	50	Mendoza	50028
        Entidad	-32.9233876380597	-68.7484037679985	Guaymallén	INDEC	50028020011	50028020	Guaymallén	500028	Guaymallén	RODEO DE LA CRUZ	50	Mendoza	50028
        Entidad	-32.9176425793206	-68.8127477726945	Guaymallén	INDEC	50028020012	50028020	Guaymallén	500028	Guaymallén	SAN FRANCISCO DEL MONTE	50	Mendoza	50028
        Entidad	-32.887910080091	-68.8336077167937	Guaymallén	INDEC	50028020013	50028020	Guaymallén	500007	Capital	SAN JOSE	50	Mendoza	50028
        Entidad	-32.9010420892697	-68.8031458310547	Guaymallén	INDEC	50028020014	50028020	Guaymallén	500028	Guaymallén	VILLA NUEVA	50	Mendoza	50028
        Localidad simple	-32.9212115151732	-68.6797682708562	Guaymallén	INDEC	50028030000	50028030	La Primavera	500028	Guaymallén	LA PRIMAVERA	50	Mendoza	50028
        Localidad simple	-32.8978664693342	-68.7059893326547	Guaymallén	INDEC	50028040000	50028040	Los Corralitos	500028	Guaymallén	LOS CORRALITOS	50	Mendoza	50028
        Localidad simple	-32.8596996528436	-68.6889630695891	Guaymallén	INDEC	50028050000	50028050	Puente de Hierro	500028	Guaymallén	PUENTE DE HIERRO	50	Mendoza	50028
        Localidad simple	-33.1247748459194	-68.4208925887498	Junín	INDEC	50035010000	50035010	Ingeniero Giagnoni	500035	Junín	INGENIERO GIAGNONI	50	Mendoza	50035
        Localidad simple	-33.1450869905894	-68.4921156012444	Junín	INDEC	50035020000	50035020	Junín	500035	Junín	JUNIN	50	Mendoza	50035
        Componente de localidad compuesta	-33.0927994762934	-68.4874957269843	Junín	INDEC	50035030000	50035030	La Colonia	500035	Junín	LA COLONIA	50	Mendoza	50035
        Localidad simple	-33.1010405156356	-68.567527971482	Junín	INDEC	50035040000	50035040	Los Barriales	500035	Junín	LOS BARRIALES	50	Mendoza	50035
        Componente de localidad compuesta	-33.1762912284126	-68.6231695474222	Junín	INDEC	50035050000	50035050	Medrano	500035	Junín	MEDRANO	50	Mendoza	50035
        Localidad simple	-33.2032507142375	-68.3832295478144	Junín	INDEC	50035060000	50035060	Phillips	500035	Junín	PHILLIPS	50	Mendoza	50035
        Localidad simple	-33.1211519220358	-68.6046800215005	Junín	INDEC	50035070000	50035070	Rodríguez Peña	500035	Junín	RODRIGUEZ PEÑA	50	Mendoza	50035
        Componente de localidad compuesta	-33.4052265769401	-67.1641664357197	La Paz	INDEC	50042010000	50042010	Desaguadero	500042	La Paz	DESAGUADERO	50	Mendoza	50042
        Localidad simple	-33.4610193184125	-67.5595785270435	La Paz	INDEC	50042020000	50042020	La Paz	500042	La Paz	LA PAZ	50	Mendoza	50042
        Localidad simple	-33.4645156410531	-67.6055785043576	La Paz	INDEC	50042030000	50042030	Villa Antigua	500042	La Paz	VILLA ANTIGUA	50	Mendoza	50042
        Localidad simple	-33.0355485376289	-69.0065315897085	Las Heras	INDEC	50049010000	50049010	Blanco Encalada	500049	Las Heras	BLANCO ENCALADA	50	Mendoza	50049
        Componente de localidad compuesta	-32.5843190924112	-68.6808088140348	Las Heras	INDEC	50049030000	50049030	Jocolí	500049	Las Heras	JOCOLI	50	Mendoza	50049
        Localidad simple	-32.8079619437825	-70.0851824266087	Las Heras	INDEC	50049040000	50049040	Las Cuevas	500049	Las Heras	LAS CUEVAS	50	Mendoza	50049
        Entidad	-32.7248779288865	-68.9085584856171	Las Heras	INDEC	50049050001	50049050	Las Heras	500049	Las Heras	CAPDEVILA	50	Mendoza	50049
        Entidad	-32.8499236875213	-68.8452567330483	Las Heras	INDEC	50049050002	50049050	Las Heras	500049	Las Heras	LAS HERAS	50	Mendoza	50049
        Entidad	-32.8327487536079	-68.7957179005563	Las Heras	INDEC	50049050003	50049050	Las Heras	500049	Las Heras	EL ALGARROBAL	50	Mendoza	50049
        Entidad	-32.8069208013923	-68.7772864976942	Las Heras	INDEC	50049050004	50049050	Las Heras	500049	Las Heras	EL BORBOLLON	50	Mendoza	50049
        Entidad	-32.8187507127469	-68.9164320667614	Las Heras	INDEC	50049050005	50049050	Las Heras	500049	Las Heras	EL CHALLAO	50	Mendoza	50049
        Entidad	-32.8468358627701	-68.8191474531696	Las Heras	INDEC	50049050007	50049050	Las Heras	500049	Las Heras	EL PLUMERILLO	50	Mendoza	50049
        Entidad	-32.7650499892594	-68.7913047281368	Las Heras	INDEC	50049050008	50049050	Las Heras	500049	Las Heras	EL RESGUARDO	50	Mendoza	50049
        Entidad	-32.8555537707294	-68.8280317752065	Las Heras	INDEC	50049050009	50049050	Las Heras	500049	Las Heras	EL ZAPALLAR	50	Mendoza	50049
        Entidad	-32.8444580470853	-68.8646206504362	Las Heras	INDEC	50049050010	50049050	Las Heras	500049	Las Heras	LA CIENEGUITA	50	Mendoza	50049
        Entidad	-32.8349236425418	-68.8451652007894	Las Heras	INDEC	50049050011	50049050	Las Heras	500049	Las Heras	PANQUEHUA	50	Mendoza	50049
        Entidad	-32.9869460291704	-68.9485091767272	Las Heras	INDEC	50049050012	50049050	Las Heras	500049	Las Heras	SIERRAS DE ENCALADA	50	Mendoza	50049
        Localidad simple	-32.8369504266306	-69.853921289708	Las Heras	INDEC	50049060000	50049060	Los Penitentes	500063	Luján de Cuyo	LOS PENITENTES	50	Mendoza	50049
        Localidad simple	-32.8190384814445	-69.7097346552796	Las Heras	INDEC	50049080000	50049080	Polvaredas	500049	Las Heras	POLVAREDAS	50	Mendoza	50049
        Localidad simple	-32.8198835580194	-69.9250020499226	Las Heras	INDEC	50049090000	50049090	Puente del Inca	500049	Las Heras	PUENTE DEL INCA	50	Mendoza	50049
        Localidad simple	-32.8488063589156	-69.7763007026825	Las Heras	INDEC	50049100000	50049100	Punta de Vacas	500049	Las Heras	PUNTA DE VACAS	50	Mendoza	50049
        Localidad simple	-32.595534534037	-69.3582053741335	Las Heras	INDEC	50049110000	50049110	Uspallata	500049	Las Heras	USPALLATA	50	Mendoza	50049
        Localidad simple	-32.6727794218396	-68.5922473767644	Lavalle	INDEC	50056010000	50056010	Barrio Alto del Olvido	500056	Lavalle	BARRIO ALTO DEL OLVIDO	50	Mendoza	50056
        Localidad simple	-32.6740793089036	-68.6692696211749	Lavalle	INDEC	50056020000	50056020	Barrio Jocolí II	500049	Las Heras	BARRIO JOCOLI II	50	Mendoza	50056
        Localidad simple	-32.6969328275291	-68.5506213221534	Lavalle	INDEC	50056030000	50056030	Barrio La Palmera	500056	Lavalle	BARRIO LA PALMERA	50	Mendoza	50056
        Localidad simple	-32.8128590043094	-68.6835373227479	Lavalle	INDEC	50056040000	50056040	Barrio La Pega	500056	Lavalle	BARRIO LA PEGA	50	Mendoza	50056
        Localidad simple	-32.6111088672137	-68.5714746331489	Lavalle	INDEC	50056050000	50056050	Barrio Lagunas de Bartoluzzi	500056	Lavalle	BARRIO LAGUNAS DE BARTOLUZZI	50	Mendoza	50056
        Localidad simple	-32.7153965740662	-68.6584021819475	Lavalle	INDEC	50056060000	50056060	Barrio Los Jarilleros	500056	Lavalle	BARRIO LOS JARILLEROS	50	Mendoza	50056
        Localidad simple	-32.6972155730911	-68.3295580099939	Lavalle	INDEC	50056070000	50056070	Barrio Los Olivos	500056	Lavalle	BARRIO LOS OLIVOS	50	Mendoza	50056
        Localidad simple	-32.7027597161508	-68.3124921903406	Lavalle	INDEC	50056075000	50056075	Barrio Virgen del Rosario	500056	Lavalle	BARRIO VIRGEN DEL ROSARIO	50	Mendoza	50056
        Localidad simple	-32.7568943573314	-68.4085951866641	Lavalle	INDEC	50056080000	50056080	Costa de Araujo	500056	Lavalle	COSTA DE ARAUJO	50	Mendoza	50056
        Localidad simple	-32.7813088245414	-68.5336830930131	Lavalle	INDEC	50056090000	50056090	El Paramillo	500056	Lavalle	EL PARAMILLO	50	Mendoza	50056
        Localidad simple	-32.7623132216047	-68.6476011792189	Lavalle	INDEC	50056100000	50056100	El Vergel	500056	Lavalle	EL VERGEL	50	Mendoza	50056
        Entidad	-32.6735728612892	-68.3840802981371	Lavalle	INDEC	50056110001	50056110	Ingeniero Gustavo André	500056	Lavalle	BARRIO LA ESPERANZA	50	Mendoza	50056
        Entidad	-32.6824002043157	-68.3268969073829	Lavalle	INDEC	50056110002	50056110	Ingeniero Gustavo André	500056	Lavalle	INGENIERO GUSTAVO ANDRE	50	Mendoza	50056
        Componente de localidad compuesta	-32.6125410510042	-68.6790408967958	Lavalle	INDEC	50056120000	50056120	Jocolí	500049	Las Heras	JOCOLI	50	Mendoza	50056
        Localidad simple	-32.7274623415005	-68.6602319575528	Lavalle	INDEC	50056130000	50056130	Jocolí Viejo	500056	Lavalle	JOCOLI VIEJO	50	Mendoza	50056
        Localidad simple	-32.8208151905733	-68.6164140763718	Lavalle	INDEC	50056140000	50056140	Las Violetas	500056	Lavalle	LAS VIOLETAS	50	Mendoza	50056
        Localidad simple	-32.675527945267	-68.6462113031921	Lavalle	INDEC	50056150000	50056150	3 de Mayo	500056	Lavalle	3 DE MAYO	50	Mendoza	50056
        Localidad simple	-32.7196142429269	-68.6030438537926	Lavalle	INDEC	50056160000	50056160	Villa Tulumaya	500056	Lavalle	VILLA TULUMAYA	50	Mendoza	50056
        Localidad simple	-33.1173844439975	-68.8960235351828	Luján de Cuyo	INDEC	50063010000	50063010	Agrelo	500063	Luján de Cuyo	AGRELO	50	Mendoza	50063
        Localidad simple	-33.0753282280469	-68.9250404043338	Luján de Cuyo	INDEC	50063020000	50063020	Barrio Perdriel IV	500063	Luján de Cuyo	BARRIO PERDRIEL IV	50	Mendoza	50063
        Localidad simple	-33.0367104413315	-69.1159068278817	Luján de Cuyo	INDEC	50063030000	50063030	Cacheuta	500063	Luján de Cuyo	CACHEUTA	50	Mendoza	50063
        Localidad simple	-33.0705184504059	-68.9343214868201	Luján de Cuyo	INDEC	50063040000	50063040	Costa Flores	500063	Luján de Cuyo	COSTA FLORES	50	Mendoza	50063
        Localidad simple	-33.3037433557192	-68.7554951968491	Luján de Cuyo	INDEC	50063050000	50063050	El Carrizal	500063	Luján de Cuyo	EL CARRIZAL	50	Mendoza	50063
        Entidad	-32.9551111218674	-69.281192394514	Luján de Cuyo	INDEC	50063060001	50063060	El Salto	500063	Luján de Cuyo	EL CARMELO	50	Mendoza	50063
        Entidad	-32.8994781760003	-69.3336484431929	Luján de Cuyo	INDEC	50063060002	50063060	El Salto	500063	Luján de Cuyo	EL SALTO	50	Mendoza	50063
        Entidad	-32.9551111218674	-69.281192394514	Luján de Cuyo	INDEC	50063060003	50063060	El Salto	500063	Luján de Cuyo	LAS CARDITAS	50	Mendoza	50063
        Entidad	-32.8990128008468	-69.3340868979844	Luján de Cuyo	INDEC	50063060004	50063060	El Salto	500063	Luján de Cuyo	LOS MANANTIALES	50	Mendoza	50063
        Localidad simple	-33.0343953638207	-68.9757201428593	Luján de Cuyo	INDEC	50063070000	50063070	Las Compuertas	500063	Luján de Cuyo	LAS COMPUERTAS	50	Mendoza	50063
        Entidad	-33.0058788620171	-69.2764002200338	Luján de Cuyo	INDEC	50063080001	50063080	Las Vegas	500063	Luján de Cuyo	LAS VEGAS	50	Mendoza	50063
        Entidad	-33.0198804741995	-69.3030036808918	Luján de Cuyo	INDEC	50063080002	50063080	Las Vegas	500063	Luján de Cuyo	PIEDRAS BLANCAS	50	Mendoza	50063
        Entidad	-33.0174255607471	-69.2972914626044	Luján de Cuyo	INDEC	50063080003	50063080	Las Vegas	500063	Luján de Cuyo	VALLE DEL SOL	50	Mendoza	50063
        Entidad	-32.9975296309707	-69.317680250878	Luján de Cuyo	INDEC	50063080004	50063080	Las Vegas	500063	Luján de Cuyo	VILLA EL REFUGIO	50	Mendoza	50063
        Entidad	-32.9776578285745	-68.8524394649607	Luján de Cuyo	INDEC	50063090001	50063090	Luján de Cuyo	500063	Luján de Cuyo	CARRODILLA	50	Mendoza	50063
        Entidad	-32.9899032062811	-68.8913679185275	Luján de Cuyo	INDEC	50063090002	50063090	Luján de Cuyo	500063	Luján de Cuyo	CHACRAS DE CORIA	50	Mendoza	50063
        Entidad	-33.0328665626243	-68.8912066261393	Luján de Cuyo	INDEC	50063090003	50063090	Luján de Cuyo	500063	Luján de Cuyo	LUJAN DE CUYO	50	Mendoza	50063
        Entidad	-32.9609713860174	-68.8723323876365	Luján de Cuyo	INDEC	50063090004	50063090	Luján de Cuyo	500049	Las Heras	LA PUNTILLA	50	Mendoza	50063
        Entidad	-33.0038391611615	-68.8612966964436	Luján de Cuyo	INDEC	50063090005	50063090	Luján de Cuyo	500063	Luján de Cuyo	MAYOR DRUMMOND	50	Mendoza	50063
        Entidad	-33.0237918976098	-68.9247432402669	Luján de Cuyo	INDEC	50063090006	50063090	Luján de Cuyo	500063	Luján de Cuyo	VISTALBA	50	Mendoza	50063
        Entidad	-33.0649388173829	-68.8877014932113	Luján de Cuyo	INDEC	50063100001	50063100	Perdriel	500063	Luján de Cuyo	BARRIO ADINA I Y II	50	Mendoza	50063
        Entidad	-33.0690096392441	-68.8986010698045	Luján de Cuyo	INDEC	50063100002	50063100	Perdriel	500063	Luján de Cuyo	PERDRIEL	50	Mendoza	50063
        Localidad simple	-32.945486814506	-69.2086449063504	Luján de Cuyo	INDEC	50063110000	50063110	Potrerillos	500063	Luján de Cuyo	POTRERILLOS	50	Mendoza	50063
        Localidad simple	-33.2109451573216	-68.8972088041994	Luján de Cuyo	INDEC	50063120000	50063120	Ugarteche	500063	Luján de Cuyo	UGARTECHE	50	Mendoza	50063
        Localidad simple	-33.0833355400244	-68.7343792557021	Maipú	INDEC	50070010000	50070010	Barrancas	500070	Maipú	BARRANCAS	50	Mendoza	50070
        Localidad simple	-33.0103244179699	-68.7265920537236	Maipú	INDEC	50070020000	50070020	Barrio Jesús de Nazaret	500070	Maipú	BARRIO JESUS DE NAZARET	50	Mendoza	50070
        Localidad simple	-33.0293391100097	-68.7922412248266	Maipú	INDEC	50070030000	50070030	Cruz de Piedra	500070	Maipú	CRUZ DE PIEDRA	50	Mendoza	50070
        Localidad simple	-32.8558805014704	-68.6544793531012	Maipú	INDEC	50070040000	50070040	El Pedregal	500028	Guaymallén	EL PEDREGAL	50	Mendoza	50070
        Localidad simple	-33.0049403047291	-68.6612377129718	Maipú	INDEC	50070050000	50070050	Fray Luis Beltrán	500070	Maipú	FRAY LUIS BELTRAN	50	Mendoza	50070
        Entidad	-32.9792545593489	-68.8089838444183	Maipú	INDEC	50070060001	50070060	Maipú	500070	Maipú	COQUIMBITO	50	Mendoza	50070
        Entidad	-32.9797721809011	-68.769429675373	Maipú	INDEC	50070060002	50070060	Maipú	500070	Maipú	GENERAL GUTIERREZ	50	Mendoza	50070
        Entidad	-32.9500582112409	-68.8034450473205	Maipú	INDEC	50070060003	50070060	Maipú	500070	Maipú	LUZURIAGA	50	Mendoza	50070
        Entidad	-32.9394310178507	-68.8068438760291	Maipú	INDEC	50070060004	50070060	Maipú	500070	Maipú	MAIPU	50	Mendoza	50070
        Localidad simple	-32.9880056754694	-68.7010652608485	Maipú	INDEC	50070070000	50070070	Rodeo del Medio	500070	Maipú	RODEO DEL MEDIO	50	Mendoza	50070
        Localidad simple	-33.0046770772729	-68.8012715093769	Maipú	INDEC	50070080000	50070080	Russell	500070	Maipú	RUSSELL	50	Mendoza	50070
        Localidad simple	-33.0285638174611	-68.5981475648442	Maipú	INDEC	50070090000	50070090	San Roque	500070	Maipú	SAN ROQUE	50	Mendoza	50070
        Localidad simple	-33.0183178912335	-68.6288154157882	Maipú	INDEC	50070100000	50070100	Villa Teresa	500070	Maipú	VILLA TERESA	50	Mendoza	50070
        Localidad simple	-36.1532390359812	-68.3048428543176	Malargüe	INDEC	50077010000	50077010	Agua Escondida	500077	Malargüe	AGUA ESCONDIDA	50	Mendoza	50077
        Localidad simple	-35.1539650781638	-70.0817910991633	Malargüe	INDEC	50077030000	50077030	Las Leñas	500077	Malargüe	LAS LEÑAS	50	Mendoza	50077
        Localidad simple	-35.4770107120892	-69.5886491865783	Malargüe	INDEC	50077040000	50077040	Malargüe	500077	Malargüe	MALARGUE	50	Mendoza	50077
        Localidad simple	-33.1624680014146	-68.506066911759	Rivadavia	INDEC	50084010000	50084010	Andrade	500084	Rivadavia	ANDRADE	50	Mendoza	50084
        Localidad simple	-33.2692489302548	-68.4383631651486	Rivadavia	INDEC	50084020000	50084020	Barrio Cooperativa Los Campamentos	500084	Rivadavia	BARRIO COOPERATIVA LOS CAMPAMENTOS	50	Mendoza	50084
        Localidad simple	-33.2304643070476	-68.4837256054182	Rivadavia	INDEC	50084030000	50084030	Barrio Rivadavia	500084	Rivadavia	BARRIO RIVADAVIA	50	Mendoza	50084
        Localidad simple	-33.2906467543213	-68.3475556585345	Rivadavia	INDEC	50084040000	50084040	El Mirador	500084	Rivadavia	EL MIRADOR	50	Mendoza	50084
        Localidad simple	-33.2736424903477	-68.3224073182181	Rivadavia	INDEC	50084050000	50084050	La Central	500084	Rivadavia	LA CENTRAL	50	Mendoza	50084
        Localidad simple	-33.3170659709211	-68.3343426790403	Rivadavia	INDEC	50084060000	50084060	La Esperanza	500084	Rivadavia	LA ESPERANZA	50	Mendoza	50084
        Entidad	-33.282949271283	-68.4657441362603	Rivadavia	INDEC	50084070001	50084070	La Florida	500084	Rivadavia	CUADRO ORTEGA	50	Mendoza	50084
        Entidad	-33.2827922646265	-68.4657172961175	Rivadavia	INDEC	50084070002	50084070	La Florida	500084	Rivadavia	LA FLORIDA	50	Mendoza	50084
        Localidad simple	-33.2163869013321	-68.5166268853637	Rivadavia	INDEC	50084080000	50084080	La Libertad	500084	Rivadavia	LA LIBERTAD	50	Mendoza	50084
        Localidad simple	-33.1813162523339	-68.5759160345244	Rivadavia	INDEC	50084090000	50084090	Los Árboles	500084	Rivadavia	LOS ARBOLES	50	Mendoza	50084
        Localidad simple	-33.2763607628549	-68.4008493516637	Rivadavia	INDEC	50084100000	50084100	Los Campamentos	500084	Rivadavia	LOS CAMPAMENTOS	50	Mendoza	50084
        Componente de localidad compuesta	-33.1787463382932	-68.6219271508795	Rivadavia	INDEC	50084110000	50084110	Medrano	500035	Junín	MEDRANO	50	Mendoza	50084
        Localidad simple	-33.1753415989261	-68.4371725862256	Rivadavia	INDEC	50084120000	50084120	Mundo Nuevo	500084	Rivadavia	MUNDO NUEVO	50	Mendoza	50084
        Localidad simple	-33.2063088772501	-68.5835152115814	Rivadavia	INDEC	50084130000	50084130	Reducción de Abajo	500084	Rivadavia	REDUCCION DE ABAJO	50	Mendoza	50084
        Localidad simple	-33.19403215031	-68.4736188877526	Rivadavia	INDEC	50084140000	50084140	Rivadavia	500084	Rivadavia	RIVADAVIA	50	Mendoza	50084
        Localidad simple	-33.2059806305116	-68.4335589109359	Rivadavia	INDEC	50084150000	50084150	Santa María de Oro	500084	Rivadavia	SANTA MARIA DE ORO	50	Mendoza	50084
        Localidad simple	-33.8321066130502	-69.0490032074462	San Carlos	INDEC	50091005000	50091005	Barrio Carrasco	500091	San Carlos	BARRIO CARRASCO	50	Mendoza	50091
        Localidad simple	-33.8386533809471	-69.1303497215532	San Carlos	INDEC	50091010000	50091010	Barrio El Cepillo	500091	San Carlos	BARRIO EL CEPILLO	50	Mendoza	50091
        Localidad simple	-33.8934020968296	-69.0804633582269	San Carlos	INDEC	50091020000	50091020	Chilecito	500091	San Carlos	CHILECITO	50	Mendoza	50091
        Localidad simple	-33.7850224488548	-69.0729045258216	San Carlos	INDEC	50091030000	50091030	Eugenio Bustos	500091	San Carlos	EUGENIO BUSTOS	50	Mendoza	50091
        Localidad simple	-33.7386757381913	-69.1281255649691	San Carlos	INDEC	50091040000	50091040	La Consulta	500091	San Carlos	LA CONSULTA	50	Mendoza	50091
        Localidad simple	-33.9452563037172	-69.0824859034273	San Carlos	INDEC	50091050000	50091050	Pareditas	500091	San Carlos	PAREDITAS	50	Mendoza	50091
        Localidad simple	-33.7744494556708	-69.0490909178745	San Carlos	INDEC	50091060000	50091060	San Carlos	500091	San Carlos	SAN CARLOS	50	Mendoza	50091
        Localidad simple	-33.1195037386563	-68.4180218961221	San Martín	INDEC	50098020000	50098020	Alto Verde	500035	Junín	ALTO VERDE	50	Mendoza	50098
        Localidad simple	-33.0411467362082	-68.3541527366296	San Martín	INDEC	50098030000	50098030	Barrio Chivilcoy	500098	San Martín	BARRIO CHIVILCOY	50	Mendoza	50098
        Localidad simple	-32.8468555962866	-68.4100199226668	San Martín	INDEC	50098040000	50098040	Barrio Emanuel	500098	San Martín	BARRIO EMANUEL	50	Mendoza	50098
        Localidad simple	-33.155290161095	-68.3543621643557	San Martín	INDEC	50098045000	50098045	Barrio La Estación	500035	Junín	BARRIO LA ESTACION	50	Mendoza	50098
        Localidad simple	-32.9785115683367	-68.3051018239824	San Martín	INDEC	50098050000	50098050	Barrio Los Charabones	500098	San Martín	BARRIO LOS CHARABONES	50	Mendoza	50098
        Localidad simple	-33.1309714824444	-68.351277983232	San Martín	INDEC	50098055000	50098055	Barrio Ntra. Sra. De Fátima	500098	San Martín	BARRIO NTRA. SRA. DE FATIMA	50	Mendoza	50098
        Localidad simple	-32.9801177295667	-68.4765253845307	San Martín	INDEC	50098060000	50098060	Chapanay	500098	San Martín	CHAPANAY	50	Mendoza	50098
        Localidad simple	-33.038335582925	-68.4594029398778	San Martín	INDEC	50098070000	50098070	Chivilcoy	500098	San Martín	CHIVILCOY	50	Mendoza	50098
        Localidad simple	-33.077333062302	-68.3982838200909	San Martín	INDEC	50098073000	50098073	El Espino	500098	San Martín	EL ESPINO	50	Mendoza	50098
        Localidad simple	-33.1617709736953	-68.2954844260235	San Martín	INDEC	50098077000	50098077	El Ramblón	500098	San Martín	EL RAMBLON	50	Mendoza	50098
        Localidad simple	-33.0109966347898	-68.3936801268915	San Martín	INDEC	50098080000	50098080	Montecaseros	500098	San Martín	MONTECASEROS	50	Mendoza	50098
        Localidad simple	-32.7450606095364	-68.335450804198	San Martín	INDEC	50098090000	50098090	Nueva California	500098	San Martín	NUEVA CALIFORNIA	50	Mendoza	50098
        Entidad	-33.0499932818968	-68.5490896779466	San Martín	INDEC	50098100001	50098100	San Martín	500098	San Martín	PALMIRA	50	Mendoza	50098
        Entidad	-33.0732178033808	-68.4605125505865	San Martín	INDEC	50098100002	50098100	San Martín	500098	San Martín	CIUDAD DE SAN MARTIN	50	Mendoza	50098
        Localidad simple	-32.8994801779561	-68.3990962886724	San Martín	INDEC	50098110000	50098110	Tres Porteñas	500098	San Martín	TRES PORTEÑAS	50	Mendoza	50098
        Localidad simple	-34.573654040475	-68.3294341868083	San Rafael	INDEC	50105010000	50105010	Barrio Campos El Toledano	500105	San Rafael	BARRIO CAMPOS EL TOLEDANO	50	Mendoza	50105
        Localidad simple	-34.7898637210549	-67.9874651693673	San Rafael	INDEC	50105020000	50105020	Barrio El Nevado	500105	San Rafael	BARRIO EL NEVADO	50	Mendoza	50105
        Localidad simple	-34.5522300096664	-68.3032401705615	San Rafael	INDEC	50105030000	50105030	Barrio Empleados de Comercio	500105	San Rafael	BARRIO EMPLEADOS DE COMERCIO	50	Mendoza	50105
        Localidad simple	-34.645100562517	-68.2754543992412	San Rafael	INDEC	50105040000	50105040	Barrio Intendencia	500105	San Rafael	BARRIO INTENDENCIA	50	Mendoza	50105
        Localidad simple	-34.5835613146884	-68.4654391114406	San Rafael	INDEC	50105050000	50105050	Capitán Montoya	500105	San Rafael	CAPITAN MONTOYA	50	Mendoza	50105
        Entidad	-34.6278079094528	-68.4330730738277	San Rafael	INDEC	50105060001	50105060	Cuadro Benegas	500105	San Rafael	BARRIO ECHEVERRIA	50	Mendoza	50105
        Entidad	-34.6278079094528	-68.4330730738277	San Rafael	INDEC	50105060002	50105060	Cuadro Benegas	500105	San Rafael	BARRIO LAS ROSAS	50	Mendoza	50105
        Entidad	-34.6298100948936	-68.5105923910427	San Rafael	INDEC	50105060003	50105060	Cuadro Benegas	500105	San Rafael	BARRIO PRIMAVERA	50	Mendoza	50105
        Localidad simple	-35.0353713864246	-68.6806149266928	San Rafael	INDEC	50105070000	50105070	El Nihuil	500105	San Rafael	EL NIHUIL	50	Mendoza	50105
        Localidad simple	-35.0821772227253	-69.5924127887533	San Rafael	INDEC	50105080000	50105080	El Sosneado	500105	San Rafael	EL SOSNEADO	50	Mendoza	50105
        Localidad simple	-34.6856449091453	-68.2855505604444	San Rafael	INDEC	50105090000	50105090	El Tropezón	500105	San Rafael	EL TROPEZON	50	Mendoza	50105
        Localidad simple	-34.6803228490363	-68.1358422919666	San Rafael	INDEC	50105100000	50105100	Goudge	500105	San Rafael	GOUDGE	50	Mendoza	50105
        Localidad simple	-34.9146831219286	-67.8191470107259	San Rafael	INDEC	50105110000	50105110	Jaime Prats	500105	San Rafael	JAIME PRATS	50	Mendoza	50105
        Localidad simple	-34.6449297466889	-68.0147704723126	San Rafael	INDEC	50105120000	50105120	La Llave Nueva	500105	San Rafael	LA LLAVE NUEVA	50	Mendoza	50105
        Localidad simple	-34.8384149976168	-68.2539362219611	San Rafael	INDEC	50105130000	50105130	Las Malvinas	500105	San Rafael	LAS MALVINAS	50	Mendoza	50105
        Localidad simple	-34.6099288763693	-68.6205430790631	San Rafael	INDEC	50105140000	50105140	Los Reyunos	500105	San Rafael	LOS REYUNOS	50	Mendoza	50105
        Localidad simple	-34.5971809945468	-67.8842899055404	San Rafael	INDEC	50105150000	50105150	Monte Comán	500105	San Rafael	MONTE COMAN	50	Mendoza	50105
        Localidad simple	-34.6703587937035	-68.3591845637218	San Rafael	INDEC	50105160000	50105160	Pobre Diablo	500105	San Rafael	POBRE DIABLO	50	Mendoza	50105
        Localidad simple	-35.530165567926	-68.0825092985548	San Rafael	INDEC	50105170000	50105170	Punta del Agua	500105	San Rafael	PUNTA DEL AGUA	50	Mendoza	50105
        Localidad simple	-34.7043760307316	-68.3708631047738	San Rafael	INDEC	50105180000	50105180	Rama Caída	500105	San Rafael	RAMA CAIDA	50	Mendoza	50105
        Localidad simple	-34.8433149755939	-67.7674203749059	San Rafael	INDEC	50105190000	50105190	Real del Padre	500105	San Rafael	REAL DEL PADRE	50	Mendoza	50105
        Localidad simple	-34.726958284268	-68.2329031579027	San Rafael	INDEC	50105200000	50105200	Salto de las Rosas	500105	San Rafael	SALTO DE LAS ROSAS	50	Mendoza	50105
        Entidad	-34.6175050676523	-68.2817525680486	San Rafael	INDEC	50105210001	50105210	San Rafael	500105	San Rafael	CUADRO NACIONAL	50	Mendoza	50105
        Entidad	-34.6356104202068	-68.3310920132847	San Rafael	INDEC	50105210002	50105210	San Rafael	500105	San Rafael	SAN RAFAEL	50	Mendoza	50105
        Localidad simple	-34.5859138924719	-68.5495682219631	San Rafael	INDEC	50105220000	50105220	25 de Mayo	500105	San Rafael	25 DE MAYO	50	Mendoza	50105
        Localidad simple	-34.8345022006919	-67.9257905889932	San Rafael	INDEC	50105230000	50105230	Villa Atuel	500105	San Rafael	VILLA ATUEL	50	Mendoza	50105
        Localidad simple	-34.7605998347692	-68.0374059028043	San Rafael	INDEC	50105240000	50105240	Villa Atuel Norte	500105	San Rafael	VILLA ATUEL NORTE	50	Mendoza	50105
        Localidad simple	-33.1912015360595	-68.2809624398751	Santa Rosa	INDEC	50112010000	50112010	Barrio 12 de Octubre	500112	Santa Rosa	BARRIO 12 DE OCTUBRE	50	Mendoza	50112
        Localidad simple	-33.2425136237648	-68.1826758332982	Santa Rosa	INDEC	50112020000	50112020	Barrio María Auxiliadora	500112	Santa Rosa	BARRIO MARIA AUXILIADORA	50	Mendoza	50112
        Localidad simple	-33.1297119555186	-68.2037878560507	Santa Rosa	INDEC	50112030000	50112030	Barrio Molina Cabrera	500112	Santa Rosa	BARRIO MOLINA CABRERA	50	Mendoza	50112
        Localidad simple	-33.3499243562079	-67.9160460628593	Santa Rosa	INDEC	50112040000	50112040	La Dormida	500112	Santa Rosa	LA DORMIDA	50	Mendoza	50112
        Localidad simple	-33.3001058785583	-68.0532182373693	Santa Rosa	INDEC	50112050000	50112050	Las Catitas	500112	Santa Rosa	LAS CATITAS	50	Mendoza	50112
        Localidad simple	-33.2544227888887	-68.1567438797332	Santa Rosa	INDEC	50112060000	50112060	Santa Rosa	500112	Santa Rosa	SANTA ROSA	50	Mendoza	50112
        Localidad simple	-33.6339135898779	-69.1879023870713	Tunuyán	INDEC	50119010000	50119010	Barrio San Cayetano	500119	Tunuyán	BARRIO SAN CAYETANO	50	Mendoza	50119
        Localidad simple	-33.707078744557	-69.1826331369796	Tunuyán	INDEC	50119020000	50119020	Campo Los Andes	500119	Tunuyán	CAMPO LOS ANDES	50	Mendoza	50119
        Localidad simple	-33.6129364669522	-69.1126485401013	Tunuyán	INDEC	50119030000	50119030	Colonia Las Rosas	500119	Tunuyán	COLONIA LAS ROSAS	50	Mendoza	50119
        Localidad simple	-33.6005741925646	-69.3350878551815	Tunuyán	INDEC	50119040000	50119040	El Manzano	500119	Tunuyán	EL MANZANO	50	Mendoza	50119
        Localidad simple	-33.5952101670008	-69.1840214848841	Tunuyán	INDEC	50119050000	50119050	Los Sauces	500119	Tunuyán	LOS SAUCES	50	Mendoza	50119
        Localidad simple	-33.5775549686559	-69.0253759357637	Tunuyán	INDEC	50119060000	50119060	Tunuyán	500119	Tunuyán	TUNUYAN	50	Mendoza	50119
        Localidad simple	-33.651355463945	-69.1646922660824	Tunuyán	INDEC	50119070000	50119070	Vista Flores	500119	Tunuyán	VISTA FLORES	50	Mendoza	50119
        Localidad simple	-33.3301032817585	-69.1359513617454	Tupungato	INDEC	50126010000	50126010	Barrio Belgrano Norte	500126	Tupungato	BARRIO BELGRANO NORTE	50	Mendoza	50126
        Localidad simple	-33.4689491349532	-69.1399451802858	Tupungato	INDEC	50126020000	50126020	Cordón del Plata	500126	Tupungato	CORDON DEL PLATA	50	Mendoza	50126
        Localidad simple	-33.3706550679362	-69.1923487111206	Tupungato	INDEC	50126030000	50126030	El Peral	500126	Tupungato	EL PERAL	50	Mendoza	50126
        Localidad simple	-33.3989500475535	-69.1057367245591	Tupungato	INDEC	50126035000	50126035	El Zampal	500126	Tupungato	EL ZAMPAL	50	Mendoza	50126
        Localidad simple	-33.3688267818118	-69.1247363670469	Tupungato	INDEC	50126040000	50126040	La Arboleda	500126	Tupungato	LA ARBOLEDA	50	Mendoza	50126
        Localidad simple	-33.3068450101282	-69.1645780862147	Tupungato	INDEC	50126050000	50126050	San José	500126	Tupungato	SAN JOSE	50	Mendoza	50126
        Entidad	-33.3643638135734	-69.1513190958561	Tupungato	INDEC	50126060001	50126060	Tupungato	500126	Tupungato	TUPUNGATO	50	Mendoza	50126
        Entidad	-33.3420986445545	-69.1487758488674	Tupungato	INDEC	50126060002	50126060	Tupungato	500126	Tupungato	VILLA BASTIAS	50	Mendoza	50126
        Localidad simple	-27.909806877888	-55.7532126178864	Apóstoles	INDEC	54007010000	54007010	Apóstoles	540007	Apóstoles	APOSTOLES	54	Misiones	54007
        Localidad simple	-28.0572512053051	-55.6767993766976	Apóstoles	INDEC	54007020000	54007020	Azara	540014	Azara	AZARA	54	Misiones	54007
        Localidad simple	-27.8839188226826	-55.7857809648065	Apóstoles	INDEC	54007025000	54007025	Barrio Rural	540007	Apóstoles	BARRIO RURAL	54	Misiones	54007
        Componente de localidad compuesta	-27.9079594261468	-55.8079584118965	Apóstoles	INDEC	54007030000	54007030	Estación Apóstoles	540007	Apóstoles	ESTACION APOSTOLES	54	Misiones	54007
        Localidad simple	-27.7474272299697	-55.7932485753782	Apóstoles	INDEC	54007040000	54007040	Pindapoy	540021	San José	PINDAPOY	54	Misiones	54007
        Localidad simple	-28.108077909743	-55.6318879848456	Apóstoles	INDEC	54007050000	54007050	Rincón de Azara	540014	Azara	RINCON DE AZARA	54	Misiones	54007
        Localidad simple	-27.7653179990542	-55.7746920758949	Apóstoles	INDEC	54007060000	54007060	San José	540021	San José	SAN JOSE	54	Misiones	54007
        Localidad simple	-28.0000872703207	-55.608042877744	Apóstoles	INDEC	54007070000	54007070	Tres Capones	540028	Tres Capones	TRES CAPONES	54	Misiones	54007
        Localidad simple	-27.0952902000827	-54.8949054572105	Cainguás	INDEC	54014010000	54014010	Aristóbulo del Valle	540035	Aristóbulo del Valle	ARISTOBULO DEL VALLE	54	Misiones	54014
        Localidad simple	-27.2062681295066	-54.979095503669	Cainguás	INDEC	54014020000	54014020	Campo Grande	540042	Campo Grande	CAMPO GRANDE	54	Misiones	54014
        Localidad simple con entidad	-27.0205393332885	-54.6877327006159	Cainguás	INDEC	54014030000	54014030	Dos de Mayo	540049	Dos de Mayo	DOS DE MAYO NUCLEO I	54	Misiones	54014
        Entidad	-26.9808943053968	-54.7030774930753	Cainguás	INDEC	54014030001	54014030	Dos de Mayo	540049	Dos de Mayo	NUCLEO I	54	Misiones	54014
        Entidad	-27.0234502899983	-54.6788256442778	Cainguás	INDEC	54014030002	54014030	Dos de Mayo	540049	Dos de Mayo	NUCLEO II	54	Misiones	54014
        Localidad simple	-27.0065768537216	-54.6123536244069	Cainguás	INDEC	54014050000	54014050	Dos de Mayo Nucleo III (Bº Bernardino Rivadavia)	540049	Dos de Mayo	DOS DE MAYO NUCLEO III	54	Misiones	54014
        Localidad simple	-27.3105260940585	-54.9030555649231	Cainguás	INDEC	54014055000	54014055	Kilómetro 17	540042	Campo Grande	KILOMETRO 17 (RUTA 8)	54	Misiones	54014
        Localidad simple	-27.1660848947707	-55.029165269622	Cainguás	INDEC	54014060000	54014060	1º de Mayo	540042	Campo Grande	1 DE MAYO	54	Misiones	54014
        Localidad simple	-27.1485153432864	-54.5624940052185	Cainguás	INDEC	54014070000	54014070	Pueblo Illia	540049	Dos de Mayo	PUEBLO ILLIA	54	Misiones	54014
        Localidad simple	-27.0822797871022	-54.8334856092969	Cainguás	INDEC	54014080000	54014080	Salto Encantado	540035	Aristóbulo del Valle	SALTO ENCANTADO	54	Misiones	54014
        Localidad simple	-27.4636033945712	-55.8005801049338	Candelaria	INDEC	54021005000	54021005	Barrio del Lago	540063	Candelaria	BARRIO DEL LAGO	54	Misiones	54021
        Localidad simple	-27.4820696887808	-55.4774200837194	Candelaria	INDEC	54021010000	54021010	Bonpland	540056	Bonpland	BONPLAND	54	Misiones	54021
        Localidad simple	-27.4591653471738	-55.7430844145913	Candelaria	INDEC	54021020000	54021020	Candelaria	540063	Candelaria	CANDELARIA	54	Misiones	54021
        Localidad simple	-27.508609969523	-55.6038621436184	Candelaria	INDEC	54021030000	54021030	Cerro Corá	540070	Cerro Corá	CERRO CORA	54	Misiones	54021
        Localidad simple	-27.3296012279697	-55.5228090005038	Candelaria	INDEC	54021040000	54021040	Loreto	540077	Loreto	LORETO	54	Misiones	54021
        Localidad simple	-27.4188647592881	-55.3777936639947	Candelaria	INDEC	54021050000	54021050	Mártires	540084	Mártires	MARTIRES	54	Misiones	54021
        Localidad simple	-27.5585198137316	-55.7034474067364	Candelaria	INDEC	54021060000	54021060	Profundidad	540091	Profundidad	PROFUNDIDAD	54	Misiones	54021
        Localidad simple	-27.3330798818829	-55.5864347793367	Candelaria	INDEC	54021070000	54021070	Puerto Santa Ana	540098	Santa Ana	PUERTO SANTA ANA	54	Misiones	54021
        Localidad simple	-27.3671212837411	-55.5805568560225	Candelaria	INDEC	54021080000	54021080	Santa Ana	540098	Santa Ana	SANTA ANA	54	Misiones	54021
        Localidad simple	-27.4321009059125	-55.826138545257	Capital	INDEC	54028005000	54028005	Barrio Nuevo Garupa	540112	Garupá	BARRIO NUEVO GARUPA	54	Misiones	54028
        Componente de localidad compuesta	-27.4788128514289	-55.8224411787639	Capital	INDEC	54028010000	54028010	Garupá	540112	Garupá	GARUPA	54	Misiones	54028
        Localidad simple	-27.367003658843	-55.9982208456294	Capital	INDEC	54028020000	54028020	Nemesio Parma	540119	Posadas	NEMESIO PARMA	54	Misiones	54028
        Componente de localidad compuesta	-27.36621704276	-55.8940020980262	Capital	INDEC	54028030000	54028030	Posadas	540119	Posadas	POSADAS	54	Misiones	54028
        Localidad simple	-28.1109522025734	-55.5820048143948	Concepción	INDEC	54035010000	54035010	Barra Concepción	540126	Concepción de la Sierra	BARRA CONCEPCION	54	Misiones	54035
        Localidad simple	-27.9813155596218	-55.5209343056683	Concepción	INDEC	54035020000	54035020	Concepción de la Sierra	540126	Concepción de la Sierra	CONCEPCION DE LA SIERRA	54	Misiones	54035
        Localidad simple	-27.8884115577679	-55.3552996953	Concepción	INDEC	54035030000	54035030	La Corita	540133	Santa María	LA CORITA	54	Misiones	54035
        Localidad simple	-27.9292852570213	-55.4120566457096	Concepción	INDEC	54035040000	54035040	Santa María	540133	Santa María	SANTA MARIA	54	Misiones	54035
        Localidad simple	-26.3298887730818	-54.6215572258235	Eldorado	INDEC	54042010000	54042010	Colonia Victoria	540147	Colonia Victoria	COLONIA VICTORIA	54	Misiones	54042
        Localidad simple	-26.4086211746541	-54.6238428075538	Eldorado	INDEC	54042020000	54042020	Eldorado	540154	Eldorado	ELDORADO	54	Misiones	54042
        Localidad simple	-26.2380924409231	-54.6018096123882	Eldorado	INDEC	54042030000	54042030	María Magdalena	540140	Colonia Delicia	MARIA MAGDALENA	54	Misiones	54042
        Localidad simple	-26.1791395472552	-54.5836572818887	Eldorado	INDEC	54042035000	54042035	Nueva Delicia	540140	Colonia Delicia	NUEVA DELICIA	54	Misiones	54042
        Localidad simple	-26.4302810162412	-54.4664666896921	Eldorado	INDEC	54042040000	54042040	9 de Julio Kilómetro 28	540161	9 de Julio	9 DE JULIO	54	Misiones	54042
        Localidad simple	-26.4145333109522	-54.4976116231155	Eldorado	INDEC	54042050000	54042050	9 de Julio Kilómetro 20	540161	9 de Julio	9 DE JULIO KILOMETRO 20	54	Misiones	54042
        Localidad simple	-26.2445413608016	-54.5904675610809	Eldorado	INDEC	54042055000	54042055	Pueblo Nuevo	540140	Colonia Delicia	PUEBLO NUEVO	54	Misiones	54042
        Localidad simple	-26.2310899121585	-54.6247146607981	Eldorado	INDEC	54042060000	54042060	Puerto Mado	540140	Colonia Delicia	PUERTO MADO	54	Misiones	54042
        Localidad simple	-26.4268174271826	-54.6857660084129	Eldorado	INDEC	54042070000	54042070	Puerto Pinares	540154	Eldorado	PUERTO PINARES	54	Misiones	54042
        Localidad simple	-26.3905866143255	-54.3947099277232	Eldorado	INDEC	54042080000	54042080	Santiago de Liniers	540168	Santiago de Liniers	SANTIAGO DE LINIERS	54	Misiones	54042
        Localidad simple	-26.382535288747	-54.4652848386631	Eldorado	INDEC	54042090000	54042090	Valle Hermoso	540161	9 de Julio	VALLE HERMOSO	54	Misiones	54042
        Localidad simple	-26.4422594958772	-54.6405734856487	Eldorado	INDEC	54042100000	54042100	Villa Roulet	540154	Eldorado	VILLA ROULET	54	Misiones	54042
        Localidad simple	-25.6674361424553	-54.0456434709472	General Manuel Belgrano	INDEC	54049010000	54049010	Comandante Andresito	540182	Comandante A. Guacurary	ALMIRANTE BROWN	54	Misiones	54049
        Localidad simple	-26.2546761021204	-53.6472133435976	General Manuel Belgrano	INDEC	54049020000	54049020	Bernardo de Irigoyen	540175	Bernardo de Irigoyen	BERNARDO DE IRIGOYEN	54	Misiones	54049
        Localidad simple	-25.6820367479588	-54.1426092989677	General Manuel Belgrano	INDEC	54049025000	54049025	Caburei	540182	Comandante A. Guacurary	CABUREI	54	Misiones	54049
        Localidad simple	-26.2918653520361	-53.7575832277415	General Manuel Belgrano	INDEC	54049030000	54049030	Dos Hermanas	540175	Bernardo de Irigoyen	DOS HERMANAS	54	Misiones	54049
        Localidad simple	-25.7724726219691	-53.8522974773477	General Manuel Belgrano	INDEC	54049040000	54049040	Integración	540182	Comandante A. Guacurary	INTEGRACION	54	Misiones	54049
        Localidad simple	-25.926985370994	-53.9254399080528	General Manuel Belgrano	INDEC	54049043000	54049043	Piñalito Norte	540189	San Antonio	PIÑALITO NORTE	54	Misiones	54049
        Localidad simple	-25.5880676406692	-54.0084915753095	General Manuel Belgrano	INDEC	54049045000	54049045	Puerto Andresito	540182	Comandante A. Guacurary	PUERTO ANDRESITO	54	Misiones	54049
        Localidad simple	-25.7862399598743	-54.038267293845	General Manuel Belgrano	INDEC	54049047000	54049047	Puerto Deseado	540182	Comandante A. Guacurary	PUERTO DESEADO	54	Misiones	54049
        Localidad simple	-26.0557838105078	-53.7339959536295	General Manuel Belgrano	INDEC	54049050000	54049050	San Antonio	540189	San Antonio	SAN ANTONIO	54	Misiones	54049
        Localidad simple	-27.2908601020425	-54.2007777459323	Guaraní	INDEC	54056010000	54056010	El Soberbio	540196	El Soberbio	EL SOBERBIO	54	Misiones	54056
        Localidad simple	-26.740151400562	-54.3000439575816	Guaraní	INDEC	54056020000	54056020	Fracrán	540203	San Vicente	FRACRAN	54	Misiones	54056
        Localidad simple	-26.9953791755128	-54.4834965149084	Guaraní	INDEC	54056030000	54056030	San Vicente	540203	San Vicente	SAN VICENTE	54	Misiones	54056
        Localidad simple	-26.0232970897792	-54.6125092333468	Iguazú	INDEC	54063010000	54063010	Puerto Esperanza	540210	Puerto Esperanza	ESPERANZA	54	Misiones	54063
        Localidad simple	-25.9216713372731	-54.5821209872029	Iguazú	INDEC	54063020000	54063020	Puerto Libertad	540224	Libertad	LIBERTAD	54	Misiones	54063
        Localidad simple	-25.6010431152667	-54.576736880982	Iguazú	INDEC	54063030000	54063030	Puerto Iguazú	540217	Iguazú	PUERTO IGUAZU	54	Misiones	54063
        Localidad simple	-25.935986701389	-54.5384663539082	Iguazú	INDEC	54063035000	54063035	Villa Cooperativa	540224	Libertad	VILLA COOPERATIVA	54	Misiones	54063
        Localidad simple	-25.9713257064178	-54.5610255460819	Iguazú	INDEC	54063040000	54063040	Colonia Wanda	540231	Colonia Wanda	WANDA	54	Misiones	54063
        Localidad simple	-27.5062138362368	-55.4018892063726	Leandro N. Alem	INDEC	54070010000	54070010	Almafuerte	540238	Almafuerte	ALMAFUERTE	54	Misiones	54070
        Localidad simple	-27.698002675484	-55.4064788856063	Leandro N. Alem	INDEC	54070020000	54070020	Arroyo del Medio	540245	Arroyo del Medio	ARROYO DEL MEDIO	54	Misiones	54070
        Localidad simple	-27.4807844367608	-55.2992348104351	Leandro N. Alem	INDEC	54070030000	54070030	Caá - Yarí	540252	Caa Yarí	CAA - YARI	54	Misiones	54070
        Localidad simple	-27.6310347455951	-55.4938681670811	Leandro N. Alem	INDEC	54070040000	54070040	Cerro Azul	540259	Cerro Azul	CERRO AZUL	54	Misiones	54070
        Localidad simple	-27.694171423305	-55.2587801693628	Leandro N. Alem	INDEC	54070050000	54070050	Dos Arroyos	540266	Dos Arroyos	DOS ARROYOS	54	Misiones	54070
        Localidad simple	-27.6615245708492	-55.2124455595203	Leandro N. Alem	INDEC	54070060000	54070060	Gobernador López	540273	Gobernador López	GOBERNADOR LOPEZ	54	Misiones	54070
        Localidad simple	-27.601867604082	-55.3264659218849	Leandro N. Alem	INDEC	54070070000	54070070	Leandro N. Alem	540280	Leandro N. Alem	LEANDRO N. ALEM	54	Misiones	54070
        Localidad simple	-27.5658220357689	-55.5017254277441	Leandro N. Alem	INDEC	54070080000	54070080	Olegario V. Andrade	540287	Olegario V. Andrade	OLEGARIO V. ANDRADE	54	Misiones	54070
        Localidad simple	-27.5583422242545	-55.3160862221368	Leandro N. Alem	INDEC	54070090000	54070090	Villa Libertad	540252	Caa Yarí	VILLA LIBERTAD	54	Misiones	54070
        Localidad simple	-26.9292033223206	-55.0569367980451	Libertador General San Martín	INDEC	54077010000	54077010	Capioví	540294	Capioví	CAPIOVI	54	Misiones	54077
        Localidad simple	-26.8795016704132	-55.0705133852003	Libertador General San Martín	INDEC	54077015000	54077015	Capioviciño	540322	Puerto Rico	CAPIOVICIÑO	54	Misiones	54077
        Localidad simple	-26.7102586382645	-54.8161444547822	Libertador General San Martín	INDEC	54077020000	54077020	El Alcázar	540301	El Alcázar	EL ALCAZAR	54	Misiones	54077
        Localidad simple	-26.8186828823083	-54.9576120074303	Libertador General San Martín	INDEC	54077030000	54077030	Garuhapé	540308	Garuhapé	GARUHAPE	54	Misiones	54077
        Localidad simple	-26.8615012222942	-55.0463438652711	Libertador General San Martín	INDEC	54077040000	54077040	Mbopicuá	540322	Puerto Rico	MBOPICUA	54	Misiones	54077
        Localidad simple	-26.9840910613646	-55.1694842635982	Libertador General San Martín	INDEC	54077050000	54077050	Puerto Leoni	540315	Leoni	PUERTO LEONI	54	Misiones	54077
        Localidad simple	-26.8148524027618	-55.0240728847562	Libertador General San Martín	INDEC	54077060000	54077060	Puerto Rico	540322	Puerto Rico	PUERTO RICO	54	Misiones	54077
        Localidad simple	-26.9665882832067	-55.05758992095	Libertador General San Martín	INDEC	54077070000	54077070	Ruiz de Montoya	540329	Ruiz de Montoya	RUIZ DE MONTOYA	54	Misiones	54077
        Localidad simple	-26.8048950436231	-54.9881508224082	Libertador General San Martín	INDEC	54077080000	54077080	San Alberto	540322	Puerto Rico	SAN ALBERTO	54	Misiones	54077
        Localidad simple	-26.9225122221192	-55.1238743204073	Libertador General San Martín	INDEC	54077090000	54077090	San Gotardo	540294	Capioví	SAN GOTARDO	54	Misiones	54077
        Localidad simple	-26.8533367010148	-54.8892924101276	Libertador General San Martín	INDEC	54077100000	54077100	San Miguel	540308	Garuhapé	SAN MIGUEL	54	Misiones	54077
        Localidad simple	-26.9412646689407	-55.0957711615406	Libertador General San Martín	INDEC	54077110000	54077110	Villa Akerman	540294	Capioví	VILLA AKERMAN	54	Misiones	54077
        Localidad simple	-26.8462676092826	-54.739753574325	Libertador General San Martín	INDEC	54077120000	54077120	Villa Urrutia	540301	El Alcázar	VILLA URRUTIA	54	Misiones	54077
        Localidad simple	-26.5482209436331	-54.6748836684444	Montecarlo	INDEC	54084003000	54084003	Barrio Cuatro Bocas	540343	Montecarlo	BARRIO CUATRO BOCAS	54	Misiones	54084
        Localidad simple	-26.6027932981786	-54.6955807827058	Montecarlo	INDEC	54084005000	54084005	Barrio Guatambu	540343	Montecarlo	BARRIO GUATAMBU	54	Misiones	54084
        Localidad simple	-26.5283257581417	-54.7089179903484	Montecarlo	INDEC	54084007000	54084007	Bario Ita	540343	Montecarlo	BARIO ITA	54	Misiones	54084
        Localidad simple	-26.6563488324986	-54.7392272649556	Montecarlo	INDEC	54084010000	54084010	Caraguatay	540336	Caraguatay	CARAGUATAY	54	Misiones	54084
        Localidad simple	-26.532818826907	-54.6506736537237	Montecarlo	INDEC	54084020000	54084020	Laharrague	540343	Montecarlo	LAHARRAGUE	54	Misiones	54084
        Localidad simple	-26.5661764915312	-54.7614267394945	Montecarlo	INDEC	54084030000	54084030	Montecarlo	540343	Montecarlo	MONTECARLO	54	Misiones	54084
        Localidad simple	-26.5237915925702	-54.5916547620688	Montecarlo	INDEC	54084040000	54084040	Piray Kilómetro 18	540350	Puerto Piray	PIRAY KILOMETRO 18	54	Misiones	54084
        Localidad simple	-26.467494823767	-54.7136760762691	Montecarlo	INDEC	54084050000	54084050	Puerto Piray	540350	Puerto Piray	PUERTO PIRAY	54	Misiones	54084
        Localidad simple	-26.7282097915611	-54.7278209571683	Montecarlo	INDEC	54084060000	54084060	Tarumá	540336	Caraguatay	TARUMA	54	Misiones	54084
        Localidad simple	-26.4980184491189	-54.6804147225647	Montecarlo	INDEC	54084070000	54084070	Villa Parodi	540343	Montecarlo	VILLA PARODI	54	Misiones	54084
        Localidad simple	-27.3569655848168	-55.2326585711531	Oberá	INDEC	54091010000	54091010	Colonia Alberdi	540371	Colonia Alberdi	ALBERDI	54	Misiones	54091
        Localidad simple	-27.616902888101	-55.0424750470795	Oberá	INDEC	54091013000	54091013	Barrio Escuela 461	540392	Los Helechos	BARRIO ESCUELA 461	54	Misiones	54091
        Componente de localidad compuesta	-27.4689933468661	-55.0771065017179	Oberá	INDEC	54091017000	54091017	Barrio Escuela 633	540357	Campo Ramón	BARRIO ESCUELA 633	54	Misiones	54091
        Localidad simple	-27.4522700869441	-55.0237352385306	Oberá	INDEC	54091020000	54091020	Campo Ramón	540357	Campo Ramón	CAMPO RAMON	54	Misiones	54091
        Localidad simple	-27.3310558767329	-55.0528548158544	Oberá	INDEC	54091030000	54091030	Campo Viera	540364	Campo Viera	CAMPO VIERA	54	Misiones	54091
        Localidad simple	-27.4917334406127	-55.1989608083666	Oberá	INDEC	54091040000	54091040	El Salto	540399	Oberá	EL SALTO	54	Misiones	54091
        Localidad simple	-27.4228667193793	-55.1702709710527	Oberá	INDEC	54091050000	54091050	General Alvear	540378	Gral. Alvear	GENERAL ALVEAR	54	Misiones	54091
        Localidad simple	-27.5203317456103	-55.161363476829	Oberá	INDEC	54091060000	54091060	Guaraní	540385	Guaraní	GUARANI	54	Misiones	54091
        Localidad simple	-27.5531853202103	-55.0778227687919	Oberá	INDEC	54091070000	54091070	Los Helechos	540392	Los Helechos	LOS HELECHOS	54	Misiones	54091
        Localidad simple	-46.5588457703439	-67.616856368573	Deseado	INDEC	78014020000	78014020	Cañadón Seco			CAÑADON SECO	78	Santa Cruz	78014
        Componente de localidad compuesta	-27.4816559378759	-55.1251546931471	Oberá	INDEC	54091080000	54091080	Oberá	540399	Oberá	OBERA	54	Misiones	54091
        Localidad simple	-27.7185151219435	-54.9183708210206	Oberá	INDEC	54091090000	54091090	Panambí	540406	Panambí	PANAMBI	54	Misiones	54091
        Localidad simple	-27.6631606292713	-54.9846517202885	Oberá	INDEC	54091100000	54091100	Panambí Kilómetro 8	540406	Panambí	PANAMBI KILOMETRO 8	54	Misiones	54091
        Localidad simple	-27.7043305063396	-54.9664319816326	Oberá	INDEC	54091105000	54091105	Panambi Kilómetro 15	540406	Panambí	PANAMBI KILOMETRO 15	54	Misiones	54091
        Localidad simple	-27.4618128955547	-55.2783440740601	Oberá	INDEC	54091110000	54091110	San Martín	540413	San Martín	SAN MARTIN	54	Misiones	54091
        Localidad simple	-27.479699295829	-54.9639234038824	Oberá	INDEC	54091120000	54091120	Villa Bonita	540357	Campo Ramón	VILLA BONITA	54	Misiones	54091
        Localidad simple	-27.1077568549388	-55.3881151371992	San Ignacio	INDEC	54098005000	54098005	Barrio Tungoil	540469	Santo Pipo	BARRIO TUNGOIL	54	Misiones	54098
        Localidad simple	-26.9810475025624	-55.3170685541177	San Ignacio	INDEC	54098010000	54098010	Colonia Polana	540420	Colonia Polana	COLONIA POLANA	54	Misiones	54098
        Localidad simple	-27.1278038790718	-55.5094179289212	San Ignacio	INDEC	54098020000	54098020	Corpus	540427	Corpus	CORPUS	54	Misiones	54098
        Localidad simple	-27.3546875776242	-55.3368344966029	San Ignacio	INDEC	54098030000	54098030	Domingo Savio	540462	San Ignacio	DOMINGO SAVIO	54	Misiones	54098
        Localidad simple	-27.1077317789884	-55.3737660823345	San Ignacio	INDEC	54098040000	54098040	General Urquiza	540434	General J. J. Urquiza	GENERAL URQUIZA	54	Misiones	54098
        Localidad simple	-27.1910170928285	-55.4682802860195	San Ignacio	INDEC	54098050000	54098050	Gobernador Roca	540441	Gobernador Roca	GOBERNADOR ROCA	54	Misiones	54098
        Localidad simple	-27.110525539393	-55.3438282986148	San Ignacio	INDEC	54098060000	54098060	Helvecia	540448	Hipólito Irigoyen	HELVECIA	54	Misiones	54098
        Localidad simple	-27.0900613258757	-55.2870716950334	San Ignacio	INDEC	54098070000	54098070	Hipólito Yrigoyen	540448	Hipólito Irigoyen	HIPOLITO YRIGOYEN	54	Misiones	54098
        Localidad simple	-27.0410707861025	-55.2320858824009	San Ignacio	INDEC	54098080000	54098080	Jardín América	540455	Jardín América	JARDIN AMERICA	54	Misiones	54098
        Localidad simple	-26.9708359693882	-55.2491782114283	San Ignacio	INDEC	54098090000	54098090	Oasis	540455	Jardín América	OASIS	54	Misiones	54098
        Localidad simple	-27.2143687134287	-55.4202789802254	San Ignacio	INDEC	54098100000	54098100	Roca Chica	540441	Gobernador Roca	ROCA CHICA	54	Misiones	54098
        Localidad simple	-27.2573496537482	-55.5397360869442	San Ignacio	INDEC	54098110000	54098110	San Ignacio	540462	San Ignacio	SAN IGNACIO	54	Misiones	54098
        Localidad simple	-27.1418557045843	-55.4074695445505	San Ignacio	INDEC	54098120000	54098120	Santo Pipó	540469	Santo Pipo	SANTO PIPO	54	Misiones	54098
        Localidad simple	-27.6349575540286	-55.0877551421696	San Javier	INDEC	54105010000	54105010	Florentino Ameghino	540476	Ameghino	FLORENTINO AMEGHINO	54	Misiones	54105
        Localidad simple	-27.8655824463799	-55.2638525290793	San Javier	INDEC	54105020000	54105020	Itacaruaré	540483	Itacaruaré	ITACARUARE	54	Misiones	54105
        Localidad simple	-27.7077678291474	-55.1582021663854	San Javier	INDEC	54105030000	54105030	Mojón Grande	540490	Mojón Grande	MOJON GRANDE	54	Misiones	54105
        Localidad simple	-27.8653231566702	-55.1348376530446	San Javier	INDEC	54105040000	54105040	San Javier	540497	San Javier	SAN JAVIER	54	Misiones	54105
        Localidad simple	-26.5379470287742	-53.9437324956095	San Pedro	INDEC	54112010000	54112010	Cruce Caballero	540504	San Pedro	CRUCE CABALLERO	54	Misiones	54112
        Localidad simple	-26.6835663891035	-54.2050107484876	San Pedro	INDEC	54112020000	54112020	Paraíso	540504	San Pedro	PARAISO	54	Misiones	54112
        Localidad simple	-26.4160781340411	-53.8369134466205	San Pedro	INDEC	54112030000	54112030	Piñalito Sur	540504	San Pedro	PIÑALITO SUR	54	Misiones	54112
        Localidad simple	-26.6197903071037	-54.1146818942839	San Pedro	INDEC	54112040000	54112040	San Pedro	540504	San Pedro	SAN PEDRO	54	Misiones	54112
        Localidad simple	-26.4664417575785	-53.8919888142393	San Pedro	INDEC	54112050000	54112050	Tobuna	540504	San Pedro	TOBUNA	54	Misiones	54112
        Localidad simple	-27.5641504979908	-54.687011236345	25 de Mayo	INDEC	54119010000	54119010	Alba Posse	540511	Alba Posse	ALBA POSSE	54	Misiones	54119
        Localidad simple	-27.3792090956035	-54.3672999680752	25 de Mayo	INDEC	54119020000	54119020	Alicia Alta	540518	Colonia Aurora	COLONIA ALICIA	54	Misiones	54119
        Localidad simple	-27.4285421255893	-54.3575081480921	25 de Mayo	INDEC	54119025000	54119025	Alicia Baja	540518	Colonia Aurora	ALICIA BAJA	54	Misiones	54119
        Localidad simple	-27.479557957166	-54.5154356645941	25 de Mayo	INDEC	54119030000	54119030	Colonia Aurora	540518	Colonia Aurora	COLONIA AURORA	54	Misiones	54119
        Localidad simple	-27.4597786529494	-54.7478069154214	25 de Mayo	INDEC	54119040000	54119040	San Francisco de Asís	540511	Alba Posse	SAN FRANCISCO DE ASIS	54	Misiones	54119
        Localidad simple	-27.5183529379611	-54.7305712624723	25 de Mayo	INDEC	54119050000	54119050	Santa Rita	540511	Alba Posse	SANTA RITA	54	Misiones	54119
        Localidad simple	-27.3715719938072	-54.7475224881518	25 de Mayo	INDEC	54119060000	54119060	25 de Mayo	540525	25 de Mayo	25 DE MAYO	54	Misiones	54119
        Localidad simple	-39.2395006622098	-70.9180131491474	Aluminé	INDEC	58007010000	58007010	Aluminé	580007	Aluminé	ALUMINE	58	Neuquén	58007
        Localidad simple	-38.9431841513779	-71.3282934446594	Aluminé	INDEC	58007015000	58007015	Moquehue	580252	Villa Pehuenia	MOQUEHUE	58	Neuquén	58007
        Localidad simple	-38.88385673767	-71.1721341418285	Aluminé	INDEC	58007020000	58007020	Villa Pehuenia	580252	Villa Pehuenia	VILLA PEHUENIA	58	Neuquén	58007
        Localidad simple	-37.9994791767967	-68.9231103975687	Añelo	INDEC	58014005000	58014005	Aguada San Roque	585014	Aguada San Roque	AGUADA SAN ROQUE	58	Neuquén	58014
        Localidad simple	-38.3514440221419	-68.7919715586172	Añelo	INDEC	58014010000	58014010	Añelo	580014	Añelo	AÑELO	58	Neuquén	58014
        Localidad simple	-38.6257824069657	-68.2986456816821	Añelo	INDEC	58014020000	58014020	San Patricio del Chañar	580021	San Patricio del Chañar	SAN PATRICIO DEL CHAÑAR	58	Neuquén	58014
        Localidad simple	-39.5578638822685	-70.5932894653763	Catán Lil	INDEC	58021010000	58021010	Las Coloradas	580028	Las Coloradas	LAS COLORADAS	58	Neuquén	58021
        Localidad simple	-47.0257940308205	-67.2542856564871	Deseado	INDEC	78014030000	78014030	Fitz Roy			FITZ ROY	78	Santa Cruz	78014
        Localidad simple	-40.0465538638606	-70.077319578901	Collón Curá	INDEC	58028010000	58028010	Piedra del Águila	580035	Piedra del Águila	PIEDRA DEL AGUILA	58	Neuquén	58028
        Localidad simple	-39.8218007278609	-70.1028884849476	Collón Curá	INDEC	58028020000	58028020	Santo Tomás	585035	Santo Tomás	SANTO TOMAS	58	Neuquén	58028
        Localidad simple	-39.0743997961308	-68.5703350642529	Confluencia	INDEC	58035010000	58035010	Arroyito	580077	Senillosa	ARROYITO	58	Neuquén	58035
        Localidad simple	-38.7543907123239	-68.1803399743279	Confluencia	INDEC	58035020000	58035020	Barrio Ruca Luhé	580091	Vista Alegre	BARRIO RUCA LUHE	58	Neuquén	58035
        Localidad simple	-38.8275777081112	-68.1532191639297	Confluencia	INDEC	58035030000	58035030	Centenario	580042	Centenario	CENTENARIO	58	Neuquén	58035
        Componente de localidad compuesta	-38.9366016135518	-69.2413390332884	Confluencia	INDEC	58035040000	58035040	Cutral Có	580049	Cutral Có	CUTRAL CO	58	Neuquén	58035
        Localidad simple	-39.2589786425295	-68.8268723660918	Confluencia	INDEC	58035050000	58035050	El Chocón	580084	Villa el Chocón	EL CHOCON	58	Neuquén	58035
        Localidad simple	-38.5383043330689	-68.557547832041	Confluencia	INDEC	58035060000	58035060	Mari Menuco			MARI MENUCO	58	Neuquén	58035
        Componente de localidad compuesta	-38.9492856796033	-68.0839057621977	Confluencia	INDEC	58035070000	58035070	Neuquén	580056	Neuquén	NEUQUEN	58	Neuquén	58035
        Localidad simple	-38.878684024658	-68.1001707201744	Confluencia	INDEC	58035080000	58035080	11 de Octubre	580042	Centenario	11 DE OCTUBRE	58	Neuquén	58035
        Componente de localidad compuesta	-38.9290709532125	-69.2021594435231	Confluencia	INDEC	58035090000	58035090	Plaza Huincul	580063	Plaza Huincul	PLAZA HUINCUL	58	Neuquén	58035
        Componente de localidad compuesta	-38.9510561611213	-68.2478403865049	Confluencia	INDEC	58035100000	58035100	Plottier	580070	Plottier	PLOTTIER	58	Neuquén	58035
        Localidad simple	-39.0113034801537	-68.4333833911279	Confluencia	INDEC	58035110000	58035110	Senillosa	580077	Senillosa	SENILLOSA	58	Neuquén	58035
        Localidad simple	-39.2610101785628	-68.7842564223565	Confluencia	INDEC	58035120000	58035120	Villa El Chocón	580084	Villa el Chocón	VILLA EL CHOCON	58	Neuquén	58035
        Localidad simple	-38.7277123127679	-68.1721438862367	Confluencia	INDEC	58035130000	58035130	Vista Alegre Norte	580091	Vista Alegre	VISTA ALEGRE NORTE	58	Neuquén	58035
        Localidad simple	-38.7715537254998	-68.1369187198489	Confluencia	INDEC	58035140000	58035140	Vista Alegre Sur	580091	Vista Alegre	VISTA ALEGRE SUR	58	Neuquén	58035
        Localidad simple	-37.3792566593514	-70.2723772223192	Chos Malal	INDEC	58042010000	58042010	Chos Malal	580098	Chos Malal	CHOS MALAL	58	Neuquén	58042
        Localidad simple	-37.0428490399834	-70.3347175778926	Chos Malal	INDEC	58042020000	58042020	Tricao Malal	580105	Tricao Malal	TRICAO MALAL	58	Neuquén	58042
        Localidad simple	-37.1337365202592	-70.3969231250344	Chos Malal	INDEC	58042030000	58042030	Villa del Curi Leuvú	585056	Villa Curi Leuvú	VILLA DEL CURI LEUVU	58	Neuquén	58042
        Localidad simple	-39.9494720138355	-71.0703335609136	Huiliches	INDEC	58049010000	58049010	Junín de los Andes	580112	Junín de los Andes	JUNIN DE LOS ANDES	58	Neuquén	58049
        Localidad simple	-40.1537600653137	-71.3550098619322	Lácar	INDEC	58056010000	58056010	San Martín de los Andes	580119	San Martín de los Andes	SAN MARTIN DE LOS ANDES	58	Neuquén	58056
        Localidad simple	-40.3816875508143	-71.2616152793248	Lácar	INDEC	58056020000	58056020	Villa Lago Meliquina			LAGO MELIQUINA	58	Neuquén	58056
        Localidad simple	-37.929624048638	-70.0562158162232	Loncopué	INDEC	58063010000	58063010	Chorriaca	585063	Chorriaca	CHORRIACA	58	Neuquén	58063
        Localidad simple	-38.0699432722928	-70.6124039046889	Loncopué	INDEC	58063020000	58063020	Loncopué	580126	Loncopué	LONCOPUE	58	Neuquén	58063
        Localidad simple	-40.7631760692681	-71.6451967512926	Los Lagos	INDEC	58070010000	58070010	Villa La Angostura	580133	Villa la Angostura	VILLA LA ANGOSTURA	58	Neuquén	58070
        Localidad simple	-40.6515336234792	-71.4069733427812	Los Lagos	INDEC	58070020000	58070020	Villa Traful	585070	Villa Traful	VILLA TRAFUL	58	Neuquén	58070
        Localidad simple	-37.1814100578481	-70.6690765415839	Minas	INDEC	58077010000	58077010	Andacollo	580140	Andacollo	ANDACOLLO	58	Neuquén	58077
        Localidad simple	-37.162253742004	-70.6240350766311	Minas	INDEC	58077020000	58077020	Huinganco	580147	Huinganco	HUINGANCO	58	Neuquén	58077
        Localidad simple	-36.9881343331798	-70.7487001311443	Minas	INDEC	58077030000	58077030	Las Ovejas	580154	Las Ovejas	LAS OVEJAS	58	Neuquén	58077
        Localidad simple	-37.2079272879054	-70.8208608595818	Minas	INDEC	58077040000	58077040	Los Miches	580161	Los Miches	LOS MICHES	58	Neuquén	58077
        Localidad simple	-36.7475538529054	-70.7652790008941	Minas	INDEC	58077050000	58077050	Manzano Amargo	585084	Manzano Amargo	MANZANO AMARGO	58	Neuquén	58077
        Localidad simple	-36.8575631715293	-70.6784177984494	Minas	INDEC	58077060000	58077060	Varvarco	585091	Varvarco - Invernada Vieja	VARVARCO	58	Neuquén	58077
        Localidad simple	-37.1209838887878	-70.7687465935033	Minas	INDEC	58077070000	58077070	Villa del Nahueve	585098	Villa del Nahueve	VILLA DEL NAHUEVE	58	Neuquén	58077
        Localidad simple	-37.8741211534774	-71.0537792468958	Ñorquín	INDEC	58084010000	58084010	Caviahue	580168	Caviahue-Copahue	CAVIAHUE	58	Neuquén	58084
        Localidad simple	-37.8191699254756	-71.0991107043764	Ñorquín	INDEC	58084020000	58084020	Copahue	580168	Caviahue-Copahue	COPAHUE	58	Neuquén	58084
        Localidad simple	-37.4408647694624	-70.6441818646861	Ñorquín	INDEC	58084030000	58084030	El Cholar	580175	El Cholar	EL CHOLAR	58	Neuquén	58084
        Localidad simple	-37.6415832578483	-70.5790877358744	Ñorquín	INDEC	58084040000	58084040	El Huecú	580182	El Huecú	EL HUECU	58	Neuquén	58084
        Localidad simple	-37.5169103878888	-70.2503863712688	Ñorquín	INDEC	58084050000	58084050	Taquimilán			TAQUIMILAN	58	Neuquén	58084
        Localidad simple	-36.8247372962673	-69.9164782914754	Pehuenches	INDEC	58091010000	58091010	Barrancas	580196	Barrancas	BARRANCAS	58	Neuquén	58091
        Localidad simple	-37.0507876062807	-69.873851086363	Pehuenches	INDEC	58091020000	58091020	Buta Ranquil	580203	Buta Ranquil	BUTA RANQUIL	58	Neuquén	58091
        Localidad simple	-37.5865104880568	-68.2686075936205	Pehuenches	INDEC	58091030000	58091030	Octavio Pico	585105	Octavio Pico	OCTAVIO PICO	58	Neuquén	58091
        Localidad simple	-37.3899075901743	-68.9309943279283	Pehuenches	INDEC	58091040000	58091040	Rincón de los Sauces	580210	Rincón de los Sauces	RINCON DE LOS SAUCES	58	Neuquén	58091
        Localidad simple	-47.1847032165887	-67.145582198474	Deseado	INDEC	78014040000	78014040	Jaramillo			JARAMILLO	78	Santa Cruz	78014
        Localidad simple	-39.4750725824587	-69.5298228549207	Picún Leufú	INDEC	58098005000	58098005	El Sauce	585112	El Sauce	EL SAUCE	58	Neuquén	58098
        Localidad simple	-39.3393978445221	-69.8442147950698	Picún Leufú	INDEC	58098010000	58098010	Paso Aguerre	585119	Paso Aguerre	PASO AGUERRE	58	Neuquén	58098
        Localidad simple	-39.5191361709356	-69.2962673114558	Picún Leufú	INDEC	58098020000	58098020	Picún Leufú	580217	Picún Leufú	PICUN LEUFU	58	Neuquén	58098
        Localidad simple	-38.4079798578262	-70.0276785984599	Picunches	INDEC	58105010000	58105010	Bajada del Agrio	580224	Bajada del Agrio	BAJADA DEL AGRIO	58	Neuquén	58105
        Localidad simple	-38.5574702395959	-70.3665560313021	Picunches	INDEC	58105020000	58105020	La Buitrera	580231	Las Lajas	LA BUITRERA	58	Neuquén	58105
        Localidad simple	-38.5292612011937	-70.3689502898328	Picunches	INDEC	58105030000	58105030	Las Lajas	580231	Las Lajas	LAS LAJAS	58	Neuquén	58105
        Localidad simple	-38.3213178634179	-69.8143687558623	Picunches	INDEC	58105040000	58105040	Quili Malal	585126	Quili Malal	QUILI MALAL	58	Neuquén	58105
        Localidad simple	-38.8384807985925	-70.1962106815081	Zapala	INDEC	58112010000	58112010	Los Catutos	585140	Los Catutos	LOS CATUTOS	58	Neuquén	58112
        Entidad	-38.7532470280083	-70.0275921805241	Zapala	INDEC	58112020001	58112020	Mariano Moreno	580238	Mariano Moreno	COVUNCO CENTRO	58	Neuquén	58112
        Entidad	-38.7642591265553	-70.0386669795207	Zapala	INDEC	58112020002	58112020	Mariano Moreno	580238	Mariano Moreno	MARIANO MORENO	58	Neuquén	58112
        Localidad simple	-38.865500620555	-69.750265287383	Zapala	INDEC	58112030000	58112030	Ramón M. Castro	585147	Ramón Castro	RAMON M. CASTRO	58	Neuquén	58112
        Localidad simple	-38.8961687323721	-70.0668545323772	Zapala	INDEC	58112040000	58112040	Zapala	580245	Zapala	ZAPALA	58	Neuquén	58112
        Localidad simple	-41.0954235915941	-63.9092240856567	Adolfo Alsina	INDEC	62007010000	62007010	Bahía Creek			BAHIA CREEK	62	Río Negro	62007
        Localidad simple	-41.043074401021	-62.8212339732456	Adolfo Alsina	INDEC	62007020000	62007020	El Cóndor	620014	Viedma	EL CONDOR	62	Río Negro	62007
        Localidad simple	-40.8040464324129	-63.119258465235	Adolfo Alsina	INDEC	62007030000	62007030	El Juncal	620014	Viedma	EL JUNCAL	62	Río Negro	62007
        Localidad simple	-40.4302951883973	-63.6719140103256	Adolfo Alsina	INDEC	62007040000	62007040	Guardia Mitre	620007	Guardia Mitre	GUARDIA MITRE	62	Río Negro	62007
        Localidad simple	-41.1541008885686	-63.1234800366543	Adolfo Alsina	INDEC	62007050000	62007050	La Lobería			LA LOBERIA	62	Río Negro	62007
        Localidad simple	-40.8722977227525	-62.9146635826372	Adolfo Alsina	INDEC	62007060000	62007060	Loteo Costa de Río			LOTEO COSTA DE RIO	62	Río Negro	62007
        Localidad simple	-41.0178488120515	-64.1403933053127	Adolfo Alsina	INDEC	62007070000	62007070	Pozo Salado			POZO SALADO	62	Río Negro	62007
        Localidad simple	-40.7472509496074	-63.2646524967149	Adolfo Alsina	INDEC	62007080000	62007080	San Javier	625014	San Javier	SAN JAVIER	62	Río Negro	62007
        Componente de localidad compuesta	-40.8093232712389	-62.9853203682712	Adolfo Alsina	INDEC	62007090000	62007090	Viedma	620014	Viedma	VIEDMA	62	Río Negro	62007
        Localidad simple	-39.1585373145235	-66.1856066477135	Avellaneda	INDEC	62014010000	62014010	Barrio Unión	620021	Chimpay	BARRIO UNION	62	Río Negro	62014
        Localidad simple	-39.0881631155042	-66.5209546613811	Avellaneda	INDEC	62014020000	62014020	Chelforó			CHELFORO	62	Río Negro	62014
        Localidad simple	-39.1651527318617	-66.1447069274027	Avellaneda	INDEC	62014030000	62014030	Chimpay	620021	Chimpay	CHIMPAY	62	Río Negro	62014
        Localidad simple	-39.2884543350453	-65.663280823108	Avellaneda	INDEC	62014040000	62014040	Choele Choel	620028	Choele Choel	CHOELE CHOEL	62	Río Negro	62014
        Localidad simple	-39.1858299915745	-65.9563191181266	Avellaneda	INDEC	62014050000	62014050	Coronel Belisle	620035	Coronel Belisle	CORONEL BELISLE	62	Río Negro	62014
        Localidad simple	-39.2026912901608	-65.7409172296959	Avellaneda	INDEC	62014060000	62014060	Darwin	620042	Darwin	DARWIN	62	Río Negro	62014
        Localidad simple	-39.4232652920959	-65.7014504976777	Avellaneda	INDEC	62014070000	62014070	Lamarque	620049	Lamarque	LAMARQUE	62	Río Negro	62014
        Localidad simple	-39.3088800984468	-65.7648714193881	Avellaneda	INDEC	62014080000	62014080	Luis Beltrán	620056	Luis Beltran	LUIS BELTRAN	62	Río Negro	62014
        Localidad simple	-39.4841604573414	-65.6124600513947	Avellaneda	INDEC	62014090000	62014090	Pomona	620063	Pomona	POMONA	62	Río Negro	62014
        Localidad simple	-41.1700881080441	-71.3851119262238	Bariloche	INDEC	62021005000	62021005	Arelauquen	620077	San Carlos de Bariloche	VILLA ARELAUQUEN	62	Río Negro	62021
        Localidad simple	-41.1814203033089	-71.3493437707973	Bariloche	INDEC	62021010000	62021010	Barrio El Pilar	620077	San Carlos de Bariloche	BARRIO EL PILAR	62	Río Negro	62021
        Localidad simple	-41.0947497360429	-71.505527376881	Bariloche	INDEC	62021020000	62021020	Colonia Suiza	620077	San Carlos de Bariloche	COLONIA SUIZA	62	Río Negro	62021
        Localidad simple	-41.9804859657332	-71.5336172136647	Bariloche	INDEC	62021030000	62021030	El Bolsón	620070	El Bolson	EL BOLSON	62	Río Negro	62021
        Localidad simple	-41.6571199223738	-71.4592776287102	Bariloche	INDEC	62021040000	62021040	El Foyel	625028	El Manso	EL FOYEL	62	Río Negro	62021
        Localidad simple	-41.8412736734112	-71.5091292986442	Bariloche	INDEC	62021047000	62021047	Mallín Ahogado	620070	El Bolson	MALLIN AHOGADO	62	Río Negro	62021
        Localidad simple	-41.5822159155763	-71.5012934002795	Bariloche	INDEC	62021050000	62021050	Río Villegas	625028	El Manso	RIO VILLEGAS	62	Río Negro	62021
        Localidad simple con entidad	-41.1369282850916	-71.2990645403112	Bariloche	INDEC	62021060000	62021060	San Carlos de Bariloche	620077	San Carlos de Bariloche	SAN CARLOS DE BARILOCHE	62	Río Negro	62021
        Entidad	-41.1192625668718	-71.351142488652	Bariloche	INDEC	62021060001	62021060	San Carlos de Bariloche			SAN CARLOS DE BARILOCHE	62	Río Negro	62021
        Entidad	-41.0649702714092	-71.4726736795373	Bariloche	INDEC	62021060002	62021060	San Carlos de Bariloche			VILLA CAMPANARIO	62	Río Negro	62021
        Entidad	-41.0697604387258	-71.5396513534561	Bariloche	INDEC	62021060003	62021060	San Carlos de Bariloche	620077	San Carlos de Bariloche	VILLA LLAO LLAO	62	Río Negro	62021
        Localidad simple	-41.1666351264313	-71.4375745404969	Bariloche	INDEC	62021080000	62021080	Villa Catedral	620077	San Carlos de Bariloche	VILLA CATEDRAL	62	Río Negro	62021
        Localidad simple	-41.1575793746786	-71.4131558610974	Bariloche	INDEC	62021100000	62021100	Villa Los Coihues	620077	San Carlos de Bariloche	VILLA LOS COIHUES	62	Río Negro	62021
        Localidad simple	-41.3495536441427	-71.5090416294131	Bariloche	INDEC	62021110000	62021110	Villa Mascardi			VILLA MASCARDI	62	Río Negro	62021
        Localidad simple	-40.1405715071916	-64.3297427915782	Conesa	INDEC	62028010000	62028010	Barrio Colonia Conesa	620084	Gral. Conesa	BARRIO COLONIA CONESA	62	Río Negro	62028
        Localidad simple	-40.1047354258125	-64.452961945825	Conesa	INDEC	62028020000	62028020	General Conesa	620084	Gral. Conesa	GENERAL CONESA	62	Río Negro	62028
        Localidad simple	-40.0564744924401	-64.4726087632632	Conesa	INDEC	62028030000	62028030	Barrio Planta Compresora de Gas			BARRIO PLANTA COMPRESORA DE GAS	62	Río Negro	62028
        Localidad simple	-39.9787588388031	-68.8683979876685	El Cuy	INDEC	62035010000	62035010	Aguada Guzmán	625077	Aguada Guzman	AGUADA GUZMAN	62	Río Negro	62035
        Localidad simple	-39.7252943733893	-68.4939533269128	El Cuy	INDEC	62035020000	62035020	Cerro Policía	620091	Allen	CERRO POLICIA	62	Río Negro	62035
        Localidad simple	-39.9230912187031	-68.3369498427779	El Cuy	INDEC	62035030000	62035030	El Cuy	625056	El Cuy	EL CUY	62	Río Negro	62035
        Localidad simple	-38.9840690690676	-68.1403501822625	El Cuy	INDEC	62035040000	62035040	Las Perlas	620133	Cipolletti	LAS PERLAS	62	Río Negro	62035
        Localidad simple	-40.4229029710507	-69.6143877108253	El Cuy	INDEC	62035050000	62035050	Mencué	625070	Mencuen	MENCUE	62	Río Negro	62035
        Localidad simple	-39.8282845926545	-69.5089726874799	El Cuy	INDEC	62035060000	62035060	Naupa Huen	625098	Naupa Huen	NAUPA HUEN	62	Río Negro	62035
        Componente de localidad compuesta	-39.1153330396607	-67.6264974744394	El Cuy	INDEC	62035070000	62035070	Paso Córdova	620161	Gral. Roca	PASO CORDOVA	62	Río Negro	62035
        Localidad simple	-39.1404827453952	-66.7285641693515	El Cuy	INDEC	62035080000	62035080	Valle Azul	625112	Valle Azul	VALLE AZUL	62	Río Negro	62035
        Localidad simple	-38.9795106570689	-67.828021398161	General Roca	INDEC	62042010000	62042010	Allen	620091	Allen	ALLEN	62	Río Negro	62042
        Localidad simple	-38.7513229744846	-68.0085536061591	General Roca	INDEC	62042020000	62042020	Paraje Arroyón (Bajo San Cayetano)			BAJO SAN CAYETANO	62	Río Negro	62042
        Localidad simple	-38.7246633358539	-68.1580560913419	General Roca	INDEC	62042030000	62042030	Barda del Medio	620140	Contralmirante Cordero	BARDA DEL MEDIO	62	Río Negro	62042
        Localidad simple	-39.0309641335839	-67.7863228650653	General Roca	INDEC	62042040000	62042040	Barrio Blanco	620091	Allen	BARRIO BLANCO	62	Río Negro	62042
        Localidad simple	-39.0230092190233	-67.8005036132986	General Roca	INDEC	62042050000	62042050	Barrio Calle Ciega Nº 10	620091	Allen	BARRIO CALLE CIEGA N? 10	62	Río Negro	62042
        Localidad simple	-39.0430891464152	-67.7520658420811	General Roca	INDEC	62042060000	62042060	Barrio Calle Ciega Nº 6	620091	Allen	BARRIO CALLE CIEGA N? 6	62	Río Negro	62042
        Localidad simple	-39.0682963331395	-67.6389236900117	General Roca	INDEC	62042070000	62042070	Barrio Canale	620161	Gral. Roca	BARRIO CANALE	62	Río Negro	62042
        Localidad simple	-39.0516494451284	-67.6345853523327	General Roca	INDEC	62042080000	62042080	Barrio Chacra Monte	620161	Gral. Roca	BARRIO CHACRA MONTE	62	Río Negro	62042
        Localidad simple	-39.0418587269806	-67.8075970544366	General Roca	INDEC	62042090000	62042090	Barrio Costa Este	620091	Allen	BARRIO COSTA ESTE	62	Río Negro	62042
        Localidad simple	-38.9435967131876	-67.9095130600985	General Roca	INDEC	62042100000	62042100	Barrio Costa Linda	620154	Gral. Fdez. Oro	BARRIO COSTA LINDA	62	Río Negro	62042
        Localidad simple	-39.0280740237159	-67.8406950461568	General Roca	INDEC	62042110000	62042110	Barrio Costa Oeste	620091	Allen	BARRIO COSTA OESTE	62	Río Negro	62042
        Localidad simple	-37.688801948065	-67.8695487107459	General Roca	INDEC	62042115000	62042115	Barrio Destacamento	625105	Peñas Blancas	BARRIO DESTACAMENTO	62	Río Negro	62042
        Localidad simple	-38.6719231721601	-68.2343296924898	General Roca	INDEC	62042120000	62042120	Barrio El Labrador	620098	Campo Grande	BARRIO EL LABRADOR	62	Río Negro	62042
        Localidad simple	-38.9965483470472	-67.7600066651023	General Roca	INDEC	62042130000	62042130	Barrio El Maruchito	620091	Allen	BARRIO EL MARUCHITO	62	Río Negro	62042
        Localidad simple	-39.0639270176593	-67.5120162799717	General Roca	INDEC	62042140000	62042140	Barrio El Petróleo	620161	Gral. Roca	BARRIO EL PETROLEO	62	Río Negro	62042
        Localidad simple	-39.001652251504	-67.8506842254546	General Roca	INDEC	62042143000	62042143	Barrio Emergente	620091	Allen	BARRIO EMERGENTE	62	Río Negro	62042
        Localidad simple	-39.0531680628778	-67.472967428649	General Roca	INDEC	62042147000	62042147	Barrio Fátima	620112	Cervantes	COLONIA FATIMA	62	Río Negro	62042
        Localidad simple	-39.071916321907	-67.7129100460388	General Roca	INDEC	62042150000	62042150	Barrio Frontera	620161	Gral. Roca	BARRIO FRONTERA	62	Río Negro	62042
        Localidad simple	-39.0416838101557	-67.7340081423714	General Roca	INDEC	62042160000	62042160	Barrio Guerrico	620091	Allen	BARRIO GUERRICO	62	Río Negro	62042
        Localidad simple	-38.9966443708843	-67.9181463726224	General Roca	INDEC	62042170000	62042170	Barrio Isla 10	620154	Gral. Fdez. Oro	BARRIO ISLA 10	62	Río Negro	62042
        Localidad simple	-39.0494648024568	-67.217793659392	General Roca	INDEC	62042180000	62042180	Barrio La Barda	620168	Ingeniero Huergo	BARRIO LA BARDA	62	Río Negro	62042
        Localidad simple	-39.0753070627553	-67.5392261916358	General Roca	INDEC	62042190000	62042190	Barrio La Costa	620161	Gral. Roca	BARRIO LA COSTA	62	Río Negro	62042
        Localidad simple	-39.0923450479727	-67.2007281871129	General Roca	INDEC	62042200000	62042200	Barrio La Costa	620168	Ingeniero Huergo	BARRIO LA COSTA	62	Río Negro	62042
        Localidad simple	-39.0331815789057	-67.3862477660724	General Roca	INDEC	62042210000	62042210	Barrio La Defensa	620112	Cervantes	BARRIO LA DEFENSA	62	Río Negro	62042
        Localidad simple	-39.0370774236916	-67.7820594526764	General Roca	INDEC	62042215000	62042215	Barrio La Herradura	620091	Allen	BARRIO LA HERRADURA	62	Río Negro	62042
        Localidad simple	-39.0772588097086	-67.5794991279564	General Roca	INDEC	62042230000	62042230	Barrio La Ribera - Barrio APYCAR	620161	Gral. Roca	BARRIO LA RIBERA - BARRIO APYCAR	62	Río Negro	62042
        Localidad simple	-39.0298112121202	-67.5009911848666	General Roca	INDEC	62042240000	62042240	Puente Cero	620161	Gral. Roca	BARRIO LAS ANGUSTIAS	62	Río Negro	62042
        Localidad simple	-39.0514047890722	-67.3468986066245	General Roca	INDEC	62042245000	62042245	Barrio Luisillo	620175	Mainque	BARRIO LUISILLO	62	Río Negro	62042
        Localidad simple	-39.0827873095255	-67.6523985545637	General Roca	INDEC	62042250000	62042250	Barrio Mar del Plata	620161	Gral. Roca	BARRIO MAR DEL PLATA	62	Río Negro	62042
        Localidad simple	-38.9901442627179	-67.9613095600255	General Roca	INDEC	62042260000	62042260	Barrio María Elvira	620133	Cipolletti	BARRIO MARIA ELVIRA	62	Río Negro	62042
        Localidad simple	-39.1306874014844	-66.8941649716278	General Roca	INDEC	62042265000	62042265	Barrio Moño Azul	620119	Chichinales	BARRIO MOÑO AZUL	62	Río Negro	62042
        Localidad simple	-39.0907183953718	-67.5898603467619	General Roca	INDEC	62042270000	62042270	Barrio Mosconi	620161	Gral. Roca	BARRIO MOSCONI	62	Río Negro	62042
        Localidad simple	-38.8637279259729	-68.0231905596235	General Roca	INDEC	62042280000	62042280	Barrio Norte	620133	Cipolletti	BARRIO NORTE	62	Río Negro	62042
        Localidad simple	-37.6748275939008	-67.8736521306821	General Roca	INDEC	62042297000	62042297	Barrio Pinar	625105	Peñas Blancas	BARRIO PINAR	62	Río Negro	62042
        Localidad simple	-39.0430283937958	-67.4642040039168	General Roca	INDEC	62042310000	62042310	Barrio Porvenir	620112	Cervantes	BARRIO PORVENIR	62	Río Negro	62042
        Entidad	-38.8937119363148	-67.971068167392	General Roca	INDEC	62042330001	62042330	Barrio Puente 83	620133	Cipolletti	BARRIO EL TREINTA	62	Río Negro	62042
        Entidad	-38.9655980210737	-67.9509550220406	General Roca	INDEC	62042330002	62042330	Barrio Puente 83	620133	Cipolletti	BARRIO GORETTI	62	Río Negro	62042
        Entidad	-38.9655980210737	-67.9509550220406	General Roca	INDEC	62042330003	62042330	Barrio Puente 83	620133	Cipolletti	BARRIO PUENTE 83	62	Río Negro	62042
        Entidad	-38.9589646944033	-67.9492414342193	General Roca	INDEC	62042330004	62042330	Barrio Puente 83	620133	Cipolletti	BARRIO PUENTE DE MADERA	62	Río Negro	62042
        Entidad	-38.9386794797604	-67.9440033559728	General Roca	INDEC	62042330005	62042330	Barrio Puente 83	620133	Cipolletti	BARRIO TRES LUCES	62	Río Negro	62042
        Entidad	-38.9655980210737	-67.9509550220406	General Roca	INDEC	62042330006	62042330	Barrio Puente 83	620133	Cipolletti	TRES LUCES	62	Río Negro	62042
        Localidad simple	-39.0282517975929	-67.2984549123711	General Roca	INDEC	62042335000	62042335	Barrio Santa Lucia	620175	Mainque	SANTA LUCIA	62	Río Negro	62042
        Localidad simple	-39.1260785745275	-67.1035165050666	General Roca	INDEC	62042340000	62042340	Barrio Santa Rita	620182	Villa Regina	BARRIO SANTA RITA	62	Río Negro	62042
        Localidad simple	-38.979186876102	-67.941976373184	General Roca	INDEC	62042350000	62042350	Barrio Unión	620154	Gral. Fdez. Oro	BARRIO UNION	62	Río Negro	62042
        Localidad simple	-37.8815288625891	-67.7945569701758	General Roca	INDEC	62042360000	62042360	Catriel	620105	Catriel	CATRIEL	62	Río Negro	62042
        Localidad simple	-39.0515785846632	-67.3930560378066	General Roca	INDEC	62042370000	62042370	Cervantes	620112	Cervantes	CERVANTES	62	Río Negro	62042
        Localidad simple	-39.1148814347412	-66.9425150029993	General Roca	INDEC	62042380000	62042380	Chichinales	620119	Chichinales	CHICHINALES	62	Río Negro	62042
        Localidad simple con entidad	-38.8275620197177	-68.0660962055201	General Roca	INDEC	62042390000	62042390	Cinco Saltos	620126	Cinco Saltos	CINCO SALTOS	62	Río Negro	62042
        Entidad	-38.7961848310008	-68.0734334344623	General Roca	INDEC	62042390001	62042390	Cinco Saltos	620126	Cinco Saltos	BARRIO PRESIDENTE PERON	62	Río Negro	62042
        Entidad	-38.8405541009144	-68.0623005797764	General Roca	INDEC	62042390002	62042390	Cinco Saltos	620126	Cinco Saltos	CINCO SALTOS	62	Río Negro	62042
        Componente de localidad compuesta con entidad	-38.924558895075	-68.035384250397	General Roca	INDEC	62042400000	62042400	Cipolletti	620133	Cipolletti	CIPOLLETTI	62	Río Negro	62042
        Entidad	-38.9245848988383	-68.0307899442508	General Roca	INDEC	62042400001	62042400	Cipolletti	620133	Cipolletti	BARRIO LA LOR	62	Río Negro	62042
        Entidad	-38.9220596281776	-67.9955493313849	General Roca	INDEC	62042400002	62042400	Cipolletti	620133	Cipolletti	CIPOLLETTI	62	Río Negro	62042
        Localidad simple	-38.7570062611988	-68.0994972104866	General Roca	INDEC	62042410000	62042410	Contralmirante Cordero	620140	Contralmirante Cordero	CONTRALMIRANTE CORDERO	62	Río Negro	62042
        Localidad simple	-38.8871754648156	-68.0068433988189	General Roca	INDEC	62042420000	62042420	Ferri	620133	Cipolletti	FERRI	62	Río Negro	62042
        Localidad simple	-39.0795501222919	-67.1575508259755	General Roca	INDEC	62042430000	62042430	General Enrique Godoy	620147	Gral. Enrique Godoy	GENERAL ENRIQUE GODOY	62	Río Negro	62042
        Localidad simple	-38.95436020459	-67.9251089784989	General Roca	INDEC	62042440000	62042440	General Fernández Oro	620154	Gral. Fdez. Oro	GENERAL FERNANDEZ ORO	62	Río Negro	62042
        Localidad simple con entidad	-39.0267025182087	-67.5748540962425	General Roca	INDEC	62042450000	62042450	General Roca	620161	Gral. Roca	GENERAL ROCA	62	Río Negro	62042
        Entidad	-39.055737401237	-67.5935301061017	General Roca	INDEC	62042450001	62042450	General Roca	620161	Gral. Roca	BARRIO PINO AZUL	62	Río Negro	62042
        Localidad simple	-39.0711757468082	-67.2328876350348	General Roca	INDEC	62042460000	62042460	Ingeniero Luis A. Huergo	620168	Ingeniero Huergo	INGENIERO LUIS A. HUERGO	62	Río Negro	62042
        Localidad simple	-39.1114281023989	-66.9939096262054	General Roca	INDEC	62042470000	62042470	Ingeniero Otto Krause	620119	Chichinales	INGENIERO OTTO KRAUSE	62	Río Negro	62042
        Localidad simple	-39.0637561999382	-67.3042811813575	General Roca	INDEC	62042480000	62042480	Mainqué	620175	Mainque	MAINQUE	62	Río Negro	62042
        Componente de localidad compuesta	-39.1077504096641	-67.6277074998828	General Roca	INDEC	62042490000	62042490	Paso Córdova	620161	Gral. Roca	PASO CORDOVA	62	Río Negro	62042
        Localidad simple	-38.7010665100453	-68.0277179698786	General Roca	INDEC	62042500000	62042500	Península Ruca Co			PENINSULA RUCA CO	62	Río Negro	62042
        Localidad simple	-38.6856409614896	-68.1580780282182	General Roca	INDEC	62042520000	62042520	Sargento Vidal	620098	Campo Grande	SARGENTO VIDAL	62	Río Negro	62042
        Localidad simple	-39.1283463654662	-67.0481125141998	General Roca	INDEC	62042530000	62042530	Villa Alberdi	620182	Villa Regina	VILLA ALBERDI	62	Río Negro	62042
        Localidad simple	-39.1258079817539	-66.9976300412367	General Roca	INDEC	62042540000	62042540	Villa del Parque	620119	Chichinales	VILLA DEL PARQUE	62	Río Negro	62042
        Localidad simple	-38.6806041543676	-68.2157180851266	General Roca	INDEC	62042550000	62042550	Villa Manzano	620098	Campo Grande	VILLA MANZANO	62	Río Negro	62042
        Localidad simple	-39.0962966627004	-67.0828092630939	General Roca	INDEC	62042560000	62042560	Villa Regina	620182	Villa Regina	VILLA REGINA	62	Río Negro	62042
        Localidad simple	-38.7064851078187	-68.1737455217997	General Roca	INDEC	62042570000	62042570	Villa San Isidro	620098	Campo Grande	VILLA SAN ISIDRO	62	Río Negro	62042
        Localidad simple	-41.0632755118249	-67.5965600975269	9 de julio	INDEC	62049010000	62049010	Comicó	625210	Comico	COMICO	62	Río Negro	62049
        Localidad simple	-41.8812021704501	-66.9407404270844	9 de julio	INDEC	62049020000	62049020	Cona Niyeu	625161	Cona Niyeu	CONA NIYEU	62	Río Negro	62049
        Localidad simple	-40.5085400133825	-67.2619207148835	9 de julio	INDEC	62049030000	62049030	Ministro Ramos Mexía	620189	Ministro Ramos Mexia	MINISTRO RAMOS MEXIA	62	Río Negro	62049
        Localidad simple	-41.3591519247092	-67.9314763422669	9 de julio	INDEC	62049040000	62049040	Prahuaniyeu	625259	Prahuaniyeu	PRAHUANIYEU	62	Río Negro	62049
        Localidad simple	-40.5850993527615	-67.7555445864448	9 de julio	INDEC	62049050000	62049050	Sierra Colorada	620196	Sierra Colorada	SIERRA COLORADA	62	Río Negro	62049
        Localidad simple	-40.8508277432449	-66.9816846927042	9 de julio	INDEC	62049060000	62049060	Treneta	625119	Rincon de Treneta	TRENETA	62	Río Negro	62049
        Localidad simple	-40.8429274507992	-67.1922500656909	9 de julio	INDEC	62049070000	62049070	Yaminué			YAMINUE	62	Río Negro	62049
        Localidad simple	-41.4504057812872	-70.6827894626766	Ñorquinco	INDEC	62056010000	62056010	Las Bayas	620224	Pilcaniyeu	LAS BAYAS	62	Río Negro	62056
        Localidad simple	-41.7698416427745	-70.1708632216436	Ñorquinco	INDEC	62056020000	62056020	Mamuel Choique	625238	Mamuel Choique	MAMUEL CHOIQUE	62	Río Negro	62056
        Localidad simple	-41.843448611748	-70.8943932149944	Ñorquinco	INDEC	62056030000	62056030	Ñorquincó	620203	Ñorquinco	ÑORQUINCO	62	Río Negro	62056
        Localidad simple	-41.534892227381	-69.854645970072	Ñorquinco	INDEC	62056040000	62056040	Ojos de Agua	625245	Ojos de Agua	OJOS DE AGUA	62	Río Negro	62056
        Localidad simple	-41.7167227835394	-70.4710839014636	Ñorquinco	INDEC	62056050000	62056050	Río Chico	625266	Rio Chico	RIO CHICO	62	Río Negro	62056
        Localidad simple	-39.041876855319	-63.9985907357656	Pichi Mahuida	INDEC	62063005000	62063005	Barrio Esperanza	620210	Rìo Colorado	BARRIO ESPERANZA	62	Río Negro	62063
        Localidad simple	-39.0361229259361	-64.0139390564756	Pichi Mahuida	INDEC	62063010000	62063010	Colonia Juliá y Echarren	620210	Rìo Colorado	COLONIA JULIA Y ECHARREN	62	Río Negro	62063
        Localidad simple	-39.0125652171478	-64.0650447267437	Pichi Mahuida	INDEC	62063013000	62063013	Juventud Unida	620210	Rìo Colorado	JUVENTUD UNIDA	62	Río Negro	62063
        Localidad simple	-38.8296136177488	-64.9374198062825	Pichi Mahuida	INDEC	62063017000	62063017	Pichi Mahuida	420189	La Adela	PICHI MAHUIDA	62	Río Negro	62063
        Componente de localidad compuesta	-38.9914136078743	-64.0874682295519	Pichi Mahuida	INDEC	62063020000	62063020	Río Colorado	620210	Rìo Colorado	RIO COLORADO	62	Río Negro	62063
        Localidad simple	-38.8229789232812	-64.8182778708068	Pichi Mahuida	INDEC	62063060000	62063060	Salto Andersen			SALTO ANDERSEN	62	Río Negro	62063
        Localidad simple	-40.8843058831975	-70.0229634453504	Pilcaniyeu	INDEC	62070005000	62070005	Cañadón Chileno			CAÑADON CHILENO	62	Río Negro	62070
        Localidad simple	-41.0298746753183	-70.269980649853	Pilcaniyeu	INDEC	62070010000	62070010	Comallo	620217	Comallo	COMALLO	62	Río Negro	62070
        Localidad simple	-41.0691934226159	-71.16219332616	Pilcaniyeu	INDEC	62070020000	62070020	Dina Huapi	620273	Dina Huapi	DINA HUAPI	62	Río Negro	62070
        Localidad simple	-40.7925954846977	-69.8810399581108	Pilcaniyeu	INDEC	62070030000	62070030	Laguna Blanca	625231	Laguna Blanca	LAGUNA BLANCA	62	Río Negro	62070
        Localidad simple	-41.0885592834836	-71.1369133751581	Pilcaniyeu	INDEC	62070040000	62070040	Ñirihuau	620273	Dina Huapi	ÑIRIHUAU	62	Río Negro	62070
        Localidad simple	-41.1252901833754	-70.7216943906912	Pilcaniyeu	INDEC	62070060000	62070060	Pilcaniyeu	620224	Pilcaniyeu	PILCANIYEU	62	Río Negro	62070
        Localidad simple	-40.5448524836234	-70.0532314661515	Pilcaniyeu	INDEC	62070070000	62070070	Pilquiniyeu del Limay	625140	Pilquiniyeu del Limay	PILQUINIYEU DEL LIMAY	62	Río Negro	62070
        Localidad simple	-40.9239102047089	-71.0338579770764	Pilcaniyeu	INDEC	62070080000	62070080	Villa Llanquín	625042	Villa Llanquin	VILLA LLANQUIN	62	Río Negro	62070
        Localidad simple	-40.706602544179	-65.0030743715644	San Antonio	INDEC	62077005000	62077005	El Empalme	620231	San Antonio Oeste	ESTACION EMPALME	62	Río Negro	62077
        Localidad simple	-40.806093320236	-65.0847019757487	San Antonio	INDEC	62077010000	62077010	Las Grutas			LAS GRUTAS	62	Río Negro	62077
        Localidad simple	-41.6276787888305	-65.0236746017627	San Antonio	INDEC	62077020000	62077020	Playas Doradas	620238	Sierra Grande	PLAYAS DORADAS	62	Río Negro	62077
        Localidad simple	-40.8008815532575	-64.8778974161853	San Antonio	INDEC	62077030000	62077030	Puerto San Antonio Este	620231	San Antonio Oeste	PUERTO SAN ANTONIO ESTE	62	Río Negro	62077
        Localidad simple	-41.6941221979021	-65.0245573411298	San Antonio	INDEC	62077040000	62077040	Punta Colorada	620238	Sierra Grande	PUNTA COLORADA	62	Río Negro	62077
        Localidad simple	-40.811004684265	-64.7581129382783	San Antonio	INDEC	62077045000	62077045	Saco Viejo	620231	San Antonio Oeste	SACO VIEJO	62	Río Negro	62077
        Localidad simple	-40.7312945275013	-64.9552941307172	San Antonio	INDEC	62077050000	62077050	San Antonio Oeste	620231	San Antonio Oeste	SAN ANTONIO OESTE	62	Río Negro	62077
        Localidad simple	-41.6071863315513	-65.3534017406091	San Antonio	INDEC	62077060000	62077060	Sierra Grande	620238	Sierra Grande	SIERRA GRANDE	62	Río Negro	62077
        Localidad simple	-40.8478737807916	-65.8393274592303	Valcheta	INDEC	62084010000	62084010	Aguada Cecilio	625168	Aguada Cecilio	AGUADA CECILIO	62	Río Negro	62084
        Localidad simple	-41.4372536416486	-66.0950773167367	Valcheta	INDEC	62084020000	62084020	Arroyo Los Berros	625147	Arroyo los Berros	ARROYO LOS BERROS	62	Río Negro	62084
        Localidad simple	-41.6653937822189	-66.0860135550914	Valcheta	INDEC	62084030000	62084030	Arroyo Ventana	625154	Arroyo Ventana	ARROYO VENTANA	62	Río Negro	62084
        Localidad simple	-40.504198321368	-66.5657529968209	Valcheta	INDEC	62084040000	62084040	Nahuel Niyeu	625182	Nahuel Niyeu	NAHUEL NIYEU	62	Río Negro	62084
        Localidad simple	-41.1812714523245	-65.9614292512301	Valcheta	INDEC	62084050000	62084050	Sierra Pailemán	625189	Sierra Paileman	SIERRA PAILEMAN	62	Río Negro	62084
        Localidad simple	-40.6778617788507	-66.1653261356888	Valcheta	INDEC	62084060000	62084060	Valcheta	620245	Valcheta	VALCHETA	62	Río Negro	62084
        Localidad simple	-41.0639017102391	-68.3843810353051	25 de Mayo	INDEC	62091010000	62091010	Aguada de Guerra	625196	Aguada de Guerra	AGUADA DE GUERRA	62	Río Negro	62091
        Localidad simple	-41.2448350046555	-70.0342029410146	25 de Mayo	INDEC	62091020000	62091020	Clemente Onelli	625217	Clemente Onelli	CLEMENTE ONELLI	62	Río Negro	62091
        Localidad simple	-40.6706084126156	-69.1112545579992	25 de Mayo	INDEC	62091030000	62091030	Colan Conhue	625203	Colan Conhué	COLAN CONUE	62	Río Negro	62091
        Localidad simple	-41.8182874251641	-68.0774152377244	25 de Mayo	INDEC	62091040000	62091040	El Caín	625224	El Cain	EL CAIN	62	Río Negro	62091
        Localidad simple	-41.3268134240327	-69.5441263890306	25 de Mayo	INDEC	62091050000	62091050	Ingeniero Jacobacci	620252	Ing. Jacobacci	INGENIERO JACOBACCI	62	Río Negro	62091
        Localidad simple	-40.8451911426273	-68.0832025061279	25 de Mayo	INDEC	62091060000	62091060	Los Menucos	620259	Los Menucos	LOS MENUCOS	62	Río Negro	62091
        Localidad simple	-41.2475165638608	-68.7003410687453	25 de Mayo	INDEC	62091070000	62091070	Maquinchao	620266	Maquinchao	MAQUINCHAO	62	Río Negro	62091
        Localidad simple	-40.9343435582627	-69.411658784618	25 de Mayo	INDEC	62091080000	62091080	Mina Santa Teresita			MINA SANTA TERESITA	62	Río Negro	62091
        Localidad simple	-41.9083865405739	-68.3424732450183	25 de Mayo	INDEC	62091090000	62091090	Pilquiniyeu	625252	Pilquiniyeu	PILQUINIYEU	62	Río Negro	62091
        Localidad simple	-24.4402117565864	-64.0003361370349	Anta	INDEC	66007010000	66007010	Apolinario Saravia	660007	Apolinario Saravia	APOLINARIO SARAVIA	66	Salta	66007
        Localidad simple	-25.1278603615752	-64.2896735059411	Anta	INDEC	66007020000	66007020	Ceibalito	660028	Joaquín V. González	CEIBALITO	66	Salta	66007
        Localidad simple	-24.9773189675124	-63.8698564395644	Anta	INDEC	66007030000	66007030	Centro 25 de Junio	660028	Joaquín V. González	CENTRO 25 DE JUNIO	66	Salta	66007
        Localidad simple	-24.5136418287603	-64.0648836625582	Anta	INDEC	66007040000	66007040	Coronel Mollinedo	660007	Apolinario Saravia	CORONEL MOLLINEDO	66	Salta	66007
        Localidad simple	-25.1146923148948	-64.2258664425772	Anta	INDEC	66007050000	66007050	Coronel Olleros	660028	Joaquín V. González	CORONEL OLLEROS	66	Salta	66007
        Localidad simple	-25.3519821824981	-64.0287963887805	Anta	INDEC	66007060000	66007060	El Quebrachal	660014	El Quebrachal	EL QUEBRACHAL	66	Salta	66007
        Localidad simple	-25.2581750325612	-64.0470243002426	Anta	INDEC	66007070000	66007070	Gaona	660014	El Quebrachal	GAONA	66	Salta	66007
        Localidad simple	-24.2342248497577	-63.9910915395849	Anta	INDEC	66007080000	66007080	General Pizarro	660021	General Pizarro	GENERAL PIZARRO	66	Salta	66007
        Localidad simple	-25.1294324707809	-64.1385893694805	Anta	INDEC	66007090000	66007090	Joaquín V. González	660028	Joaquín V. González	JOAQUIN V. GONZALEZ	66	Salta	66007
        Localidad simple	-24.7331988444238	-64.1994831202005	Anta	INDEC	66007100000	66007100	Las Lajitas	660035	Las Lajitas	LAS LAJITAS	66	Salta	66007
        Localidad simple	-24.397713500488	-63.9961108041489	Anta	INDEC	66007110000	66007110	Luis Burela	660021	General Pizarro	LUIS BURELA	66	Salta	66007
        Localidad simple	-25.421569027557	-63.9896049019406	Anta	INDEC	66007120000	66007120	Macapillo	660014	El Quebrachal	MACAPILLO	66	Salta	66007
        Localidad simple	-25.481072557645	-63.7880008281707	Anta	INDEC	66007130000	66007130	Nuestra Señora de Talavera	660014	El Quebrachal	NUESTRA SEÑORA DE TALAVERA	66	Salta	66007
        Localidad simple	-24.8260406674686	-64.1855790667322	Anta	INDEC	66007140000	66007140	Piquete Cabado	660028	Joaquín V. González	PIQUETE CABADO	66	Salta	66007
        Localidad simple	-24.6839685116395	-64.2017888257331	Anta	INDEC	66007150000	66007150	Río del Valle	660035	Las Lajitas	RIO DEL VALLE	66	Salta	66007
        Localidad simple	-25.5466456710139	-63.5342918601747	Anta	INDEC	66007160000	66007160	Tolloche	660014	El Quebrachal	TOLLOCHE	66	Salta	66007
        Localidad simple	-25.1201640072396	-66.1679494412163	Cachi	INDEC	66014010000	66014010	Cachi	660042	Cachi	CACHI	66	Salta	66014
        Localidad simple	-25.0489479804199	-66.1027102397315	Cachi	INDEC	66014020000	66014020	Payogasta	660049	Payogasta	PAYOGASTA	66	Salta	66014
        Localidad simple	-26.0765384358548	-65.9862897320293	Cafayate	INDEC	66021010000	66021010	Cafayate	660056	Cafayate	CAFAYATE	66	Salta	66021
        Localidad simple	-26.2029574679842	-65.9467957704698	Cafayate	INDEC	66021020000	66021020	Tolombón	660056	Cafayate	TOLOMBOM	66	Salta	66021
        Localidad simple	-24.8166716062155	-65.4787180407276	Capital	INDEC	66028010000	66028010	Atocha	660070	San Lorenzo	ATOCHA	66	Salta	66028
        Entidad	-24.8141965630247	-65.4579729482216	Capital	INDEC	66028030001	66028030	La Ciénaga y Barrio San Rafael	660070	San Lorenzo	BARRIO SAN RAFAEL	66	Salta	66028
        Entidad	-24.8086153228208	-65.5127341551445	Capital	INDEC	66028030002	66028030	La Ciénaga y Barrio San Rafael	660070	San Lorenzo	LA CIENAGA	66	Salta	66028
        Localidad simple	-24.7690498139422	-65.4860333610823	Capital	INDEC	66028040000	66028040	Las Costas	660070	San Lorenzo	LAS COSTAS	66	Salta	66028
        Componente de localidad compuesta con entidad	-24.7823766403156	-65.4141329991055	Capital	INDEC	66028050000	66028050	Salta	660063	Salta	SALTA	66	Salta	66028
        Entidad	-24.7656882287643	-65.4762993863652	Capital	INDEC	66028050001	66028050	Salta	660063	Salta	CC EL TIPAL	66	Salta	66028
        Entidad	-24.763544418349	-65.4639762070424	Capital	INDEC	66028050002	66028050	Salta	660063	Salta	CC LA ALMUDENA	66	Salta	66028
        Entidad	-24.7865548806711	-65.3976354202705	Capital	INDEC	66028050003	66028050	Salta	660063	Salta	SALTA	66	Salta	66028
        Localidad simple	-24.7333009865645	-65.4847891426227	Capital	INDEC	66028060000	66028060	Villa San Lorenzo	660070	San Lorenzo	VILLA SAN LORENZO	66	Salta	66028
        Componente de localidad compuesta	-24.899748268594	-65.4884058419647	Cerrillos	INDEC	66035010000	66035010	Cerrillos	660077	Cerrillos	CERRILLOS	66	Salta	66035
        Localidad simple	-24.9660896493444	-65.4895901036815	Cerrillos	INDEC	66035020000	66035020	La Merced	660084	La Merced	LA MERCED	66	Salta	66035
        Localidad simple	-24.9967896088099	-65.4377599331623	Cerrillos	INDEC	66035030000	66035030	San Agustín	660084	La Merced	SAN AGUSTIN	66	Salta	66035
        Componente de localidad compuesta con entidad	-24.8630942974132	-65.4594268472934	Cerrillos	INDEC	66035040000	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	VILLA LOS ALAMOS	66	Salta	66035
        Entidad	-24.8774314408788	-65.478464215737	Cerrillos	INDEC	66035040001	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	BARRIO EL CONGRESO	66	Salta	66035
        Entidad	-24.8581686105385	-65.3991341395925	Cerrillos	INDEC	66035040002	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	BARRIO LAS TUNAS	66	Salta	66035
        Entidad	-24.8784306645047	-65.466289926351	Cerrillos	INDEC	66035040003	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	BARRIO LOS OLMOS	66	Salta	66035
        Entidad	-24.8581686105385	-65.3991341395925	Cerrillos	INDEC	66035040004	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	BARRIO LOS PINARES	66	Salta	66035
        Entidad	-24.8640287340554	-65.4641823560161	Cerrillos	INDEC	66035040005	66035040	Villa Los Álamos - El Congreso - Las Tunas - Los Pinares - Los Olmos	660077	Cerrillos	VILLA LOS ALAMOS	66	Salta	66035
        Componente de localidad compuesta	-25.1512347050013	-65.4426106862489	Chicoana	INDEC	66042003000	66042003	Barrio Finca La Maroma	660091	Chicoana	LA MAROMA	66	Salta	66042
        Localidad simple	-25.0825653440585	-65.5369944152078	Chicoana	INDEC	66042005000	66042005	Barrio La Rotonda	660091	Chicoana	BARRIO LA ROTONDA	66	Salta	66042
        Localidad simple	-25.0370260259242	-65.5726459572587	Chicoana	INDEC	66042007000	66042007	Barrio Santa Teresita	660091	Chicoana	BARRIO SANTA TERESITA	66	Salta	66042
        Localidad simple	-25.1056023710125	-65.5368903535961	Chicoana	INDEC	66042010000	66042010	Chicoana	660091	Chicoana	CHICOANA	66	Salta	66042
        Localidad simple	-25.0768547028405	-65.4938473919709	Chicoana	INDEC	66042020000	66042020	El Carril	660098	El Carril	EL CARRIL	66	Salta	66042
        Localidad simple	-24.6839924533229	-65.102855681603	General Güemes	INDEC	66049010000	66049010	Campo Santo	660105	Campo Santo	CAMPO SANTO	66	Salta	66049
        Localidad simple	-24.7414709076566	-65.0839324652619	General Güemes	INDEC	66049020000	66049020	Cobos	660105	Campo Santo	COBOS	66	Salta	66049
        Localidad simple	-24.6610743291372	-65.1054298866391	General Güemes	INDEC	66049030000	66049030	El Bordo	660112	El Bordo	EL BORDO	66	Salta	66049
        Localidad simple	-24.6684436198384	-65.0493527755239	General Güemes	INDEC	66049040000	66049040	General Güemes	660119	General Güemes	GENERAL GUEMES	66	Salta	66049
        Localidad simple	-22.2388143093458	-63.7283889210813	General José de San Martín	INDEC	66056010000	66056010	Aguaray	660126	Aguaray	AGUARAY	66	Salta	66056
        Localidad simple	-22.5800471662206	-63.8523231844895	General José de San Martín	INDEC	66056020000	66056020	Campamento Vespucio	660147	General Mosconi	CAMPAMENTO VESPUCIO	66	Salta	66056
        Localidad simple	-23.1062412034464	-63.9953139246427	General José de San Martín	INDEC	66056030000	66056030	Campichuelo	660133	Embarcación	CAMPICHUELO	66	Salta	66056
        Localidad simple	-22.1925191184959	-63.6556166497527	General José de San Martín	INDEC	66056040000	66056040	Campo Durán	660154	Profesor Salvador Mazza	CAMPO DURAN	66	Salta	66056
        Localidad simple	-22.1673388747523	-63.7086209918975	General José de San Martín	INDEC	66056050000	66056050	Capiazuti	660126	Aguaray	CAPIAZUTI	66	Salta	66056
        Localidad simple	-23.2595016179972	-63.8026685275306	General José de San Martín	INDEC	66056060000	66056060	Carboncito	660133	Embarcación	CARBONCITO	66	Salta	66056
        Localidad simple	-22.736606161274	-63.8212340428559	General José de San Martín	INDEC	66056070000	66056070	Coronel Cornejo	660147	General Mosconi	CORONEL CORNEJO	66	Salta	66056
        Localidad simple	-23.2581867482105	-63.3390555232417	General José de San Martín	INDEC	66056080000	66056080	Dragones	660133	Embarcación	DRAGONES	66	Salta	66056
        Localidad simple con entidad	-23.2042135269827	-64.0900817936338	General José de San Martín	INDEC	66056090000	66056090	Embarcación	660133	Embarcación	EMBARCACION	66	Salta	66056
        Entidad	-23.2350868335657	-64.0122926146674	General José de San Martín	INDEC	66056090001	66056090	Embarcación	660133	Embarcación	EMBARCACION	66	Salta	66056
        Entidad	-23.2644560588445	-64.0052653883187	General José de San Martín	INDEC	66056090002	66056090	Embarcación	660133	Embarcación	MISION TIERRAS FISCALES	66	Salta	66056
        Localidad simple	-22.9276105225425	-63.8522934424036	General José de San Martín	INDEC	66056100000	66056100	General Ballivián	660140	General Ballivián	GENERAL BALLIVIAN	66	Salta	66056
        Localidad simple con entidad	-22.5872984531874	-63.8075098662841	General José de San Martín	INDEC	66056110000	66056110	General Mosconi	660147	General Mosconi	GENERAL MOSCONI	66	Salta	66056
        Entidad	-22.5888626468449	-63.8118898123133	General José de San Martín	INDEC	66056110001	66056110	General Mosconi	660147	General Mosconi	GENERAL MOSCONI	66	Salta	66056
        Entidad	-22.4497652091167	-63.8856192155364	General José de San Martín	INDEC	66056110002	66056110	General Mosconi	660147	General Mosconi	RECAREDO	66	Salta	66056
        Localidad simple	-23.2174884897188	-63.5643624737058	General José de San Martín	INDEC	66056120000	66056120	Hickman	660133	Embarcación	HICKMAN	66	Salta	66056
        Localidad simple	-23.2761412353834	-63.7361800240654	General José de San Martín	INDEC	66056130000	66056130	Misión Chaqueña	660133	Embarcación	MISION CHAQUEÑA	66	Salta	66056
        Entidad	-22.5413249097327	-63.7927888759365	General José de San Martín	INDEC	66056140001	66056140	Misión El Cruce - El Milagro - El Jardín de San Martín	660161	Tartagal	BARRIO EL MILAGRO	66	Salta	66056
        Entidad	-22.4497652091167	-63.8856192155364	General José de San Martín	INDEC	66056140002	66056140	Misión El Cruce - El Milagro - El Jardín de San Martín	660147	General Mosconi	BARRIO EL JARDIN DE SAN MARTIN	66	Salta	66056
        Entidad	-22.5413249097327	-63.7927888759365	General José de San Martín	INDEC	66056140003	66056140	Misión El Cruce - El Milagro - El Jardín de San Martín	660161	Tartagal	MISION EL CRUCE	66	Salta	66056
        Localidad simple	-22.5060228278102	-63.7399721901134	General José de San Martín	INDEC	66056150000	66056150	Misión Kilómetro 6	660161	Tartagal	MISION KILOMETRO 6	66	Salta	66056
        Localidad simple	-22.4452723425454	-63.43543212618	General José de San Martín	INDEC	66056170000	66056170	Pacará	660161	Tartagal	PACARA	66	Salta	66056
        Localidad simple	-23.215724803759	-63.8426467906727	General José de San Martín	INDEC	66056180000	66056180	Padre Lozano	660133	Embarcación	PADRE LOZANO	66	Salta	66056
        Localidad simple	-22.3335490812005	-63.7596847135861	General José de San Martín	INDEC	66056190000	66056190	Piquirenda	660126	Aguaray	PIQUIRENDA	66	Salta	66056
        Localidad simple	-22.0542634419098	-63.6872829649674	General José de San Martín	INDEC	66056200000	66056200	Profesor Salvador Mazza	660154	Profesor Salvador Mazza	PROFESOR SALVADOR MAZZA	66	Salta	66056
        Componente de localidad compuesta	-22.5098645099451	-63.7970472996098	General José de San Martín	INDEC	66056220000	66056220	Tartagal	660161	Tartagal	TARTAGAL	66	Salta	66056
        Localidad simple	-22.13833247169	-63.7061819675909	General José de San Martín	INDEC	66056230000	66056230	Tobantirenda	660126	Aguaray	TOBANTIRENDA	66	Salta	66056
        Localidad simple	-22.4076174158757	-63.7681399387898	General José de San Martín	INDEC	66056240000	66056240	Tranquitas	660161	Tartagal	TRANQUITAS	66	Salta	66056
        Localidad simple	-22.3765769868638	-63.7654304903786	General José de San Martín	INDEC	66056250000	66056250	Yacuy	660161	Tartagal	YACUY	66	Salta	66056
        Localidad simple	-25.5235484724461	-65.5187644501144	Guachipas	INDEC	66063010000	66063010	Guachipas	660168	Guachipas	GUACHIPAS	66	Salta	66063
        Localidad simple	-22.7789158765788	-65.2063598136374	Iruya	INDEC	66070010000	66070010	Iruya	660175	Iruya	IRUYA	66	Salta	66070
        Localidad simple	-22.8864200252899	-64.6573757192202	Iruya	INDEC	66070020000	66070020	Isla de Cañas	660182	Isla de Cañas	ISLA DE CAÑAS	66	Salta	66070
        Localidad simple	-24.6049486234217	-65.3823377302988	La Caldera	INDEC	66077010000	66077010	La Caldera	660189	La Caldera	LA CALDERA	66	Salta	66077
        Componente de localidad compuesta	-24.6945211920197	-65.4026944187147	La Caldera	INDEC	66077020000	66077020	Vaqueros	660196	Vaqueros	VAQUEROS	66	Salta	66077
        Localidad simple	-26.0938834199791	-65.41384156239	La Candelaria	INDEC	66084010000	66084010	El Jardín	660203	El Jardín	EL JARDIN	66	Salta	66084
        Localidad simple	-26.1208917578309	-65.2873058787689	La Candelaria	INDEC	66084020000	66084020	El Tala	660210	El Tala	EL TALA	66	Salta	66084
        Localidad simple	-26.0961790089843	-65.0610119525095	La Candelaria	INDEC	66084030000	66084030	La Candelaria	660217	La Candelaria	LA CANDELARIA	66	Salta	66084
        Localidad simple	-23.6391998500842	-66.2684039729566	La Poma	INDEC	66091010000	66091010	Cobres	660224	La Poma	COBRES	66	Salta	66091
        Localidad simple	-24.7129010493055	-66.1997385176463	La Poma	INDEC	66091020000	66091020	La Poma	660224	La Poma	LA POMA	66	Salta	66091
        Localidad simple	-25.355455514438	-65.5323044668329	La Viña	INDEC	66098010000	66098010	Ampascachi	660238	La Viña	AMPASCACHI	66	Salta	66098
        Localidad simple	-25.290036707535	-65.38778537012	La Viña	INDEC	66098020000	66098020	Cabra Corral	660168	Guachipas	CABRA CORRAL	66	Salta	66098
        Localidad simple	-25.2889404681421	-65.4745373510335	La Viña	INDEC	66098030000	66098030	Coronel Moldes	660231	Coronel Moldes	CORONEL MOLDES	66	Salta	66098
        Localidad simple	-25.4719724619835	-65.5719838890076	La Viña	INDEC	66098040000	66098040	La Viña	660238	La Viña	LA VIÑA	66	Salta	66098
        Localidad simple	-25.5463746287562	-65.559672881754	La Viña	INDEC	66098050000	66098050	Talapampa	660238	La Viña	TALAPAMPA	66	Salta	66098
        Localidad simple	-24.1197745515994	-66.7142594000385	Los Andes	INDEC	66105010000	66105010	Olacapato	386168	Susques	OLACAPATO	66	Salta	66105
        Localidad simple	-24.2099310029638	-66.315435998094	Los Andes	INDEC	66105020000	66105020	San Antonio de los Cobres	660245	San Antonio de los Cobres	SAN ANTONIO DE LOS COBRES	66	Salta	66105
        Localidad simple	-24.478105777316	-66.6785400667592	Los Andes	INDEC	66105030000	66105030	Santa Rosa de los Pastos Grandes	660245	San Antonio de los Cobres	SANTA ROSA DE LOS PASTOS GRANDES	66	Salta	66105
        Localidad simple	-24.5579851944765	-67.4369653675359	Los Andes	INDEC	66105040000	66105040	Tolar Grande	660252	Tolar Grande	TOLAR GRANDE	66	Salta	66105
        Localidad simple	-25.3915864503967	-64.6595062933993	Metán	INDEC	66112010000	66112010	El Galpón	660259	El Galpón	EL GALPON	66	Salta	66112
        Localidad simple	-25.2652645771513	-64.4061042227155	Metán	INDEC	66112020000	66112020	El Tunal	660259	El Galpón	EL TUNAL	66	Salta	66112
        Localidad simple	-25.2172575790264	-64.9306861458005	Metán	INDEC	66112030000	66112030	Lumbreras	660280	Río Piedras	LUMBRERAS	66	Salta	66112
        Localidad simple	-25.5077205377148	-64.9821245409304	Metán	INDEC	66112040000	66112040	San José de Metán (Est. Metán)	660266	Metán	SAN JOSE DE METAN	66	Salta	66112
        Localidad simple	-25.5418039517985	-64.9849385087879	Metán	INDEC	66112050000	66112050	Metán Viejo	660266	Metán	METAN VIEJO	66	Salta	66112
        Localidad simple	-25.3211818761179	-64.917329424853	Metán	INDEC	66112070000	66112070	Río Piedras	660280	Río Piedras	RIO PIEDRAS	66	Salta	66112
        Localidad simple	-25.2783094165373	-64.0850561648465	Metán	INDEC	66112080000	66112080	San José de Orquera	660259	El Galpón	SAN JOSE DE ORQUERA	66	Salta	66112
        Localidad simple	-25.2804538149509	-66.4508396566503	Molinos	INDEC	66119010000	66119010	La Puerta	660273	Molinos	LA PUERTA	66	Salta	66119
        Localidad simple	-25.4442432937572	-66.3088500894253	Molinos	INDEC	66119020000	66119020	Molinos	660273	Molinos	MOLINOS	66	Salta	66119
        Localidad simple	-25.3305099574445	-66.2484466228606	Molinos	INDEC	66119030000	66119030	Seclantás	660287	Seclantás	SECLANTAS	66	Salta	66119
        Localidad simple	-22.7245611902241	-64.346319220401	Orán	INDEC	66126010000	66126010	Aguas Blancas			AGUAS BLANCAS	66	Salta	66126
        Localidad simple con entidad	-23.3885957203176	-64.4234333229489	Orán	INDEC	66126020000	66126020	Colonia Santa Rosa	660294	Colonia Santa Rosa	COLONIA SANTA ROSA	66	Salta	66126
        Entidad	-23.3664492093477	-64.3524071790769	Orán	INDEC	66126020001	66126020	Colonia Santa Rosa	660294	Colonia Santa Rosa	COLONIA SANTA ROSA	66	Salta	66126
        Entidad	-23.3154629033465	-64.4077092056574	Orán	INDEC	66126020002	66126020	Colonia Santa Rosa	660294	Colonia Santa Rosa	LA MISION	66	Salta	66126
        Localidad simple	-23.2500270361093	-64.2445058938392	Orán	INDEC	66126030000	66126030	El Tabacal	660301	Hipólito Yrigoyen	EL TABACAL	66	Salta	66126
        Localidad simple	-23.2382702479068	-64.2718125360107	Orán	INDEC	66126040000	66126040	Hipólito Yrigoyen	660301	Hipólito Yrigoyen	HIPOLITO YRIGOYEN	66	Salta	66126
        Localidad simple	-23.3133896525098	-64.219751841333	Orán	INDEC	66126060000	66126060	Pichanal	660308	Pichanal	PICHANAL	66	Salta	66126
        Localidad simple	-23.1298138873917	-64.3185884747041	Orán	INDEC	66126070000	66126070	San Ramón de la Nueva Orán	660315	San Ramón de la Nueva Orán	SAN RAMON DE LA NUEVA ORAN	66	Salta	66126
        Localidad simple	-23.5516314679633	-64.3965188048038	Orán	INDEC	66126080000	66126080	Urundel	660322	Urundel	URUNDEL	66	Salta	66126
        Localidad simple	-22.6893772924132	-62.4527756437584	Rivadavia	INDEC	66133010000	66133010	Alto de la Sierra	660343	Santa Victoria Este	ALTO DE LA SIERRA	66	Salta	66133
        Localidad simple	-23.7084876711103	-62.3817949445121	Rivadavia	INDEC	66133020000	66133020	Capitán Juan Pagé	660329	Rivadavia Banda Norte	CAPITAN JUAN PAGE	66	Salta	66133
        Localidad simple	-23.4836432078231	-62.8913108733338	Rivadavia	INDEC	66133030000	66133030	Coronel Juan Solá	660329	Rivadavia Banda Norte	CORONEL JUAN SOLA	66	Salta	66133
        Localidad simple	-21.9997109682413	-62.8237382800005	Rivadavia	INDEC	66133035000	66133035	Hito 1	660343	Santa Victoria Este	HITO 1	66	Salta	66133
        Localidad simple	-23.9462046990241	-63.1119727442095	Rivadavia	INDEC	66133040000	66133040	La Unión	660336	Rivadavia Banda Sur	LA UNION	66	Salta	66133
        Localidad simple	-23.630147809494	-62.5972373009179	Rivadavia	INDEC	66133050000	66133050	Los Blancos	660329	Rivadavia Banda Norte	LOS BLANCOS	66	Salta	66133
        Localidad simple	-23.3808426324425	-63.0980556496311	Rivadavia	INDEC	66133060000	66133060	Pluma de Pato	660329	Rivadavia Banda Norte	PLUMA DE PATO	66	Salta	66133
        Localidad simple	-24.1928479299753	-62.8855846188739	Rivadavia	INDEC	66133070000	66133070	Rivadavia	660336	Rivadavia Banda Sur	RIVADAVIA	66	Salta	66133
        Localidad simple	-22.1394975256357	-62.8383245890232	Rivadavia	INDEC	66133080000	66133080	Santa María	660343	Santa Victoria Este	SANTA MARIA	66	Salta	66133
        Localidad simple	-24.0763765853123	-63.1236773681358	Rivadavia	INDEC	66133090000	66133090	Santa Rosa	660336	Rivadavia Banda Sur	SANTA ROSA	66	Salta	66133
        Localidad simple	-22.2772903307188	-62.7043719454645	Rivadavia	INDEC	66133100000	66133100	Santa Victoria Este	660343	Santa Victoria Este	SANTA VICTORIA ESTE	66	Salta	66133
        Localidad simple	-26.1367474431656	-64.6079955159401	Rosario de la Frontera	INDEC	66140010000	66140010	Antillá	660350	El Potrero	ANTILLA	66	Salta	66140
        Localidad simple	-26.0280256948964	-64.6831914609089	Rosario de la Frontera	INDEC	66140020000	66140020	Copo Quile	660350	El Potrero	COPO QUILE	66	Salta	66140
        Localidad simple	-25.7376092528727	-65.0197887857072	Rosario de la Frontera	INDEC	66140030000	66140030	El Naranjo	660357	Rosario de la Frontera	EL NARANJO	66	Salta	66140
        Localidad simple	-26.0638952332339	-64.656831424558	Rosario de la Frontera	INDEC	66140040000	66140040	El Potrero	660350	El Potrero	EL POTRERO	66	Salta	66140
        Localidad simple	-25.8088971820865	-64.9840618242784	Rosario de la Frontera	INDEC	66140050000	66140050	Rosario de la Frontera	660357	Rosario de la Frontera	ROSARIO DE LA FRONTERA	66	Salta	66140
        Localidad simple	-25.7231125127283	-64.8260626677768	Rosario de la Frontera	INDEC	66140060000	66140060	San Felipe	660357	Rosario de la Frontera	SAN FELIPE	66	Salta	66140
        Localidad simple	-24.9095603902622	-65.6395050258431	Rosario de Lerma	INDEC	66147010000	66147010	Campo Quijano	660364	Campo Quijano	CAMPO QUIJANO	66	Salta	66147
        Componente de localidad compuesta	-24.8709646124106	-65.5607604731238	Rosario de Lerma	INDEC	66147015000	66147015	La Merced del Encón	660371	Rosario de Lerma	LA MERCED DEL ENCON	66	Salta	66147
        Localidad simple	-24.8784643256455	-65.5901794974296	Rosario de Lerma	INDEC	66147020000	66147020	La Silleta	660364	Campo Quijano	LA SILLETA	66	Salta	66147
        Localidad simple	-24.9780005506773	-65.5804316181731	Rosario de Lerma	INDEC	66147030000	66147030	Rosario de Lerma	660371	Rosario de Lerma	ROSARIO DE LERMA	66	Salta	66147
        Localidad simple	-25.6837320095857	-66.1630084648275	San Carlos	INDEC	66154010000	66154010	Angastaco	660378	Angastaco	ANGASTACO	66	Salta	66154
        Localidad simple	-25.9250695350422	-65.9634886394429	San Carlos	INDEC	66154020000	66154020	Animaná	660385	Animaná	ANIMANA	66	Salta	66154
        Localidad simple	-25.9119189620255	-65.9509642786695	San Carlos	INDEC	66154030000	66154030	El Barrial	660385	Animaná	EL BARRIAL	66	Salta	66154
        Localidad simple	-25.8954496537353	-65.9374115460195	San Carlos	INDEC	66154040000	66154040	San Carlos	660392	San Carlos	SAN CARLOS	66	Salta	66154
        Localidad simple	-22.2625708057672	-64.9993425915289	Santa Victoria	INDEC	66161010000	66161010	Acoyte	660413	Santa Victoria Oeste	ACOYTE	66	Salta	66161
        Localidad simple	-22.4282266803066	-65.1454049664521	Santa Victoria	INDEC	66161020000	66161020	Campo La Cruz	660406	Nazareno	CAMPO LA CRUZ	66	Salta	66161
        Localidad simple	-22.2528953049178	-64.6816676603736	Santa Victoria	INDEC	66161030000	66161030	Los Toldos	660399	Los Toldos	LOS TOLDOS	66	Salta	66161
        Localidad simple	-22.4818544506086	-65.0949733414157	Santa Victoria	INDEC	66161040000	66161040	Nazareno	660406	Nazareno	NAZARENO	66	Salta	66161
        Localidad simple	-22.4336266127546	-65.0678957138662	Santa Victoria	INDEC	66161050000	66161050	Poscaya	660406	Nazareno	POSCAYA	66	Salta	66161
        Localidad simple	-22.50900544813	-65.1012423839061	Santa Victoria	INDEC	66161060000	66161060	San Marcos	660406	Nazareno	SAN MARCOS	66	Salta	66161
        Localidad simple	-22.2294615004585	-64.9503255468472	Santa Victoria	INDEC	66161070000	66161070	Santa Victoria	660413	Santa Victoria Oeste	SANTA VICTORIA	66	Salta	66161
        Localidad simple	-31.4480943761332	-68.5425141343624	Albardón	INDEC	70007010000	70007010	El Rincón	700007	Albardón	EL RINCON	70	San Juan	70007
        Entidad	-31.4165329806484	-68.5316143378439	Albardón	INDEC	70007020001	70007020	Villa General San Martín - Campo Afuera	700007	Albardón	CAMPO AFUERA	70	San Juan	70007
        Entidad	-31.3864085743851	-68.4572411115084	Albardón	INDEC	70007020003	70007020	Villa General San Martín - Campo Afuera	700007	Albardón	VILLA AMPACAMA	70	San Juan	70007
        Entidad	-31.421071066377	-68.4907605706737	Albardón	INDEC	70007020004	70007020	Villa General San Martín - Campo Afuera	700007	Albardón	VILLA GENERAL SAN MARTIN	70	San Juan	70007
        Localidad simple	-31.4084472492778	-68.3999429561259	Angaco	INDEC	70014010000	70014010	Las Tapias	700014	Angaco	LAS TAPIAS	70	San Juan	70014
        Entidad	-31.4454020414681	-68.417640160613	Angaco	INDEC	70014020001	70014020	Villa El Salvador - Villa Sefair	700014	Angaco	VILLA EL SALVADOR	70	San Juan	70014
        Entidad	-31.4439397880938	-68.4217688171581	Angaco	INDEC	70014020002	70014020	Villa El Salvador - Villa Sefair	700014	Angaco	VILLA SEFAIR (TALACASTO)	70	San Juan	70014
        Entidad	-31.652328851699	-69.479673849861	Calingasta	INDEC	70021010001	70021010	Barreal - Villa Pituil	700021	Calingasta	BARREAL	70	San Juan	70021
        Entidad	-31.6528323304108	-69.4815385910816	Calingasta	INDEC	70021010002	70021010	Barreal - Villa Pituil	700021	Calingasta	VILLA PITUIL	70	San Juan	70021
        Localidad simple	-31.335410441528	-69.4273817834109	Calingasta	INDEC	70021020000	70021020	Calingasta	700021	Calingasta	CALINGASTA	70	San Juan	70021
        Localidad simple	-31.46037726198	-69.4229130996947	Calingasta	INDEC	70021030000	70021030	Tamberías	700021	Calingasta	TAMBERIAS	70	San Juan	70021
        Componente de localidad compuesta	-31.5371970378027	-68.5250183173793	Capital	INDEC	70028010000	70028010	San Juan	700028	San Juan	SAN JUAN	70	San Juan	70028
        Localidad simple	-31.5918363542723	-67.6623620492559	Caucete	INDEC	70035010000	70035010	Bermejo	700035	Caucete	BERMEJO	70	San Juan	70035
        Localidad simple	-31.6283025583976	-68.3008272782109	Caucete	INDEC	70035015000	70035015	Barrio Justo P. Castro IV	700035	Caucete	BARRIO JUSTO P. CASTRO IV	70	San Juan	70035
        Localidad simple	-31.6514787868907	-68.2821404352408	Caucete	INDEC	70035020000	70035020	Caucete	700035	Caucete	CAUCETE	70	San Juan	70035
        Localidad simple	-31.6648793452851	-68.3211580078388	Caucete	INDEC	70035030000	70035030	El Rincón	700035	Caucete	EL RINCON	70	San Juan	70035
        Entidad	-31.6009569892315	-68.2979743657121	Caucete	INDEC	70035040001	70035040	Las Talas - Los Médanos	700035	Caucete	LAS TALAS	70	San Juan	70035
        Entidad	-31.6267504756331	-68.2618585178493	Caucete	INDEC	70035040002	70035040	Las Talas - Los Médanos	700035	Caucete	LOS MEDANOS	70	San Juan	70035
        Localidad simple	-31.4776695630337	-67.3093651877693	Caucete	INDEC	70035050000	70035050	Marayes	700035	Caucete	MARAYES	70	San Juan	70035
        Localidad simple	-31.6609347801137	-68.2204015492999	Caucete	INDEC	70035060000	70035060	Pie de Palo	700035	Caucete	PIE DE PALO	70	San Juan	70035
        Localidad simple	-31.7403744670002	-67.9885245900589	Caucete	INDEC	70035070000	70035070	Vallecito	700035	Caucete	VALLECITO	70	San Juan	70035
        Localidad simple	-31.6245292071939	-68.3138150331219	Caucete	INDEC	70035080000	70035080	Villa Independencia	700035	Caucete	VILLA INDEPENDENCIA	70	San Juan	70035
        Entidad	-31.4929011532856	-68.4840477499344	Chimbas	INDEC	70042010001	70042010	Chimbas	700042	Chimbas	CHIMBAS	70	San Juan	70042
        Entidad	-31.4800263304441	-68.4821821646732	Chimbas	INDEC	70042010002	70042010	Chimbas	700042	Chimbas	EL MOGOTE	70	San Juan	70042
        Entidad	-31.4936358990356	-68.5357082138994	Chimbas	INDEC	70042010003	70042010	Chimbas	700042	Chimbas	VILLA PAULA ALBARRACIN	70	San Juan	70042
        Localidad simple	-30.0536455973497	-69.1717079231376	Iglesia	INDEC	70049010000	70049010	Angualasto	700049	Iglesia	ANGUALASTO	70	San Juan	70049
        Localidad simple	-30.4401531794669	-69.2447866603611	Iglesia	INDEC	70049020000	70049020	Bella Vista	700049	Iglesia	BELLA VISTA	70	San Juan	70049
        Localidad simple	-30.4128218913916	-69.2051642049627	Iglesia	INDEC	70049030000	70049030	Iglesia	700049	Iglesia	IGLESIA	70	San Juan	70049
        Localidad simple	-30.3242644504455	-69.2453069928074	Iglesia	INDEC	70049040000	70049040	Las Flores	700049	Iglesia	LAS FLORES	70	San Juan	70049
        Localidad simple	-30.2709800462776	-69.2286104874715	Iglesia	INDEC	70049050000	70049050	Pismanta	700049	Iglesia	PISMANTA	70	San Juan	70049
        Localidad simple	-30.209958054186	-69.1336132382893	Iglesia	INDEC	70049060000	70049060	Rodeo	700049	Iglesia	RODEO	70	San Juan	70049
        Localidad simple	-30.1883781131447	-69.2702835946583	Iglesia	INDEC	70049070000	70049070	Tudcum	700049	Iglesia	TUDCUM	70	San Juan	70049
        Localidad simple	-30.1293832105379	-68.6791733044187	Jáchal	INDEC	70056010000	70056010	El Médano	700056	Jáchal	EL MEDANO	70	San Juan	70056
        Localidad simple	-30.1225273246059	-68.7161999143951	Jáchal	INDEC	70056020000	70056020	Gran China	700056	Jáchal	GRAN CHINA	70	San Juan	70056
        Localidad simple	-30.1570667184839	-68.4809365791381	Jáchal	INDEC	70056030000	70056030	Huaco	700056	Jáchal	HUACO	70	San Juan	70056
        Localidad simple	-30.6845100664473	-68.3775543569819	Jáchal	INDEC	70056040000	70056040	Mogna	700056	Jáchal	MOGNA	70	San Juan	70056
        Localidad simple	-30.4006750071532	-68.6910630973149	Jáchal	INDEC	70056050000	70056050	Niquivil	700056	Jáchal	NIQUIVIL	70	San Juan	70056
        Entidad	-30.2202750575676	-68.6909967597496	Jáchal	INDEC	70056060001	70056060	Pampa Vieja	700056	Jáchal	EL FISCAL	70	San Juan	70056
        Entidad	-30.1628729670379	-68.6652633159112	Jáchal	INDEC	70056060002	70056060	Pampa Vieja	700056	Jáchal	LA FALDA	70	San Juan	70056
        Entidad	-30.2202750575676	-68.6909967597496	Jáchal	INDEC	70056060003	70056060	Pampa Vieja	700056	Jáchal	PAMPA VIEJA	70	San Juan	70056
        Localidad simple	-30.1488923473271	-68.7044945534412	Jáchal	INDEC	70056070000	70056070	San Isidro	700056	Jáchal	SAN ISIDRO	70	San Juan	70056
        Localidad simple	-30.2427672850044	-68.7454934559357	Jáchal	INDEC	70056080000	70056080	San José de Jáchal	700056	Jáchal	SAN JOSE DE JACHAL	70	San Juan	70056
        Localidad simple	-30.1822864487075	-68.7277857836372	Jáchal	INDEC	70056090000	70056090	Tamberías	700056	Jáchal	TAMBERIAS	70	San Juan	70056
        Localidad simple	-30.2142413595614	-68.7165558327867	Jáchal	INDEC	70056100000	70056100	Villa Malvinas Argentinas	700056	Jáchal	VILLA MALVINAS ARGENTINAS	70	San Juan	70056
        Localidad simple	-30.1088721898605	-68.7009429184891	Jáchal	INDEC	70056110000	70056110	Villa Mercedes	700056	Jáchal	VILLA MERCEDES	70	San Juan	70056
        Localidad simple	-31.5551785871028	-68.4205987445022	9 de Julio	INDEC	70063020000	70063020	Colonia Fiorito	700063	9 de Julio	COLONIA FIORITO	70	San Juan	70063
        Localidad simple	-31.5936417922213	-68.4077196718125	9 de Julio	INDEC	70063030000	70063030	Las Chacritas	700063	9 de Julio	LAS CHACRITAS	70	San Juan	70063
        Localidad simple	-31.669750919971	-68.3900416378963	9 de Julio	INDEC	70063040000	70063040	9 de Julio	700063	9 de Julio	9 DE JULIO	70	San Juan	70063
        Localidad simple	-31.7523486776689	-68.5597213740804	Pocito	INDEC	70070005000	70070005	Barrio Municipal	700070	Pocito	BARRIO MUNICIPAL	70	San Juan	70070
        Localidad simple	-31.8595308229437	-68.5345166485174	Pocito	INDEC	70070010000	70070010	Barrio Ruta 40	700070	Pocito	BARRIO RUTA 40	70	San Juan	70070
        Localidad simple	-31.8301409850684	-68.5420989256398	Pocito	INDEC	70070020000	70070020	Carpintería	700070	Pocito	CARPINTERIA	70	San Juan	70070
        Localidad simple	-31.629474322189	-68.6080765638159	Pocito	INDEC	70070025000	70070025	Las Piedritas	700070	Pocito	LAS PIEDRITAS	70	San Juan	70070
        Localidad simple	-31.6140359426027	-68.6001745092873	Pocito	INDEC	70070030000	70070030	Quinto Cuartel	700070	Pocito	QUINTO CUARTEL	70	San Juan	70070
        Entidad	-31.6952378674877	-68.5923025771378	Pocito	INDEC	70070040001	70070040	Villa Aberastain - La Rinconada	700070	Pocito	LA RINCONADA	70	San Juan	70070
        Entidad	-31.65701277213	-68.573608949336	Pocito	INDEC	70070040002	70070040	Villa Aberastain - La Rinconada	700070	Pocito	VILLA ABERASTAIN	70	San Juan	70070
        Entidad	-31.5921799746835	-68.5723924425069	Pocito	INDEC	70070050001	70070050	Villa Barboza - Villa Nacusi	700070	Pocito	VILLA BARBOZA	70	San Juan	70070
        Entidad	-31.6219383886537	-68.5359580395485	Pocito	INDEC	70070050002	70070050	Villa Barboza - Villa Nacusi	700070	Pocito	VILLA NACUSI	70	San Juan	70070
        Localidad simple	-31.668402703149	-68.5222919302359	Pocito	INDEC	70070060000	70070060	Villa Centenario	700070	Pocito	VILLA CENTENARIO	70	San Juan	70070
        Entidad	-31.583482529045	-68.4697872532749	Rawson	INDEC	70077010001	70077010	Rawson	700077	Rawson	EL MEDANITO	70	San Juan	70077
        Entidad	-31.5696190485463	-68.5577689018569	Rawson	INDEC	70077010002	70077010	Rawson	700077	Rawson	RAWSON	70	San Juan	70077
        Entidad	-31.583718555606	-68.5410817167198	Rawson	INDEC	70077010003	70077010	Rawson	700077	Rawson	VILLA KRAUSE	70	San Juan	70077
        Localidad simple	-31.6292970053945	-68.4706676954017	Rawson	INDEC	70077020000	70077020	Villa Bolaños (Médano de Oro)	700077	Rawson	VILLA BOLAÑOS	70	San Juan	70077
        Componente de localidad compuesta	-31.5335200372447	-68.5920689785483	Rivadavia	INDEC	70084010000	70084010	Rivadavia	700084	Rivadavia	RIVADAVIA	70	San Juan	70084
        Localidad simple	-31.5367182711489	-68.3955676778174	San Martín	INDEC	70091010000	70091010	Barrio Sadop - Bella Vista	700091	San Martín	BARRIO SADOP	70	San Juan	70091
        Localidad simple	-31.4913855475125	-68.4185298472673	San Martín	INDEC	70091020000	70091020	Dos Acequias	700091	San Martín	DOS ACEQUIAS	70	San Juan	70091
        Localidad simple	-31.4870993000717	-68.325134344897	San Martín	INDEC	70091030000	70091030	San Isidro	700091	San Martín	SAN ISIDRO	70	San Juan	70091
        Componente de localidad compuesta	-31.4639044466924	-68.4095847372199	San Martín	INDEC	70091040000	70091040	Villa del Salvador	700091	San Martín	VILLA EL SALVADOR	70	San Juan	70091
        Localidad simple	-31.55912095737	-68.2976446699079	San Martín	INDEC	70091050000	70091050	Villa Dominguito	700091	San Martín	VILLA DOMINGUITO	70	San Juan	70091
        Localidad simple	-31.5518882180598	-68.3390185136148	San Martín	INDEC	70091060000	70091060	Villa Don Bosco	700091	San Martín	VILLA DON BOSCO	70	San Juan	70091
        Localidad simple	-31.516761980837	-68.3526471246019	San Martín	INDEC	70091070000	70091070	Villa San Martín	700091	San Martín	VILLA SAN MARTIN	70	San Juan	70091
        Entidad	-31.5265278957606	-68.4106014181706	Santa Lucía	INDEC	70098010001	70098010	Santa Lucía	700091	San Martín	ALTO DE SIERRA	70	San Juan	70098
        Entidad	-31.5173968715659	-68.4546487927052	Santa Lucía	INDEC	70098010002	70098010	Santa Lucía	700098	Santa Lucía	COLONIA GUTIERREZ	70	San Juan	70098
        Entidad	-31.5130353688268	-68.4565988777122	Santa Lucía	INDEC	70098010003	70098010	Santa Lucía	700098	Santa Lucía	SANTA LUCIA	70	San Juan	70098
        Localidad simple	-31.9850527438787	-68.5481911385325	Sarmiento	INDEC	70105010000	70105010	Cañada Honda	700105	Sarmiento	CAÑADA HONDA	70	San Juan	70105
        Localidad simple	-32.0763381339971	-68.690762577729	Sarmiento	INDEC	70105020000	70105020	Cienaguita	700105	Sarmiento	CIENAGUITA	70	San Juan	70105
        Localidad simple	-31.9027437264496	-68.4696588673219	Sarmiento	INDEC	70105030000	70105030	Colonia Fiscal	700105	Sarmiento	COLONIA FISCAL	70	San Juan	70105
        Localidad simple	-32.0104984358581	-68.6904861018003	Sarmiento	INDEC	70105040000	70105040	Divisadero	700105	Sarmiento	DIVISADERO	70	San Juan	70105
        Localidad simple	-32.0753813271385	-68.5856950572685	Sarmiento	INDEC	70105050000	70105050	Guanacache	700105	Sarmiento	GUANACACHE	70	San Juan	70105
        Localidad simple	-32.0443775419211	-68.3778990229646	Sarmiento	INDEC	70105060000	70105060	Las Lagunas	700105	Sarmiento	LAS LAGUNAS	70	San Juan	70105
        Localidad simple	-31.9514576383242	-68.6510941298035	Sarmiento	INDEC	70105070000	70105070	Los Berros	700105	Sarmiento	LOS BERROS	70	San Juan	70105
        Localidad simple	-31.9950077029707	-68.7590874861116	Sarmiento	INDEC	70105080000	70105080	Pedernal	700105	Sarmiento	PEDERNAL	70	San Juan	70105
        Localidad simple	-31.8946043291143	-68.4183104905607	Sarmiento	INDEC	70105090000	70105090	Punta del Médano	700105	Sarmiento	PUNTA DEL MEDANO	70	San Juan	70105
        Localidad simple	-31.9810022624945	-68.4270029177237	Sarmiento	INDEC	70105100000	70105100	Villa Media Agua	700105	Sarmiento	VILLA MEDIA AGUA	70	San Juan	70105
        Localidad simple	-31.4659385111811	-68.7353338028121	Ullum	INDEC	70112010000	70112010	Villa Ibáñez	700112	Ullum	VILLA IBAÑEZ	70	San Juan	70112
        Localidad simple	-30.9538850864023	-67.3006351406982	Valle Fértil	INDEC	70119010000	70119010	Astica	700119	Valle Fértil	ASTICA	70	San Juan	70119
        Localidad simple	-30.3207151787316	-67.6951969177397	Valle Fértil	INDEC	70119020000	70119020	Balde del Rosario	700119	Valle Fértil	BALDE DEL ROSARIO	70	San Juan	70119
        Localidad simple	-31.0688861561951	-67.2788289085567	Valle Fértil	INDEC	70119030000	70119030	Chucuma	700119	Valle Fértil	CHUCUMA	70	San Juan	70119
        Localidad simple	-30.2241888429483	-67.7014210305429	Valle Fértil	INDEC	70119040000	70119040	Los Baldecitos	700119	Valle Fértil	LOS BALDECITOS	70	San Juan	70119
        Localidad simple	-30.5640053498102	-67.540327100629	Valle Fértil	INDEC	70119050000	70119050	Usno	700119	Valle Fértil	USNO	70	San Juan	70119
        Localidad simple	-30.6367084796207	-67.4650598603898	Valle Fértil	INDEC	70119060000	70119060	Villa San Agustín	700119	Valle Fértil	VILLA SAN AGUSTIN	70	San Juan	70119
        Localidad simple	-32.2163733476113	-67.793057098676	25 de Mayo	INDEC	70126010000	70126010	El Encón	700126	25 de Mayo	EL ENCON	70	San Juan	70126
        Localidad simple	-31.8390315742989	-68.3573941216943	25 de Mayo	INDEC	70126020000	70126020	Tupelí	700126	25 de Mayo	TUPELI	70	San Juan	70126
        Entidad	-31.8505514541041	-68.309461754649	25 de Mayo	INDEC	70126030001	70126030	Villa Borjas - La Chimbera	700126	25 de Mayo	LA CHIMBERA	70	San Juan	70126
        Entidad	-31.8100072529359	-68.3289623063813	25 de Mayo	INDEC	70126030002	70126030	Villa Borjas - La Chimbera	700126	25 de Mayo	VILLA BORJAS	70	San Juan	70126
        Localidad simple	-31.763268918716	-68.2222966354108	25 de Mayo	INDEC	70126040000	70126040	Villa El Tango	700126	25 de Mayo	VILLA EL TANGO	70	San Juan	70126
        Localidad simple	-31.7448085385712	-68.3142412332522	25 de Mayo	INDEC	70126050000	70126050	Villa Santa Rosa	700126	25 de Mayo	VILLA SANTA ROSA	70	San Juan	70126
        Entidad	-31.543878931951	-68.7407758815646	Zonda	INDEC	70133010001	70133010	Villa Basilio Nievas	700133	Zonda	VILLA BASILIO NIEVAS	70	San Juan	70133
        Entidad	-31.5293321449519	-68.7253410683189	Zonda	INDEC	70133010002	70133010	Villa Basilio Nievas	700133	Zonda	VILLA TACU	70	San Juan	70133
        Localidad simple	-32.0607491134468	-65.8276913716033	Ayacucho	INDEC	74007010000	74007010	Candelaria	740007	Candelaria	CANDELARIA	74	San Luis	74007
        Localidad simple	-32.1047821044922	-65.9621124267578	Ayacucho	INDEC	74007030000	74007030	Leandro N. Alem			LEANDRO N. ALEM	74	San Luis	74007
        Localidad simple	-32.3660349058479	-65.9425439975458	Ayacucho	INDEC	74007040000	74007040	Luján	740014	Lujan	LUJAN	74	San Luis	74007
        Localidad simple	-32.2330822365033	-65.8056329969317	Ayacucho	INDEC	74007050000	74007050	Quines	740021	Quines	QUINES	74	San Luis	74007
        Localidad simple	-32.6006392247112	-66.1273702635842	Ayacucho	INDEC	74007070000	74007070	San Francisco del Monte de Oro	740028	San Francisco	SAN FRANCISCO DEL MONTE DE ORO	74	San Luis	74007
        Localidad simple	-32.8619918957825	-66.8506529764617	Belgrano	INDEC	74014010000	74014010	La Calera	746014	La Calera	LA CALERA	74	San Luis	74014
        Localidad simple	-32.9173752831041	-66.3257602058349	Belgrano	INDEC	74014020000	74014020	Nogolí	746021	Nogoli	NOGOLI	74	San Luis	74014
        Localidad simple	-33.0161741932684	-66.2920464806382	Belgrano	INDEC	74014030000	74014030	Villa de la Quebrada	746028	V, de la Quebrada	VILLA DE LA QUEBRADA	74	San Luis	74014
        Localidad simple	-32.6661925630759	-66.4524010178082	Belgrano	INDEC	74014040000	74014040	Villa General Roca	740035	V, Gral, Roca	VILLA GENERAL ROCA	74	San Luis	74014
        Localidad simple	-32.8128571637146	-66.0932327577628	Coronel Pringles	INDEC	74021010000	74021010	Carolina	746035	Carolina	CAROLINA	74	San Luis	74021
        Componente de localidad compuesta	-33.1082715280981	-66.063371211902	Coronel Pringles	INDEC	74021020000	74021020	El Trapiche	746042	El Trapiche	EL TRAPICHE	74	San Luis	74021
        Localidad simple	-33.1905465526598	-66.1527985566353	Coronel Pringles	INDEC	74021025000	74021025	Estancia Grande	740038	Estancia Grande	ESTANCIA GRANDE	74	San Luis	74021
        Localidad simple	-33.502087069887	-65.7926477789763	Coronel Pringles	INDEC	74021030000	74021030	Fraga	746049	Fraga	FRAGA	74	San Luis	74021
        Localidad simple	-33.157161301266	-66.0131877714641	Coronel Pringles	INDEC	74021040000	74021040	La Bajada			LA BAJADA	74	San Luis	74021
        Localidad simple	-33.1167587248711	-66.0020090018267	Coronel Pringles	INDEC	74021050000	74021050	La Florida	746042	El Trapiche	LA FLORIDA	74	San Luis	74021
        Localidad simple	-33.0544376204479	-65.62269821015	Coronel Pringles	INDEC	74021060000	74021060	La Toma	740042	La Toma	LA TOMA	74	San Luis	74021
        Localidad simple	-33.0964304439761	-65.990838382791	Coronel Pringles	INDEC	74021070000	74021070	Riocito	746042	El Trapiche	RIOCITO	74	San Luis	74021
        Componente de localidad compuesta	-33.0485046022503	-66.0717543089664	Coronel Pringles	INDEC	74021080000	74021080	Río Grande	746042	El Trapiche	RIO GRANDE	74	San Luis	74021
        Localidad simple	-33.2005664915694	-65.8531363375249	Coronel Pringles	INDEC	74021090000	74021090	Saladillo	746063	Saladillo	SALADILLO	74	San Luis	74021
        Localidad simple	-32.5607275180287	-65.2452806076649	Chacabuco	INDEC	74028010000	74028010	Concarán	740049	Concaran	CONCARAN	74	San Luis	74028
        Localidad simple	-32.5076504245814	-64.9869655159434	Chacabuco	INDEC	74028020000	74028020	Cortaderas	746070	Cortaderas	CORTADERAS	74	San Luis	74028
        Localidad simple	-32.9168215937221	-65.3755476812695	Chacabuco	INDEC	74028030000	74028030	Naschel	740056	Naschel	NASCHEL	74	San Luis	74028
        Localidad simple	-32.6786405437002	-64.9881795223679	Chacabuco	INDEC	74028040000	74028040	Papagayos	746077	Papagayos	PAPAGAYOS	74	San Luis	74028
        Localidad simple	-32.7717680736652	-65.3637605007649	Chacabuco	INDEC	74028050000	74028050	Renca	746084	Renca	RENCA	74	San Luis	74028
        Localidad simple	-32.658342389353	-65.3080920411456	Chacabuco	INDEC	74028060000	74028060	San Pablo	746091	San Pablo	SAN PABLO	74	San Luis	74028
        Localidad simple	-32.7329281106581	-65.2915274383295	Chacabuco	INDEC	74028070000	74028070	Tilisarao	740063	Tilisarao	TILISARAO	74	San Luis	74028
        Localidad simple	-32.9411267835778	-65.0394664526979	Chacabuco	INDEC	74028080000	74028080	Villa del Carmen	746098	Villa del Carmen	VILLA DEL CARMEN	74	San Luis	74028
        Localidad simple	-32.6175433008771	-64.9809087535547	Chacabuco	INDEC	74028090000	74028090	Villa Larca	746105	Villa Larca	VILLA LARCA	74	San Luis	74028
        Localidad simple	-33.6132806299836	-65.2717502963014	General Pedernera	INDEC	74035010000	74035010	Juan Jorba	749119	Juan Jorba	JUAN JORBA	74	San Luis	74035
        Localidad simple	-33.2811132563767	-65.6145766804084	General Pedernera	INDEC	74035020000	74035020	Juan Llerena	746126	Juan Llerena	JUAN LLERENA	74	San Luis	74035
        Localidad simple	-33.8585834476817	-65.1870408754728	General Pedernera	INDEC	74035030000	74035030	Justo Daract	740070	Justo Daract	JUSTO DARACT	74	San Luis	74035
        Localidad simple	-33.1429537099622	-65.0861306811866	General Pedernera	INDEC	74035040000	74035040	La Punilla	746133	La Punilla	LA PUNILLA	74	San Luis	74035
        Localidad simple	-33.8221476840744	-65.4237934358157	General Pedernera	INDEC	74035050000	74035050	Lavaisse	746140	Lavaisse	LAVAISSE	74	San Luis	74035
        Localidad simple	-34.6086190002894	-65.7348529983919	General Pedernera	INDEC	74035055000	74035055	Nación Ranquel	740073	Ranqueles	NACION RANQUEL	74	San Luis	74035
        Localidad simple	-33.2119853031031	-65.4927334484497	General Pedernera	INDEC	74035060000	74035060	San José del Morro	746112	San Jose del Morro	SAN JOSE DEL MORRO	74	San Luis	74035
        Localidad simple con entidad	-33.6738636408858	-65.4624765290195	General Pedernera	INDEC	74035070000	74035070	Villa Mercedes	740077	Villa Mercedes	VILLA MERCEDES	74	San Luis	74035
        Entidad	-33.6918122338202	-65.5007310600543	General Pedernera	INDEC	74035070001	74035070	Villa Mercedes	740077	Villa Mercedes	LA RIBERA	74	San Luis	74035
        Entidad	-33.6773697773889	-65.4731433656901	General Pedernera	INDEC	74035070002	74035070	Villa Mercedes	740077	Villa Mercedes	VILLA MERCEDES	74	San Luis	74035
        Localidad simple con entidad	-33.722961850163	-65.3814163660133	General Pedernera	INDEC	74035080000	74035080	Villa Reynolds			VILLA REYNOLDS	74	San Luis	74035
        Entidad	-33.7036125779234	-65.3290340917624	General Pedernera	INDEC	74035080001	74035080	Villa Reynolds			COUNTRY CLUB LOS CALDENES	74	San Luis	74035
        Entidad	-33.7239942428561	-65.3810379035533	General Pedernera	INDEC	74035080002	74035080	Villa Reynolds			5TA BRIGADA	74	San Luis	74035
        Localidad simple	-33.84292794921	-65.2147610955176	General Pedernera	INDEC	74035090000	74035090	Villa Salles	740070	Justo Daract	VILLA SALLES	74	San Luis	74035
        Localidad simple	-35.6746450244219	-65.4244230509371	Gobernador Dupuy	INDEC	74042010000	74042010	Anchorena	746147	Anchorena	ANCHORENA	74	San Luis	74042
        Localidad simple	-35.7229145031177	-65.3187210360081	Gobernador Dupuy	INDEC	74042020000	74042020	Arizona	746154	Arizona	ARIZONA	74	San Luis	74042
        Localidad simple	-35.1448484513353	-65.5676652450981	Gobernador Dupuy	INDEC	74042030000	74042030	Bagual	746161	Bagual	BAGUAL	74	San Luis	74042
        Localidad simple	-34.7755332557227	-65.6862987148176	Gobernador Dupuy	INDEC	74042040000	74042040	Batavia	746168	Batavia	BATAVIA	74	San Luis	74042
        Localidad simple	-34.7582787968944	-65.2503691694475	Gobernador Dupuy	INDEC	74042050000	74042050	Buena Esperanza	740084	Buena Esperanza	BUENA ESPERANZA	74	San Luis	74042
        Localidad simple	-34.769756515675	-65.5229345175781	Gobernador Dupuy	INDEC	74042060000	74042060	Fortín El Patria	749175	Fortin el Patria	FORTIN EL PATRIA	74	San Luis	74042
        Localidad simple	-35.1282918635603	-65.3818218917708	Gobernador Dupuy	INDEC	74042070000	74042070	Fortuna	749182	Fortuna	FORTUNA	74	San Luis	74042
        Localidad simple	-35.2127003045126	-66.3264252245578	Gobernador Dupuy	INDEC	74042080000	74042080	La Maroma			LA MAROMA	74	San Luis	74042
        Localidad simple	-35.8808971047928	-66.4450142548098	Gobernador Dupuy	INDEC	74042090000	74042090	Los Overos			LOS OVEROS	74	San Luis	74042
        Localidad simple	-35.7111681131223	-66.3525275844943	Gobernador Dupuy	INDEC	74042100000	74042100	Martín de Loyola			MARTIN DE LOYOLA	74	San Luis	74042
        Localidad simple	-34.7833678660504	-66.1701498297947	Gobernador Dupuy	INDEC	74042110000	74042110	Nahuel Mapá			NAHUEL MAPA	74	San Luis	74042
        Localidad simple	-34.7726733665409	-66.5862788668642	Gobernador Dupuy	INDEC	74042120000	74042120	Navia	746189	Navia	NAVIA	74	San Luis	74042
        Localidad simple	-35.1124747000615	-65.2532109154966	Gobernador Dupuy	INDEC	74042130000	74042130	Nueva Galia	746196	Nueva Galia	NUEVA GALIA	74	San Luis	74042
        Localidad simple	-35.1549261061197	-65.9424468511458	Gobernador Dupuy	INDEC	74042140000	74042140	Unión	740091	Union	UNION	74	San Luis	74042
        Localidad simple	-32.4102495120789	-65.0113926769819	Junín	INDEC	74049010000	74049010	Carpintería	746203	Carpinteria	CARPINTERIA	74	San Luis	74049
        Localidad simple	-32.3851963369856	-64.9859436108737	Junín	INDEC	74049020000	74049020	Cerro de Oro	740105	Merlo	CERRO DE ORO	74	San Luis	74049
        Localidad simple	-32.0621151953791	-65.3496815467824	Junín	INDEC	74049030000	74049030	Lafinur	746210	Lafinur	LAFINUR	74	San Luis	74049
        Localidad simple	-32.0257513048361	-65.3749361476641	Junín	INDEC	74049040000	74049040	Los Cajones			LOS CAJONES	74	San Luis	74049
        Localidad simple	-32.4395447509138	-65.0106822684226	Junín	INDEC	74049050000	74049050	Los Molles	746217	Los Molles	LOS MOLLES	74	San Luis	74049
        Localidad simple	-32.3425391142336	-65.0141372032908	Junín	INDEC	74049060000	74049060	Merlo	740105	Merlo	MERLO	74	San Luis	74049
        Localidad simple	-32.3423081509941	-65.2071206614116	Junín	INDEC	74049070000	74049070	Santa Rosa del Conlara	740098	Sta Rosa del Conlara	SANTA ROSA DEL CONLARA	74	San Luis	74049
        Localidad simple	-32.2481203088315	-65.5838734087874	Junín	INDEC	74049080000	74049080	Talita	746224	Talita	TALITA	74	San Luis	74049
        Localidad simple	-33.8425029072214	-66.1375993056552	Juan Martín de Pueyrredón	INDEC	74056010000	74056010	Alto Pelado			ALTO PELADO	74	San Luis	74056
        Localidad simple	-33.4306363842929	-66.9279669116981	Juan Martín de Pueyrredón	INDEC	74056020000	74056020	Alto Pencoso	746238	Alto Pencoso	ALTO PENCOSO	74	San Luis	74056
        Localidad simple	-33.3432695635018	-66.626047423873	Juan Martín de Pueyrredón	INDEC	74056030000	74056030	Balde	746245	Balde	BALDE	74	San Luis	74056
        Localidad simple	-33.757734110106	-66.6459600305752	Juan Martín de Pueyrredón	INDEC	74056040000	74056040	Beazley	746252	Beazley	BEAZLEY	74	San Luis	74056
        Localidad simple	-33.8576584773376	-66.3696150667545	Juan Martín de Pueyrredón	INDEC	74056050000	74056050	Cazador	746280	Zanjitas	CAZADOR	74	San Luis	74056
        Localidad simple	-33.3959968949714	-66.7463973832244	Juan Martín de Pueyrredón	INDEC	74056060000	74056060	Chosmes			CHOSMES	74	San Luis	74056
        Componente de localidad compuesta	-33.4004585255775	-67.148082207766	Juan Martín de Pueyrredón	INDEC	74056070000	74056070	Desaguadero	740108	Desaguadero	DESAGUADERO	74	San Luis	74056
        Localidad simple	-33.2512966067626	-66.1877022971966	Juan Martín de Pueyrredón	INDEC	74056080000	74056080	El Volcán	746259	El Volcan	EL VOLCAN	74	San Luis	74056
        Localidad simple	-33.398658341972	-67.0274295478727	Juan Martín de Pueyrredón	INDEC	74056090000	74056090	Jarilla	740108	Desaguadero	JARILLA	74	San Luis	74056
        Entidad	-33.2550955344668	-66.2286548309473	Juan Martín de Pueyrredón	INDEC	74056100001	74056100	Juana Koslay	740119	Juana Koslay	CERRO COLORADO	74	San Luis	74056
        Entidad	-33.266266753132	-66.2171495179704	Juan Martín de Pueyrredón	INDEC	74056100002	74056100	Juana Koslay	740119	Juana Koslay	CRUZ DE PIEDRA	74	San Luis	74056
        Entidad	-33.2889484546354	-66.2580406259221	Juan Martín de Pueyrredón	INDEC	74056100003	74056100	Juana Koslay	740119	Juana Koslay	EL CHORRILLO	74	San Luis	74056
        Entidad	-33.2608224121538	-66.2381061398228	Juan Martín de Pueyrredón	INDEC	74056100004	74056100	Juana Koslay	740119	Juana Koslay	LAS CHACRAS	74	San Luis	74056
        Entidad	-33.2720248979515	-66.2276619762377	Juan Martín de Pueyrredón	INDEC	74056100005	74056100	Juana Koslay	740119	Juana Koslay	SAN ROQUE	74	San Luis	74056
        Localidad simple	-33.1816571259341	-66.313607690249	Juan Martín de Pueyrredón	INDEC	74056105000	74056105	La Punta	749007	La Punta	CIUDAD DE LA PUNTA	74	San Luis	74056
        Localidad simple	-33.6458915525894	-66.9934495323611	Juan Martín de Pueyrredón	INDEC	74056110000	74056110	Mosmota			MOSMOTA	74	San Luis	74056
        Localidad simple	-33.2187787091432	-66.2307288183005	Juan Martín de Pueyrredón	INDEC	74056120000	74056120	Potrero de los Funes	746266	P. de los Funes	POTRERO DE LOS FUNES	74	San Luis	74056
        Localidad simple	-33.501125039306	-66.6514406177997	Juan Martín de Pueyrredón	INDEC	74056130000	74056130	Salinas del Bebedero	746245	Balde	SALINAS DEL BEBEDERO	74	San Luis	74056
        Localidad simple	-33.1383053611749	-66.5166859326585	Juan Martín de Pueyrredón	INDEC	74056140000	74056140	San Jerónimo	746273	San Jeronimo	SAN JERONIMO	74	San Luis	74056
        Componente de localidad compuesta	-33.3023139659883	-66.3360877357358	Juan Martín de Pueyrredón	INDEC	74056150000	74056150	San Luis	740133	San Luis	SAN LUIS	74	San Luis	74056
        Localidad simple	-33.8022746844103	-66.415462549085	Juan Martín de Pueyrredón	INDEC	74056160000	74056160	Zanjitas	746280	Zanjitas	ZANJITAS	74	San Luis	74056
        Localidad simple	-32.7975027746268	-65.7568974316301	Libertador General San Martín	INDEC	74063010000	74063010	La Vertiente	746287	Las Vertientes	LA VERTIENTE	74	San Luis	74063
        Localidad simple	-32.3763580460129	-65.5012041382004	Libertador General San Martín	INDEC	74063020000	74063020	Las Aguadas	746294	Las Aguadas	LAS AGUADAS	74	San Luis	74063
        Localidad simple	-32.5435132286539	-65.7446386901218	Libertador General San Martín	INDEC	74063030000	74063030	Las Chacras	746301	Las Chacras	LAS CHACRAS	74	San Luis	74063
        Localidad simple	-32.6298120296294	-65.551144128608	Libertador General San Martín	INDEC	74063040000	74063040	Las Lagunas	746308	Las Lagunas	LAS LAGUNAS	74	San Luis	74063
        Localidad simple	-32.8769737284291	-65.6345301522078	Libertador General San Martín	INDEC	74063050000	74063050	Paso Grande	746315	Paso Grande	PASO GRANDE	74	San Luis	74063
        Localidad simple	-32.6714012444881	-65.6626272217676	Libertador General San Martín	INDEC	74063060000	74063060	Potrerillo			POTRERILLO	74	San Luis	74063
        Localidad simple	-32.4132690463753	-65.6759306690121	Libertador General San Martín	INDEC	74063070000	74063070	San Martín	740140	San Martin	SAN MARTIN	74	San Luis	74063
        Localidad simple	-32.5339640778182	-65.6477042790939	Libertador General San Martín	INDEC	74063080000	74063080	Villa de Praga	746322	V, de Praga	VILLA DE PRAGA	74	San Luis	74063
        Localidad simple	-49.9859909808201	-68.9130816915927	Corpen Aike	INDEC	78007010000	78007010	Comandante Luis Piedrabuena			COMANDANTE LUIS PIEDRABUENA	78	Santa Cruz	78007
        Localidad simple	-50.0171892721878	-68.5248246324655	Corpen Aike	INDEC	78007020000	78007020	Puerto Santa Cruz			PUERTO SANTA CRUZ	78	Santa Cruz	78007
        Localidad simple	-46.4459492303195	-67.5251564969847	Deseado	INDEC	78014010000	78014010	Caleta Olivia			CALETA OLIVIA	78	Santa Cruz	78014
        Localidad simple	-46.7168267498228	-68.2279614588974	Deseado	INDEC	78014050000	78014050	Koluel Kaike			KOLUEL KAIKE	78	Santa Cruz	78014
        Localidad simple	-46.5424553787867	-68.9341773229667	Deseado	INDEC	78014060000	78014060	Las Heras			LAS HERAS	78	Santa Cruz	78014
        Localidad simple	-46.7938981244061	-67.9575704898943	Deseado	INDEC	78014070000	78014070	Pico Truncado			PICO TRUNCADO	78	Santa Cruz	78014
        Localidad simple	-47.7514649275067	-65.9012043680086	Deseado	INDEC	78014080000	78014080	Puerto Deseado			PUERTO DESEADO	78	Santa Cruz	78014
        Localidad simple	-47.6487686074581	-66.0446356831872	Deseado	INDEC	78014090000	78014090	Tellier			TELLIER	78	Santa Cruz	78014
        Localidad simple	-51.6805338519685	-72.0874860687819	Güer Aike	INDEC	78021010000	78021010	El Turbio			EL TURBIO	78	Santa Cruz	78021
        Localidad simple	-51.5406111767208	-72.2398967258576	Güer Aike	INDEC	78021020000	78021020	Julia Dufour			JULIA DUFOUR	78	Santa Cruz	78021
        Localidad simple	-51.5487660455569	-72.2333909775383	Güer Aike	INDEC	78021030000	78021030	Mina 3			MINA 3	78	Santa Cruz	78021
        Localidad simple	-51.6214349839165	-69.2290509293744	Güer Aike	INDEC	78021040000	78021040	Río Gallegos			RIO GALLEGOS	78	Santa Cruz	78021
        Localidad simple	-51.6639328934924	-72.1426988306974	Güer Aike	INDEC	78021050000	78021050	Rospentek			ROSPENTEK	78	Santa Cruz	78021
        Localidad simple	-51.5787581525544	-72.2080410883792	Güer Aike	INDEC	78021060000	78021060	28 de Noviembre			28 DE NOVIEMBRE	78	Santa Cruz	78021
        Localidad simple	-51.5328383738253	-72.3341032077956	Güer Aike	INDEC	78021070000	78021070	Yacimientos Río Turbio			YACIMIENTOS RIO TURBIO	78	Santa Cruz	78021
        Localidad simple	-50.3373208485428	-72.2619950698979	Lago Argentino	INDEC	78028010000	78028010	El Calafate			EL CALAFATE	78	Santa Cruz	78028
        Localidad simple	-49.3319731177032	-72.8916267088672	Lago Argentino	INDEC	78028020000	78028020	El Chaltén			EL CHALTEN	78	Santa Cruz	78028
        Localidad simple	-49.5990148275349	-71.445802241684	Lago Argentino	INDEC	78028030000	78028030	Tres Lagos			TRES LAGOS	78	Santa Cruz	78028
        Localidad simple	-46.5487484894558	-71.6274835082657	Lago Buenos Aires	INDEC	78035010000	78035010	Los Antiguos			LOS ANTIGUOS	78	Santa Cruz	78035
        Localidad simple	-46.5921416878797	-70.9257278426639	Lago Buenos Aires	INDEC	78035020000	78035020	Perito Moreno			PERITO MORENO	78	Santa Cruz	78035
        Localidad simple	-49.307703595363	-67.7319702926075	Magallanes	INDEC	78042010000	78042010	Puerto San Julián			PUERTO SAN JULIAN	78	Santa Cruz	78042
        Localidad simple	-47.4461490043983	-70.9285155605965	Río Chico	INDEC	78049010000	78049010	Bajo Caracoles			BAJO CARACOLES	78	Santa Cruz	78049
        Localidad simple	-48.7521223249696	-70.2442035901869	Río Chico	INDEC	78049020000	78049020	Gobernador Gregores			GOBERNADOR GREGORES	78	Santa Cruz	78049
        Localidad simple	-47.5667812360399	-71.7434756314323	Río Chico	INDEC	78049030000	78049030	Hipólito Yrigoyen			HIPOLITO YRIGOYEN	78	Santa Cruz	78049
        Localidad simple	-32.7846557002825	-61.605481877095	Belgrano	INDEC	82007010000	82007010	Armstrong	820007	Armstrong	ARMSTRONG	82	Santa Fe	82007
        Localidad simple	-32.4247998561473	-61.8903345863257	Belgrano	INDEC	82007020000	82007020	Bouquet	822007	Bouquet	BOUQUET	82	Santa Fe	82007
        Localidad simple	-32.6826842550048	-61.5185798347876	Belgrano	INDEC	82007030000	82007030	Las Parejas	820014	Las Parejas	LAS PAREJAS	82	Santa Fe	82007
        Localidad simple	-32.4785768176046	-61.5748036822531	Belgrano	INDEC	82007040000	82007040	Las Rosas	820021	Las Rosas	LAS ROSAS	82	Santa Fe	82007
        Localidad simple	-32.567997020224	-61.7680762352029	Belgrano	INDEC	82007050000	82007050	Montes de Oca	822014	Montes de Oca	MONTES DE OCA	82	Santa Fe	82007
        Localidad simple	-32.7482982621557	-61.8203359267394	Belgrano	INDEC	82007060000	82007060	Tortugas	822021	Tortugas	TORTUGAS	82	Santa Fe	82007
        Localidad simple	-33.1483008378636	-61.4713349349693	Caseros	INDEC	82014010000	82014010	Arequito	822028	Arequito	AREQUITO	82	Santa Fe	82014
        Localidad simple	-33.0911311154911	-61.7917113876172	Caseros	INDEC	82014020000	82014020	Arteaga	822035	Arteaga	ARTEAGA	82	Santa Fe	82014
        Localidad simple	-33.3414152210784	-61.8622809808056	Caseros	INDEC	82014030000	82014030	Beravebú	822042	Berabevú	BERAVEBU	82	Santa Fe	82014
        Localidad simple	-33.3761183026397	-61.185501310201	Caseros	INDEC	82014040000	82014040	Bigand	822049	Bigand	BIGAND	82	Santa Fe	82014
        Localidad simple	-33.0424955546762	-61.1693311184421	Caseros	INDEC	82014050000	82014050	Casilda	820028	Casilda	CASILDA	82	Santa Fe	82014
        Localidad simple	-33.2470674643201	-61.3575935561826	Caseros	INDEC	82014060000	82014060	Chabas	822056	Chabas	CHABAS	82	Santa Fe	82014
        Localidad simple	-33.3258409849243	-62.0386496702618	Caseros	INDEC	82014070000	82014070	Chañar Ladeado	822063	Chañar Ladeado	CHAÑAR LADEADO	82	Santa Fe	82014
        Localidad simple	-33.402405547162	-61.8449306727075	Caseros	INDEC	82014080000	82014080	Gödeken	822070	Gödeken	GODEKEN	82	Santa Fe	82014
        Localidad simple	-33.1054899954916	-61.3265015329286	Caseros	INDEC	82014090000	82014090	Los Molinos	822077	Los Molinos	LOS MOLINOS	82	Santa Fe	82014
        Localidad simple	-33.1430061971604	-61.6066128669784	Caseros	INDEC	82014100000	82014100	Los Nogales	822091	San José de la Esquina	LOS NOGALES	82	Santa Fe	82014
        Localidad simple	-33.3769918276119	-61.7121943064881	Caseros	INDEC	82014110000	82014110	Los Quirquinchos	822084	Los Quirquinchos	LOS QUIRQUINCHOS	82	Santa Fe	82014
        Localidad simple	-33.1140485294151	-61.703312346428	Caseros	INDEC	82014120000	82014120	San José de la Esquina	822091	San José de la Esquina	SAN JOSE DE LA ESQUINA	82	Santa Fe	82014
        Localidad simple	-33.1477729818051	-61.2778572887319	Caseros	INDEC	82014130000	82014130	Sanford	822098	Sanford	SANFORD	82	Santa Fe	82014
        Localidad simple	-33.3503085722913	-61.4460374000461	Caseros	INDEC	82014140000	82014140	Villada	822105	Villada	VILLADA	82	Santa Fe	82014
        Localidad simple	-30.9823474545911	-61.7439869348366	Castellanos	INDEC	82021010000	82021010	Aldao	822147	Colonia Aldao	ALDAO	82	Santa Fe	82021
        Localidad simple	-31.5526328296108	-61.5462650173096	Castellanos	INDEC	82021020000	82021020	Angélica	822112	Angélica	ANGELICA	82	Santa Fe	82021
        Localidad simple	-30.9981187823937	-61.4325186889204	Castellanos	INDEC	82021030000	82021030	Ataliva	822119	Ataliva	ATALIVA	82	Santa Fe	82021
        Localidad simple	-31.4236023757354	-61.4244708809147	Castellanos	INDEC	82021040000	82021040	Aurelia	822126	Aurelia	AURELIA	82	Santa Fe	82021
        Componente de localidad compuesta	-31.4192515021464	-62.059146376237	Castellanos	INDEC	82021050000	82021050	Barrios Acapulco y Veracruz	822280	Josefina	BARRIOS ACAPULCO Y VERACRUZ	82	Santa Fe	82021
        Localidad simple	-31.2731232182116	-61.9448854961658	Castellanos	INDEC	82021060000	82021060	Bauer y Sigel	822133	Bauer y Sigel	BAUER Y SIGEL	82	Santa Fe	82021
        Localidad simple	-31.2839795053037	-61.409342518123	Castellanos	INDEC	82021070000	82021070	Bella Italia	822140	Bella Italia	BELLA ITALIA	82	Santa Fe	82021
        Componente de localidad compuesta	-31.2085396563705	-61.7255955564221	Castellanos	INDEC	82021080000	82021080	Castellanos	822168	Castellanos	CASTELLANOS	82	Santa Fe	82021
        Localidad simple	-30.855781133807	-61.8509147420168	Castellanos	INDEC	82021090000	82021090	Colonia Bicha	822154	Colonia Bicha	COLONIA BICHA	82	Santa Fe	82021
        Localidad simple	-31.4338497252165	-61.8417021711297	Castellanos	INDEC	82021100000	82021100	Colonia Cello	822175	Colonia Cello	COLONIA CELLO	82	Santa Fe	82021
        Localidad simple	-31.6868334221829	-61.6492968757313	Castellanos	INDEC	82021110000	82021110	Colonia Margarita	822189	Colonia Margarita	COLONIA MARGARITA	82	Santa Fe	82021
        Localidad simple	-30.8392235567556	-61.4897111638226	Castellanos	INDEC	82021120000	82021120	Colonia Raquel	822196	Colonia Raquel	COLONIA RAQUEL	82	Santa Fe	82021
        Localidad simple	-31.176158616875	-61.9194620018005	Castellanos	INDEC	82021130000	82021130	Coronel Fraga	822203	Coronel Fraga	CORONEL FRAGA	82	Santa Fe	82021
        Localidad simple	-31.097624747292	-61.6283124096055	Castellanos	INDEC	82021140000	82021140	Egusquiza	822210	Egusquiza	EGUSQUIZA	82	Santa Fe	82021
        Localidad simple	-31.6178586482318	-61.9329258733186	Castellanos	INDEC	82021150000	82021150	Esmeralda	822217	Esmeralda	ESMERALDA	82	Santa Fe	82021
        Localidad simple	-31.52416914925	-61.7206457133884	Castellanos	INDEC	82021160000	82021160	Estación Clucellas	822224	Estación Clucellas	ESTACION CLUCELLAS	82	Santa Fe	82021
        Localidad simple	-31.3174603823906	-61.6940034650798	Castellanos	INDEC	82021170000	82021170	Estación Saguier	822336	Saguier	ESTACION SAGUIER	82	Santa Fe	82021
        Localidad simple	-30.9476135702694	-61.8577735272139	Castellanos	INDEC	82021180000	82021180	Eusebia y Carolina	822231	Eusebia y Carolina	EUSEBIA Y CAROLINA	82	Santa Fe	82021
        Localidad simple	-31.5777448514157	-61.7836661825715	Castellanos	INDEC	82021190000	82021190	Eustolia	822238	Eustolia	EUSTOLIA	82	Santa Fe	82021
        Componente de localidad compuesta	-31.4313990849769	-62.0634917387843	Castellanos	INDEC	82021200000	82021200	Frontera	820035	Frontera	FRONTERA	82	Santa Fe	82021
        Localidad simple	-31.652027726261	-61.8053907511433	Castellanos	INDEC	82021210000	82021210	Garibaldi	822259	Garibaldi	GARIBALDI	82	Santa Fe	82021
        Localidad simple	-30.8702088524931	-61.3485902390711	Castellanos	INDEC	82021220000	82021220	Humberto Primo	822273	Humberto Primo	HUMBERTO PRIMO	82	Santa Fe	82021
        Localidad simple	-31.4079691369305	-61.9921847239399	Castellanos	INDEC	82021230000	82021230	Josefina	822280	Josefina	JOSEFINA	82	Santa Fe	82021
        Localidad simple	-31.1272471029986	-61.4529569120506	Castellanos	INDEC	82021240000	82021240	Lehmann	822287	Lehmann	LEHMANN	82	Santa Fe	82021
        Localidad simple	-31.676627573626	-61.7536009774385	Castellanos	INDEC	82021250000	82021250	María Juana	822294	María Juana	MARIA JUANA	82	Santa Fe	82021
        Localidad simple	-31.1189046819859	-61.5151982929847	Castellanos	INDEC	82021260000	82021260	Nueva Lehmann	822287	Lehmann	NUEVA LEHMANN	82	Santa Fe	82021
        Localidad simple	-31.4545505198837	-61.7074756228147	Castellanos	INDEC	82021270000	82021270	Plaza Clucellas	822308	Plaza Clucellas	PLAZA CLUCELLAS	82	Santa Fe	82021
        Localidad simple	-31.3251049515902	-61.6777373324018	Castellanos	INDEC	82021280000	82021280	Plaza Saguier	822336	Saguier	PLAZA SAGUIER	82	Santa Fe	82021
        Entidad	-31.2319180453244	-61.6101076012158	Castellanos	INDEC	82021290001	82021290	Presidente Roca	822315	Presidente Roca	ESTACION PRESIDENTE ROCA	82	Santa Fe	82021
        Entidad	-31.2296979058147	-61.6101036240639	Castellanos	INDEC	82021290002	82021290	Presidente Roca	822315	Presidente Roca	PRESIDENTE ROCA	82	Santa Fe	82021
        Localidad simple	-31.0409745475723	-61.8898826370338	Castellanos	INDEC	82021300000	82021300	Pueblo Marini	822322	Pueblo Marini	PUEBLO MARINI	82	Santa Fe	82021
        Localidad simple	-31.2482482413205	-61.4998117939868	Castellanos	INDEC	82021310000	82021310	Rafaela	820042	Rafaela	RAFAELA	82	Santa Fe	82021
        Localidad simple	-31.0937041766842	-61.9032318673573	Castellanos	INDEC	82021320000	82021320	Ramona	822329	Ramona	RAMONA	82	Santa Fe	82021
        Componente de localidad compuesta	-31.2128134181244	-61.7257200007794	Castellanos	INDEC	82021330000	82021330	San Antonio	822343	San Antonio	SAN ANTONIO	82	Santa Fe	82021
        Localidad simple	-31.6999505604131	-61.5688417180763	Castellanos	INDEC	82021340000	82021340	San Vicente	822350	San Vicente	SAN VICENTE	82	Santa Fe	82021
        Localidad simple	-31.337359049521	-61.8181783780784	Castellanos	INDEC	82021350000	82021350	Santa Clara de Saguier	822357	Santa Clara de Saguier	SANTA CLARA DE SAGUIER	82	Santa Fe	82021
        Localidad simple	-30.9468555127161	-61.5612504315515	Castellanos	INDEC	82021360000	82021360	Sunchales	820049	Sunchales	SUNCHALES	82	Santa Fe	82021
        Localidad simple	-31.3575963913649	-61.5164389963223	Castellanos	INDEC	82021370000	82021370	Susana	822364	Susana	SUSANA	82	Santa Fe	82021
        Localidad simple	-30.8481071493852	-61.5924018154956	Castellanos	INDEC	82021380000	82021380	Tacural	822371	Tacural	TACURAL	82	Santa Fe	82021
        Localidad simple	-31.1923707919053	-61.8336140985666	Castellanos	INDEC	82021390000	82021390	Vila	822385	Vila	VILA	82	Santa Fe	82021
        Localidad simple	-31.4418599622731	-62.0297169711427	Castellanos	INDEC	82021400000	82021400	Villa Josefina	820035	Frontera	VILLA JOSEFINA	82	Santa Fe	82021
        Localidad simple	-31.3391346339244	-61.622588386296	Castellanos	INDEC	82021410000	82021410	Villa San José	822392	Villa San José	VILLA SAN JOSE	82	Santa Fe	82021
        Localidad simple	-30.7402529602428	-61.3409665931228	Castellanos	INDEC	82021420000	82021420	Virginia	822399	Virginia	VIRGINIA	82	Santa Fe	82021
        Localidad simple	-31.5643972137494	-61.898425060781	Castellanos	INDEC	82021430000	82021430	Zenón Pereyra	822406	Zenón Pereyra	ZENON PEREYRA	82	Santa Fe	82021
        Localidad simple	-33.5401979791092	-61.1246337163915	Villa Constitución	INDEC	82028010000	82028010	Alcorta	822413	Alcorta	ALCORTA	82	Santa Fe	82028
        Componente de localidad compuesta	-33.2860666179194	-60.2720977056001	Villa Constitución	INDEC	82028020000	82028020	Barrio Arroyo del Medio	820056	Villa Constitución	BARRIO ARROYO DEL MEDIO	82	Santa Fe	82028
        Componente de localidad compuesta	-33.255594638469	-60.3897758707887	Villa Constitución	INDEC	82028030000	82028030	Barrio Mitre	822490	Pavón	BARRIO MITRE	82	Santa Fe	82028
        Localidad simple	-33.4600615218579	-61.3189324391797	Villa Constitución	INDEC	82028040000	82028040	Bombal	822420	Bombal	BOMBAL	82	Santa Fe	82028
        Localidad simple	-33.5174175561246	-60.6132968867711	Villa Constitución	INDEC	82028050000	82028050	Cañada Rica	822427	Cañada Rica	CAÑADA RICA	82	Santa Fe	82028
        Localidad simple	-33.3984208661427	-60.6241114199013	Villa Constitución	INDEC	82028060000	82028060	Cepeda	822434	Cepeda	CEPEDA	82	Santa Fe	82028
        Componente de localidad compuesta	-33.2628625471248	-60.3804644639294	Villa Constitución	INDEC	82028070000	82028070	Empalme Villa Constitución	822441	Empalme Villa Constitución	EMPALME VILLA CONSTITUCION	82	Santa Fe	82028
        Componente de localidad compuesta	-33.441023527734	-61.473143421839	Villa Constitución	INDEC	82028080000	82028080	Firmat	820063	Firmat	FIRMAT	82	Santa Fe	82028
        Localidad simple	-33.6018434911159	-60.5989383522422	Villa Constitución	INDEC	82028090000	82028090	General Gelly	822448	General Gelly	GENERAL GELLY	82	Santa Fe	82028
        Localidad simple	-33.3697098731789	-60.5094130215383	Villa Constitución	INDEC	82028100000	82028100	Godoy	822455	Godoy	GODOY	82	Santa Fe	82028
        Localidad simple	-33.496020689866	-60.5122133295946	Villa Constitución	INDEC	82028110000	82028110	Juan B. Molina	822462	Juan Bernabé Molina	JUAN B. MOLINA	82	Santa Fe	82028
        Localidad simple	-33.71761494002	-61.0500179215707	Villa Constitución	INDEC	82028120000	82028120	Juncal	822469	Juncal	JUNCAL	82	Santa Fe	82028
        Localidad simple	-33.3596257970974	-60.6584568664422	Villa Constitución	INDEC	82028130000	82028130	La Vanguardia	822476	La Vanguardia	LA VANGUARDIA	82	Santa Fe	82028
        Localidad simple	-33.4851439474937	-60.9567885809825	Villa Constitución	INDEC	82028140000	82028140	Máximo Paz	822483	M9Ximo Paz	MAXIMO PAZ	82	Santa Fe	82028
        Localidad simple	-33.2430754805422	-60.4062757935089	Villa Constitución	INDEC	82028150000	82028150	Pavón	822490	Pavón	PAVON	82	Santa Fe	82028
        Localidad simple	-33.3134173933438	-60.8249758944661	Villa Constitución	INDEC	82028160000	82028160	Pavón Arriba	822497	Pavón Arriba	PAVON ARRIBA	82	Santa Fe	82028
        Localidad simple	-33.5411378598405	-60.804329558703	Villa Constitución	INDEC	82028170000	82028170	Peyrano	822504	Peyrano	PEYRANO	82	Santa Fe	82028
        Localidad simple	-33.335855095367	-60.4608740548372	Villa Constitución	INDEC	82028180000	82028180	Rueda	822511	Rueda	RUEDA	82	Santa Fe	82028
        Localidad simple	-33.4385471621789	-60.7911542772276	Villa Constitución	INDEC	82028190000	82028190	Santa Teresa	822518	Santa Teresa	SANTA TERESA	82	Santa Fe	82028
        Localidad simple	-33.4330128597835	-60.6301906902003	Villa Constitución	INDEC	82028200000	82028200	Sargento Cabral	822525	Sargento Cabral	SARGENTO CABRAL	82	Santa Fe	82028
        Localidad simple	-33.4178567628002	-60.5572137324943	Villa Constitución	INDEC	82028210000	82028210	Stephenson	822434	Cepeda	STEPHENSON	82	Santa Fe	82028
        Localidad simple	-33.3122172562755	-60.3120513587534	Villa Constitución	INDEC	82028220000	82028220	Theobald	822532	Theobald	THEOBALD	82	Santa Fe	82028
        Localidad simple	-33.2324133911798	-60.3324988273466	Villa Constitución	INDEC	82028230000	82028230	Villa Constitución	820056	Villa Constitución	VILLA CONSTITUCION	82	Santa Fe	82028
        Localidad simple	-31.2023253009306	-60.1614504193394	Garay	INDEC	82035010000	82035010	Cayastá	822539	Cayastá	CAYASTA	82	Santa Fe	82035
        Localidad simple	-31.0992706781177	-60.0881512872483	Garay	INDEC	82035020000	82035020	Helvecia	822553	Helvecia	HELVECIA	82	Santa Fe	82035
        Localidad simple	-31.4956365531425	-60.4286467714748	Garay	INDEC	82035030000	82035030	Los Zapallos	822567	Santa Rosa de Calchines	LOS ZAPALLOS	82	Santa Fe	82035
        Localidad simple	-30.9229849971234	-60.0481154588667	Garay	INDEC	82035040000	82035040	Saladero Mariano Cabal	822560	Saladero Mariano Cabal	SALADERO MARIANO CABAL	82	Santa Fe	82035
        Localidad simple	-31.422365592266	-60.3348940800468	Garay	INDEC	82035050000	82035050	Santa Rosa de Calchines	822567	Santa Rosa de Calchines	SANTA ROSA DE CALCHINES	82	Santa Fe	82035
        Localidad simple	-34.3345323396045	-62.3748007656351	General López	INDEC	82042010000	82042010	Aarón Castellanos	822574	Aarón Castellanos	AARON CASTELLANOS	82	Santa Fe	82042
        Localidad simple	-34.136118440775	-62.4229084851079	General López	INDEC	82042020000	82042020	Amenábar	822581	Amenábar	AMENABAR	82	Santa Fe	82042
        Localidad simple	-33.4414158758935	-62.0868714692657	General López	INDEC	82042030000	82042030	Cafferata	822588	Cafferata	CAFFERATA	82	Santa Fe	82042
        Localidad simple	-33.4103440716357	-61.6070433975613	General López	INDEC	82042040000	82042040	Cañada del Ucle	822595	Cañada del Ucle	CAÑADA DEL UCLE	82	Santa Fe	82042
        Localidad simple	-33.7327788629688	-61.7609271479418	General López	INDEC	82042050000	82042050	Carmen	822602	Carmen	CARMEN	82	Santa Fe	82042
        Localidad simple	-33.5982834566103	-61.3117684362059	General López	INDEC	82042060000	82042060	Carreras	822609	Carreras	CARRERAS	82	Santa Fe	82042
        Localidad simple	-33.8005299368969	-61.7440181936851	General López	INDEC	82042070000	82042070	Chapuy	822616	Chapuy	CHAPUY	82	Santa Fe	82042
        Localidad simple	-33.6007825133126	-61.6046646604986	General López	INDEC	82042080000	82042080	Chovet	822623	Chovet	CHOVET	82	Santa Fe	82042
        Localidad simple	-34.1846191181657	-62.0235323680591	General López	INDEC	82042090000	82042090	Christophersen	822630	Christophersen	CHRISTOPHERSEN	82	Santa Fe	82042
        Localidad simple	-34.3743429234538	-62.1289273623308	General López	INDEC	82042100000	82042100	Diego de Alvear	822637	Diego de Alvear	DIEGO DE ALVEAR	82	Santa Fe	82042
        Localidad simple	-33.7016560168056	-61.6163727056605	General López	INDEC	82042110000	82042110	Elortondo	822644	Elortondo	ELORTONDO	82	Santa Fe	82042
        Componente de localidad compuesta	-33.4580496833225	-61.4914525089409	General López	INDEC	82042120000	82042120	Firmat	820063	Firmat	FIRMAT	82	Santa Fe	82042
        Localidad simple	-33.8028556653324	-61.3358033222625	General López	INDEC	82042130000	82042130	Hughes	822651	Hughes	HUGHES	82	Santa Fe	82042
        Localidad simple	-33.5446704008322	-61.9736324283312	General López	INDEC	82042140000	82042140	La Chispa	822658	La Chispa	LA CHISPA	82	Santa Fe	82042
        Localidad simple	-33.7196527453715	-61.3149208168028	General López	INDEC	82042150000	82042150	Labordeboy	822665	Labordeboy	LABORDEBOY	82	Santa Fe	82042
        Localidad simple	-34.1663295663381	-62.428038027595	General López	INDEC	82042160000	82042160	Lazzarino	822672	Lazzarino	LAZZARINO	82	Santa Fe	82042
        Localidad simple	-33.7244236308417	-62.2478391856324	General López	INDEC	82042170000	82042170	Maggiolo	822679	Maggiolo	MAGGIOLO	82	Santa Fe	82042
        Localidad simple	-34.0062849828557	-61.900439675435	General López	INDEC	82042180000	82042180	María Teresa	822686	María Teresa	MARIA TERESA	82	Santa Fe	82042
        Localidad simple	-33.6619144262235	-61.4576887408087	General López	INDEC	82042190000	82042190	Melincué	822693	Melincué	MELINCUE	82	Santa Fe	82042
        Localidad simple	-33.5299502620402	-61.4662068731284	General López	INDEC	82042200000	82042200	Miguel Torres	822700	Miguel Torres	MIGUEL TORRES	82	Santa Fe	82042
        Localidad simple	-33.6428623685969	-61.8577974691015	General López	INDEC	82042210000	82042210	Murphy	822707	Murphy	MURPHY	82	Santa Fe	82042
        Localidad simple	-34.2636098414032	-62.7117038844931	General López	INDEC	82042220000	82042220	Rufino	820070	Rufino	RUFINO	82	Santa Fe	82042
        Localidad simple	-33.8723970130663	-62.0917158307714	General López	INDEC	82042230000	82042230	San Eduardo	822714	San Eduardo	SAN EDUARDO	82	Santa Fe	82042
        Localidad simple	-33.5905400040189	-62.1244693933144	General López	INDEC	82042240000	82042240	San Francisco de Santa Fe	822721	San Francisco de Santa Fe	SAN FRANCISCO DE SANTA FE	82	Santa Fe	82042
        Localidad simple	-34.3265186547551	-62.0379529693876	General López	INDEC	82042250000	82042250	San Gregorio	822728	San Gregorio	SAN GREGORIO	82	Santa Fe	82042
        Localidad simple	-34.0095285599362	-62.2424503438155	General López	INDEC	82042260000	82042260	Sancti Spiritu	822735	Sancti Spiritu	SANCTI SPIRITU	82	Santa Fe	82042
        Localidad simple	-33.8894892658382	-61.6965906556385	General López	INDEC	82042270000	82042270	Santa Isabel	822742	Santa Isabel	SANTA ISABEL	82	Santa Fe	82042
        Localidad simple	-34.1916130913817	-61.5272264570788	General López	INDEC	82042280000	82042280	Teodelina	822749	Teodelina	TEODELINA	82	Santa Fe	82042
        Localidad simple	-33.747315292187	-61.9695358692001	General López	INDEC	82042290000	82042290	Venado Tuerto	820277	Venado Tuerto	VENADO TUERTO	82	Santa Fe	82042
        Localidad simple	-34.0061339956012	-61.6063880455097	General López	INDEC	82042300000	82042300	Villa Cañás	820084	Villa Cañás	VILLA CAÑAS	82	Santa Fe	82042
        Localidad simple	-33.7942942799185	-61.2114409469748	General López	INDEC	82042310000	82042310	Wheelwright	822756	Wheelwright	WHEELWRIGHT	82	Santa Fe	82042
        Localidad simple	-28.7250869970621	-59.4804164807602	General Obligado	INDEC	82049010000	82049010	Arroyo Ceibal	822763	Arroyo Ceibal	ARROYO CEIBAL	82	Santa Fe	82049
        Componente de localidad compuesta	-29.1193659780886	-59.6592512444638	General Obligado	INDEC	82049020000	82049020	Avellaneda	820091	Avellaneda	AVELLANEDA	82	Santa Fe	82049
        Localidad simple	-29.2752681077911	-59.8472221836471	General Obligado	INDEC	82049030000	82049030	Berna	822770	Berna	BERNA	82	Santa Fe	82049
        Localidad simple	-29.1334936783763	-59.9473145917686	General Obligado	INDEC	82049040000	82049040	El Araza	822777	El Arazá	EL ARAZA	82	Santa Fe	82049
        Localidad simple	-28.2302084157377	-59.2639844821107	General Obligado	INDEC	82049050000	82049050	El Rabón	822784	El Rabón	EL RABON	82	Santa Fe	82049
        Localidad simple	-28.0427359947317	-59.2187469070082	General Obligado	INDEC	82049060000	82049060	Florencia	822798	Florencia	FLORENCIA	82	Santa Fe	82049
        Localidad simple	-28.9453022044499	-59.5634151929235	General Obligado	INDEC	82049070000	82049070	Guadalupe Norte	822805	Guadalupe Norte	GUADALUPE NORTE	82	Santa Fe	82049
        Localidad simple	-28.759813885955	-59.5772324985847	General Obligado	INDEC	82049080000	82049080	Ingeniero Chanourdie	822812	Ingeniero Chanourdie	INGENIERO CHANOURDIE	82	Santa Fe	82049
        Localidad simple	-28.493935731005	-59.2950745667521	General Obligado	INDEC	82049090000	82049090	La Isleta			LA ISLETA	82	Santa Fe	82049
        Localidad simple	-28.9728525913241	-59.8484991818248	General Obligado	INDEC	82049100000	82049100	La Sarita	822819	La Sarita	LA SARITA	82	Santa Fe	82049
        Localidad simple	-28.8429706211446	-59.6379287718138	General Obligado	INDEC	82049110000	82049110	Lanteri	822826	Lanteri	LANTERI	82	Santa Fe	82049
        Localidad simple	-28.8490101824631	-59.5005781021303	General Obligado	INDEC	82049120000	82049120	Las Garzas	822833	Las Garzas	LAS GARZAS	82	Santa Fe	82049
        Localidad simple	-28.3540749299597	-59.2595521000375	General Obligado	INDEC	82049130000	82049130	Las Toscas	820098	Las Toscas	LAS TOSCAS	82	Santa Fe	82049
        Localidad simple	-29.3701211027814	-59.7378677770758	General Obligado	INDEC	82049140000	82049140	Los Laureles	822840	Los Laureles	LOS LAURELES	82	Santa Fe	82049
        Localidad simple	-29.3506755184496	-59.9705883109423	General Obligado	INDEC	82049150000	82049150	Malabrigo	820105	Malabrigo	MALABRIGO	82	Santa Fe	82049
        Localidad simple	-28.8716623885107	-59.86560439575	General Obligado	INDEC	82049160000	82049160	Paraje San Manuel	822819	La Sarita	PARAJE SAN MANUEL	82	Santa Fe	82049
        Localidad simple	-29.2349873699001	-59.5802691789886	General Obligado	INDEC	82049170000	82049170	Puerto Reconquista	820112	Reconquista	PUERTO RECONQUISTA	82	Santa Fe	82049
        Componente de localidad compuesta	-29.1451468389264	-59.6510730563582	General Obligado	INDEC	82049180000	82049180	Reconquista	820112	Reconquista	RECONQUISTA	82	Santa Fe	82049
        Localidad simple	-28.3823470938865	-59.2645742897512	General Obligado	INDEC	82049190000	82049190	San Antonio de Obligado	822854	San Antonio de Obligado	SAN ANTONIO DE OBLIGADO	82	Santa Fe	82049
        Localidad simple	-28.4202062467088	-59.2556740044459	General Obligado	INDEC	82049200000	82049200	Tacuarendí	822861	Tacuarendí	TACUARENDI	82	Santa Fe	82049
        Localidad simple	-28.4933207178133	-59.6141214862397	General Obligado	INDEC	82049210000	82049210	Villa Ana	822868	Villa Ana	VILLA ANA	82	Santa Fe	82049
        Localidad simple	-28.2450754331528	-59.4547598305134	General Obligado	INDEC	82049220000	82049220	Villa Guillermina	822875	Villa Guillermina	VILLA GUILLERMINA	82	Santa Fe	82049
        Localidad simple	-28.4904509578913	-59.3587641281681	General Obligado	INDEC	82049230000	82049230	Villa Ocampo			VILLA OCAMPO	82	Santa Fe	82049
        Localidad simple	-32.6103776107001	-61.3244409322018	Iriondo	INDEC	82056010000	82056010	Barrio Cicarelli	820133	Totoras	BARRIO CICARELLI	82	Santa Fe	82056
        Localidad simple	-32.7399961772877	-61.2915869736645	Iriondo	INDEC	82056020000	82056020	Bustinza	822882	Bustinza	BUSTINZA	82	Santa Fe	82056
        Localidad simple	-32.8166867292145	-61.3899661468272	Iriondo	INDEC	82056030000	82056030	Cañada de Gómez	820126	Cañada de Gómez	CAÑADA DE GOMEZ	82	Santa Fe	82056
        Localidad simple	-32.5112871642714	-61.0305147885477	Iriondo	INDEC	82056040000	82056040	Carrizales	822889	Carrizales	CARRIZALES	82	Santa Fe	82056
        Localidad simple	-32.4634203095763	-61.2910434085442	Iriondo	INDEC	82056050000	82056050	Classon	822896	Clason	CLASSON	82	Santa Fe	82056
        Localidad simple	-32.5988903254118	-61.3767121670301	Iriondo	INDEC	82056060000	82056060	Colonia Médici	820133	Totoras	COLONIA MEDICI	82	Santa Fe	82056
        Localidad simple	-32.8494610803638	-61.2545569082818	Iriondo	INDEC	82056070000	82056070	Correa	822903	Correa	CORREA	82	Santa Fe	82056
        Localidad simple	-32.5539810535705	-61.2197995428986	Iriondo	INDEC	82056080000	82056080	Larguía	820133	Totoras	LARGUIA	82	Santa Fe	82056
        Localidad simple	-32.7147297231149	-61.0226073568773	Iriondo	INDEC	82056090000	82056090	Lucio V. López	822910	Lucio V. López	LUCIO V. LOPEZ	82	Santa Fe	82056
        Localidad simple	-32.5758215248523	-60.8553515331513	Iriondo	INDEC	82056100000	82056100	Oliveros	822917	Oliveros	OLIVEROS	82	Santa Fe	82056
        Localidad simple	-32.6717914164971	-60.8761806736397	Iriondo	INDEC	82056110000	82056110	Pueblo Andino	822924	Pueblo Andino	PUEBLO ANDINO	82	Santa Fe	82056
        Localidad simple	-32.6680220468782	-61.0890486524519	Iriondo	INDEC	82056120000	82056120	Salto Grande	822931	Salto Grande	SALTO GRANDE	82	Santa Fe	82056
        Localidad simple	-32.6055740792488	-60.9481762653391	Iriondo	INDEC	82056130000	82056130	Serodino	822938	Serodino	SERODINO	82	Santa Fe	82056
        Localidad simple	-32.5863515505869	-61.1673292562769	Iriondo	INDEC	82056140000	82056140	Totoras	820133	Totoras	TOTORAS	82	Santa Fe	82056
        Localidad simple	-32.9643241574442	-61.5478333256653	Iriondo	INDEC	82056150000	82056150	Villa Eloísa	822945	Villa Eloísa	VILLA ELOISA	82	Santa Fe	82056
        Componente de localidad compuesta	-32.633431229414	-60.8208776739619	Iriondo	INDEC	82056160000	82056160	Villa La Rivera (Oliveros)	822917	Oliveros	VILLA LA RIVERA - OLIVEROS	82	Santa Fe	82056
        Componente de localidad compuesta	-32.6413858836004	-60.8234183677953	Iriondo	INDEC	82056170000	82056170	Villa La Rivera (Pueblo Andino)	822924	Pueblo Andino	VILLA LA RIVERA - PUEBLO ANDINO	82	Santa Fe	82056
        Localidad simple	-31.5551884917333	-60.6783108244693	La Capital	INDEC	82063010000	82063010	Angel Gallardo	823001	Monte Vera	ANGEL GALLARDO	82	Santa Fe	82063
        Localidad simple	-31.4322203707863	-60.6676588774069	La Capital	INDEC	82063020000	82063020	Arroyo Aguiar	822952	Arroyo Aguiar	ARROYO AGUIAR	82	Santa Fe	82063
        Entidad	-31.5577005393669	-60.5166665613111	La Capital	INDEC	82063030001	82063030	Arroyo Leyes	822959	Arroyo Leyes	ARROYO LEYES	82	Santa Fe	82063
        Entidad	-31.5644326802115	-60.414954582383	La Capital	INDEC	82063030002	82063030	Arroyo Leyes	822959	Arroyo Leyes	RINCON NORTE	82	Santa Fe	82063
        Localidad simple	-31.1039907773825	-60.7271526484511	La Capital	INDEC	82063040000	82063040	Cabal	822966	Cabal	CABAL	82	Santa Fe	82063
        Localidad simple	-31.2410698890417	-60.531189241674	La Capital	INDEC	82063050000	82063050	Campo Andino	822973	Campo Andino	CAMPO ANDINO	82	Santa Fe	82063
        Localidad simple	-31.3995244031815	-60.7491149288676	La Capital	INDEC	82063060000	82063060	Candioti	822980	Candioti	CANDIOTI	82	Santa Fe	82063
        Localidad simple	-31.0610951750412	-60.7464379477764	La Capital	INDEC	82063070000	82063070	Emilia	822987	Emilia	EMILIA	82	Santa Fe	82063
        Localidad simple	-31.3092619266382	-60.6607816085928	La Capital	INDEC	82063080000	82063080	Laguna Paiva	820140	Laguna Paiva	LAGUNA PAIVA	82	Santa Fe	82063
        Localidad simple	-31.1862574038904	-60.7484785939749	La Capital	INDEC	82063090000	82063090	Llambi Campbell	822994	Llambi Campbell	LLAMBI CAMPBELL	82	Santa Fe	82063
        Localidad simple	-31.5184864327594	-60.6780997937426	La Capital	INDEC	82063100000	82063100	Monte Vera	823001	Monte Vera	MONTE VERA	82	Santa Fe	82063
        Localidad simple	-31.2670754515365	-60.7621355398529	La Capital	INDEC	82063110000	82063110	Nelson	823008	Nelson	NELSON	82	Santa Fe	82063
        Localidad simple	-31.567299963712	-60.6617466185791	La Capital	INDEC	82063120000	82063120	Paraje Chaco Chico	823001	Monte Vera	PARAJE CHACO CHICO	82	Santa Fe	82063
        Localidad simple	-31.5177974435199	-60.6115160069236	La Capital	INDEC	82063130000	82063130	Paraje La Costa	823001	Monte Vera	PARAJE LA COSTA	82	Santa Fe	82063
        Componente de localidad compuesta	-31.4935807560402	-60.735411088708	La Capital	INDEC	82063140000	82063140	Recreo	820144	Recreo	RECREO	82	Santa Fe	82063
        Localidad simple	-31.5286179375841	-60.4756662346225	La Capital	INDEC	82063150000	82063150	Rincón Potrero	822959	Arroyo Leyes	RINCON POTRERO	82	Santa Fe	82063
        Componente de localidad compuesta	-31.6061471114691	-60.569631684875	La Capital	INDEC	82063160000	82063160	San José del Rincón	823022	San José del Rincón	SAN JOSE DEL RINCON	82	Santa Fe	82063
        Componente de localidad compuesta	-31.645164805431	-60.7093147118987	La Capital	INDEC	82063170000	82063170	Santa Fe	820147	Santa Fe	SANTA FE	82	Santa Fe	82063
        Componente de localidad compuesta	-31.6648423299398	-60.7626399841519	La Capital	INDEC	82063180000	82063180	Santo Tomé	820154	Santo Tomé	SANTO TOME	82	Santa Fe	82063
        Entidad	-31.7630683465248	-60.8898606108667	La Capital	INDEC	82063190001	82063190	Sauce Viejo	823029	Sauce Viejo	SAUCE VIEJO	82	Santa Fe	82063
        Entidad	-31.7077603088951	-60.7883380397856	La Capital	INDEC	82063190002	82063190	Sauce Viejo	823029	Sauce Viejo	VILLA ADELINA	82	Santa Fe	82063
        Localidad simple	-31.3738964582973	-60.664717579411	La Capital	INDEC	82063200000	82063200	Villa Laura	822952	Arroyo Aguiar	VILLA LAURA	82	Santa Fe	82063
        Localidad simple	-31.3666330323604	-61.0172254853249	Las Colonias	INDEC	82070010000	82070010	Cavour	823036	Cavour	CAVOUR	82	Santa Fe	82070
        Localidad simple	-31.2053110846326	-60.9314003415917	Las Colonias	INDEC	82070020000	82070020	Cululú	823050	Cululú	CULULU	82	Santa Fe	82070
        Localidad simple	-30.6980797094538	-61.0487593646417	Las Colonias	INDEC	82070030000	82070030	Elisa	823057	Elisa	ELISA	82	Santa Fe	82070
        Localidad simple	-31.5487780871674	-60.8127223355579	Las Colonias	INDEC	82070040000	82070040	Empalme San Carlos	823064	Empalme San Carlos	EMPALME SAN CARLOS	82	Santa Fe	82070
        Localidad simple	-31.4505966144136	-60.9310068119638	Las Colonias	INDEC	82070050000	82070050	Esperanza	820161	Esperanza	ESPERANZA	82	Santa Fe	82070
        Localidad simple	-31.246393987915	-61.2128816673977	Las Colonias	INDEC	82070060000	82070060	Felicia	823071	Felicia	FELICIA	82	Santa Fe	82070
        Localidad simple	-31.5888736174502	-60.9388945830321	Las Colonias	INDEC	82070070000	82070070	Franck	823078	Franck	FRANCK	82	Santa Fe	82070
        Localidad simple	-31.2705026899597	-61.0727542695818	Las Colonias	INDEC	82070080000	82070080	Grutly	823085	Grutly	GRUTLY	82	Santa Fe	82070
        Localidad simple	-31.1282518725208	-61.0327676754247	Las Colonias	INDEC	82070090000	82070090	Hipatía	823092	Hipatía	HIPATIA	82	Santa Fe	82070
        Localidad simple	-31.4009210645041	-61.0825515659905	Las Colonias	INDEC	82070100000	82070100	Humboldt	823099	Humboldt	HUMBOLDT	82	Santa Fe	82070
        Localidad simple	-30.7370340516557	-60.9759511253175	Las Colonias	INDEC	82070110000	82070110	Jacinto L. Aráuz	823113	Jacinto L. Arauz	JACINTO L. ARAUZ	82	Santa Fe	82070
        Localidad simple	-30.8679477693336	-60.9718116807155	Las Colonias	INDEC	82070120000	82070120	La Pelada	823120	La Pelada	LA PELADA	82	Santa Fe	82070
        Localidad simple	-31.5722370638803	-60.9959287992772	Las Colonias	INDEC	82070130000	82070130	Las Tunas	823127	Las Tunas	LAS TUNAS	82	Santa Fe	82070
        Localidad simple	-31.0126440481519	-60.9114327492504	Las Colonias	INDEC	82070140000	82070140	María Luisa	823134	María Luisa	MARIA LUISA	82	Santa Fe	82070
        Localidad simple	-31.7932160880623	-60.9818059784844	Las Colonias	INDEC	82070150000	82070150	Matilde	823141	Matilde	MATILDE	82	Santa Fe	82070
        Localidad simple	-31.3468823835409	-61.235725734005	Las Colonias	INDEC	82070160000	82070160	Nuevo Torino	823148	Nuevo Torino	NUEVO TORINO	82	Santa Fe	82070
        Localidad simple	-31.442015817123	-61.2600249614063	Las Colonias	INDEC	82070170000	82070170	Pilar	823155	Pilar	PILAR	82	Santa Fe	82070
        Localidad simple	-31.7974834888763	-61.0111678232689	Las Colonias	INDEC	82070180000	82070180	Plaza Matilde	823141	Matilde	PLAZA MATILDE	82	Santa Fe	82070
        Localidad simple	-31.1397689545802	-60.990254156931	Las Colonias	INDEC	82070190000	82070190	Progreso	823162	Progreso	PROGRESO	82	Santa Fe	82070
        Localidad simple	-30.9845868369063	-61.0218281498813	Las Colonias	INDEC	82070200000	82070200	Providencia	823169	Providencia	PROVIDENCIA	82	Santa Fe	82070
        Localidad simple	-31.5721513951563	-61.3782231110791	Las Colonias	INDEC	82070210000	82070210	Sa Pereyra	823190	Sa Pereyra	SA PEREYRA	82	Santa Fe	82070
        Localidad simple	-31.6847778866246	-60.9413147450231	Las Colonias	INDEC	82070220000	82070220	San Agustín	823197	San Agustín	SAN AGUSTIN	82	Santa Fe	82070
        Componente de localidad compuesta	-31.7284179989089	-61.0913957859145	Las Colonias	INDEC	82070230000	82070230	San Carlos Centro	820168	San Carlos Centro	SAN CARLOS CENTRO	82	Santa Fe	82070
        Localidad simple	-31.6743105766747	-61.0762585195433	Las Colonias	INDEC	82070240000	82070240	San Carlos Norte	823204	San Carlos Norte	SAN CARLOS NORTE	82	Santa Fe	82070
        Componente de localidad compuesta	-31.7575954064363	-61.1007514980914	Las Colonias	INDEC	82070250000	82070250	San Carlos Sud	823211	San Carlos Sud	SAN CARLOS SUD	82	Santa Fe	82070
        Localidad simple	-31.6112124759047	-61.1425180717315	Las Colonias	INDEC	82070260000	82070260	San Jerónimo del Sauce	823218	San Jerónimo del Sauce	SAN JERONIMO DEL SAUCE	82	Santa Fe	82070
        Localidad simple	-31.5545316682675	-61.078514153956	Las Colonias	INDEC	82070270000	82070270	San Jerónimo Norte	823225	San Jerónimo Norte	SAN JERONIMO NORTE	82	Santa Fe	82070
        Localidad simple	-31.6702105890861	-61.3480211476449	Las Colonias	INDEC	82070280000	82070280	San Mariano	823232	San Mariano	SAN MARIANO	82	Santa Fe	82070
        Localidad simple	-31.7657963305203	-61.3210236384566	Las Colonias	INDEC	82070290000	82070290	Santa Clara de Buena Vista	823239	Santa Clara de Buena Vista	SANTA CLARA DE BUENA VISTA	82	Santa Fe	82070
        Localidad simple	-31.1222768363914	-60.8888854567848	Las Colonias	INDEC	82070300000	82070300	Santo Domingo	823260	Santo Domingo	SANTO DOMINGO	82	Santa Fe	82070
        Localidad simple	-31.0606024884219	-61.167889729979	Las Colonias	INDEC	82070310000	82070310	Sarmiento	823267	Sarmiento	SARMIENTO	82	Santa Fe	82070
        Localidad simple	-29.7726717957721	-61.4881512346811	9 de Julio	INDEC	82077010000	82077010	Esteban Rams	823281	Esteban Rams	ESTEBAN RAMS	82	Santa Fe	82077
        Localidad simple	-28.0245785095892	-61.1879373297868	9 de Julio	INDEC	82077020000	82077020	Gato Colorado	823288	Gato Colorado	GATO COLORADO	82	Santa Fe	82077
        Localidad simple	-28.2296230607257	-61.5297529930521	9 de Julio	INDEC	82077030000	82077030	Gregoria Pérez de Denis	823295	Gregoria Pérez de Denis	GREGORIA PEREZ DE DENIS	82	Santa Fe	82077
        Localidad simple	-29.5042812797874	-61.6967327802837	9 de Julio	INDEC	82077040000	82077040	Logroño	823309	Logroño	LOGROÑO	82	Santa Fe	82077
        Localidad simple	-29.6678698226711	-61.867108287483	9 de Julio	INDEC	82077050000	82077050	Montefiore	823316	Montefiore	MONTEFIORE	82	Santa Fe	82077
        Localidad simple	-28.9399423031181	-61.7055999743386	9 de Julio	INDEC	82077060000	82077060	Pozo Borrado	823323	Pozo Borrado	POZO BORRADO	82	Santa Fe	82077
        Localidad simple	-28.6300342810186	-61.5069219893981	9 de Julio	INDEC	82077065000	82077065	San Bernardo	823330	San Bernardo	SAN BERNARDO	82	Santa Fe	82077
        Localidad simple	-28.3149549140447	-61.550329937355	9 de Julio	INDEC	82077070000	82077070	Santa Margarita	823337	Santa Margarita	SANTA MARGARITA	82	Santa Fe	82077
        Localidad simple	-29.2344732488739	-61.7719824163622	9 de Julio	INDEC	82077080000	82077080	Tostado	820175	Tostado	TOSTADO	82	Santa Fe	82077
        Localidad simple	-28.6247095403571	-61.6279859869967	9 de Julio	INDEC	82077090000	82077090	Villa Minetti	823344	Villa Minetti	VILLA MINETTI	82	Santa Fe	82077
        Localidad simple	-33.2436505576999	-60.837195481459	Rosario	INDEC	82084010000	82084010	Acébal	823351	Acebal	ACEBAL	82	Santa Fe	82084
        Localidad simple	-33.2413031665306	-60.6365751407418	Rosario	INDEC	82084020000	82084020	Albarellos	823358	Albarellos	ALBARELLOS	82	Santa Fe	82084
        Localidad simple	-33.1306253585247	-60.8039626859935	Rosario	INDEC	82084030000	82084030	Álvarez	823365	Álvarez	ALVAREZ	82	Santa Fe	82084
        Localidad simple	-33.0614584695641	-60.6159765613734	Rosario	INDEC	82084040000	82084040	Alvear	823372	Alvear	ALVEAR	82	Santa Fe	82084
        Localidad simple	-33.0919516648506	-60.6993159324653	Rosario	INDEC	82084050000	82084050	Arbilla	823372	Alvear	ARBILLA	82	Santa Fe	82084
        Localidad simple	-33.2658615254501	-60.9669188397385	Rosario	INDEC	82084060000	82084060	Arminda	823379	Arminda	ARMINDA	82	Santa Fe	82084
        Localidad simple	-33.1560225761175	-60.5101308080247	Rosario	INDEC	82084070000	82084070	Arroyo Seco	820182	Arroyo Seco	ARROYO SECO	82	Santa Fe	82084
        Localidad simple	-33.2376879120566	-60.8118679160701	Rosario	INDEC	82084080000	82084080	Carmen del Sauce	823386	Carmen del Sauce	CARMEN DEL SAUCE	82	Santa Fe	82084
        Localidad simple	-33.3175115859048	-60.6036347878573	Rosario	INDEC	82084090000	82084090	Coronel Bogado	823393	Coronel Bogado	CORONEL BOGADO	82	Santa Fe	82084
        Localidad simple	-33.1854760061025	-60.7228633313771	Rosario	INDEC	82084100000	82084100	Coronel Rodolfo S. Domínguez	823470	Coronel Domínguez	CORONEL RODOLFO S. DOMINGUEZ	82	Santa Fe	82084
        Localidad simple	-33.2466228889596	-60.7649740219949	Rosario	INDEC	82084110000	82084110	Cuatro Esquinas	823386	Carmen del Sauce	CUATRO ESQUINAS	82	Santa Fe	82084
        Componente de localidad compuesta	-33.1288733975401	-60.7130394393533	Rosario	INDEC	82084120000	82084120	El Caramelo	823365	Álvarez	EL CARAMELO	82	Santa Fe	82084
        Localidad simple	-33.1950187794417	-60.4706038463519	Rosario	INDEC	82084130000	82084130	Fighiera	823400	Fighiera	FIGHIERA	82	Santa Fe	82084
        Componente de localidad compuesta	-32.922782783063	-60.8121802825957	Rosario	INDEC	82084140000	82084140	Funes	820189	Funes	FUNES	82	Santa Fe	82084
        Localidad simple	-33.1121588884353	-60.5665737837063	Rosario	INDEC	82084150000	82084150	General Lagos	823407	General Lagos	GENERAL LAGOS	82	Santa Fe	82084
        Componente de localidad compuesta	-32.8613641656775	-60.7062159770827	Rosario	INDEC	82084160000	82084160	Granadero Baigorria	820196	Granadero Baigorria	GRANADERO BAIGORRIA	82	Santa Fe	82084
        Localidad simple	-32.8512561304404	-60.7884936646076	Rosario	INDEC	82084170000	82084170	Ibarlucea	823414	Ibarlucea	IBARLUCEA	82	Santa Fe	82084
        Localidad simple	-33.060584803082	-60.6856440118334	Rosario	INDEC	82084180000	82084180	Kilómetro 101	823372	Alvear	KILOMETRO 101	82	Santa Fe	82084
        Localidad simple	-33.0915734104105	-60.7354254261055	Rosario	INDEC	82084190000	82084190	Los Muchachos - La Alborada	823421	Piñero	LOS MUCHACHOS - LA ALBORADA	82	Santa Fe	82084
        Localidad simple	-33.0800073993365	-60.6355226681116	Rosario	INDEC	82084200000	82084200	Monte Flores	823372	Alvear	MONTE FLORES	82	Santa Fe	82084
        Componente de localidad compuesta	-32.99881116903	-60.7721592101064	Rosario	INDEC	82084210000	82084210	Pérez	820203	Pérez	PEREZ	82	Santa Fe	82084
        Localidad simple	-33.1112071010784	-60.7964961630631	Rosario	INDEC	82084220000	82084220	Piñero	823421	Piñero	PIÑERO	82	Santa Fe	82084
        Localidad simple	-33.0730969403696	-60.5789195429283	Rosario	INDEC	82084230000	82084230	Pueblo Esther	823428	Pueblo Esther	PUEBLO ESTHER	82	Santa Fe	82084
        Localidad simple	-33.1744833504332	-60.8971398400989	Rosario	INDEC	82084240000	82084240	Pueblo Muñóz	823435	Pueblo Muñoz	PUEBLO MUÑOZ	82	Santa Fe	82084
        Localidad simple	-33.2645299958204	-60.7083345859989	Rosario	INDEC	82084250000	82084250	Pueblo Uranga	823449	Uranga	PUEBLO URANGA	82	Santa Fe	82084
        Localidad simple	-33.1315113496399	-60.5078884705177	Rosario	INDEC	82084260000	82084260	Puerto Arroyo Seco	820182	Arroyo Seco	PUERTO ARROYO SECO	82	Santa Fe	82084
        Componente de localidad compuesta	-32.9538142575214	-60.6515379354516	Rosario	INDEC	82084270000	82084270	Rosario			ROSARIO	82	Santa Fe	82084
        Componente de localidad compuesta	-33.0239868445344	-60.7561883192345	Rosario	INDEC	82084280000	82084280	Soldini	823442	Soldini	SOLDINI	82	Santa Fe	82084
        Localidad simple	-33.1771929125315	-60.6677297311463	Rosario	INDEC	82084290000	82084290	Villa Amelia	823456	Villa Amelia	VILLA AMELIA	82	Santa Fe	82084
        Componente de localidad compuesta	-33.1271769621356	-60.7090282248961	Rosario	INDEC	82084300000	82084300	Villa del Plata	823456	Villa Amelia	VILLA DEL PLATA	82	Santa Fe	82084
        Componente de localidad compuesta	-33.0224078611601	-60.6336422555152	Rosario	INDEC	82084310000	82084310	Villa Gobernador Gálvez	820217	Villa Gobernador Gálvez	VILLA GOBERNADOR GALVEZ	82	Santa Fe	82084
        Localidad simple	-33.0215698285974	-60.879303488531	Rosario	INDEC	82084320000	82084320	Zavalla	823463	Zavalla	ZAVALLA	82	Santa Fe	82084
        Localidad simple	-30.1093090599224	-60.9437539322397	San Cristóbal	INDEC	82091010000	82091010	Aguará Grande	823477	Aguará Grande	AGUARA GRANDE	82	Santa Fe	82091
        Localidad simple	-30.016999568893	-61.5765785011442	San Cristóbal	INDEC	82091020000	82091020	Ambrosetti	823484	Ambrosetti	AMBROSETTI	82	Santa Fe	82091
        Localidad simple	-30.2341495301456	-61.7285807001253	San Cristóbal	INDEC	82091030000	82091030	Arrufo	823491	Arrufo	ARRUFO	82	Santa Fe	82091
        Localidad simple	-29.9827373481556	-61.2428659094376	San Cristóbal	INDEC	82091040000	82091040	Balneario La Verde	823554	Huanqueros	BALNEARIO LA VERDE	82	Santa Fe	82091
        Localidad simple	-30.4615028173869	-61.2722735128607	San Cristóbal	INDEC	82091050000	82091050	Capivara	823498	Capivara	CAPIVARA	82	Santa Fe	82091
        Localidad simple	-29.8823371283479	-61.9452374270961	San Cristóbal	INDEC	82091060000	82091060	Ceres	820224	Ceres	CERES	82	Santa Fe	82091
        Localidad simple	-30.1449998391803	-61.9147917462344	San Cristóbal	INDEC	82091070000	82091070	Colonia Ana	823505	Colonia Ana	COLONIA ANA	82	Santa Fe	82091
        Localidad simple	-30.6691245233432	-61.7896030300364	San Cristóbal	INDEC	82091080000	82091080	Colonia Bossi	823512	Colonia Bossi	COLONIA BOSSI	82	Santa Fe	82091
        Localidad simple	-30.3022785889636	-61.9844913702309	San Cristóbal	INDEC	82091090000	82091090	Colonia Rosa	823519	Colonia Rosa	COLONIA ROSA	82	Santa Fe	82091
        Localidad simple	-30.664633909429	-61.3207552160733	San Cristóbal	INDEC	82091100000	82091100	Constanza	823526	Constanza	CONSTANZA	82	Santa Fe	82091
        Localidad simple	-30.397911889967	-61.6518044215673	San Cristóbal	INDEC	82091110000	82091110	Curupaytí	823533	Curupaity	CURUPAYTI	82	Santa Fe	82091
        Localidad simple	-30.0056765366847	-61.8396467676821	San Cristóbal	INDEC	82091120000	82091120	Hersilia	823547	Hersilia	HERSILIA	82	Santa Fe	82091
        Localidad simple	-30.0136747533996	-61.2192947646911	San Cristóbal	INDEC	82091130000	82091130	Huanqueros	823554	Huanqueros	HUANQUEROS	82	Santa Fe	82091
        Localidad simple	-30.0876438007142	-61.1797070550573	San Cristóbal	INDEC	82091140000	82091140	La Cabral	823561	La Cabral	LA CABRAL	82	Santa Fe	82091
        Localidad simple	-30.4196635334388	-61.0033073134897	San Cristóbal	INDEC	82091145000	82091145	La Lucila	823575	La Lucila	LA LUCILA	82	Santa Fe	82091
        Localidad simple	-30.1113966728017	-61.7927608545145	San Cristóbal	INDEC	82091150000	82091150	La Rubia	823582	La Rubia	LA RUBIA	82	Santa Fe	82091
        Localidad simple	-29.8953127955717	-61.2911992453769	San Cristóbal	INDEC	82091160000	82091160	Las Avispas	823589	Las Avispas	LAS AVISPAS	82	Santa Fe	82091
        Localidad simple	-30.6326345828984	-61.6277233886562	San Cristóbal	INDEC	82091170000	82091170	Las Palmeras	823596	Las Palmeras	LAS PALMERAS	82	Santa Fe	82091
        Localidad simple	-30.7182008702613	-61.469140085345	San Cristóbal	INDEC	82091180000	82091180	Moisés Ville	823603	Moisés Ville	MOISES VILLE	82	Santa Fe	82091
        Localidad simple	-30.4901359922347	-61.6348224695165	San Cristóbal	INDEC	82091190000	82091190	Monigotes	823610	Monigotes	MONIGOTES	82	Santa Fe	82091
        Localidad simple	-30.37245992257	-61.1326015812096	San Cristóbal	INDEC	82091200000	82091200	Ñanducita	823624	Ñanducita	ÑANDUCITA	82	Santa Fe	82091
        Localidad simple	-30.7106694051354	-61.6236952048733	San Cristóbal	INDEC	82091210000	82091210	Palacios	823631	Palacios	PALACIOS	82	Santa Fe	82091
        Localidad simple	-30.311687011314	-61.2386444593771	San Cristóbal	INDEC	82091220000	82091220	San Cristóbal	820231	San Cristóbal	SAN CRISTOBAL	82	Santa Fe	82091
        Localidad simple	-30.3602098529676	-61.9178272634037	San Cristóbal	INDEC	82091230000	82091230	San Guillermo	823645	San Guillermo	SAN GUILLERMO	82	Santa Fe	82091
        Localidad simple	-30.1866452738191	-61.178528021881	San Cristóbal	INDEC	82091240000	82091240	Santurce	823652	Santurce	SANTURCE	82	Santa Fe	82091
        Localidad simple	-30.6225538384456	-60.9166112630514	San Cristóbal	INDEC	82091250000	82091250	Soledad	823659	Soledad	SOLEDAD	82	Santa Fe	82091
        Localidad simple	-30.5361453460922	-61.9616805839765	San Cristóbal	INDEC	82091260000	82091260	Suardi	823666	Suardi	SUARDI	82	Santa Fe	82091
        Localidad simple	-30.5427027882285	-60.7477102618236	San Cristóbal	INDEC	82091270000	82091270	Villa Saralegui	823673	Villa Saralegui	VILLA SARALEGUI	82	Santa Fe	82091
        Localidad simple	-30.2176460355738	-61.877568026694	San Cristóbal	INDEC	82091280000	82091280	Villa Trinidad	823680	Villa Trinidad	VILLA TRINIDAD	82	Santa Fe	82091
        Localidad simple	-29.9103566747475	-59.8281612200693	San Javier	INDEC	82098010000	82098010	Alejandra	823687	Alejandra	ALEJANDRA	82	Santa Fe	82098
        Localidad simple	-30.6581364074941	-60.2307356488107	San Javier	INDEC	82098020000	82098020	Cacique Ariacaiquín	823694	Cacique Ariacaiquín	CACIQUE ARIACAIQUIN	82	Santa Fe	82098
        Localidad simple	-29.5607537201086	-59.9270693537131	San Javier	INDEC	82098030000	82098030	Colonia Durán	823701	Colonia Durán	COLONIA DURAN	82	Santa Fe	82098
        Localidad simple	-30.4477825105448	-60.1409356882605	San Javier	INDEC	82098040000	82098040	La Brava	823708	La Brava	LA BRAVA	82	Santa Fe	82098
        Localidad simple	-29.5018294527814	-59.7485934535059	San Javier	INDEC	82098050000	82098050	Romang	823715	Romang	ROMANG	82	Santa Fe	82098
        Localidad simple	-30.5822068409869	-59.9313985183809	San Javier	INDEC	82098060000	82098060	San Javier	820238	San Javier	SAN JAVIER	82	Santa Fe	82098
        Localidad simple	-32.0800271942926	-60.9770049639573	San Jerónimo	INDEC	82105010000	82105010	Arocena	823722	Arocena	AROCENA	82	Santa Fe	82105
        Localidad simple	-32.3349560866515	-60.8760522539552	San Jerónimo	INDEC	82105020000	82105020	Balneario Monje	823827	Monje	BALNEARIO MONJE	82	Santa Fe	82105
        Localidad simple	-32.2366357816462	-60.9827401330363	San Jerónimo	INDEC	82105030000	82105030	Barrancas	823729	Barrancas	BARRANCAS	82	Santa Fe	82105
        Localidad simple	-31.8320800807618	-60.8719647067245	San Jerónimo	INDEC	82105040000	82105040	Barrio Caima	823764	Desvío Arijón	BARRIO CAIMA	82	Santa Fe	82105
        Localidad simple	-32.1313356998216	-60.9282685049176	San Jerónimo	INDEC	82105050000	82105050	Barrio El Pacaá - Barrio Comipini	823722	Arocena	BARRIO EL PACAA - BARRIO COMIPINI	82	Santa Fe	82105
        Localidad simple	-32.1709306189148	-61.1572748282837	San Jerónimo	INDEC	82105060000	82105060	Bernardo de Irigoyen	823736	Bernardo de Irigoyen	BERNARDO DE IRIGOYEN	82	Santa Fe	82105
        Localidad simple	-32.2638306241466	-61.1261488657874	San Jerónimo	INDEC	82105070000	82105070	Casalegno	823750	Casalegno	CASALEGNO	82	Santa Fe	82105
        Localidad simple	-32.298023717348	-61.4107241466286	San Jerónimo	INDEC	82105080000	82105080	Centeno	823757	Centeno	CENTENO	82	Santa Fe	82105
        Localidad simple	-31.975646712145	-60.9201341188126	San Jerónimo	INDEC	82105090000	82105090	Coronda	820245	Coronda	CORONDA	82	Santa Fe	82105
        Localidad simple	-31.8727393656094	-60.8896993521491	San Jerónimo	INDEC	82105100000	82105100	Desvío Arijón	823764	Desvío Arijón	DESVIO ARIJON	82	Santa Fe	82105
        Localidad simple	-32.3750588242506	-61.091442512126	San Jerónimo	INDEC	82105110000	82105110	Díaz	823771	Díaz	DIAZ	82	Santa Fe	82105
        Localidad simple	-32.4343760818819	-60.8185390941723	San Jerónimo	INDEC	82105120000	82105120	Gaboto	823778	Gaboto	GABOTO	82	Santa Fe	82105
        Localidad simple	-32.0326455920318	-61.2199610274248	San Jerónimo	INDEC	82105130000	82105130	Gálvez	820252	Gálvez	GALVEZ	82	Santa Fe	82105
        Localidad simple	-31.8770449531764	-61.1288367653984	San Jerónimo	INDEC	82105140000	82105140	Gessler	823785	Gessler	GESSLER	82	Santa Fe	82105
        Localidad simple	-32.16077341012	-61.1104258428642	San Jerónimo	INDEC	82105150000	82105150	Irigoyen	823792	Pueblo Irigoyen	IRIGOYEN	82	Santa Fe	82105
        Localidad simple	-31.9361305275575	-61.0477166860408	San Jerónimo	INDEC	82105160000	82105160	Larrechea	823799	Larrechea	LARRECHEA	82	Santa Fe	82105
        Localidad simple	-31.9614431890621	-61.1783800456556	San Jerónimo	INDEC	82105170000	82105170	Loma Alta	823806	Loma Alta	LOMA ALTA	82	Santa Fe	82105
        Localidad simple	-31.9069668930749	-61.2799295377437	San Jerónimo	INDEC	82105180000	82105180	López	823813	López	LOPEZ	82	Santa Fe	82105
        Localidad simple	-32.4587652553057	-60.8931126475643	San Jerónimo	INDEC	82105190000	82105190	Maciel	823820	Maciel	MACIEL	82	Santa Fe	82105
        Localidad simple	-32.358735658961	-60.9429043010117	San Jerónimo	INDEC	82105200000	82105200	Monje	823827	Monje	MONJE	82	Santa Fe	82105
        Localidad simple	-32.2447218281238	-60.9239839784214	San Jerónimo	INDEC	82105210000	82105210	Puerto Aragón	823729	Barrancas	PUERTO ARAGON	82	Santa Fe	82105
        Localidad simple	-32.0768953861827	-61.1174234926527	San Jerónimo	INDEC	82105220000	82105220	San Eugenio	823834	San Eugenio	SAN EUGENIO	82	Santa Fe	82105
        Localidad simple	-32.1383718722873	-60.9832660246346	San Jerónimo	INDEC	82105230000	82105230	San Fabián	823841	San Fabián	SAN FABIAN	82	Santa Fe	82105
        Componente de localidad compuesta	-32.3735383941398	-61.3606569211003	San Jerónimo	INDEC	82105240000	82105240	San Genaro	820256	San Genaro	SAN GENARO	82	Santa Fe	82105
        Componente de localidad compuesta	-32.3658073636946	-61.3401798286706	San Jerónimo	INDEC	82105250000	82105250	San Genaro Norte	820256	San Genaro	SAN GENARO NORTE	82	Santa Fe	82105
        Localidad simple	-30.8575177090903	-60.6486098681792	San Justo	INDEC	82112010000	82112010	Angeloni	823862	Angeloni	ANGELONI	82	Santa Fe	82112
        Localidad simple	-31.1150071573313	-60.5814003944463	San Justo	INDEC	82112020000	82112020	Cayastacito	823869	Cayastacito	CAYASTACITO	82	Santa Fe	82112
        Localidad simple	-30.3836825866932	-60.3307254883154	San Justo	INDEC	82112030000	82112030	Colonia Dolores	823876	Colonia Dolores	COLONIA DOLORES	82	Santa Fe	82112
        Localidad simple	-31.0434861128335	-60.6448661369776	San Justo	INDEC	82112040000	82112040	Esther	823883	Esther	ESTHER	82	Santa Fe	82112
        Localidad simple	-30.3648346894928	-60.4011684048308	San Justo	INDEC	82112050000	82112050	Gobernador Crespo	823890	Gobernador Crespo	GOBERNADOR CRESPO	82	Santa Fe	82112
        Localidad simple	-30.2261579523496	-60.3664968225823	San Justo	INDEC	82112060000	82112060	La Criolla	823904	La Criolla	LA CRIOLLA	82	Santa Fe	82112
        Localidad simple	-30.3484964424709	-60.5217853393141	San Justo	INDEC	82112070000	82112070	La Penca y Caraguatá	823911	La Penca y Caraguatá	LA PENCA Y CARAGUATA	82	Santa Fe	82112
        Localidad simple	-30.5819493055119	-60.4693860436357	San Justo	INDEC	82112080000	82112080	Marcelino Escalada	823918	Marcelino Escalada	MARCELINO ESCALADA	82	Santa Fe	82112
        Localidad simple	-30.951076187335	-60.4682102211441	San Justo	INDEC	82112090000	82112090	Naré	823925	Naré	NARE	82	Santa Fe	82112
        Localidad simple	-30.0384743425904	-60.3152431288441	San Justo	INDEC	82112100000	82112100	Pedro Gómez Cello	823932	Pedro Gómez Cello	PEDRO GOMEZ CELLO	82	Santa Fe	82112
        Localidad simple	-30.6758153384973	-60.4995553794067	San Justo	INDEC	82112110000	82112110	Ramayón	823939	Ramayón	RAMAYON	82	Santa Fe	82112
        Localidad simple	-30.8905395009228	-60.5751464890853	San Justo	INDEC	82112120000	82112120	San Bernardo	823946	San Bernardo	SAN BERNARDO	82	Santa Fe	82112
        Localidad simple	-30.7908665162845	-60.5940368250334	San Justo	INDEC	82112130000	82112130	San Justo	820259	San Justo	SAN JUSTO	82	Santa Fe	82112
        Localidad simple	-30.3493004076432	-60.3040548934806	San Justo	INDEC	82112140000	82112140	San Martín Norte	823953	San Mart	SAN MARTIN NORTE	82	Santa Fe	82112
        Localidad simple	-30.4486399849806	-60.430070013139	San Justo	INDEC	82112150000	82112150	Silva	823960	Silva	SILVA	82	Santa Fe	82112
        Localidad simple	-30.1436425790617	-60.3373530550458	San Justo	INDEC	82112160000	82112160	Vera y Pintado	823967	Vera y Pintado	VERA Y PINTADO	82	Santa Fe	82112
        Localidad simple	-30.9465032627862	-60.6564412400796	San Justo	INDEC	82112170000	82112170	Videla	823974	Videla	VIDELA	82	Santa Fe	82112
        Localidad simple	-32.7069853236032	-60.8179518202362	San Lorenzo	INDEC	82119010000	82119010	Aldao	823981	Aldao	ALDAO	82	Santa Fe	82119
        Componente de localidad compuesta	-32.8282349449349	-60.7168207550494	San Lorenzo	INDEC	82119020000	82119020	Capitán Bermúdez	820266	Capitán Bermúdez	CAPITAN BERMUDEZ	82	Santa Fe	82119
        Localidad simple	-32.8588281760163	-61.1523502197425	San Lorenzo	INDEC	82119030000	82119030	Carcarañá	820273	Carcarañá	CARCARAÑA	82	Santa Fe	82119
        Localidad simple	-33.1066175391399	-60.9665015588484	San Lorenzo	INDEC	82119040000	82119040	Coronel Arnold	823988	Coronel Arnold	CORONEL ARNOLD	82	Santa Fe	82119
        Componente de localidad compuesta	-32.7855581880336	-60.7291236444004	San Lorenzo	INDEC	82119050000	82119050	Fray Luis Beltrán	820280	Fray Luis Beltrán	FRAY LUIS BELTRAN	82	Santa Fe	82119
        Localidad simple	-33.1744416497872	-61.0750536976089	San Lorenzo	INDEC	82119060000	82119060	Fuentes	823995	Fuentes	FUENTES	82	Santa Fe	82119
        Localidad simple	-32.784870422621	-60.9076379614075	San Lorenzo	INDEC	82119070000	82119070	Luis Palacios	824002	Luis Palacios	LUIS PALACIOS	82	Santa Fe	82119
        Componente de localidad compuesta	-32.7190025958741	-60.7334925388318	San Lorenzo	INDEC	82119080000	82119080	Puerto General San Martín			PUERTO GENERAL SAN MARTIN	82	Santa Fe	82119
        Localidad simple	-33.0195733543103	-61.0438316490822	San Lorenzo	INDEC	82119090000	82119090	Pujato	824009	Pujato	PUJATO	82	Santa Fe	82119
        Localidad simple	-32.7736805491372	-60.786927658223	San Lorenzo	INDEC	82119100000	82119100	Ricardone	824016	Ricardone	RICARDONE	82	Santa Fe	82119
        Componente de localidad compuesta	-32.9023879302416	-60.9108827950649	San Lorenzo	INDEC	82119110000	82119110	Roldán	820294	Roldán	ROLDAN	82	Santa Fe	82119
        Localidad simple	-32.8787353332163	-61.0243903952404	San Lorenzo	INDEC	82119120000	82119120	San Jerónimo Sud	824023	San Jerónimo Sud	SAN JERONIMO SUD	82	Santa Fe	82119
        Componente de localidad compuesta	-32.7523069549362	-60.7356209815072	San Lorenzo	INDEC	82119130000	82119130	San Lorenzo	820301	San Lorenzo	SAN LORENZO	82	Santa Fe	82119
        Localidad simple	-32.6696252682834	-60.7943548240758	San Lorenzo	INDEC	82119140000	82119140	Timbúes	824030	Timbúes	TIMBUES	82	Santa Fe	82119
        Componente de localidad compuesta	-32.6429185717722	-60.8177095118801	San Lorenzo	INDEC	82119150000	82119150	Villa Elvira	824030	Timbúes	VILLA ELVIRA	82	Santa Fe	82119
        Localidad simple	-33.3139349307156	-61.0570695285482	San Lorenzo	INDEC	82119160000	82119160	Villa Mugueta	824037	Villa Mugueta	VILLA MUGUETA	82	Santa Fe	82119
        Localidad simple	-32.0562934036888	-61.6025429947826	San Martín	INDEC	82126010000	82126010	Cañada Rosquín	824044	Cañada Rosquín	CAÑADA ROSQUIN	82	Santa Fe	82126
        Localidad simple	-32.0526642372536	-61.78894991246	San Martín	INDEC	82126020000	82126020	Carlos Pellegrini	824051	Carlos Pellegrini	CARLOS PELLEGRINI	82	Santa Fe	82126
        Localidad simple	-32.1279976039457	-61.5421282200809	San Martín	INDEC	82126030000	82126030	Casas	824058	Casas	CASAS	82	Santa Fe	82126
        Localidad simple	-31.6691692674795	-62.0899867120516	San Martín	INDEC	82126040000	82126040	Castelar	824065	Castelar	CASTELAR	82	Santa Fe	82126
        Localidad simple	-31.9118940838345	-61.4023835358505	San Martín	INDEC	82126050000	82126050	Colonia Belgrano	824072	Colonia Belgrano	COLONIA BELGRANO	82	Santa Fe	82126
        Localidad simple	-31.7417252131656	-62.0378765362955	San Martín	INDEC	82126060000	82126060	Crispi	824079	Crispi	CRISPI	82	Santa Fe	82126
        Localidad simple	-32.2030242455008	-61.7028944914559	San Martín	INDEC	82126070000	82126070	El Trébol	820308	El Trébol	EL TREBOL	82	Santa Fe	82126
        Localidad simple	-32.0138147005941	-62.0611771301989	San Martín	INDEC	82126080000	82126080	Landeta	824086	Landeta	LANDETA	82	Santa Fe	82126
        Localidad simple	-32.1991899646564	-61.4927940449511	San Martín	INDEC	82126090000	82126090	Las Bandurrias	824093	Las Bandurrias	LAS BANDURRIAS	82	Santa Fe	82126
        Localidad simple	-31.8247278111096	-62.1089907898346	San Martín	INDEC	82126100000	82126100	Las Petacas	824100	Las Petacas	LAS PETACAS	82	Santa Fe	82126
        Localidad simple	-32.3243031135987	-61.6321111218833	San Martín	INDEC	82126110000	82126110	Los Cardos	824107	Los Cardos	LOS CARDOS	82	Santa Fe	82126
        Localidad simple	-32.2654856687264	-61.9010253248989	San Martín	INDEC	82126120000	82126120	María Susana	824114	María Susana	MARIA SUSANA	82	Santa Fe	82126
        Localidad simple	-32.1458665241358	-61.9811202181808	San Martín	INDEC	82126130000	82126130	Piamonte	824121	Piamonte	PIAMONTE	82	Santa Fe	82126
        Localidad simple	-31.898003817155	-61.8603287777206	San Martín	INDEC	82126140000	82126140	San Jorge	820315	San Jorge	SAN JORGE	82	Santa Fe	82126
        Localidad simple	-31.8596737471682	-61.5702157763693	San Martín	INDEC	82126150000	82126150	San Martín de las Escobas	824128	San Mart	SAN MARTIN DE LAS ESCOBAS	82	Santa Fe	82126
        Localidad simple	-31.7695325241636	-61.8294529565696	San Martín	INDEC	82126160000	82126160	Sastre	820322	Sastre	SASTRE	82	Santa Fe	82126
        Localidad simple	-31.9225991219581	-61.7024471962412	San Martín	INDEC	82126170000	82126170	Traill	824135	Traill	TRAILL	82	Santa Fe	82126
        Localidad simple	-31.9469900287545	-61.4025551450022	San Martín	INDEC	82126180000	82126180	Wildermuth	824072	Colonia Belgrano	WILDERMUTH	82	Santa Fe	82126
        Localidad simple	-29.8905436040639	-60.285737676357	Vera	INDEC	82133010000	82133010	Calchaquí	820329	Calchaquí	CALCHAQUI	82	Santa Fe	82133
        Localidad simple	-28.31083042196	-59.9837166450891	Vera	INDEC	82133020000	82133020	Cañada Ombú	824142	Cañada Ombú	CAÑADA OMBU	82	Santa Fe	82133
        Localidad simple	-28.7658190432744	-60.0880421430925	Vera	INDEC	82133030000	82133030	Colmena	824170	Intiyaco	COLMENA	82	Santa Fe	82133
        Localidad simple	-29.0560211845387	-60.4143945851651	Vera	INDEC	82133040000	82133040	Fortín Olmos	824149	Fortín Olmos	FORTIN OLMOS	82	Santa Fe	82133
        Localidad simple	-28.9553447407242	-60.1384384332405	Vera	INDEC	82133050000	82133050	Garabato	824156	Garabato	GARABATO	82	Santa Fe	82133
        Localidad simple	-28.5588709585467	-60.0251919319472	Vera	INDEC	82133060000	82133060	Golondrina	824163	Golondrina	GOLONDRINA	82	Santa Fe	82133
        Localidad simple	-28.6779253668564	-60.0724684333926	Vera	INDEC	82133070000	82133070	Intiyaco	824170	Intiyaco	INTIYACO	82	Santa Fe	82133
        Localidad simple	-28.8247510907656	-60.2256036446499	Vera	INDEC	82133080000	82133080	Kilómetro 115	824156	Garabato	KILOMETRO 115	82	Santa Fe	82133
        Localidad simple	-29.5854889982809	-60.3799393729758	Vera	INDEC	82133090000	82133090	La Gallareta	824177	La Gallareta	LA GALLARETA	82	Santa Fe	82133
        Localidad simple	-28.1063721680455	-59.9786648326772	Vera	INDEC	82133100000	82133100	Los Amores	824184	Los Amores	LOS AMORES	82	Santa Fe	82133
        Localidad simple	-29.6910879587641	-60.2524652684442	Vera	INDEC	82133110000	82133110	Margarita	824191	Margarita	MARGARITA	82	Santa Fe	82133
        Localidad simple	-29.1097652045099	-60.2391297738451	Vera	INDEC	82133120000	82133120	Paraje 29	824149	Fortín Olmos	PARAJE 29	82	Santa Fe	82133
        Localidad simple	-28.9451306017322	-60.2520035726174	Vera	INDEC	82133130000	82133130	Pozo de los Indios	824156	Garabato	POZO DE LOS INDIOS	82	Santa Fe	82133
        Localidad simple	-29.2838158063585	-60.4038564051536	Vera	INDEC	82133140000	82133140	Pueblo Santa Lucía	820336	Vera	PUEBLO SANTA LUCIA	82	Santa Fe	82133
        Localidad simple	-28.6722104503175	-59.8468195282736	Vera	INDEC	82133150000	82133150	Tartagal	824198	Tartagal	TARTAGAL	82	Santa Fe	82133
        Localidad simple	-29.2675884279209	-60.1726559005792	Vera	INDEC	82133160000	82133160	Toba	824205	Toba	TOBA	82	Santa Fe	82133
        Localidad simple	-29.4629204507651	-60.2133477841634	Vera	INDEC	82133170000	82133170	Vera	820336	Vera	VERA	82	Santa Fe	82133
        Localidad simple	-29.5347584629763	-62.2668040651927	Aguirre	INDEC	86007010000	86007010	Argentina			ARGENTINA	86	Santiago del Estero	86007
        Localidad simple	-28.9529394000082	-62.8005346895448	Aguirre	INDEC	86007020000	86007020	Casares			CASARES	86	Santiago del Estero	86007
        Localidad simple	-29.3480281688774	-62.4374715654784	Aguirre	INDEC	86007030000	86007030	Malbrán			MALBRAN	86	Santiago del Estero	86007
        Localidad simple	-29.1446444838565	-62.6541996550291	Aguirre	INDEC	86007040000	86007040	Villa General Mitre			VILLA GENERAL MITRE	86	Santiago del Estero	86007
        Localidad simple	-26.581588722034	-62.8521376221858	Alberdi	INDEC	86014010000	86014010	Campo Gallo			CAMPO GALLO	86	Santiago del Estero	86014
        Localidad simple	-26.3836121510521	-61.8096460345964	Alberdi	INDEC	86014020000	86014020	Coronel Manuel L. Rico			CORONEL MANUEL L. RICO	86	Santiago del Estero	86014
        Localidad simple	-26.7266820556935	-62.7208021510899	Alberdi	INDEC	86014030000	86014030	Donadeu			DONADEU	86	Santiago del Estero	86014
        Localidad simple	-26.671433914307	-61.8174308800717	Alberdi	INDEC	86014040000	86014040	Sachayoj			SACHAYOJ	86	Santiago del Estero	86014
        Localidad simple	-26.6920901207094	-63.5584892838706	Alberdi	INDEC	86014050000	86014050	Santos Lugares			SANTOS LUGARES	86	Santiago del Estero	86014
        Localidad simple	-28.4946171651834	-63.9414267036415	Atamisqui	INDEC	86021010000	86021010	Estación Atamisqui			ESTACION ATAMISQUI	86	Santiago del Estero	86021
        Localidad simple	-28.6499385815911	-63.787545374207	Atamisqui	INDEC	86021020000	86021020	Medellín			MEDELLIN	86	Santiago del Estero	86021
        Localidad simple	-28.4939256027398	-63.8205160146802	Atamisqui	INDEC	86021030000	86021030	Villa Atamisqui			VILLA ATAMISQUI	86	Santiago del Estero	86021
        Localidad simple	-28.603116660495	-62.9510729035731	Avellaneda	INDEC	86028010000	86028010	Colonia Dora			COLONIA DORA	86	Santiago del Estero	86028
        Localidad simple	-28.4852360558267	-63.0697575257717	Avellaneda	INDEC	86028020000	86028020	Herrera			HERRERA	86	Santiago del Estero	86028
        Localidad simple	-28.6784711687351	-62.8846263455873	Avellaneda	INDEC	86028030000	86028030	Icaño			ICAÑO	86	Santiago del Estero	86028
        Localidad simple	-28.3346445647532	-63.3436023986024	Avellaneda	INDEC	86028040000	86028040	Lugones			LUGONES	86	Santiago del Estero	86028
        Localidad simple	-28.8166325823721	-62.8455339441355	Avellaneda	INDEC	86028050000	86028050	Real Sayana			REAL SAYANA	86	Santiago del Estero	86028
        Localidad simple	-28.4831042788773	-63.2790903120191	Avellaneda	INDEC	86028060000	86028060	Villa Mailín			VILLA MAILIN	86	Santiago del Estero	86028
        Localidad simple	-27.2931336131427	-64.3790656722546	Banda	INDEC	86035010000	86035010	Abra Grande			ABRA GRANDE	86	Santiago del Estero	86035
        Localidad simple	-27.6273165422381	-64.252782204773	Banda	INDEC	86035020000	86035020	Antajé			ANTAJE	86	Santiago del Estero	86035
        Localidad simple	-27.415006517686	-64.5005841049022	Banda	INDEC	86035030000	86035030	Ardiles			ARDILES	86	Santiago del Estero	86035
        Localidad simple	-27.7093508468277	-64.0345634947704	Banda	INDEC	86035040000	86035040	Cañada Escobar			CAÑADA ESCOBAR	86	Santiago del Estero	86035
        Localidad simple	-27.5090071798518	-64.4230093979117	Banda	INDEC	86035050000	86035050	Chaupi Pozo			CHAUPI POZO	86	Santiago del Estero	86035
        Localidad simple	-27.5762755617113	-64.1322398015217	Banda	INDEC	86035060000	86035060	Clodomira			CLODOMIRA	86	Santiago del Estero	86035
        Localidad simple	-27.3875685641419	-64.296255139046	Banda	INDEC	86035070000	86035070	Huyamampa			HUYAMAMPA	86	Santiago del Estero	86035
        Localidad simple	-27.4964060720214	-64.2315605665017	Banda	INDEC	86035080000	86035080	La Aurora			LA AURORA	86	Santiago del Estero	86035
        Componente de localidad compuesta	-27.7339063576954	-64.2389609885924	Banda	INDEC	86035090000	86035090	La Banda			LA BANDA	86	Santiago del Estero	86035
        Localidad simple	-27.6984439320512	-64.2891593020827	Banda	INDEC	86035100000	86035100	La Dársena			LA DARSENA	86	Santiago del Estero	86035
        Localidad simple	-27.6541808200018	-64.3550857252435	Banda	INDEC	86035110000	86035110	Los Quiroga			LOS QUIROGA	86	Santiago del Estero	86035
        Localidad simple	-27.6278438576024	-64.3665478243818	Banda	INDEC	86035120000	86035120	Los Soria			LOS SORIA	86	Santiago del Estero	86035
        Localidad simple	-27.6504840077902	-64.1912416790425	Banda	INDEC	86035130000	86035130	Simbolar			SIMBOLAR	86	Santiago del Estero	86035
        Localidad simple	-27.6966791825107	-64.171980690304	Banda	INDEC	86035140000	86035140	Tramo 16			TRAMO 16	86	Santiago del Estero	86035
        Localidad simple	-27.724169959056	-64.119953835997	Banda	INDEC	86035150000	86035150	Tramo 20			TRAMO 20	86	Santiago del Estero	86035
        Localidad simple	-28.8825052182774	-62.2661992861707	Belgrano	INDEC	86042010000	86042010	Bandera			BANDERA	86	Santiago del Estero	86042
        Localidad simple	-28.8813440964016	-61.8646065822	Belgrano	INDEC	86042020000	86042020	Cuatro Bocas			CUATRO BOCAS	86	Santiago del Estero	86042
        Localidad simple	-29.1249938081928	-61.9377330722992	Belgrano	INDEC	86042030000	86042030	Fortín Inca			FORTIN INCA	86	Santiago del Estero	86042
        Localidad simple	-28.9901980198517	-62.1274458413758	Belgrano	INDEC	86042040000	86042040	Guardia Escolta			GUARDIA ESCOLTA	86	Santiago del Estero	86042
        Localidad simple	-27.7173434793387	-64.3318930408752	Capital	INDEC	86049010000	86049010	El Deán			EL DEAN	86	Santiago del Estero	86049
        Localidad simple	-27.9899319139286	-64.2133551714841	Capital	INDEC	86049020000	86049020	El Mojón			EL MOJON	86	Santiago del Estero	86049
        Componente de localidad compuesta	-27.8750408217321	-64.2433909658935	Capital	INDEC	86049030000	86049030	El Zanjón			EL ZANJON	86	Santiago del Estero	86049
        Localidad simple	-27.9125126696643	-64.1953803450085	Capital	INDEC	86049040000	86049040	Los Cardozos			LOS CARDOZOS	86	Santiago del Estero	86049
        Localidad simple	-27.8684490761323	-64.2176846841573	Capital	INDEC	86049050000	86049050	Maco			MACO	86	Santiago del Estero	86049
        Localidad simple	-27.883071657444	-64.2103645086341	Capital	INDEC	86049060000	86049060	Maquito			MAQUITO	86	Santiago del Estero	86049
        Localidad simple	-27.681136956593	-64.3628119718648	Capital	INDEC	86049070000	86049070	Morales			MORALES	86	Santiago del Estero	86049
        Localidad simple	-27.6663887276734	-64.3770291350394	Capital	INDEC	86049080000	86049080	Puesto de San Antonio			PUESTO DE SAN ANTONIO	86	Santiago del Estero	86049
        Localidad simple	-27.9463558793645	-64.1638901235678	Capital	INDEC	86049090000	86049090	San Pedro			SAN PEDRO	86	Santiago del Estero	86049
        Localidad simple	-27.9515163858504	-64.2196924435025	Capital	INDEC	86049100000	86049100	Santa María			SANTA MARIA	86	Santiago del Estero	86049
        Componente de localidad compuesta	-27.7906472093484	-64.2622741290181	Capital	INDEC	86049110000	86049110	Santiago del Estero			SANTIAGO DEL ESTERO	86	Santiago del Estero	86049
        Localidad simple	-27.8762024322533	-64.1878789215783	Capital	INDEC	86049120000	86049120	Vuelta de la Barranca			VUELTA DE LA BARRANCA	86	Santiago del Estero	86049
        Localidad simple	-27.9106239556579	-64.2300554961573	Capital	INDEC	86049130000	86049130	Yanda			YANDA	86	Santiago del Estero	86049
        Localidad simple	-26.0165513217409	-62.3330208736259	Copo	INDEC	86056010000	86056010	El Caburé			EL CABURE	86	Santiago del Estero	86056
        Localidad simple	-25.9734494403489	-63.121334820867	Copo	INDEC	86056020000	86056020	La Firmeza			LA FIRMEZA	86	Santiago del Estero	86056
        Localidad simple	-26.1336342552401	-62.0623998821941	Copo	INDEC	86056030000	86056030	Los Pirpintos			LOS PIRPINTOS	86	Santiago del Estero	86056
        Localidad simple	-25.9094984239476	-62.5920547989978	Copo	INDEC	86056040000	86056040	Los Tigres			LOS TIGRES	86	Santiago del Estero	86056
        Localidad simple	-25.8055238661729	-62.8421851386474	Copo	INDEC	86056050000	86056050	Monte Quemado			MONTE QUEMADO	86	Santiago del Estero	86056
        Localidad simple	-26.033847347527	-63.3180059411213	Copo	INDEC	86056060000	86056060	Nueva Esperanza			NUEVA ESPERANZA	86	Santiago del Estero	86056
        Localidad simple	-26.2344065294949	-61.8376679266549	Copo	INDEC	86056070000	86056070	Pampa de los Guanacos			PAMPA DE LOS GUANACOS	86	Santiago del Estero	86056
        Localidad simple	-26.1203999513037	-63.7053351206531	Copo	INDEC	86056080000	86056080	San José del Boquerón			SAN JOSE DEL BOQUERON	86	Santiago del Estero	86056
        Localidad simple	-25.7123774702614	-63.041276297827	Copo	INDEC	86056090000	86056090	Urutaú			URUTAU	86	Santiago del Estero	86056
        Localidad simple	-28.4309064612063	-64.9233001766413	Choya	INDEC	86063010000	86063010	Ancaján			ANCAJAN	86	Santiago del Estero	86063
        Localidad simple	-28.4942404547901	-64.8563028233751	Choya	INDEC	86063020000	86063020	Choya			CHOYA	86	Santiago del Estero	86063
        Localidad simple	-28.4119636214997	-64.7564290050951	Choya	INDEC	86063030000	86063030	Estación La Punta			ESTACION LA PUNTA	86	Santiago del Estero	86063
        Localidad simple	-28.6399178570768	-65.130637009131	Choya	INDEC	86063040000	86063040	Frías			FRIAS	86	Santiago del Estero	86063
        Localidad simple	-28.3756319929951	-64.5305517169124	Choya	INDEC	86063050000	86063050	Laprida			LAPRIDA	86	Santiago del Estero	86063
        Localidad simple	-28.4601109681789	-64.8665614531529	Choya	INDEC	86063070000	86063070	San Pedro			SAN PEDRO	86	Santiago del Estero	86063
        Localidad simple	-37.1774801030509	-62.7578962604015	Adolfo Alsina	INDEC	6007010000	06007010	Carhué	060007	Adolfo Alsina	CARHUE	6	Buenos Aires	6007
        Localidad simple	-37.4486186469627	-63.117609405389	Adolfo Alsina	INDEC	6007020000	06007020	Colonia San Miguel Arcángel	060007	Adolfo Alsina	COLONIA SAN MIGUEL ARCANGEL	6	Buenos Aires	6007
        Localidad simple	-37.3173292631958	-63.2331690622102	Adolfo Alsina	INDEC	6007030000	06007030	Delfín Huergo	060007	Adolfo Alsina	DELFIN HUERGO	6	Buenos Aires	6007
        Componente de localidad compuesta	-37.3563345638716	-62.4387637810214	Adolfo Alsina	INDEC	6007040000	06007040	Espartillar	060007	Adolfo Alsina	ESPARTILLAR	6	Buenos Aires	6007
        Localidad simple	-37.4544378016288	-63.2565950033782	Adolfo Alsina	INDEC	6007050000	06007050	Esteban Agustín Gascón	060007	Adolfo Alsina	ESTEBAN AGUSTIN GASCON	6	Buenos Aires	6007
        Localidad simple	-36.6613400852941	-63.3661281675236	Adolfo Alsina	INDEC	6007060000	06007060	La Pala	060007	Adolfo Alsina	LA PALA	6	Buenos Aires	6007
        Localidad simple	-36.7999468137731	-63.3385151506224	Adolfo Alsina	INDEC	6007070000	06007070	Maza	060007	Adolfo Alsina	MAZA	6	Buenos Aires	6007
        Localidad simple	-37.1583546113813	-63.2442194943605	Adolfo Alsina	INDEC	6007080000	06007080	Rivera	060007	Adolfo Alsina	RIVERA	6	Buenos Aires	6007
        Localidad simple	-37.4600992847959	-63.2405658599852	Adolfo Alsina	INDEC	6007100000	06007100	Villa Margarita	060007	Adolfo Alsina	VILLA MARGARITA	6	Buenos Aires	6007
        Localidad simple	-36.9884309445004	-63.133808887439	Adolfo Alsina	INDEC	6007110000	06007110	Yutuyaco	060007	Adolfo Alsina	YUTUYACO	6	Buenos Aires	6007
        Localidad simple	-38.0333995087596	-60.1003341740637	Adolfo Gonzales Chaves	INDEC	6014010000	06014010	Adolfo Gonzales Chaves	060014	Adolfo Gonzales Chaves	ADOLFO GONZALES CHAVES	6	Buenos Aires	6014
        Localidad simple	-37.9635021758562	-60.415659383962	Adolfo Gonzales Chaves	INDEC	6014020000	06014020	De La Garma	060014	Adolfo Gonzales Chaves	DE LA GARMA	6	Buenos Aires	6014
        Localidad simple	-37.8233871716044	-60.484639770555	Adolfo Gonzales Chaves	INDEC	6014030000	06014030	Juan E. Barra	060014	Adolfo Gonzales Chaves	JUAN E. BARRA	6	Buenos Aires	6014
        Localidad simple	-38.1766861391835	-60.1708487303777	Adolfo Gonzales Chaves	INDEC	6014040000	06014040	Vásquez	060014	Adolfo Gonzales Chaves	VASQUEZ	6	Buenos Aires	6014
        Componente de localidad compuesta	-28.4037795215625	-65.0964321177706	Choya	INDEC	86063080000	86063080	Tapso			TAPSO	86	Santiago del Estero	86063
        Localidad simple	-28.371365281259	-64.7921192520059	Choya	INDEC	86063090000	86063090	Villa La Punta			VILLA LA PUNTA	86	Santiago del Estero	86063
        Localidad simple	-27.2724258053036	-63.5140111288855	Figueroa	INDEC	86070010000	86070010	Bandera Bajada			BANDERA BAJADA	86	Santiago del Estero	86070
        Localidad simple	-27.3907597837259	-63.5489564711117	Figueroa	INDEC	86070020000	86070020	Caspi Corral			CASPI CORRAL	86	Santiago del Estero	86070
        Localidad simple	-27.617543825893	-63.301877607639	Figueroa	INDEC	86070030000	86070030	Colonia San Juan			COLONIA SAN JUAN	86	Santiago del Estero	86070
        Localidad simple	-27.5779248328345	-63.3309305482062	Figueroa	INDEC	86070040000	86070040	El Crucero			EL CRUCERO	86	Santiago del Estero	86070
        Localidad simple	-27.3845037887346	-63.5296772428548	Figueroa	INDEC	86070050000	86070050	Kilómetro 30			KILOMETRO 30	86	Santiago del Estero	86070
        Localidad simple	-27.7113503879057	-63.776465678451	Figueroa	INDEC	86070060000	86070060	La Cañada			LA CAÑADA	86	Santiago del Estero	86070
        Localidad simple	-27.3853384819687	-63.4863113485716	Figueroa	INDEC	86070070000	86070070	La Invernada			LA INVERNADA	86	Santiago del Estero	86070
        Localidad simple	-27.5383379504139	-63.3844467629454	Figueroa	INDEC	86070080000	86070080	Minerva			MINERVA	86	Santiago del Estero	86070
        Localidad simple	-27.4744910479525	-63.4699371865895	Figueroa	INDEC	86070090000	86070090	Vaca Huañuna			VACA HUAÑUNA	86	Santiago del Estero	86070
        Localidad simple	-27.7220223636284	-63.5077024611833	Figueroa	INDEC	86070100000	86070100	Villa Figueroa			VILLA FIGUEROA	86	Santiago del Estero	86070
        Localidad simple	-28.4645613476513	-62.8371553125604	General Taboada	INDEC	86077010000	86077010	Añatuya			AÑATUYA	86	Santiago del Estero	86077
        Localidad simple	-28.7471563597272	-62.4500332099209	General Taboada	INDEC	86077020000	86077020	Averías			AVERIAS	86	Santiago del Estero	86077
        Localidad simple	-28.625400373791	-62.6050049232664	General Taboada	INDEC	86077030000	86077030	Estación Tacañitas			ESTACION TACAÑITAS	86	Santiago del Estero	86077
        Localidad simple	-28.4600119281847	-61.8401411379322	General Taboada	INDEC	86077040000	86077040	La Nena			LA NENA	86	Santiago del Estero	86077
        Localidad simple	-28.4678989822603	-62.1097288458217	General Taboada	INDEC	86077050000	86077050	Los Juríes			LOS JURIES	86	Santiago del Estero	86077
        Localidad simple	-28.6023457181773	-62.1835145984131	General Taboada	INDEC	86077060000	86077060	Tomás Young			TOMAS YOUNG	86	Santiago del Estero	86077
        Componente de localidad compuesta	-28.1989652184744	-65.1121667400926	Guasayán	INDEC	86084010000	86084010	Lavalle	100217	Santa Rosa	LAVALLE	86	Santiago del Estero	86084
        Componente de localidad compuesta	-27.9573058480013	-65.1704506415815	Guasayán	INDEC	86084020000	86084020	San Pedro	100217	Santa Rosa	SAN PEDRO	86	Santiago del Estero	86084
        Localidad simple	-26.7716728234233	-64.6015462356661	Jiménez	INDEC	86091005000	86091005	El Arenal			EL ARENAL	86	Santiago del Estero	86091
        Localidad simple	-26.7184011548025	-64.3982906362897	Jiménez	INDEC	86091010000	86091010	El Bobadal			EL BOBADAL	86	Santiago del Estero	86091
        Componente de localidad compuesta	-27.2257680209403	-64.7003027141644	Jiménez	INDEC	86091020000	86091020	El Charco			EL CHARCO	86	Santiago del Estero	86091
        Localidad simple	-26.7333694233426	-64.4768351977429	Jiménez	INDEC	86091030000	86091030	El Rincón			EL RINCON	86	Santiago del Estero	86091
        Componente de localidad compuesta	-27.2971935237082	-64.61075364749	Jiménez	INDEC	86091040000	86091040	Gramilla			GRAMILLA	86	Santiago del Estero	86091
        Localidad simple	-26.9408021196944	-62.9565689431121	Moreno	INDEC	86119070000	86119070	Lilo Viejo			LILO VIEJO	86	Santiago del Estero	86119
        Localidad simple	-25.6489334968628	-60.9300401901344	General Güemes	INDEC	22063070000	22063070	Miraflores	220189	Miraflores	MIRAFLORES	22	Chaco	22063
        Entidad	-31.4475643930837	-68.4817213288378	Albardón	INDEC	70007020002	70007020	Villa General San Martín - Campo Afuera	700007	Albardón	LA CAÑADA	70	San Juan	70007
        Localidad simple	-27.0297706094062	-64.6107284533432	Jiménez	INDEC	86091050000	86091050	Isca Yacu			ISCA YACU	86	Santiago del Estero	86091
        Localidad simple	-27.033281523993	-64.6122143434088	Jiménez	INDEC	86091060000	86091060	Isca Yacu Semaul			ISCA YACU SEMAUL	86	Santiago del Estero	86091
        Localidad simple	-27.164621631919	-64.483386426973	Jiménez	INDEC	86091070000	86091070	Pozo Hondo			POZO HONDO	86	Santiago del Estero	86091
        Localidad simple	-26.7405309182605	-64.3965511764775	Jiménez	INDEC	86091080000	86091080	San Pedro			SAN PEDRO	86	Santiago del Estero	86091
        Localidad simple	-27.916852444404	-62.1779644703931	Juan F. Ibarra	INDEC	86098010000	86098010	El Colorado			EL COLORADO	86	Santiago del Estero	86098
        Localidad simple	-28.2978508912148	-61.8013595132333	Juan F. Ibarra	INDEC	86098020000	86098020	El Cuadrado			EL CUADRADO	86	Santiago del Estero	86098
        Localidad simple	-28.110413912625	-63.1950712509572	Juan F. Ibarra	INDEC	86098030000	86098030	Matará			MATARA	86	Santiago del Estero	86098
        Localidad simple	-27.9373441459042	-63.4286561024091	Juan F. Ibarra	INDEC	86098040000	86098040	Suncho Corral			SUNCHO CORRAL	86	Santiago del Estero	86098
        Localidad simple	-27.9593446946828	-62.6095801174635	Juan F. Ibarra	INDEC	86098050000	86098050	Vilelas			VILELAS	86	Santiago del Estero	86098
        Localidad simple	-27.7812827220804	-62.9762834233876	Juan F. Ibarra	INDEC	86098060000	86098060	Yuchán			YUCHAN	86	Santiago del Estero	86098
        Localidad simple	-28.3039639606794	-64.1851457926154	Loreto	INDEC	86105010000	86105010	Villa San Martín (Est. Loreto)			VILLA SAN MARTIN	86	Santiago del Estero	86105
        Localidad simple	-29.4169970813328	-62.7903866994546	Mitre	INDEC	86112010000	86112010	Villa Unión			VILLA UNION	86	Santiago del Estero	86112
        Localidad simple	-27.2367908165246	-62.3796548631942	Moreno	INDEC	86119010000	86119010	Aerolito			AEROLITO	86	Santiago del Estero	86119
        Localidad simple	-27.1327719671086	-62.5491667779808	Moreno	INDEC	86119020000	86119020	Alhuampa			ALHUAMPA	86	Santiago del Estero	86119
        Localidad simple	-27.0720923042891	-62.6462009108307	Moreno	INDEC	86119030000	86119030	Hasse			HASSE	86	Santiago del Estero	86119
        Localidad simple	-27.1785919494814	-62.4685537207535	Moreno	INDEC	86119040000	86119040	Hernán Mejía Miraval			HERNAN MEJIA MIRAVAL	86	Santiago del Estero	86119
        Localidad simple	-27.4618186135826	-62.9188082355465	Moreno	INDEC	86119050000	86119050	Las Tinajas			LAS TINAJAS	86	Santiago del Estero	86119
        Localidad simple	-27.076215168082	-63.0708907011302	Moreno	INDEC	86119060000	86119060	Libertad			LIBERTAD	86	Santiago del Estero	86119
        Localidad simple	-26.843267415023	-62.9328920767785	Moreno	INDEC	86119080000	86119080	Patay			PATAY	86	Santiago del Estero	86119
        Localidad simple	-27.3309034121122	-62.2263991173581	Moreno	INDEC	86119090000	86119090	Pueblo Pablo Torelo			PUEBLO PABLO TORELO	86	Santiago del Estero	86119
        Localidad simple	-27.6502221618861	-62.4162413545379	Moreno	INDEC	86119100000	86119100	Quimili			QUIMILI	86	Santiago del Estero	86119
        Localidad simple	-27.5934675544521	-61.9454404681047	Moreno	INDEC	86119110000	86119110	Roversi			ROVERSI	86	Santiago del Estero	86119
        Localidad simple	-27.0269428383778	-62.7014758111564	Moreno	INDEC	86119120000	86119120	Tintina			TINTINA	86	Santiago del Estero	86119
        Localidad simple	-27.3177468248599	-62.5883450951591	Moreno	INDEC	86119130000	86119130	Weisburd			WEISBURD	86	Santiago del Estero	86119
        Localidad simple	-29.0559761149567	-63.9559623784872	Ojo de Agua	INDEC	86126010000	86126010	El 49			EL 49	86	Santiago del Estero	86126
        Localidad simple	-29.562340331816	-63.4575916015313	Ojo de Agua	INDEC	86126020000	86126020	Sol de Julio			SOL DE JULIO	86	Santiago del Estero	86126
        Localidad simple	-29.5029027910505	-63.6939738398896	Ojo de Agua	INDEC	86126030000	86126030	Villa Ojo de Agua			VILLA OJO DE AGUA	86	Santiago del Estero	86126
        Localidad simple	-26.094177918867	-64.3077511775358	Pellegrini	INDEC	86133010000	86133010	El Mojón			EL MOJON	86	Santiago del Estero	86133
        Localidad simple	-26.6821239251425	-64.0011052202083	Pellegrini	INDEC	86133020000	86133020	Las Delicias			LAS DELICIAS	86	Santiago del Estero	86133
        Localidad simple	-26.2029493632974	-64.2386862818792	Pellegrini	INDEC	86133030000	86133030	Nueva Esperanza			NUEVA ESPERANZA	86	Santiago del Estero	86133
        Localidad simple	-26.4117975451662	-64.3406016723268	Pellegrini	INDEC	86133040000	86133040	Pozo Betbeder			POZO BETBEDER	86	Santiago del Estero	86133
        Localidad simple	-26.3973763982116	-64.5044626210659	Pellegrini	INDEC	86133050000	86133050	Rapelli			RAPELLI	86	Santiago del Estero	86133
        Localidad simple	-26.2295353888576	-63.7775041035997	Pellegrini	INDEC	86133060000	86133060	Santo Domingo			SANTO DOMINGO	86	Santiago del Estero	86133
        Localidad simple	-29.2346591274202	-63.4745902285707	Quebrachos	INDEC	86140010000	86140010	Ramírez de Velazco			RAMIREZ DE VELAZCO	86	Santiago del Estero	86140
        Localidad simple	-29.3856768376799	-63.4739812028011	Quebrachos	INDEC	86140020000	86140020	Sumampa			SUMAMPA	86	Santiago del Estero	86140
        Localidad simple	-29.3873857117046	-63.4413442606189	Quebrachos	INDEC	86140030000	86140030	Sumampa Viejo			SUMAMPA VIEJO	86	Santiago del Estero	86140
        Localidad simple	-27.566815560625	-64.6802356354788	Río Hondo	INDEC	86147010000	86147010	Chañar Pozo de Abajo			CHAÑAR POZO DE ABAJO	86	Santiago del Estero	86147
        Localidad simple	-27.5214742780514	-64.5558862404344	Río Hondo	INDEC	86147020000	86147020	Chauchillas			CHAUCHILLAS	86	Santiago del Estero	86147
        Localidad simple	-27.4319202445614	-64.9313037647628	Río Hondo	INDEC	86147030000	86147030	Colonia Tinco			COLONIA TINCO	86	Santiago del Estero	86147
        Componente de localidad compuesta	-27.2348881521517	-64.697822026062	Río Hondo	INDEC	86147040000	86147040	El Charco			EL CHARCO	86	Santiago del Estero	86147
        Componente de localidad compuesta	-27.3020072164497	-64.6130855140247	Río Hondo	INDEC	86147050000	86147050	Gramilla			GRAMILLA	86	Santiago del Estero	86147
        Localidad simple	-27.4563912240441	-64.9277000920229	Río Hondo	INDEC	86147060000	86147060	La Nueva Donosa			LA NUEVA DONOSA	86	Santiago del Estero	86147
        Localidad simple	-27.4719466367193	-64.615993605497	Río Hondo	INDEC	86147070000	86147070	Los Miranda			LOS MIRANDA	86	Santiago del Estero	86147
        Localidad simple	-27.5338396475268	-64.5310863310616	Río Hondo	INDEC	86147080000	86147080	Los Núñez			LOS NUÑEZ	86	Santiago del Estero	86147
        Localidad simple	-27.4611344607229	-64.9065546199272	Río Hondo	INDEC	86147090000	86147090	Mansupa			MANSUPA	86	Santiago del Estero	86147
        Localidad simple	-27.3041200176408	-64.7530797214091	Río Hondo	INDEC	86147100000	86147100	Pozuelos			POZUELOS	86	Santiago del Estero	86147
        Localidad simple	-27.5527256617805	-64.5111174447533	Río Hondo	INDEC	86147110000	86147110	Rodeo de Valdez			RODEO DE VALDEZ	86	Santiago del Estero	86147
        Localidad simple	-27.491671176486	-64.6013992349245	Río Hondo	INDEC	86147120000	86147120	El Sauzal			SAUZAL	86	Santiago del Estero	86147
        Localidad simple	-27.5012564484806	-64.8552586634364	Río Hondo	INDEC	86147130000	86147130	Termas de Río Hondo			TERMAS DE RIO HONDO	86	Santiago del Estero	86147
        Localidad simple	-27.574990170048	-64.4753061878465	Río Hondo	INDEC	86147140000	86147140	Villa Giménez			VILLA GIMENEZ	86	Santiago del Estero	86147
        Localidad simple	-27.5983201543603	-64.8739939701803	Río Hondo	INDEC	86147150000	86147150	Villa Río Hondo			VILLA RIO HONDO	86	Santiago del Estero	86147
        Localidad simple	-27.516849315862	-64.9027287200084	Río Hondo	INDEC	86147160000	86147160	Villa Turística del Embalse de Rio Hondo			VILLA TURISTICA DEL EMBALSE	86	Santiago del Estero	86147
        Localidad simple	-27.379706365694	-64.7967473078135	Río Hondo	INDEC	86147170000	86147170	Vinará			VINARA	86	Santiago del Estero	86147
        Localidad simple	-30.0603796584752	-62.1051312621272	Rivadavia	INDEC	86154010000	86154010	Colonia Alpina			COLONIA ALPINA	86	Santiago del Estero	86154
        Localidad simple	-29.6773076972314	-62.1374427216007	Rivadavia	INDEC	86154020000	86154020	Palo Negro			PALO NEGRO	86	Santiago del Estero	86154
        Localidad simple	-29.7604898000173	-62.0525063759069	Rivadavia	INDEC	86154030000	86154030	Selva			SELVA	86	Santiago del Estero	86154
        Localidad simple	-27.8315913828113	-64.061379252439	Robles	INDEC	86161010000	86161010	Beltrán			BELTRAN	86	Santiago del Estero	86161
        Localidad simple	-27.7226465873966	-63.8598770739209	Robles	INDEC	86161020000	86161020	Colonia El Simbolar			COLONIA EL SIMBOLAR	86	Santiago del Estero	86161
        Localidad simple	-27.9241249979993	-63.8937760389577	Robles	INDEC	86161030000	86161030	Fernández			FERNANDEZ	86	Santiago del Estero	86161
        Localidad simple	-27.8774908793598	-63.9791359214751	Robles	INDEC	86161040000	86161040	Ingeniero Forres			INGENIERO FORRES	86	Santiago del Estero	86161
        Localidad simple	-27.7878023282581	-64.1510014560828	Robles	INDEC	86161050000	86161050	Vilmer			VILMER	86	Santiago del Estero	86161
        Localidad simple	-28.796459373074	-63.5791247989506	Salavina	INDEC	86168010000	86168010	Chilca Juliana			CHILCA JULIANA	86	Santiago del Estero	86168
        Localidad simple	-28.9858790620734	-63.4474428106687	Salavina	INDEC	86168020000	86168020	Los Telares			LOS TELARES	86	Santiago del Estero	86168
        Localidad simple	-28.804933488379	-63.4286953351842	Salavina	INDEC	86168030000	86168030	Villa Salavina			VILLA SALAVINA	86	Santiago del Estero	86168
        Localidad simple	-28.2433820721478	-63.9464098988816	San Martín	INDEC	86175010000	86175010	Brea Pozo			BREA POZO	86	Santiago del Estero	86175
        Localidad simple	-28.0511950311521	-63.9907281128401	San Martín	INDEC	86175020000	86175020	Estación Robles			ESTACION ROBLES	86	Santiago del Estero	86175
        Localidad simple	-28.0088248181919	-63.7454952959481	San Martín	INDEC	86175030000	86175030	Estación Taboada			ESTACION TABOADA	86	Santiago del Estero	86175
        Localidad simple	-28.3143322879508	-63.9957666086631	San Martín	INDEC	86175040000	86175040	Villa Nueva			VILLA NUEVA	86	Santiago del Estero	86175
        Localidad simple	-28.1529581822136	-63.5345160915478	Sarmiento	INDEC	86182010000	86182010	Garza			GARZA	86	Santiago del Estero	86182
        Localidad simple	-28.0530238668842	-64.2227939749583	Silípica	INDEC	86189010000	86189010	Árraga			ARRAGA	86	Santiago del Estero	86189
        Localidad simple	-28.1833426920499	-64.1968111536257	Silípica	INDEC	86189020000	86189020	Nueva Francia			NUEVA FRANCIA	86	Santiago del Estero	86189
        Localidad simple	-28.1030540788067	-64.2130484994317	Silípica	INDEC	86189030000	86189030	Simbol			SIMBOL	86	Santiago del Estero	86189
        Localidad simple	-28.1717134352764	-64.101040971413	Silípica	INDEC	86189040000	86189040	Sumamao			SUMAMAO	86	Santiago del Estero	86189
        Localidad simple	-28.1105007595588	-64.1476921495566	Silípica	INDEC	86189050000	86189050	Villa Silípica			VILLA SILIPICA	86	Santiago del Estero	86189
        Localidad simple	-26.6843396000243	-65.0481349066456	Burruyacú	INDEC	90007010000	90007010	Barrio San Jorge	908021	El Naranjo y el Sunchal	BARRIO SAN JORGE	90	Tucumán	90007
        Localidad simple	-26.7583605607957	-65.0693888917573	Burruyacú	INDEC	90007020000	90007020	El Chañar	908014	El Chañar	EL CHAÑAR	90	Tucumán	90007
        Localidad simple	-26.6571859218044	-65.0483602838482	Burruyacú	INDEC	90007030000	90007030	El Naranjo	908021	El Naranjo y el Sunchal	EL NARANJO	90	Tucumán	90007
        Localidad simple	-26.5736893005766	-64.5576861101138	Burruyacú	INDEC	90007040000	90007040	Garmendia	908042	Garmendia	GARMENDIA	90	Tucumán	90007
        Localidad simple	-26.6881473308745	-64.9464369337093	Burruyacú	INDEC	90007050000	90007050	La Ramada	908056	La Ramada y la Cruz	LA RAMADA	90	Tucumán	90007
        Localidad simple	-26.7303436942447	-65.0113600491402	Burruyacú	INDEC	90007060000	90007060	Macomitas	908014	El Chañar	MACOMITAS	90	Tucumán	90007
        Localidad simple	-26.7398606901892	-64.6493040222716	Burruyacú	INDEC	90007070000	90007070	Piedrabuena	908049	Gdor. Piedrabuena	PIEDRABUENA	90	Tucumán	90007
        Localidad simple	-26.2918847472245	-64.5005128631092	Burruyacú	INDEC	90007080000	90007080	7 de Abril	908007	7 de Abril	7 DE ABRIL	90	Tucumán	90007
        Localidad simple	-26.5561603640592	-64.7983838278956	Burruyacú	INDEC	90007090000	90007090	Villa Benjamín Aráoz	908063	Benjamin Araoz y el Tajamar	VILLA BENJAMIN ARAOZ	90	Tucumán	90007
        Localidad simple	-26.5003323203292	-64.7419938212453	Burruyacú	INDEC	90007100000	90007100	Villa Burruyacú	900007	Municipalidad de Burruyacu	VILLA BURRUYACU	90	Tucumán	90007
        Localidad simple	-26.5064025936102	-64.9998985377047	Burruyacú	INDEC	90007110000	90007110	Villa Padre Monti	908070	Villa Padre Monti	VILLA PADRE MONTI	90	Tucumán	90007
        Entidad	-26.8220641277209	-65.1385924038502	Cruz Alta	INDEC	90014010001	90014010	Alderetes	900021	Municipalidad de Alderetes	ALDERETES	90	Tucumán	90014
        Entidad	-26.8184460052552	-65.1556778939315	Cruz Alta	INDEC	90014010002	90014010	Alderetes	900021	Municipalidad de Alderetes	EL CORTE	90	Tucumán	90014
        Entidad	-26.80204642135	-65.1258766860824	Cruz Alta	INDEC	90014010003	90014010	Alderetes	900021	Municipalidad de Alderetes	LOS GUTIERREZ	90	Tucumán	90014
        Entidad	-26.8438678881267	-65.1632837939025	Cruz Alta	INDEC	90014020001	90014020	Banda del Río Salí	900028	Municipalidad de Banda del Rio Sali	BANDA DEL RIO SALI	90	Tucumán	90014
        Entidad	-26.8498779490703	-65.1293137289629	Cruz Alta	INDEC	90014020002	90014020	Banda del Río Salí	900028	Municipalidad de Banda del Rio Sali	BARRIO AEROPUERTO	90	Tucumán	90014
        Entidad	-26.8621611908602	-65.1625825810305	Cruz Alta	INDEC	90014020003	90014020	Banda del Río Salí	900028	Municipalidad de Banda del Rio Sali	LASTENIA	90	Tucumán	90014
        Componente de localidad compuesta	-26.8835749144059	-65.0999411428557	Cruz Alta	INDEC	90014040000	90014040	Colombres	908077	Colombres	COLOMBRES	90	Tucumán	90014
        Localidad simple	-26.8339561201266	-64.9893799370396	Cruz Alta	INDEC	90014050000	90014050	Colonia Mayo - Barrio La Milagrosa	908133	Los Perez	COLONIA MAYO - BARRIO LA MILAGROSA	90	Tucumán	90014
        Entidad	-26.8346473974393	-65.0955588658241	Cruz Alta	INDEC	90014060001	90014060	Delfín Gallo	908084	Delfin Gallo	EL PARAISO	90	Tucumán	90014
        Entidad	-26.8440192084768	-65.0924758564779	Cruz Alta	INDEC	90014060002	90014060	Delfín Gallo	908084	Delfin Gallo	EX INGENIO ESPERANZA	90	Tucumán	90014
        Entidad	-26.8541670602329	-65.0915199952372	Cruz Alta	INDEC	90014060003	90014060	Delfín Gallo	908084	Delfin Gallo	EX INGENIO LUJAN	90	Tucumán	90014
        Localidad simple	-26.9921019189366	-65.1812450251063	Cruz Alta	INDEC	90014070000	90014070	El Bracho	908091	El Bracho y el Cevilar	EL BRACHO	90	Tucumán	90014
        Entidad	-26.8167179154155	-65.0802671019889	Cruz Alta	INDEC	90014080001	90014080	La Florida	908105	La Florida y Luisiana	INGENIO LA FLORIDA	90	Tucumán	90014
        Entidad	-26.8190592540013	-65.0943210848409	Cruz Alta	INDEC	90014080002	90014080	La Florida	908105	La Florida y Luisiana	LA FLORIDA	90	Tucumán	90014
        Localidad simple	-26.8878173829847	-64.7430772509051	Cruz Alta	INDEC	90014090000	90014090	Las Cejas	908112	Las Cejas	LAS CEJAS	90	Tucumán	90014
        Entidad	-26.8770998455409	-64.9748987513019	Cruz Alta	INDEC	90014100001	90014100	Los Ralos	908140	Los Ralos	EX INGENIO LOS RALOS	90	Tucumán	90014
        Entidad	-26.8868084047256	-65.0074356034814	Cruz Alta	INDEC	90014100002	90014100	Los Ralos	908140	Los Ralos	VILLA RECASTE	90	Tucumán	90014
        Entidad	-26.8914692726412	-65.0131822116958	Cruz Alta	INDEC	90014100003	90014100	Los Ralos	908140	Los Ralos	VILLA TERCERA	90	Tucumán	90014
        Localidad simple	-26.8992133086383	-65.1492861893342	Cruz Alta	INDEC	90014110000	90014110	Pacará	900028	Municipalidad de Banda del Rio Sali	PACARA	90	Tucumán	90014
        Localidad simple	-26.9547865827356	-65.0483776049689	Cruz Alta	INDEC	90014120000	90014120	Ranchillos	908147	Ranchillos y San Miguel	RANCHILLOS	90	Tucumán	90014
        Localidad simple	-26.8884969343068	-65.1963401762121	Cruz Alta	INDEC	90014130000	90014130	San Andrés	908154	San Andres	SAN ANDRES	90	Tucumán	90014
        Localidad simple	-27.3364644479185	-65.7560706396094	Chicligasta	INDEC	90021010000	90021010	Alpachiri	908161	Alpachiri y el Molino	ALPACHIRI	90	Tucumán	90021
        Localidad simple	-27.3793992485609	-65.6079258666538	Chicligasta	INDEC	90021020000	90021020	Alto Verde	908168	Alto Verde y los Guchea	ALTO VERDE	90	Tucumán	90021
        Localidad simple	-27.3069484835773	-65.576067487854	Chicligasta	INDEC	90021030000	90021030	Arcadia	908175	Arcadia	ARCADIA	90	Tucumán	90021
        Componente de localidad compuesta	-27.3293616351221	-65.5823860081286	Chicligasta	INDEC	90021040000	90021040	Barrio San Roque	908175	Arcadia	SAN ROQUE	90	Tucumán	90021
        Componente de localidad compuesta	-27.3421785890325	-65.598557597657	Chicligasta	INDEC	90021050000	90021050	Concepción	900035	Municipalidad de Concepcion	CONCEPCION	90	Tucumán	90021
        Localidad simple	-27.3359615187055	-65.6527259102121	Chicligasta	INDEC	90021060000	90021060	Iltico	900035	Municipalidad de Concepcion	ILTICO	90	Tucumán	90021
        Componente de localidad compuesta	-27.413472537684	-65.5152314804134	Chicligasta	INDEC	90021070000	90021070	La Trinidad	908189	Trinidad	LA TRINIDAD	90	Tucumán	90021
        Componente de localidad compuesta	-27.418836093134	-65.5333450199588	Chicligasta	INDEC	90021080000	90021080	Medina	908196	Medina	MEDINA	90	Tucumán	90021
        Localidad simple	-27.0430593855029	-65.4291435588925	Famaillá	INDEC	90028010000	90028010	Barrio Casa Rosada	900042	Municipalidad de Famailla	BARRIO CASA ROSADA	90	Tucumán	90028
        Localidad simple	-27.0256026652764	-65.3464718463273	Famaillá	INDEC	90028020000	90028020	Campo de Herrera	900042	Municipalidad de Famailla	CAMPO DE HERRERA	90	Tucumán	90028
        Entidad	-27.0697371751242	-65.3999011552298	Famaillá	INDEC	90028030001	90028030	Famaillá	900042	Municipalidad de Famailla	EX INGENIO NUEVA BAVIERA	90	Tucumán	90028
        Entidad	-27.0450456348935	-65.3956359866229	Famaillá	INDEC	90028030002	90028030	Famaillá	900042	Municipalidad de Famailla	FAMAILLA	90	Tucumán	90028
        Localidad simple	-27.0354707281153	-65.455616412105	Famaillá	INDEC	90028040000	90028040	Ingenio Fronterita	900042	Municipalidad de Famailla	INGENIO FRONTERITA	90	Tucumán	90028
        Localidad simple	-27.6485245594157	-65.4389216777288	Graneros	INDEC	90035010000	90035010	Graneros	900049	Municipalidad de Graneros	GRANEROS	90	Tucumán	90035
        Localidad simple	-27.6466143101473	-65.2504927223474	Graneros	INDEC	90035020000	90035020	Lamadrid	908203	Lamadrid	LAMADRID	90	Tucumán	90035
        Localidad simple	-27.8350683836867	-65.1946017699559	Graneros	INDEC	90035030000	90035030	Taco Ralo	908210	Taco Ralo	TACO RALO	90	Tucumán	90035
        Localidad simple	-27.5859774039585	-65.620843677012	Juan Bautista Alberdi	INDEC	90042010000	90042010	Juan Bautista Alberdi	900056	Municipalidad de Juan Bautista Alberdi	JUAN BAUTISTA ALBERDI	90	Tucumán	90042
        Localidad simple	-27.5271408525417	-65.614612836175	Juan Bautista Alberdi	INDEC	90042020000	90042020	Villa Belgrano	908224	Comuna Villa Belgrano	VILLA BELGRANO	90	Tucumán	90042
        Localidad simple	-27.7730048354523	-65.5864568354594	La Cocha	INDEC	90049010000	90049010	La Cocha	900063	Municipalidad de la Cocha	LA COCHA	90	Tucumán	90049
        Localidad simple	-27.7315967012344	-65.5827595206013	La Cocha	INDEC	90049020000	90049020	San José de La Cocha	908259	San Jose de la Cocha	SAN JOSE DE LA COCHA	90	Tucumán	90049
        Localidad simple	-27.0310036528782	-65.3086376425668	Leales	INDEC	90056010000	90056010	Bella Vista	900070	Municipalidad de Bella Vista	BELLA VISTA	90	Tucumán	90056
        Localidad simple	-27.0571152473018	-64.9218123993231	Leales	INDEC	90056020000	90056020	Estación Aráoz	908294	Estacion Araoz y Tacanas	ESTACION ARAOZ	90	Tucumán	90056
        Localidad simple	-27.2808998221653	-65.0190299575107	Leales	INDEC	90056030000	90056030	Los Puestos	908315	Los Puestos	LOS PUESTOS	90	Tucumán	90056
        Localidad simple	-26.9557033913379	-65.272073063004	Leales	INDEC	90056040000	90056040	Manuel García Fernández	908322	Manuel Garcia Fernandez	MANUEL GARCIA FERNANDEZ	90	Tucumán	90056
        Localidad simple	-27.0563442946496	-65.2181035623283	Leales	INDEC	90056050000	90056050	Pala Pala	908329	Quilmes y los Sueldos	PALA PALA	90	Tucumán	90056
        Localidad simple	-27.1496800217878	-65.3560513582608	Leales	INDEC	90056060000	90056060	Río Colorado	908336	Rio Colorado	RIO COLORADO	90	Tucumán	90056
        Localidad simple	-27.1378928767222	-65.2614173877659	Leales	INDEC	90056070000	90056070	Santa Rosa de Leales	908343	Santa Rosa de Leales y L. Blanca	SANTA ROSA DE LEALES	90	Tucumán	90056
        Localidad simple	-27.0677472403134	-65.2354487523003	Leales	INDEC	90056080000	90056080	Villa Fiad - Ingenio Leales	908329	Quilmes y los Sueldos	VILLA FIAD - INGENIO LEALES	90	Tucumán	90056
        Localidad simple	-27.1942605268211	-65.3095561336322	Leales	INDEC	90056090000	90056090	Villa de Leales	908350	Villa de Leales	VILLA DE LEALES	90	Tucumán	90056
        Componente de localidad compuesta	-26.8749835532106	-65.2322262379924	Lules	INDEC	90063010000	90063010	Barrio San Felipe	900014	Municipalidad de San Miguel De Tucuman	BARRIO SAN FELIPE	90	Tucumán	90063
        Entidad	-26.8418175731977	-65.2753559359172	Lules	INDEC	90063020001	90063020	El Manantial	908357	El Manantial	BARRIO ARAUJO	90	Tucumán	90063
        Entidad	-26.8445604430497	-65.2856690422125	Lules	INDEC	90063020002	90063020	El Manantial	908357	El Manantial	EL MANANTIAL	90	Tucumán	90063
        Localidad simple	-26.8739965593381	-65.3103499893471	Lules	INDEC	90063030000	90063030	Ingenio San Pablo	908371	San Pablo y Villa Nougues	INGENIO SAN PABLO	90	Tucumán	90063
        Localidad simple	-26.9601338991114	-65.3514727517897	Lules	INDEC	90063040000	90063040	La Reducción	900077	Municipalidad de Lules	LA REDUCCION	90	Tucumán	90063
        Localidad simple	-26.9239379177434	-65.3364017910576	Lules	INDEC	90063050000	90063050	Lules	900077	Municipalidad de Lules	LULES	90	Tucumán	90063
        Localidad simple	-27.12072050474	-65.4705647177524	Monteros	INDEC	90070010000	90070010	Acheral	908378	Acheral	ACHERAL	90	Tucumán	90070
        Localidad simple	-27.1895217713073	-65.6039648120293	Monteros	INDEC	90070020000	90070020	Capitán Cáceres	908392	Capitan Caceres	CAPITAN CACERES	90	Tucumán	90070
        Localidad simple	-27.1674766637374	-65.4987774491472	Monteros	INDEC	90070030000	90070030	Monteros	900084	Municipalidad de Monteros	MONTEROS	90	Tucumán	90070
        Localidad simple	-27.2207848342688	-65.527417311463	Monteros	INDEC	90070040000	90070040	Pueblo Independencia	908406	Leon Rouges y Santa Rosa	PUEBLO INDEPENDENCIA	90	Tucumán	90070
        Componente de localidad compuesta	-27.2690482043801	-65.5593459528459	Monteros	INDEC	90070050000	90070050	Río Seco	908420	Rio Seco	RIO SECO	90	Tucumán	90070
        Localidad simple	-27.0930813575252	-65.5325624964532	Monteros	INDEC	90070060000	90070060	Santa Lucía	908427	Santa Lucia	SANTA LUCIA	90	Tucumán	90070
        Localidad simple	-27.2278200846423	-65.6598562004025	Monteros	INDEC	90070070000	90070070	Sargento Moya	908434	Sargento Moya	SARGENTO MOYA	90	Tucumán	90070
        Localidad simple	-27.1423360079647	-65.5656822015637	Monteros	INDEC	90070080000	90070080	Soldado Maldonado	908441	Soldado Maldonado	SOLDADO MALDONADO	90	Tucumán	90070
        Localidad simple	-27.050034787094	-65.4875831419552	Monteros	INDEC	90070090000	90070090	Teniente Berdina	908448	Teniente Berdina	TENIENTE BERDINA	90	Tucumán	90070
        Componente de localidad compuesta	-27.2536712257247	-65.5524720047212	Monteros	INDEC	90070100000	90070100	Villa Quinteros	908455	Villa Quinteros	VILLA QUINTEROS	90	Tucumán	90070
        Entidad	-27.4298511184032	-65.6204066716154	Río Chico	INDEC	90077010001	90077010	Aguilares	900091	Municipalidad de Aguilares	AGUILARES	90	Tucumán	90077
        Entidad	-27.4557975105898	-65.6064955796251	Río Chico	INDEC	90077010002	90077010	Aguilares	900091	Municipalidad de Aguilares	INGENIO SANTA BARBARA	90	Tucumán	90077
        Localidad simple	-27.413720870217	-65.695439891394	Río Chico	INDEC	90077020000	90077020	Los Sarmientos	908469	Los Sarmiento y la Tipa	LOS SARMIENTOS	90	Tucumán	90077
        Localidad simple	-27.4809961150586	-65.6214061319444	Río Chico	INDEC	90077030000	90077030	Río Chico	908483	Santa Ana	RIO CHICO	90	Tucumán	90077
        Localidad simple	-27.4722321360222	-65.6841675424243	Río Chico	INDEC	90077040000	90077040	Santa Ana	908483	Santa Ana	SANTA ANA	90	Tucumán	90077
        Localidad simple	-27.4739466117854	-65.6592300213907	Río Chico	INDEC	90077050000	90077050	Villa Clodomiro Hileret	908483	Santa Ana	VILLA CLODOMIRO HILERET	90	Tucumán	90077
        Componente de localidad compuesta	-26.82900979033	-65.2105441811048	Capital	INDEC	90084010000	90084010	San Miguel de Tucumán	900014	Municipalidad de San Miguel De Tucuman	SAN MIGUEL DE TUCUMAN	90	Tucumán	90084
        Localidad simple	-27.4175004497156	-65.2878399932446	Simoca	INDEC	90091010000	90091010	Atahona	908490	Atahona	ATAHONA	90	Tucumán	90091
        Localidad simple	-27.5109095164641	-65.2776930194393	Simoca	INDEC	90091020000	90091020	Monteagudo	908518	Monteagudo	MONTEAGUDO	90	Tucumán	90091
        Localidad simple	-27.4845113363814	-65.4912509331708	Simoca	INDEC	90091030000	90091030	Nueva Trinidad	908532	Rio Chico y Nueva Trinidad	NUEVA TRINIDAD	90	Tucumán	90091
        Localidad simple	-27.3865618797716	-65.4563894902029	Simoca	INDEC	90091040000	90091040	Santa Cruz	908546	Santa Cruz y la Tuna	SANTA CRUZ	90	Tucumán	90091
        Localidad simple	-27.2624226707095	-65.3552894738936	Simoca	INDEC	90091050000	90091050	Simoca	900098	Municipalidad de Simoca	SIMOCA	90	Tucumán	90091
        Localidad simple	-27.4352233904382	-65.163544429074	Simoca	INDEC	90091060000	90091060	Villa Chicligasta	908553	Villa de Chicligasta	VILLA CHICLIGASTA	90	Tucumán	90091
        Localidad simple	-26.5936376610691	-65.9279885664724	Tafí del Valle	INDEC	90098010000	90098010	Amaicha del Valle	908567	Amaicha del Valle	AMAICHA DEL VALLE	90	Tucumán	90098
        Localidad simple	-26.3605355069816	-65.9589195037969	Tafí del Valle	INDEC	90098020000	90098020	Colalao del Valle	908574	Colalao del Valle	COLALAO DEL VALLE	90	Tucumán	90098
        Localidad simple	-26.9392209221338	-65.7081542446876	Tafí del Valle	INDEC	90098030000	90098030	El Mollar	908581	El Mollar	EL MOLLAR	90	Tucumán	90098
        Localidad simple	-26.8527978993495	-65.7085573791718	Tafí del Valle	INDEC	90098040000	90098040	Tafí del Valle	900105	Municipalidad de Tafi del Valle	TAFI DEL VALLE	90	Tucumán	90098
        Localidad simple	-26.7081441784822	-65.2200815585159	Tafí Viejo	INDEC	90105010000	90105010	Barrio El Cruce	908616	Los Nogales	BARRIO EL CRUCE	90	Tucumán	90105
        Localidad simple	-26.7465814588322	-65.2334174034289	Tafí Viejo	INDEC	90105020000	90105020	Barrio Lomas de Tafí	900119	Municipalidad de Tafi Viejo	BARRIO LOMAS DE TAFI	90	Tucumán	90105
        Localidad simple	-26.7180167498877	-65.2249109374961	Tafí Viejo	INDEC	90105030000	90105030	Barrio Mutual San Martín	908616	Los Nogales	BARRIO MUTUAL SAN MARTIN	90	Tucumán	90105
        Localidad simple	-26.7527987012624	-65.248427031041	Tafí Viejo	INDEC	90105040000	90105040	Barrio Parada 14	900119	Municipalidad de Tafi Viejo	BARRIO PARADA 14	90	Tucumán	90105
        Localidad simple	-26.756263713385	-65.2390248245137	Tafí Viejo	INDEC	90105050000	90105050	Barrio U.T.A. II	900119	Municipalidad de Tafi Viejo	BARRIO U.T.A. II	90	Tucumán	90105
        Componente de localidad compuesta	-26.7815251300034	-65.2193041804807	Tafí Viejo	INDEC	90105060000	90105060	Diagonal Norte - Luz y Fuerza - Los Pocitos - Villa Nueva Italia	900119	Municipalidad de Tafi Viejo	DIAG. NORTE - LUZ Y FUERZA - LOS POCITOS	90	Tucumán	90105
        Localidad simple	-26.6325444298094	-65.2057408343078	Tafí Viejo	INDEC	90105070000	90105070	El Cadillal	908602	El Cadillal	EL CADILLAL	90	Tucumán	90105
        Localidad simple	-26.7312682798666	-65.2558176904322	Tafí Viejo	INDEC	90105080000	90105080	Tafí Viejo	900119	Municipalidad de Tafi Viejo	TAFI VIEJO	90	Tucumán	90105
        Localidad simple	-26.7695777143465	-65.233609939011	Tafí Viejo	INDEC	90105090000	90105090	Villa Las Flores	900119	Municipalidad de Tafi Viejo	VILLA LAS FLORES	90	Tucumán	90105
        Componente de localidad compuesta	-26.7759821127859	-65.2019701714422	Tafí Viejo	INDEC	90105100000	90105100	Villa Mariano Moreno - El Colmenar	900112	Municipalidad de las Talitas	VILLA MARIANO MORENO - EL COLMENAR	90	Tucumán	90105
        Localidad simple	-26.4107463918543	-65.3199726179681	Trancas	INDEC	90112010000	90112010	Choromoro	908623	Choromoro	CHOROMORO	90	Tucumán	90112
        Localidad simple	-26.2357654346434	-65.4938515563214	Trancas	INDEC	90112020000	90112020	San Pedro de Colalao	908630	San Pedro de Colalao	SAN PEDRO DE COLALAO	90	Tucumán	90112
        Localidad simple	-26.2307317035992	-65.285166490246	Trancas	INDEC	90112030000	90112030	Villa de Trancas	900126	Municipalidad de Trancas	VILLA DE TRANCAS	90	Tucumán	90112
        Componente de localidad compuesta con entidad	-26.7964431224326	-65.2657159116952	Yerba Buena	INDEC	90119010000	90119010	Barrio San José III	908560	Municipalidad de Yerba Buena	BARRIO SAN JOSE III	90	Tucumán	90119
        Entidad	-26.7954020539638	-65.2653910211364	Yerba Buena	INDEC	90119010001	90119010	Barrio San José III	908560	Municipalidad de Yerba Buena	BARRIO SAN JOSE III	90	Tucumán	90119
        Entidad	-26.7629680018015	-65.3079476709365	Yerba Buena	INDEC	90119010002	90119010	Barrio San José III	908644	Cevil Redondo	COUNTRY JOCKEY CLUB	90	Tucumán	90119
        Localidad simple	-26.7677751896138	-65.2708444093707	Yerba Buena	INDEC	90119020000	90119020	Villa Carmela	908644	Cevil Redondo	VILLA CARMELA	90	Tucumán	90119
        Entidad	-26.7992050305522	-65.2646764135868	Yerba Buena	INDEC	90119030001	90119030	Yerba Buena - Marcos Paz	908560	Municipalidad de Yerba Buena	EX INGENIO SAN JOSE	90	Tucumán	90119
        Entidad	-26.8088452576169	-65.3106988268486	Yerba Buena	INDEC	90119030002	90119030	Yerba Buena - Marcos Paz	908560	Municipalidad de Yerba Buena	YERBA BUENA - MARCOS PAZ	90	Tucumán	90119
        Entidad	-34.6250478642294	-58.384387226424	Comuna 1	INDEC	2007010001	02000010	Ciudad Autónoma de Buenos Aires			CONSTITUCION	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.6126880821742	-58.379652044818	Comuna 1	INDEC	2007010002	02000010	Ciudad Autónoma de Buenos Aires			MONSERRAT	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.6092161933037	-58.3563809151849	Comuna 1	INDEC	2007010003	02000010	Ciudad Autónoma de Buenos Aires			PUERTO MADERO	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.5884243429366	-58.3759359131827	Comuna 1	INDEC	2007010004	02000010	Ciudad Autónoma de Buenos Aires			RETIRO	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.6036683192305	-58.3805143256131	Comuna 1	INDEC	2007010005	02000010	Ciudad Autónoma de Buenos Aires			SAN NICOLAS	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.6215200115838	-58.3715453876304	Comuna 1	INDEC	2007010006	02000010	Ciudad Autónoma de Buenos Aires			SAN TELMO	2	Ciudad Autónoma de Buenos Aires	2007
        Entidad	-34.5858760078165	-58.3949961802632	Comuna 2	INDEC	2014010001	02000010	Ciudad Autónoma de Buenos Aires			RECOLETA	2	Ciudad Autónoma de Buenos Aires	2014
        Entidad	-34.6090997738407	-58.4030625195747	Comuna 3	INDEC	2021010001	02000010	Ciudad Autónoma de Buenos Aires			BALVANERA	2	Ciudad Autónoma de Buenos Aires	2021
        Entidad	-34.623864473461	-58.4018857979853	Comuna 3	INDEC	2021010002	02000010	Ciudad Autónoma de Buenos Aires			SAN CRISTOBAL	2	Ciudad Autónoma de Buenos Aires	2021
        Entidad	-34.6464135507847	-58.3842710319828	Comuna 4	INDEC	2028010001	02000010	Ciudad Autónoma de Buenos Aires			BARRACAS	2	Ciudad Autónoma de Buenos Aires	2028
        Entidad	-34.6310700719721	-58.3568304109892	Comuna 4	INDEC	2028010002	02000010	Ciudad Autónoma de Buenos Aires			BOCA	2	Ciudad Autónoma de Buenos Aires	2028
        Entidad	-34.6505501963997	-58.4188550090093	Comuna 4	INDEC	2028010003	02000010	Ciudad Autónoma de Buenos Aires			NUEVA POMPEYA	2	Ciudad Autónoma de Buenos Aires	2028
        Entidad	-34.6375496406835	-58.4016756206755	Comuna 4	INDEC	2028010004	02000010	Ciudad Autónoma de Buenos Aires			PARQUE PATRICIOS	2	Ciudad Autónoma de Buenos Aires	2028
        Entidad	-34.6092276891202	-58.4217452253939	Comuna 5	INDEC	2035010001	02000010	Ciudad Autónoma de Buenos Aires			ALMAGRO	2	Ciudad Autónoma de Buenos Aires	2035
        Entidad	-34.6299600080664	-58.4188403738383	Comuna 5	INDEC	2035010002	02000010	Ciudad Autónoma de Buenos Aires			BOEDO	2	Ciudad Autónoma de Buenos Aires	2035
        Entidad	-34.6168254996915	-58.443603110353	Comuna 6	INDEC	2042010001	02000010	Ciudad Autónoma de Buenos Aires			CABALLITO	2	Ciudad Autónoma de Buenos Aires	2042
        Entidad	-34.6368070795903	-58.4582698515258	Comuna 7	INDEC	2049010001	02000010	Ciudad Autónoma de Buenos Aires			FLORES	2	Ciudad Autónoma de Buenos Aires	2049
        Entidad	-34.6359392274734	-58.4376956019926	Comuna 7	INDEC	2049010002	02000010	Ciudad Autónoma de Buenos Aires			PARQUE CHACABUCO	2	Ciudad Autónoma de Buenos Aires	2049
        Entidad	-34.6749935792889	-58.4761629844706	Comuna 8	INDEC	2056010001	02000010	Ciudad Autónoma de Buenos Aires			VILLA LUGANO	2	Ciudad Autónoma de Buenos Aires	2056
        Entidad	-34.6918955269685	-58.4632519393435	Comuna 8	INDEC	2056010002	02000010	Ciudad Autónoma de Buenos Aires			VILLA RIACHUELO	2	Ciudad Autónoma de Buenos Aires	2056
        Entidad	-34.6654688444976	-58.4465225253229	Comuna 8	INDEC	2056010003	02000010	Ciudad Autónoma de Buenos Aires			VILLA SOLDATI	2	Ciudad Autónoma de Buenos Aires	2056
        Entidad	-34.6437960835294	-58.5191298958228	Comuna 9	INDEC	2063010001	02000010	Ciudad Autónoma de Buenos Aires			LINIERS	2	Ciudad Autónoma de Buenos Aires	2063
        Entidad	-34.6583682885816	-58.5017319521437	Comuna 9	INDEC	2063010002	02000010	Ciudad Autónoma de Buenos Aires			MATADEROS	2	Ciudad Autónoma de Buenos Aires	2063
        Entidad	-34.64864128675	-58.47645640345	Comuna 9	INDEC	2063010003	02000010	Ciudad Autónoma de Buenos Aires			PARQUE AVELLANEDA	2	Ciudad Autónoma de Buenos Aires	2063
        Entidad	-34.6276862905939	-58.4835872783595	Comuna 10	INDEC	2070010001	02000010	Ciudad Autónoma de Buenos Aires			FLORESTA	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6192974826904	-58.5065803391285	Comuna 10	INDEC	2070010002	02000010	Ciudad Autónoma de Buenos Aires			MONTE CASTRO	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6313610222	-58.493276996941	Comuna 10	INDEC	2070010003	02000010	Ciudad Autónoma de Buenos Aires			VELEZ SARSFIELD	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6301234618064	-58.5224017483433	Comuna 10	INDEC	2070010004	02000010	Ciudad Autónoma de Buenos Aires			VERSALLES	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6364127783977	-58.5027288050931	Comuna 10	INDEC	2070010005	02000010	Ciudad Autónoma de Buenos Aires			VILLA LURO	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6194831337073	-58.5259860729102	Comuna 10	INDEC	2070010006	02000010	Ciudad Autónoma de Buenos Aires			VILLA REAL	2	Ciudad Autónoma de Buenos Aires	2070
        Entidad	-34.6042463004493	-58.4906764324396	Comuna 11	INDEC	2077010001	02000010	Ciudad Autónoma de Buenos Aires			VILLA DEL PARQUE	2	Ciudad Autónoma de Buenos Aires	2077
        Entidad	-34.6023803136553	-58.5142437101484	Comuna 11	INDEC	2077010002	02000010	Ciudad Autónoma de Buenos Aires			VILLA DEVOTO	2	Ciudad Autónoma de Buenos Aires	2077
        Entidad	-34.6100289507588	-58.4689425541216	Comuna 11	INDEC	2077010003	02000010	Ciudad Autónoma de Buenos Aires			VILLA GENERAL MITRE	2	Ciudad Autónoma de Buenos Aires	2077
        Entidad	-34.6161936201559	-58.4829573518477	Comuna 11	INDEC	2077010004	02000010	Ciudad Autónoma de Buenos Aires			VILLA SANTA RITA	2	Ciudad Autónoma de Buenos Aires	2077
        Entidad	-34.5606251344745	-58.4749447458843	Comuna 12	INDEC	2084010001	02000010	Ciudad Autónoma de Buenos Aires			COGHLAN	2	Ciudad Autónoma de Buenos Aires	2084
        Entidad	-34.553063289604	-58.4887266668384	Comuna 12	INDEC	2084010002	02000010	Ciudad Autónoma de Buenos Aires			SAAVEDRA	2	Ciudad Autónoma de Buenos Aires	2084
        Entidad	-34.5821104495703	-58.5034848793052	Comuna 12	INDEC	2084010003	02000010	Ciudad Autónoma de Buenos Aires			VILLA PUEYRREDON	2	Ciudad Autónoma de Buenos Aires	2084
        Entidad	-34.5715411303449	-58.4878560596649	Comuna 12	INDEC	2084010004	02000010	Ciudad Autónoma de Buenos Aires			VILLA URQUIZA	2	Ciudad Autónoma de Buenos Aires	2084
        Entidad	-34.5548815240237	-58.4502890947349	Comuna 13	INDEC	2091010001	02000010	Ciudad Autónoma de Buenos Aires			BELGRANO	2	Ciudad Autónoma de Buenos Aires	2091
        Entidad	-34.5746427442082	-58.4509682045183	Comuna 13	INDEC	2091010002	02000010	Ciudad Autónoma de Buenos Aires			COLEGIALES	2	Ciudad Autónoma de Buenos Aires	2091
        Entidad	-34.5437376606688	-58.4628575470422	Comuna 13	INDEC	2091010003	02000010	Ciudad Autónoma de Buenos Aires			NUÑEZ	2	Ciudad Autónoma de Buenos Aires	2091
        Entidad	-34.5738999836423	-58.4224364523189	Comuna 14	INDEC	2098010001	02000010	Ciudad Autónoma de Buenos Aires			PALERMO	2	Ciudad Autónoma de Buenos Aires	2098
        Entidad	-34.5929442472726	-58.4886714155361	Comuna 15	INDEC	2105010001	02000010	Ciudad Autónoma de Buenos Aires			AGRONOMIA	2	Ciudad Autónoma de Buenos Aires	2105
        Entidad	-34.5883730730472	-58.4541748568778	Comuna 15	INDEC	2105010002	02000010	Ciudad Autónoma de Buenos Aires			CHACARITA	2	Ciudad Autónoma de Buenos Aires	2105
        Entidad	-34.5855218978064	-58.4791226108546	Comuna 15	INDEC	2105010003	02000010	Ciudad Autónoma de Buenos Aires			PARQUE CHAS	2	Ciudad Autónoma de Buenos Aires	2105
        Entidad	-34.5974220425569	-58.4686652940674	Comuna 15	INDEC	2105010004	02000010	Ciudad Autónoma de Buenos Aires			PATERNAL	2	Ciudad Autónoma de Buenos Aires	2105
        Entidad	-34.5988344062647	-58.4427221412974	Comuna 15	INDEC	2105010005	02000010	Ciudad Autónoma de Buenos Aires			VILLA CRESPO	2	Ciudad Autónoma de Buenos Aires	2105
        Entidad	-34.5809741138535	-58.4676516664339	Comuna 15	INDEC	2105010006	02000010	Ciudad Autónoma de Buenos Aires			VILLA ORTUZAR	2	Ciudad Autónoma de Buenos Aires	2105
        Localidad simple	-24.3374800000056	-65.36524	San Antonio	INDEC	38056025001	38056025	Nuestra Señora del Rosario	386084	San Antonio	LA TOMA	38	Jujuy	38056
        Localidad simple	-34.6882159472973	-58.9574297137089	General Rodríguez	INDEC	6364030005	06364030	General Rodríguez	060364	General Rodríguez	BARRIO RUTA 24 KILOMETRO 10	6	Buenos Aires	6364
        Localidad simple	-53.7870473449159	-67.7132350718047	Río Grande	INDEC	94008010000	94008010	Río Grande	940007	Río Grande	RIO GRANDE	94	Tierra del Fuego, Antártida e Islas del Atlántico Sur	94008
        Localidad simple	-54.5113867546733	-67.195804463563	Río Grande	INDEC	94008020000	94008020	Tolhuin	942007	Tolhuin	TOLHUIN	94	Tierra del Fuego, Antártida e Islas del Atlántico Sur	94008
        Localidad simple	-54.6376860828691	-67.766940855265	Ushuaia	INDEC	94015010000	94015010	Laguna Escondida			LAGUNA ESCONDIDA	94	Tierra del Fuego, Antártida e Islas del Atlántico Sur	94015
        Localidad simple	-54.8036404601709	-68.3160624772532	Ushuaia	INDEC	94015020000	94015020	Ushuaia	940014	Ushuaia	USHUAIA	94	Tierra del Fuego, Antártida e Islas del Atlántico Sur	94015
        \.
        '
    );


    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Localidad2');
    }
}

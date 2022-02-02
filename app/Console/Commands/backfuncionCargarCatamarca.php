<?php 
    /* Pasos a realizar:

    1 - declaro array con todos los datos hardcodeados desde el excel q nos mandaron
    2 - creo el usuario de quien va a cargar el formulario
    2 - creo objeto FormAltaProductor y actualizo el paso  1  del objeto
    3 - creo objeto FormAltaProductor y actualizo el paso  2  del objeto
    4 - creo objeto FormAltaProductor y actualizo el paso  3  del objeto
    5 - creo objeto FormAltaProductor y actualizo el paso  4  del objeto
    6 - creo objeto FormAltaProductor y actualizo el paso  5  del objeto
    7 - creo objeto FormAltaProductor y actualizo el paso  6  del objeto
    8 - creo objeto Productor en base a los datos del formulario recien creado
    9 - creo objeto Mina Cantera en base a los datos del formulario recien creado
    10 - creo objeto Dia Iia en base a los datos del formulario recien creado
    11 - creo objeto Pago Canon en base a los datos del formulario recien creado
    12 - creo objeto Mina-Productor en base a los datos del formulario recien creado
     *

    $array = [];
    /*
    Formato del array
    1 --> fecha_alta
    2 --> Concesionario
    3 --> Representante
    4 --> num prod
    5 --> nombre del yacimiento
    6 --> mineral
    7 --> ubicacion de minerales
    8 --> expedientes
    9 --> domicilio real
    10 --> domicilio legal
    11 --> telefono
    12 --> email
    13 --> cuit
    14 --> estado de documentacion
    15 --> mis emails
    *
    $array[1] = ["3/3/1990","YMAD","YMAD",2,"Abel Peirano","994*995*1137*1*1014","Hualfin- Dpto.Belen","Y-79/59","Salta 1127-Capital","Salta 1127- Catamarca","03833-420148","null","30-54668676-7","completa","null"];
    $array[2] = ["3/3/1990","Loma Negra C.I.A.S.A.","Dr. Roque Sala Martinez",4,"Doña Amalia","1053","Guallamba-Dpto. El Alto","023/77","Bouchar 680- Cap.Federal","Calle Rojas 335-Catamarca","null","null","30-50053085-1","null","loma.negra@gmail.com"];
    $array[3] = ["3/3/1990","El Cerrito S.R.L.","Angel Raul Garriga",5,"El Morro","1053","Esquiu- Dpto. La Paz","D-05/06","Alfonso Carrizo 93-Catamarca","Av. Virgen del Valle 327 - Catamarca","03833-427946","elcerritosrl@gmail.com","30-50456952-3","completa","null"];
    $array[4] = ["21/9/1990","Lucita Fernandez","Lucita Fernandez",10," Don Arturo","1024*1022","La Majada- Dpto.Ancasti","F- 125/02","Rivadavia","Rivadavia","null","null","null","null","null"];
    $array[5] = ["28/12/1990","YES - CAT - Cuberes Balancini","Reyes Balancini",12,"Los Bufalos","1056","La Dorada-Dpto. La Paz","11/91","Catamarca 2384-B° Yapeyu- Cba.","Catamarca 2384-B° Yapeyu- Cba.","null","null","null","null","yes.cat.cuberes@gmail.com"];
    $array[6] = ["24/2/1993","Santa Rita S.R.L.","Miguel Yampa/ Dr. Gonzalez Vera",33,"Santa Rita","1179","Capillitas- Dpto. Andalgala","14/92","Mercado Oeste S/N°- Dpto. Andalgala","null","null","null","null","null","santa.rita.srl@gmail.com"];
    //$array[7] = ["20/8/2005","Soria, Julio Ariel","Soria, Julio Ariel",40,"San Benito","1160","Rio Miraflores - Dpto. Capayan","02S2015","General Villegas 719. Cordoba","null","15593321 - 15407789","null","null","null","julio.soria@gmail.com"];
    $array[7] = ["20/8/2005","Soria, Julio Ariel","Soria, Julio Ariel",40,"San Benito","1160","Rio Miraflores - Dpto. Capayan","02S2015","General Villegas 719. Cordoba","null","15593321","null","null","null","julio.soria@gmail.com"];
    $array[8] = ["22/12/1993","Minera Alumbrera Ltd. ","Walter Miñaura",43,"Bajo de la Alumbrera","994*995*1*1014","Hualfin- Dpto.Belen","154/91","Av.Belgrano 485, Piso 1°, Oficina 3, Ciudad Autonoma de Buenos Aires","Prado N° 290-1° Piso- Dpto. Capital","03833-421810","null","30-66330174-4","null","minera.alumbrera@gmail.com"];
    //$array[9] = ["null","Minera del Altiplano- FMC","Carlos Daniel Chavez Diaz",45,"Proyecto Fenix","1050","S.H.Muerto-Dpto. Antof. De la Sierra","varios","Ejercito Del Norte 20 - Prov. Salta","Esquiu 591, 2° Piso -   Catamarca","03834433222/03874322100","null","30-64279606-9","null","minera.atiplano@gmail.com"];
    $array[9] = ["null","Minera del Altiplano- FMC","Carlos Daniel Chavez Diaz",45,"Proyecto Fenix","1050","S.H.Muerto-Dpto. Antof. De la Sierra","varios","Ejercito Del Norte 20 - Prov. Salta","Esquiu 591, 2° Piso -   Catamarca","03834433222","null","30-64279606-9","null","minera.atiplano@gmail.com"];
    $array[10] = ["13/3/2002","Zanier, Ruben","Atilo Fabian",62,"San Antonio","1056","San Antonio- Dpto. La Paz","Z-025/04","Av. Italia 1500- Malagueño-Cba.","Dr. Manuel Navarro 490-La Chacarita","15684780","null","30-55733056-5","null","ruben.zanier@gmail.com"];
    $array[11] = ["null","Renaud, Daniel J./Cristian Rozic Echeverria","Silva, Nancy Adriana Elizabeth",64,"Los Patos- La Redonda I-Barrial.Aurelio-Don Carlos","1180","S.H.Muerto-Dpto. Antof. De la Sierra","R-210/94-R-55/00-R-77/99-R-54/00-R-56/00","Gral Guemes 110-Campo Quijano-Salta","B° 144 VVNorte. C/91- Catamarca","03833-15623929","null","20-07638835-1","null","null"];
    $array[12] = ["1/3/2004","Arqueros, Luis Gaston","Ing. Rolando de La Fuente",69," Maktub XXIII- ","1180*1028","S.H.Muerto-Dpto. Antof. De la Sierra","M-27/00-51 y 52/00- 248/03","Ruta Nac. 51-Km 22,5 Campo Quijano","Rivas Lara 177 B° san Fdo. Catamarca","null","null","null","null","luis.arqueros@gmail.com"];
    $array[13] = ["17/8/2005","Minerales de Recreo","Enrique Perea",86,"Las Gemelas- Yacimientos del Recreo","1056","Recreo- Dpto. La Paz","T-20/99- M-40/06","Avda. Roca 281. Esqu. Tablada. Piso: PA Dpto. 15 Villa Allende 5105 - Prov. Cordoba","Calle Federico Espeche Nº 1448","03832 - 15688104","null","30-68755805-8","null","minerales.de.recreo@gmail.com"];
    $array[14] = ["10/5/2006","Minera Agua Rica LLC","Dra. Maria Gabriela Uriburu Casillo",92,"Minera Agua Rica","994*1","Cerro Atajo-Dpto. Andalga","M-107/93","Chacabuco-Esquina Tucumán-Catamarca","Prado N° 290-2° Piso- Dpto. Capital","3834-751680/3835434762","maria.uriburu@yamana.com","null","null","null"];
    $array[15] = ["19/4/2007","Detoyo SA","Cristian Ricardo Balancini",102,"Molienda para empresa La Pipa SRL","1056","Dto. Recreo-Dpto. La Paz","null","Lituania 2532- Alto Gral Paz-Cordoba","Lituania 2532- Alto Gral Paz-Cordoba","0351-4533563","null","null","null","detoyi.sa@gmail.com"];
    $array[16] = ["19/4/2007","La Pipa S.R.L.","Eduardo Balancini",103,"Norma Ester","1056","Recreo- Dpto. La Paz","01/03","Achupalla 248-B° Yapeyu-Cordoba C.P. X 5004 DCF","Peru 684-Catamarca","0351-4513176/4513176","null","null","null","lapipa@gmail.com"];
    $array[17] = ["18/4/2008","Minera Petrea S.R.L.","Fernando D'Agostini",112,"Florencia- María Luz","1024*1022*1023","1° Capital- 2° El Alto","M- 422/07 y M-442/07","Camilo Melet 233","Idem","458995- 15407024","null","30-70804894-8","null","minera.petrea.srl@gmail.com"];
    $array[18] = ["4/6/2008","Herrera Ricardo Adolfo","Herrera Ricardo Adolfo",117,"LOS ZARATE","1074","Mesada de Zarate Dto Fiambala Dpto Tinogasta","H-39/07","Avda. Venesuela 1531","Calle Salta 636 Planta baja Catamarca","null","null","null","null","herrera.ricardo.adolfo@gmail.com"];
    $array[19] = ["24/9/2008","Quiroga, Ricardo Reyes","Quiroga, Ricardo Reyes",127,"LA VERTIENTE","1071","Dto. Los Mogotes-Dpto. Ancasti","Q-011/2008","La Dorada- dpto. La Paz","null","null","null","null","null","quiroga.ricardo.reyes@gmail.com"];
    $array[20] = ["4/11/2009","Horacio Catalan SRL","null",131,"Las Tunas I","1160","Rio Las Cañas-Las Cañas-Dpto El Alto","C-26/2006","Ruta Prov. Nº5, Km 3½-Parque Industrial-85300-La Rioja","Junin Nº 595-San Fernando del V de Catamarca","3804662347","null","null","null","horacio.catalan.srl@gmail.com"];
    $array[21] = ["28/12/2009","FUERZA SRL","Boggio, Carlos Valentin",132,"Virginia","1056","La Calera- Dpto. El Alto","null","25 de Mayo Nº 885","25 de Mayo Nº 885","null","null","null","null","fuerza.srl@gmail.com"];
    $array[22] = ["17/2/2010","Elsa del Valle Araya","-",133,"Santos Roque","1071","Dto. Jumulao - Andalgala - Catamarca","A-015/1999","Belgrano 1607 - Dto. Malli - Dpto. Andalgala","Ayacucho 1333","03835-422861 / 15432943","null","null","null","elsa.araya@gmail.com"];
    $array[23] = ["5/5/2010","DECAVIAL S.A.I.C.A.C.","Argañaraz Arturo",134,"Yacimiento Albigasta","1160","Rio Albigasta- Loc. De Vallecito - Dpto. El Alto - ctmca","D - 049/2009","Pellegrini 127, Frias - Santiago Del Estero","Pasaje Abel Acosta 776 - S.F.V. Catamarca","(011) 43830015/ (011) 1569409913","null","30-50487767-8","null","null"];
    $array[24] = ["1/5/2011","MAKTUB CIA. MINERA","Arqueros Gaston Luis",140,"GRUPO MINERO MEME","1028","Salar del Hombre Muerto . Antof. De La Sierra","Varios","Ruta Nac. Nº 51 Km 2,5 Campo Quijano Salta. ","Rivadavia 271 Salta","03833 - 15526245","null","30-70869687-7","null","null"];
    $array[25] = ["18/1/2012","Mariano, Benedito Arce","Jose Daniel Arce",144,"La Esperanza","1071","Loc. La Dorada - Dpto. La Paz","008/A/2011","Loc. La Dorada - Dpto. La Paz","Loc. La Dorada - Dpto. La Paz","03833 - 15575867","null","20-06487466-8","null","null"];
    $array[26] = ["6/2/2012","SMGA S.R.L.","Elisa Achá",145,"5 de enero y 13 nietos","1160","Rio del valle - Rio Ongoli - capital","1143S2013 - 1203S2013","Ayacucho 198","Ayacucho 198","0383 - 4423326/4435969","null","null","null","null"];
    $array[27] = ["19/4/2012","Salado Greco Antonio Ignacio","Peralta Elsa del Valle",146,"ISACONS ","1060","Río del Valle-Dpto. Capital","831 - S/2012","Camino a ojo de agua Nº860","Camino a ojo de agua Nº860","3834 - 257635","matiasvrivero@hotmail.com","null","COMPLETA","null"];
    $array[28] = ["20/7/2012","BARRIONUEVO JULIO RAFAEL","ALICIA ANALIA ALBORNOZ",147,"SAN ISIDRO","1160","RIO SANTA CRUZ -  DPTO. VALLE VIEJO","436 -B/2012","AV. ENRIQUE OCAMPO S/N - VALLE VIEJO","AV. ENRIQUE OCAMPO S/N - VALLE VIEJO","154685340/154343195","null","null","COMPLETA","null"];
    $array[29] = ["9/11/2012","Municipalidad de Huillapima","Adolfo Omar Soria - Carlos Brizuela",149,"Villijan, San Pablo, Real, Pampichuela, San Francisco, San Sebastian","1160","Huillapima, San Pablo y Concepcion - Dpto. Capayan","03M2005/01M2005/18M2004/02M2005/20M2004/04M2005","Municipalidad de huillapima -  Dpto. Capayan","Municipalidad de huillapima -  Dpto. Capayan","0383 - 154545703","jcbrizuela01@gmail.com","null","null","null"];
    $array[30] = ["14/12/2012","ECOVIAL SRL","Rodriguez, Luis Carlos",150,"ECOVIAL SRL","1160","Rio La Cañada - Dpto Andalgala","1276/E/2012","Mercado Oeste N° 159 - Dpto. Andalgala","Av. Alem N° 768 - SFV de Catamarca ","null","null","30-70849074-8","null","null"];
    $array[31] = ["26/12/2012","Diaz Ramona Luisa","Espeche Ruth",151,"Leocadia","1056","San Antonio  - Dpto. La Paz","1143/D/2012","J Colombres S/N - San Antonio - Dpto. La Paz","Bs As N° 262 - SFV de Catamarca","0383-4349860","null","null","fue dada de baja, no bajo la disposicion ","null"];
    $array[32] = ["18/2/2013","Leschinsky Daniel","Leschinsky Daniel",152,"La Tanita","1060","Rio del Valle","045/D/2011, 054/D/2011, 053/D/2011","Samuel Molina N° 746 - SFV de Catamarca","Samuel Molina N° 746 - SFV de Catamarca","null","null","null","null","null"];
    $array[33] = ["18/2/2013","Verdu Vicente Ricardo","Verdu Vicente Ricardo",153,"Ralú","1060","Rio Bazan - Loc La Dorada - Dpto La Paz","008/V/2006","Gdor Cubas N° 560 - Recreo - Dpto. La Paz","Pje. s/nombre N° 2078 entre Junin y Ayacucho","null","null","20-06593569-5","null","null"];
    $array[34] = ["25/2/2013","Acosta Pedro Eduardo","Acosta Pedro Eduardo",154,"El Amanecer","1071","Los Mogotes - Dpto. Ancasti","1238A/2012","La Dorada- Dpto. La Paz","La Dorada- Dpto. La Paz","null","null","null","null","null"];
    $array[35] = ["3/7/2013","MINERA ORIGEN S.A.","Perez, José Sebastián",155,"UVITA III","1123","Localidad de Fiambala - Dpto. Tinogasta","500/2004","Sarmiento 842 2° Piso - Catamarca","Sarmiento 842 2° Piso - Catamarca","4454650/4432226/154681164","null","30-71255689-3","COMPLETA","null"];
    $array[36] = ["26/7/2013","CAMYEN S.E.","De la Barrera David  - Patocchi Valeria",156,"Minas Capillitas","1179","Dto. Minas Capillitas - Dpto. Andalgala","1011F1962","Vicario segura 784","Vicario segura 784","0383 - 154334799/ 4420609","null","30-71245156-0","falta sentencia Inter.","null"];
    $array[37] = ["10/2/2014","ROMERO RAMON DARIO","ROMERO RAMON DARIO",158,"MADRESITA DEL ROSARIO","1071","Dto. Los Mogotes-Dpto. Ancasti","988R2013","Loc. La Dorada - Dpto. La Paz","Barrio La Esperanza S/N","0383 - 154295619","null","20-27076449-6","COMPLETA","null"];
    $array[38] = ["13/2/2014","Alaniz, Jose Oscar","Alaniz, Jose Oscar",159,"El Pueblito","1160","Tinogasta y San Jose -  Santa Maria","709A2012 - 1274V2012","Ruta Provincial N° 33 - km 5,5 ","Av. Dr.Antonio Del Pino Esq. Ponessa S/N - Dpto 1°","0387 - 156054959","null","null","COMPLETA","null"];
    $array[39] = ["26/3/2014","BRUNELLO DIEGO GUILLERMO","SILVA URSULA YANELA",160,"BRUNELLO","1160","Rio del Valle - Capital","1564B2012","Los Fundadores N° 21 - La Cruz Negra - Capital","Los Fundadores N° 21 - La Cruz Negra - Capital","3834 - 921023","null","20-30768647-4","COMPLETA","null"];
    $array[40] = ["2/6/2014","ZAR STELLA DEL VALLE","SECO ZAR DIANA MARIA",161,"MADIAN","1160","Rio del Valle - Capital","1581Z2013","Padre Celestino Zanella N° 341 - La Chacarita - Capital","Padre Celestino Zanella N° 341 - La Chacarita - Capital","0383 - 154333366","secozardm@hotmail.com","27-12796608-2","COMPLETA","null"];
    $array[41] = ["08/08//2014","FIKINGER MARTIN RICARDO","DEL PINO GASTON DIEGO",163,"LA GENEROSA","1160","Rio San Pablo - Dpto. Capayan","1304F2013","Barrio 29 vv – Casa N° 13, Huillapima, Dpto. Capayan","La Pampa 1568, S.F.V Catamarca  - Capital","0383 - 154254557","gdelpinopalermo@hotmail.com","20-33438142-1","COMPLETA","null"];
    $array[42] = ["11/11/2014","GASO JOSE ARIEL","GASO JOSE ARIEL",165,"SAN NICOLAS","1160","Rio del Valle  -  Dpto. Capital","0013G2014","Dr. Julio Herrera N° 646 - Catamarca","Dr. Julio Herrera N° 646 - Catamarca"," ","null","20-29786912-5","COMPLETA","null"];
    $array[43] = ["17/12/2014","COMPAÑÍA MINERA ESPERANZA S.A.","Andreotti Rosales Pablo Martin",166,"CACHARI PAMPA III y IV","1097","Dpto. Antofagasta de la Sierra","C-185/2012","Hipolito Irigoyen Sur N° 48 -  San Juan","Maipu N° 294 - Catamarca capital","0383 - 4426957","estudiorosales294@arnet.com.ar","null","COMPLETA","null"];
    $array[44] = ["11/2/2015","GUIDO MOGUETTA EMPRESA CONSTRUCTORA","MOGUETTA GUIDO DAVID",167,"del sur, B, Yerba Buena, El Bolson, Punta del Agua, La segunda Aconquija,","1160","Dpto. Capital- Dpto. Capayan","G-055/2014, M-28-2019,  S-27-2020, S-26-2020, 2021-00119679, 2021-00285279","Calle José Hernandez s/n° - Sumalao, Dpto. Valle Viejo","Calle José Hernandez s/n° - Sumalao, Dpto. Valle Viejo","0383- 4441003","mooguettaconstructora@arhetbiz.com.ar","20-08042389-7","COMPLETA","null"];
    $array[45] = ["18/6/2015","FUENZALIDA JOSE ALFREDO","FUENZALIDA YANINA JORGELINA",168,"JOSECITO","1160","Dpto. Andalgala","F-27-2015","Barrio Juan Domingo Peron. Casa 16. Dpto Andalgala","Barrio Juan Domingo Peron. Casa 16. Dpto Andalgala","0383 -154901424","null","20-16127679-1","COMPLETA","null"];
    $array[46] = ["22/12/2015","MENDEZ, MATIAS RAMON","MENDEZ, MATIAS RAMON",170,"LA PRODUCTIVA","1071","DPTO. ANCASTI","M-1432-2013","OBISPO ESQUIU N° 942","OBISPO ESQUIU N° 942","0383-154241634","null","null","solicitud de baja de la cantera en tramite","null"];
    $array[47] = ["22/12/2015","CESPEDES MIRONES, LIDIA MIRTA","CESPEDES MIRONES, ANGELES ALEJANDRO",171,"LOS MORTEROS - CHAÑAR LAGUNA ","1160","RIO LOS MORTEROS -DPTO. EL ALTO","C-68-2014","DEAN FUNES N° 889, B° ELBERDI, PROV. DE CORDOBA","PASAJE ANESSI N° 628","-","null","null","FALTA CEDULA FIZCAL ","null"];
    $array[48] = ["30/12/2015","MINERA LAS ROCAS SRL (de Gambio Cesar O.)","Atilio Fabian",173,"LA ROSSANA (A/C de la explotacion)","1056","Dto. La Aguadita- Dpto. La Paz","G-18/2010","Calle Leon XIII N° 528 - Tancacha - Prov. De Cordoba"];
    $array[49] = ["7/7/2016","ACUÑA PEDRO","ACUÑA PEDRO ",174,"LA AGUADA ","1160","Dto. Huaycama - Dpto. Valle Viejo","A-09/2008","Av. Belgrano 442 - S.F.V. de Catamarca","Maipu N°305 - SFV de Catamarca","0383 -4424100","null","20-14957529-5","null","null"];
    $array[50] = ["4/10/2016","DE MARIA ROMAN MAXIMILIANO","null",175,"DON RAUL","1160","Rio Bazan- Loc. El Bañado - Dpto. La Paz","D-38-2014","CALLE PEDRO CANO Nº 960 - LOC. RECREO- DPTO. LA PAZ","PASEJE ESPECHE Nº 960 - Bº M AVELLANEDA - DPTO CAPITAL","0382-427455 - 0382-15412567","null","20-29664279-8","null","null"];
    $array[51] = ["26/10/2016-20-11-2018","HORMICAT S.A","WALTER AUGUSTO DAGOSTINI",176,"LA CURVA-HORMICAT S.A","1160","La Curva:Rio Ongoli.- Distrito 21 (cuartel I) Dpto Capital. HORMICAT S.A: Distrito 21 Cuartel I","La Curva: H-007-1994- HORMICAT S.A. H-68-2017","Ruta Nacional 38. Km 574,5","Ruta Nacional 38. Km 574,5","0383- 4431010 - 4432032 ","null","30-62051134-6","null","null"];
    $array[52] = ["13/12/2016","VILLAFAÑE LILIANA MABEL","VILLAFAÑE LILIANA MABEL",177,"LA CAÑADA","1160","Rio La Cañada - Dpto Andalgala","V - 14 - 2015","RIVADAVIA Y LAFONE QUEVEDO - ANDALGALA","B° CHOYA NORTE 160 VV, C/93, CAPITAL","03835 - 436464","null","27-25541478-5","COMPLETA","null"];
    $array[53] = ["27/3/2017","MORENA DEL VALLE MINERALS S.A.","JUAN AGUSTIN DOTTORI",178,"Pampa I, II, III, Daniel Armando, Daniel Armando II, Debbie I, Doña Carmen, Doña Amparo I y Divina Victoria","1050 ","Salar de Carachi Pampa - Antof. De La Sierra","129/2013, 128/2013, 130/2013, 23/2016, 97/2016, 21/2016, 24/2016, 22/2016 y 25/2016","AV. ENRIQUE OCAMPO N° 2418 - SFV CATAMARCA","AV. ENRIQUE OCAMPO N° 2418 - SFV CATAMARCA","0387 - 154120802","jadottori@gmail.com","30-71538304-3","COMPLETA","null"];
    $array[54] = ["12/4/2017","DECAVIAL S.A.I.C.A.C. - ESUCO S.A. - UTE","BUSSO , JOSE MARIA - CARLA XIMENA DE LA ROSA",179,"ENSENADA SUR, ROJANO I, ROJANO II,  ROJANO III, EL PUESTO, AGUA SALADA ","1160","Rio La Cañada - Dpto Andalgala","D -150/2016 - D - 001/2017","ALSINA ADOLFO 1450 - Piso 2, Ciudad Autonoma Bs. As.","Barrio Calchaqui - Casa n° 7 - Capital","03835 - 15690738","car-xdlr@hotmail.com","30-71537888-0","COMPLETA","null"];
    $array[55] = ["17/5/2017","PARRA RODOLFO","null",180,"EL PUESTO","1160","Río Seco - Dpto. Santa María","028-P-2015","Calle Esquiu Nº 25 - Dpto. Santa María","Calle Crisanto Gomez Nº 316 - Capital","03838 - 15601796","null","20-06956154-4","COMPLETA","null"];
    $array[56] = ["13/6/2017","AGÜERO MARIA MARGARITA","MACAGNO E. MARIO",181,"LOS DIVISADEROS","1160","DPTO. CAPAYAN","138A2016","GOB. GUILLERMO CORREA Nº 443 - CAPITAL","CHACABUCO Nº 451 - CAPITAL","351-5740621","mmacagno@moniemocammisa.com.ar","30-70878353-2","COMPLETA","null"];
    $array[57] = ["14/6/2017","BRUNELLO ANNABE MERCEDES","RICARDO PREVEDELLO",182,"EL TANO","1160","Dpto. Capital","B-001-2006","Padre Esquiu 35.","Padre Esquiu 35.","Fijo: 4446089","ricardoprevellosrl@hotmail.com.ar","30-70865284-5","COMPLETA","null"];
    $array[58] = ["4/9/2017","LUNA ANGEL CESAR","null",183,"LA BIENVENIDA","1071","Loc. Los Mogotes - Dpto. Ancasti","L-102-2016","calle s/n - Los Mogotes","null","Cel: 3832461979","null","20-12642865-1","COMPLETA","null"];
    $array[59] = ["19/9/2017","FORNACIARI JOSE LUIS","null",184,"LA JUSTINA, LA POTOLA, LA FORTUNA y LA FORTUNA I","1101","Carachi Pampa - Dpto. Ant. De la Sierra","F-100-2008","Republica N° 306 - S.F.V. de Catamarca","Junin Nº 169- piso 1 - Dpto. 7 - San Miguel de Tucuman","null","null","20-10017156-3","null","null"];
    $array[60] = ["10/10/2017","ITALCA CONSTRUCTORA S.R.L.","LUIS A. CATTARUZZA",185,"ITALCA","1160","RIO ONGOLI, DPTO. CAPITAL","I-149-2016","AV. RAMON RECALDE 2658","AV. RAMON RECALDE 2658","0383-154521976","LUISCATTARUZZA@HOTMAIL.COM","30-70939529-3","null","null"];
    $array[61] = ["10/11/2017","GARNOR SRL","GARCIA MARIA FERNANDA LETICIA",186,"ARIDOS ACONQUIJA","1160","LOC. ACONQUIJA, DPTO. ANDALGALA","G-082-2016","RIVADAVIA 765","RIVADAVIA 765","0383-154225569","fernandagarcialm@gmail.com","33-71514782-9","null","null"];
    $array[62] = ["6/3/2018","HERNAN DAGOSTINI ","GOMEZ VILMA VILIA",187,"FD- HD VIAL","1160","RIO DEL VALLE. DPTO CAPITAL.","104-D-2017- 61D2019","CAMILO MELET 233. SFVC.","CAMILO MELET 233. SFVC","383-154402633","vilmavgomez@hotmail.com","20-26373397-6","null","null"];
    $array[63] = ["28/6/2018","BG. CONS OBRAS Y SERVICIOS","CARLOS JORGE VERA",188,"Gran Huillapima y Gran Huillapima II","1160","DTO. HUILLAPIMA Y RIO DEL VALLE. DPTO. CAPAYAN","100-B-2017; 101-B-2017","CLORINDA O HERRERA Nº 168 - SFVC.","JOAQUIN ACUÑA Nº 759 - Bº CENTRO-DPTO. VALLE VIEJO ","3834432506 - 3834923173","null","30-69513929-9","completa","null"];
    $array[64] = ["23/8/2018","TOLESANO JULIO CESAR ","VILMA GOMEZ",189,"SACRIFICIO","1001","1175 ","62T2017 (expte. judicial)","Mate de Luna 758 - SFVC","Florida 460","3834715830","vilmagomez12@hotmail.com","20-13643147-2","completa","null"];
    $array[65] = ["28/9/2018","Minera Agua Rica LLC","Dra. Maria Gabriela Uriburu Casillo",190,"La Teta- El Cazadero- El Ingenio","1160","SANTA MARIA","02M2006/03M2006/35M2005","Av. Libertad esq. San Martin- Dpto. Andalgalá","Prado N° 290-2° Piso- Dpto. Capital","3834751680-3835434762","maria.uriburu@yamana.com","null","null","null"];
    $array[66] = ["19/10/2018","Minera Alumbrera Ltd. ","CPN Walter Miñaura",191,"Alumbrera I- Las Blancas","1160","LOC. ACONQUIJA, DPTO. ANDALGALA","M-06-2001/ M- 04-2001","Av.Belgrano 485, Piso 1°, Oficina 3, Ciudad Autonoma de Buenos Aires","Prado N° 290-1° Piso- Dpto. Capital","3834421810-3834432840","walter.minaura@glencore.com.ar","30-66330174-4","completa","null"];
    $array[67] = ["16/7/2019","LIEX SA","Cambeses Florencia",192,"Proyecto Tres Quebradas","1050","Loc. Fiambalá- Dpto. Tinogasta","41D2017","Patricias Mendocinas 1077-1° Piso-Dpto. A- Mendoza","San Martin 280. SFVC","3834436515","null","null","completa","null"];
    $array[68] = ["16/8/2019","POSCO Argentina SAU","Dr. Gerardo José Monti",193,"Canteras: A, B, C, D, G,E","1160","Dpto. Antofagasta de la Sierra","11P2019- 12P2019-13P2019-14P2019-16P2019-15P2019","Av. Leandro Alem N° 882- CABA","San  Martin N° 197- Dpto. Capital","3834814093","estudiopvya@arnetbiz.com.ar","30-71613922-7","completa","null"];
    //$array[69] = ["16/8/2019","POSCO Argentina SAU","Dr. Gerardo José Monti",194,"Barreal 2-Luna Blanca V- Pachamama-La Primera-La Segunda-La Tercera-China-Luna Blanca IV-Rocio 1-Luna Blanca III-Beatriz IV-Nelly VI-Luna Blanca-Meme-Quiero Retruco-Truco-El Tordo- Marcos I","1050","Dpto. Antofagasta de la Sierra","160G2002-813G2007-227G2007-289G2007-290G2007-291A2007-354G2007-812G2009-815G2009-117G2010-268G2010-269G2010-1280G2006-1430M2006-1198G2006-1197G2006-1178G2006-186G2018-","Av. Leandro Alem N° 882- CABA","San Martin N° 197- Dpto. Capital","3834814093","estudiopvya@arnetbiz.com.ar","30-71613922-7","completa","null"];
    $array[69] = ["16/8/2019","POSCO Argentina SAU","Dr. Gerardo José Monti",194,"Barreal 2","1050","Dpto. Antofagasta de la Sierra","160G2002","Av. Leandro Alem N° 882- CABA","San Martin N° 197- Dpto. Capital","3834814093","estudiopvya@arnetbiz.com.ar","30-71613922-7","completa","null"];
    $array[70] = ["29/8/2019","Bollecich Dardo Clemente","Miranda Emma Luciana",195,"El Barrrial","1149","Dpto. Tinogasta","B-64-2018","Ministro Dulce 183. SFVC","Ministro Dulce 183. SFVC","3834-665930","emilumiranda@gmail.com","20-11079307-4","completa","null"];
    $array[71] = ["9/9/2019","Galaxy Lithium Sal de Vida SA","Dr. José Ernesto Vila Melo",196,"Cantera M","1160","Dpto. Antofagasta de la Sierra","G-39-2017","San Martín N° 197-SFVC","San Martín N° 197-SFVC","3834205109","estudiopvya@arnetbiz.com.ar","30-71105187-9","completa","null"];
    $array[72] = ["9/9/2019","Galaxy Lithium Sal de Vida SA","Dr. José Ernesto Vila Melo",197,"Luna Blanca- La Redonda V- Agostina- Los Patos- Don Pepe- Don Carlos- Aurelio- Rodolfo- Delia- El Tordo- Luna Blanca VI- Luna Blanca II- Centenario- Cachita Barrial I- Monserrat- Monserrat I","1050","Dpto. Antofagasta de la Sierra","1280G2006-161G2002- 168G2002-210G1994","San Martín N° 197-SFVC","San Martín N° 197-SFVC","3834205109","estudiopvya@arnetbiz.com.ar","30-71105187-10","completa","null"];
    $array[73] = ["25/9/2019","Compañía Minera del NOA SA","Romano, Luis Eduardo",198,"Luis II","1050","Dpto. Belén","22-2015","Austria 2248- 2° Piso- CABA","Rojas 667","11-61375126","null","null","null","null"];
    $array[74] = ["10/12/2019","Minera del Altiplano- FMC","Fernando Ruiz Moreno",199,"Maria","1160","Dpto. Antofagasta de la Sierra","M-63-2017","Real Ejercito del Norte 20","Junin esquina Prado. Planta Alta","0387-154429135","daniel.Riva@livent.com","30-64279606-9","null","null"];
    $array[75] = ["3/3/2020","Di Giorgio Osvaldo - Chahla Roberto","Guadalupe Salas",200,"Corina II","1000*995","1175","197/2019","Jose Marmol 2040 - Bs As","Esquiu 434","3834-046538","Isabelsalas43@yahoo.com.ar","20-13406712-9","completa","null"];
    $array[76] = ["21/5/2020","Catamarca Mining Corp.","Odella Maglione, Nelson Ricardo",201,"Leandro","1000","Antofagasta de la Sierra","47C2019","Rodriguez Peña 2082-CABA","Esquiú 434","3834606217","Lensur@live.com","20-60364943-6","completa","null"];
    $array[77] = ["4/8/2020","Bravo Luis Gerardo","Bravo, Luis Gerardo",202,"Santa Catalina II","1","Ancasti","127B2011","San Martin N° 840-La Cocha- Tucuman","Chacabuco N° 916-SFVC","3834-358820","lugebra@yahoo.com.ar","20-16944998-9","completa","null"];
    $array[78] = ["30/11/2020","Layus Jorge Gustavo","Tanco Pablo",203,"La Morenita","1160","Capayan","142-L-2016","Obrador San Martin - Ctmarca","Ruta Prov. 111 - km 7 1/2 - CBA","null","null","30-70878353-2","completa","null"];
    $array[79] = ["25/6/2021","Ollier Juan Alejandro","null",204,"Francisco","1097","Valle Viejo","15-O-2020","B° la Cruz Negra c/n° 9 - loteo Don  Placido","B° la Cruz Negra c/n° 9 - loteo Don  Placido","null","null","null","completa","null"];
    $array[80] = ["30/8/2021","Villarroel jorge Adrian","Zarate Mariana veronica",205,"San Jorge","1097","Capital","07-V-2014","Ortiz de Ocampo s/n B° san jorge","Ortiz de Ocampo s/n B° san jorge","3834218047","mariana16zarate@gmail.com","20-35500863-1","completa","null"];
    $array[81] = ["15/9/2021","Jais servicios mineros y construcciones civiles","Julio Jorge Jais",206,"Chañaritos","1160","andalgala","EX2021 - 263828 - CAT - DPM#MM","Malli I S/Nº","Bº 10 de Noviembre Casa Nº 21","null","null","null","incompleta","null"];
    //$array[82] = [null, "Mitre N° 562 - Tancacha - Prov. De Cordoba","Manuel Navarro 490 - SF del V de Catamarca","0383-154684780","atiliofabian@gmail.com","30-70999517-7","null","null

    //ARIDOS *---> 1160
    //Rodocrosita --> 1179
    //Ulexita---> 1180
    //Jade --> 1123
    //Tinogasta --> 1175
    //Puzolana--> 1149
    //Arenas --> 1097
    //Magnesio --> 1137
    //	dd(Carbon::parse($array[4][0])->format('Y-m-d H:i:s'));
    $faker = Faker::create();

    for ($i = 1; $i <= 81; $i++) {
        /* CREO LAS VARIABLES PARA USAR*
        $mail = $faker->email();
        if(  
            (isset($array[$i][14])) 
            && 
            (strval($array[$i][14])  != "null")
            )
            $mail = $array[$i][14];
        if(isset($array[$i][11]) && strval($array[$i][11]) != "null" )
            $mail = $array[$i][11];

        $cuit = 0;
        if(isset($array[$i][12]))
            $cuit = str_replace("-","",$array[$i][12]);


        $domicilio = null;
        if(isset($array[$i][9]))
            $domicilio = $array[$i][9];

        $telefono = null;
        if(isset($array[$i][10]))
            $telefono = $array[$i][10];

        $categoria = "segunda";

        $id_user = 0;

        $id_provincia = 10; //Catamarca
        //FIN DE INICIO DE VARIABLES

        //crear el usuario
        $resultado = User::create([
            'name' => $array[$i][2],
            'email' => $mail,
            'password' => bcrypt('password'),
            'current_team_id' => 10, // team_catamarca
            'profile_photo_path' => "profile-photos/catamarca.png",
            'first_name' => $array[$i][2],
            'last_name' =>  $array[$i][2],
            'provincia' => "Catamarca",
            'id_provincia' => $id_provincia,
        ])->assignRole('Productor');
        $id_user = $resultado->id;
        //Termino de crear usuario

        //PASO 1
        $formulario_provisorio = new FormAltaProductor();
        $formulario_provisorio->razonsocial = $array[$i][2];
        $formulario_provisorio->email = $mail;
        $formulario_provisorio->cuit = $cuit;
        $formulario_provisorio->numeroproductor =  $array[$i][3];
        $formulario_provisorio->tiposociedad = 'S.A.';
        $formulario_provisorio->constaciasociedad = null;
        $formulario_provisorio->inscripciondgr = null;
        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->estado = "borrador";
        $formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_by = $id_user;
        $formulario_provisorio->created_by = $id_user;
        $formulario_provisorio->provincia = $id_provincia;
        //$formulario_provisorio->created_at = Carbon::parse($array[$i][0])->format('Y-m-d H:i:s'); 
        $resultado = $formulario_provisorio->save();
        //Paso 2 
        $formulario_provisorio->leal_calle = $domicilio;
        $formulario_provisorio->leal_numero = null;
        $formulario_provisorio->leal_telefono = $telefono;
        $formulario_provisorio->leal_provincia = $id_provincia;
        $formulario_provisorio->leal_departamento = null;
        $formulario_provisorio->leal_localidad =null;
        $formulario_provisorio->leal_cp = null;
        $formulario_provisorio->leal_otro = null;
        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_paso_dos = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_by = $id_user;
        $formulario_provisorio->save();
        //paso 3 
        $formulario_provisorio->administracion_calle = $array[$i][8];
        $formulario_provisorio->administracion_numero = null;
        $formulario_provisorio->administracion_telefono = $telefono;
        $formulario_provisorio->administracion_pais = "Argentina";
        $formulario_provisorio->administracion_provincia = $id_provincia;
        $formulario_provisorio->administracion_departamento = $array[$i][2];
        $formulario_provisorio->administracion_localidad = $array[$i][1];
        $formulario_provisorio->administracion_cp = null;
        $formulario_provisorio->administracion_otro = null;
        $formulario_provisorio->updated_paso_tres = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_by = $id_user;
        $formulario_provisorio->save();
        //PASO 4
        
        $formulario_provisorio->numero_expdiente = $array[$i][7];
        $formulario_provisorio->categoria = $categoria;
        $formulario_provisorio->nombre_mina = $array[$i][4];
        $formulario_provisorio->descripcion_mina = null;
        $formulario_provisorio->distrito_minero =null;
        $formulario_provisorio->mina_cantera = "mina";
        $formulario_provisorio->resolucion_concesion_minera = null;
        $formulario_provisorio->titulo_contrato_posecion = null;
        $formulario_provisorio->plano_inmueble = null;
        $formulario_provisorio->titulo_contrato_posecion = null;
        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->save();
        //Paso 5
        $formulario_provisorio->owner = null;
        $formulario_provisorio->arrendatario = null;
        $formulario_provisorio->concesionario = null;
        $formulario_provisorio->sustancias_de_aprovechamiento_comun = 0;
        $formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion = null;
        $formulario_provisorio->otros = 0;
        $formulario_provisorio->otro_caracter_acalaracion = null;
        $formulario_provisorio->constancia_pago_canon = null;
        $formulario_provisorio->iia = null;
        $formulario_provisorio->dia = null;
        $formulario_provisorio->acciones_a_desarrollar = null;
        $formulario_provisorio->actividad = null;
        $formulario_provisorio->fecha_alta_dia = null;
        $formulario_provisorio->fecha_vencimiento_dia = null;
        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->save();
        //Paso 6
        $formulario_provisorio->localidad_mina_pais = "Argentina";
        $formulario_provisorio->localidad_mina_provincia = $id_provincia;
        $formulario_provisorio->localidad_mina_departamento = null;
        $formulario_provisorio->localidad_mina_localidad = $array[$i][6];
        $formulario_provisorio->tipo_sistema = null;
        $formulario_provisorio->longitud = null;
        $formulario_provisorio->latitud =  null;
        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_paso_seis = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_by = $id_user;

        $formulario_provisorio->cargo_empresa = "Representante";
        $formulario_provisorio->presentador_nom_apellido = $array[$i][2];
        $formulario_provisorio->presentador_dni = 0;
        $formulario_provisorio->save();

        $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
        $formulario_provisorio->updated_by = Auth::user()->id;
        $formulario_provisorio->save();

        //parto el string de minerales
        $mineralesACargar = explode("*", $array[$i][5]);
        for ($y = 0; $y < count($mineralesACargar); $y++) {
            //dd(count($mineralesACargar), $mineralesACargar, $y, $mineralesACargar[$y]);
            $nuevo_min = new Minerales_Borradores();
            $nuevo_min->id_formulario = $formulario_provisorio->id;
            $nuevo_min->id_mineral = $mineralesACargar[$y];
            $nuevo_min->lugar_donde_se_encuentra = null;
            $nuevo_min->variedad = null;
            $nuevo_min->segunda_cat_mineral_explotado = null;
            $nuevo_min->mostrar_lugar_segunda_cat = null;
            $nuevo_min->mostrar_otro_mineral_segunda_cat = null;
            $nuevo_min->otro_mineral_segunda_cat = null;
            $nuevo_min->observacion = null;
            $nuevo_min->clase_text_area_presentacion = null;
            $nuevo_min->clase_text_evaluacion_de_text_area_presentacion = null;
            $nuevo_min->texto_validacion_text_area_presentacion = null;
            $nuevo_min->presentacion_valida = null;
            $nuevo_min->evaluacion_correcto = null;
            $nuevo_min->observacion_autoridad = null;
            $nuevo_min->clase_text_area = null;
            $nuevo_min->clase_text_evaluacion_de_text_area = null;
            $nuevo_min->texto_validacion_text_area = null;
            $nuevo_min->obs_valida = null;
            $nuevo_min->lista_de_minerales_array = '';
            $nuevo_min->thumb = null;
            $nuevo_min->created_by = $id_user;
            $nuevo_min->estado = "aprobado";
            $nuevo_min->updated_by =  $id_user;

            $nuevo_min->created_at = null; //date("Y-m-d H:i:s");
            $nuevo_min->updated_at = null; //date("Y-m-d H:i:s");

            $nuevo_min->save();
        }

        $id_productor_nuevo = $this->crear_registro_productor($formulario_provisorio->id);
        $id_mina_nueva = $this->crear_registro_mina_cantera($formulario_provisorio->id);
        $id_dia_iia_nueva = $this->crear_registro_dia_iia($formulario_provisorio->id);
        $id_pago_canon_nuevo = $this->crear_registro_pago_canon($formulario_provisorio->id);
        $id_mina_productor = $this->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);

        var_dump("El id del borrador es:");
        var_dump($formulario_provisorio->id);
        var_dump("El id del productor es:");
        var_dump($id_productor_nuevo);
        var_dump("El id de la mina es:");
        var_dump($id_mina_nueva);
        var_dump("El id de la id_dia_iia_nueva es:");
        var_dump($id_dia_iia_nueva);
        var_dump("El id de la id_dia_iia_nueva es:");
        var_dump($id_dia_iia_nueva);
        var_dump("El id de la id_pago_canon_nuevo es:");
        var_dump($id_pago_canon_nuevo);
        var_dump("El id de la id_mina_productor es:");
        var_dump($id_mina_productor);
        echo "\n\n<br><hr><br>";
    }
*/

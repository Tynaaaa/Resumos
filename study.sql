create database resumos;
USE resumos;

CREATE TABLE geografia (
    id INT NOT NULL AUTO_INCREMENT,
    materia VARCHAR(50) NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao text NOT NULL,
    imagem VARCHAR(80),
    PRIMARY KEY (id)
);

INSERT INTO geografia (materia, titulo, descricao, imagem) VALUES ('geografia', 'Climas do Brasil', 'O Brasil é um país vasto e diversificado, abrigando uma ampla gama de climas devido à sua extensão territorial. Das florestas tropicais úmidas da Amazônia ao clima semiárido do sertão nordestino, o Brasil apresenta uma variedade notável. O clima tropical predomina, mas nuances regionais influenciam as estações de chuva e seca, criando ecossistemas únicos, como o Pantanal e a Caatinga. A diversidade climática brasileira é um reflexo da riqueza natural do país.', 'geografiaUm.jpeg');
INSERT INTO geografia (materia, titulo, descricao, imagem) VALUES ('geografia', 'Mercosul', 'O Mercado Comum do Sul, conhecido como Mercosul, é uma união aduaneira fundada em 1991 por Brasil, Argentina, Uruguai e Paraguai, buscando a integração econômica e política na América do Sul. Ao longo dos anos, o bloco expandiu-se para incluir outros países associados. O Mercosul promove o comércio livre entre seus membros, estimula a cooperação e busca fortalecer a região como um ator significativo no cenário internacional.', 'geografiaDois.jpeg');
INSERT INTO geografia (materia, titulo, descricao, imagem) VALUES ('geografia', 'Placas Tectônicas', 'O movimento dinâmico das placas tectônicas é a força motriz por trás da dinâmica da Terra. Essas enormes placas, que compõem a litosfera, deslizam, colidem e se afastam, moldando a geologia do planeta. As fronteiras entre as placas são zonas de intensa atividade sísmica e vulcânica, sendo as cordilheiras, fossas oceânicas e vulcões resultados visíveis dessa interação. O estudo das placas tectônicas é essencial para compreender terremotos, erupções vulcânicas e a formação de montanhas.', 'geografiaTres.jpeg');
INSERT INTO geografia (materia, titulo, descricao, imagem) VALUES ('geografia', 'Domínios Climáticos', 'Os domínios climáticos representam áreas geográficas com características climáticas semelhantes. No Brasil, os principais domínios climáticos são Amazônico, Atlântico, Tropical, Subtropical e Semiárido. Cada domínio possui padrões climáticos específicos, influenciados por fatores como latitude, altitude e correntes oceânicas. Essa diversidade climática impacta a flora, fauna e a vida humana, destacando a riqueza e complexidade ambiental do país.', 'geografiaQuatro.jpeg');

CREATE TABLE historia (
    id INT NOT NULL AUTO_INCREMENT,
    materia VARCHAR(50) NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao text NOT NULL,
    imagem VARCHAR(80),
    PRIMARY KEY (id)
);

INSERT INTO historia (materia, titulo, descricao, imagem) VALUES ('historia', 'Roma Antiga', 'Roma Antiga é o berço da civilização romana, um período marcado pela expansão e consolidação da República Romana. Desde suas humildes origens nas colinas de Roma até o florescimento como uma potência regional, Roma Antiga testemunhou o desenvolvimento de instituições republicanas, engenharia inovadora e influência cultural duradoura. Seus mitos, literatura e legado continuam a ressoar na modernidade, refletindo uma era de conquista e crescimento intelectual.', 'historiaUm.jpeg');
INSERT INTO historia (materia, titulo, descricao, imagem) VALUES ('historia', 'Revolução Russa', 'A Revolução Russa de 1917 foi um evento sísmico que moldou o curso da história russa e mundial. Marcada por dois levantes, em fevereiro e outubro, a revolta culminou na derrubada da monarquia czarista e no estabelecimento de um governo socialista liderado pelos bolcheviques, liderados por Vladimir Lenin. As consequências foram profundas, levando à formação da União Soviética e influenciando movimentos revolucionários em todo o mundo.', 'historiaDois.jpeg');
INSERT INTO historia (materia, titulo, descricao, imagem) VALUES ('historia', 'Imperio Romano', 'O Império Romano, um dos maiores impérios da antiguidade, floresceu por séculos e deixou um legado duradouro na civilização ocidental. Originado da República Romana, o império expandiu suas fronteiras para abranger vastas regiões da Europa, África e Ásia. Conhecido por suas realizações em engenharia, direito, política e cultura, o Império Romano moldou o curso da história, impactando a língua, o governo e as instituições sociais modernas.', 'historiaTres.jpeg');
INSERT INTO historia (materia, titulo, descricao, imagem) VALUES ('historia', 'Guerra Fria', 'A Guerra Fria foi um período tenso e prolongado no século XX, caracterizado pela rivalidade ideológica, política e militar entre os Estados Unidos e a União Soviética. Após a Segunda Guerra Mundial, o mundo se dividiu em dois blocos opostos, liderados pelo capitalismo americano e pelo comunismo soviético. Embora nenhum conflito direto tenha ocorrido entre as superpotências, a competição intensa influenciou eventos globais, resultando em corridas armamentistas, corrida espacial e conflitos em regiões estratégicas.', 'historiaQuatro.jpeg');

CREATE TABLE biologia (
    id INT NOT NULL AUTO_INCREMENT,
    materia VARCHAR(50) NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao text NOT NULL,
    imagem VARCHAR(80),
    PRIMARY KEY (id)
);

INSERT INTO biologia (materia, titulo, descricao, imagem) VALUES ('biologia', 'Genética', 'A genética é a ciência fascinante que estuda a hereditariedade e a variabilidade dos seres vivos. Ela explora os mecanismos pelos quais a informação genética é transmitida de geração em geração, tanto em seres humanos quanto em outras formas de vida. Desde a descoberta da estrutura do DNA por Watson e Crick, a genética moderna tem desvendado os segredos do código genético, proporcionando insights profundos sobre a herança de traços e o desenvolvimento de organismos.', 'biologiaUm.jpeg');
INSERT INTO biologia (materia, titulo, descricao, imagem) VALUES ('biologia', 'Bactérias', 'As bactérias, microrganismos unicelulares microscópicos, são os verdadeiros arquitetos da vida na Terra. Encontradas em todos os ambientes imagináveis, desde o solo até o interior do nosso sistema digestivo, as bactérias desempenham papéis cruciais na manutenção do equilíbrio ecológico. Algumas são benéficas, auxiliando na digestão e na produção de alimentos, enquanto outras podem causar doenças. A pesquisa sobre bactérias continua a ser vital para avanços médicos, biotecnologia e compreensão mais profunda da vida microscópica.', 'biologiaDois.jpeg');
INSERT INTO biologia (materia, titulo, descricao, imagem) VALUES ('biologia', 'Moluscos', 'Os moluscos constituem uma classe diversificada de animais marinhos, de caramujos a lulas majestosas. Reconhecíveis por seus corpos macios, muitos moluscos têm conchas calcárias distintas que oferecem proteção. Além de sua importância ecológica, os moluscos também desempenham um papel vital na alimentação humana, sendo apreciados por sua diversidade de sabores. Suas complexidades biológicas e comportamentais tornam os moluscos um grupo intrigante no reino animal.', 'biologiaTres.jpeg');
INSERT INTO biologia (materia, titulo, descricao, imagem) VALUES ('biologia', 'Lipídios', 'Os lipídios são componentes essenciais para a vida, desempenhando papéis críticos em processos biológicos fundamentais. Compostos por gorduras, óleos e fosfolipídios, os lipídios não são apenas fontes de energia, mas também constituem as membranas celulares, protegendo e isolando as células. Além disso, eles desempenham funções reguladoras e estão envolvidos em processos de sinalização celular. A compreensão dos lipídios é crucial para avanços na nutrição, medicina e biologia molecular.', 'biologiaQuatro.jpeg');


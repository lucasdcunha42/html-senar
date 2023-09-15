@extends('templates.master')

@section('content')
    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="cursos-section cursos">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>

            <div class="row container-auto-width-cursos">
                <div class="search-form">
                    <div class="search-bar">
                        <input type="text" name="search" id="search" placeholder="Pesquisa" class="custom-search">
                        <button type="submit" id="search-button" class="search-button">Buscar</button>
                    </div>
                </div>
            </div>

            <div class="cursos-lista">
                <div class="row cursos-container" id="cursos-container">
                    @include('frontend.pages.cursos-item', ['cursos' => $cursos])
                </div>
            </div>

            <div>
                {!! $cursos->links('components.pagination') !!}
            </div>
        </div>
    </div>

    <div class="cursos-section catalogo bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Catálogo de Cursos
                    </h3>
                </div>
            </div>
            <div class="row hidden-xs">
              <table border="1" cellpadding="0" cellspacing="0">
                <col width="670" />
                <col width="94" />
                <col width="102" />
                <col width="104" />
                <col width="321" />
                <tr>
                  <td width="670" align="center">Nome</td>
                  <td width="81" align="center">Carga <br />
                  Horária</td>
                  <td width="82" align="center">Vagas <br />
                  Mínimo</td>
                  <td width="88" align="center">Vagas <br />
                  Máximo</td>
                  <td width="370" align="center">Conteúdo    Programático</td>
                </tr>
                <tr>
                  <td>Adestramento    de Cães para Pastoreio em Rebanho Ovino</td>
                  <td align="center">24</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">Vantagens    econômicas e funcionais do uso de cães treinados na atividade pecuária;    Demonstrar com cães treinados a recolhida do rebanho no campo; Utilizar os    cães dos participantes dentro das suas realidades funcionais; Demonstração de    cães em diferentes níveis de treinamento; Prática dos participantes e cães    treinados em diferentes situações de manejo de ovinos.</td>
                </tr>
                <tr>
                  <td>Apicultura -    Manejo Avançado</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Introdução - Manejo para Desenvolvimento de Enxames - Equalização dos Enxames    - Colocação de Melgueiras - Coleta de Mel - Processamento de Mel - Divisão de    Enxames - Custos de Produção - Comercialização</td>
                </tr>
                <tr>
                  <td>Apicultura -    Manejo Básico</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Introdução - Biologia das Abelhas - Caracteristicas das Abelhas do Gênero    Apis - Ciclo de Vida da Abelha - Castas - Anatomia Interna e Externa da    Abelha - Equipamentos Apícolas - Colméias Apícolas - Medidas Oficiais das    Colméias Racionais - Localização do Apiário - Instalação do Apiário -    Povoamento do Apiário - Manejo de Colméias e Apiários - Sanidade Apícola -    Produtos Apícolas - Plantas de Interesse Apícola - Projeto de Produção</td>
                </tr>
                <tr>
                  <td>Apicultura -    Produção de Geleia Real</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Produção de Geleia Real. - Conhecer Geleia Real. - Condições Necessárias para    a Produção de Geleia Real. - Manejo para a Produção de Geleia Real:      - Equipamentos;      - Puxada Natural;      - Enxertia. - Preparo das Colmeias    Produtoras de Geleia Real.</td>
                </tr>
                <tr>
                  <td>Apicultura -    Produção de Própolis</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Produção de Própolis. - Condições Necessárias para a Produção de Própolis. -    Manejo para a Produção de Própolis:       - Vegetação;    - Manejo das    abelhas;    - Métodos de produção. -    Colheita. - Processamento:    -    Limpeza;    - Classificação;    - Armazenagem. -  Produção do Extrato de Própolis. -    Comercialização.</td>
                </tr>
                <tr>
                  <td>Aplicação    Correta e Segura de Defensivos Agrícolas - NR-31</td>
                  <td align="center">20</td>
                  <td align="center">8</td>
                  <td align="center">15</td>
                  <td width="370">Parte    Teórica (12 horas) - Conceitos e considerações sobre agrotóxico; - O que é    agrotóxico; - Interpretação do rótulo dos agrotóxicos: inseticida, fungicida,    acaricida, herbicida, adjuvantes e produtos afins; - Identificação de Riscos;    - Conhecimento das formas de exposição direta e indireta aos agrotóxicos; -    Principais vias de penetração: vias de exposição, ocular, inalação dérmica,    oral; - Sinais e sintomas de intoxicação e de primeiros socorros: contato com    a pele, contato com os olhos, ingestão, inalação; - Rotulagem e sinalização    das áreas de risco; - Tipos de pulverizadores existentes no mercado; -    Procedimentos preconizados na NR 31.7 quanto ao uso de agrotóxicos e    afins.  Parte Prática (8 horas) - EPI –    Equipamento de Proteção Individual: descarte, limpeza e manutenção das    roupas, vestimentas e equipamentos de proteção individual, responsabilidade;    - Tipos de pulverizadores: manutenção, regulagem e calibração; - Transporte,    armazenamento, preparo e aplicação; - Tríplice lavagem e destino final de    embalagens vazias; - Condições climáticas e aplicação - Avaliação (deposição    de produto, deriva e escorrimento)</td>
                </tr>
                <tr>
                  <td>Aproveitamento    Integral de Alimentos</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Pirâmide dos alimentos - Função dos alimentos - Alimentos funcionais  - Patologias - Alimentação nos diferentes    ciclos da vida - Aproveitamento integral dos alimentos - Higiene -    Conservação e armazenamento de alimentos - Prevenção de acidentes na cozinha    - Recomendações para uma vida saudável - Segurança alimentar e nutricional    sustentável - Receitas</td>
                </tr>
                <tr>
                  <td>Artesanato -    Bonecos de Pano</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Noções    Básicas de costura.    Preparação e    confecção dos moldes.    Recorte dos    moldes.    Vestuário para bonecos.    Costura de peças.    Pintura das peças.    Montagem dos bonecos.    Decoração e utilização dos bonecos.    Aspectos de comercialização.    Preservação do meio ambiente.    Higiene e segurança no trabalho.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Bordados a Mão</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Conhecer    os equipamentos e materiais usados no bordado à mão. Identificar os vários    tipos de bordado à mão. Realizar os pontos básicos do bordado livre à mão.    Criar bastidor alternativo para bordado e placas organizadoras de linhas.    Decorar peças de vestuário ou enxoval com bordados à mão.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Confecção Básica do Vestuário Feminino</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Importância econômica da produção de roupas; satisfação pessoal por aprender,    criar, produzir; - Vocabulário específico relativo à atividade; - Máquina de    costura: reconhecimento (peças), regulagem, limpeza, lubrificação, manejo,    enchimento e fixação da bobinha. Equipamentos, ferramentas e instrumentos    essenciais à atividade; - Medidas: reconhecimento e uso da fita métrica; como    tirar e anotar medidas; - Traçado e cópia de moldes  métodos diversos: corpo básico (mangas    curta e longa), saia básica, calça básica; - Classificação e características    dos tecidos e linhas. Cálculo da metragem do tecido; - Preparo do tecido,    disposição dos moldes sobre o tecido e corte do tecido; - Alinhavo,  prova, ajustes e costura; - Uso adequado do    ferro de passar roupas; - Cuidados com os tecidos: molhar para encolher,    lavar e secar, passar (temperaturas adequadas); - Acabamentos: arremates,    casas e botões, zíper, limpeza, chuleado (chuleio) e aviamentos; - Saúde e    segurança no trabalho; - Preservação do ambiente: destinação do lixo relativo    à atividade.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Confecção Básica do Vestuário Masculino</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Importância econômica da produção de roupas; satisfação pessoal por aprender,    criar, produzir; - Vocabulário específico relativo à atividade; - Máquina de    costura: reconhecimento (peças), regulagem, limpeza, lubrificação, manejo,    enchimento e fixação da bobinha. Equipamentos, ferramentas e instrumentos    essenciais à atividade; - Medidas: reconhecimento e uso da fita métrica; como    tirar e anotar medidas; - Traçado e cópia de moldes  métodos diversos: camisa (mangas curta e    longa), calça e bombacha; - Classificação e características dos tecidos e    linhas. Cálculo da metragem do tecido; - Preparo do tecido, disposição dos    moldes sobre o tecido e corte do tecido; - Alinhavo, prova, ajustes e    costura; - Uso adequado do ferro de passar roupas; - Cuidados com os tecidos:    molhar para encolher, lavar e secar, passar (temperaturas adequadas); -    Acabamentos: arremates, casas e botões, zíper, limpeza, chuleado (chuleio) e    aviamentos; - Saúde e segurança no trabalho; - Preservação do ambiente:    destinação do lixo relativo à atividade.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Introdução a Costura e Transformação das Peças do Vestuário</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Importância econômica da produção: satisfação pessoal por aprender, criar e    produzir - Vocabulário específico relativo à atividade - Introdução a    costura: máquina de costura (reconhecimento das peças, regulagem, limpeza,    lubrificação, manejo, enchimento e fixação da bobina, equipamentos,    ferramentas e instrumentos necessários à atividade), medidas (reconhecimento    e uso da fita métrica), classificação e características dos tecidos e linhas    (cálculo da metragem), acabamentos (arremates, casas, botões, zíper, limpeza,    chuleado - chuleio e aviamentos); - Transformação: reformas, ajustes, troca    de zíper, bainhas, reposição de cós, cerzido (remendos) - Uso adequado do    ferro de passar roupas - Cuidados com os tecidos: molhar para encolher,    lavar, secar e passar (temperaturas adequadas) - Saúde, segurança e cuidados    com o meio ambiente no trabalho</td>
                </tr>
                <tr>
                  <td>Artesanato -    Macramê</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Colocação    dos fios para as amostras.       Diferentes tipos de nós.       Confecção de peças: painel, bolsa, cinto, franjas.    Acabamentos e arremates.    Aspectos de comercialização.    Preservação do meio ambiente.    Higiene e segurança do trabalho.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Material Reciclável</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Conceito    sobre reciclagem de materiais: PET e papel.       Reconhecimento dos materiais e ferramentas.    Preparação, seleção e descarte.    Técnicas utilizadas: recorte, dobradura,    montagem, costuras, trançados, originais, texturização, acabamentos e    decoração.    Peças confeccionadas:    embalagens, porta-jóias, brinquedos, bolsas, cestas e cadeira.    Aspectos de comercialização.    Preservação do meio ambiente.    Higiene e segurança no trabalho.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Palha de Milho</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Preparação    da palha para armazenamento.       Tingimento da palha.    Trançado    de palha: plano de 03 e 04 palhas, redonda e plana com amarração.    Amarração de sabugos.    Confecção de peças: chapéus, porta-cuia,    descanso de prato, sacolas, cestas com alça e com tampa, brinquedos, flores,    vassouras, bonecos e bordados.       Aspectos de comercialização.       Higiene e segurança do trabalho.       Preservação do meio ambiente.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Patchwork - Unindo Retalhos de Tecidos</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Importância econômica da confecção de Patchwork: satisfação pessoal por    aprender, criar e produzir - Vocabulário específico relativo à atividade -    Máquina de costura: reconhecimento (peças), regulagem, limpeza, lubrificação,    manejo, enchimento e fixação da bobina, equipamentos, ferramentas e    instrumentos necessários à atividade - Medidas: reconhecimento e uso da fita    métrica - Traçado e cópia de moldes: jogo de cama (sobre lençol, lençol com    elástico e fronha), peças decorativas (puxa-saco, pano de prato e porta    térmica) e peças utilitárias (bolsas, lixeira para carro, estojo de itens    pessoais e estojo de itens de higiene)     - Classificação e características dos tecidos e linhas: cálculo da    metragem - Preparo do tecido, disposição dos moldes sobre o tecido e corte do    tecido - Alinhavo e costura - Uso adequado do ferro de passar roupas -    Cuidados com os tecidos: molhar para encolher, lavar, secar e passar    (temperaturas adequadas) - Acabamentos: arremates, casas, botões, zíper,    limpeza, chuleado (chuleio) e aviamentos - Saúde, segurança e cuidados com o    meio ambiente no trabalho</td>
                </tr>
                <tr>
                  <td>Artesanato -    Porongo</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Conhecimento da matéria prima; - Compatibilidade com outros materiais; -    Conhecimento das ferramentas; - Noções de comercialização; - Legislação da    atividade artesanal; - Variedades de porongos para uso artesanal; -    Tratamento da matéria prima para uso artesanal; - Decoração e acabamento; -    Ergonomia e preservação do meio ambiente.</td>
                </tr>
                <tr>
                  <td>Artesanato -    Tingimento e Pintura em Tecido</td>
                  <td align="center">40</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Tingimento    a quente e frio: corantes naturais e químicos. Tingimento com bloqueios    (batique). Criação e confecção de peças de vestuário e assessórios: canga,    echarde e bolsas. Confecção de peças de decoração: almofadas, quadros.    Pintura com moldes. Pintura à mão livre: sombreado e porcelanizado. Pintura    com utilização de carimbos elaborados com material alternativo: folhas e    legumes. Confecção de peças de enxoval. Aspectos de comercialização e    mercado. Preservação do  meio ambiente.    Higiene e segurança do trabalho.</td>
                </tr>
                <tr>
                  <td>Associativismo</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Conhecer as características de uma associação - Organizar pessoas em    associações - Formalizar um grupo associativo - Conhecer os instrumentos de    administração associativa - Prestação de contas</td>
                </tr>
                <tr>
                  <td>Autoconhecimento    e Relacionamento Interpessoal</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Autoconhecimento - Motivação - Relacionamento interpessoal - Planejamento    estratégico</td>
                </tr>
                <tr>
                  <td>Avicultura -    Frango Caipira para Corte</td>
                  <td align="center">20</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Organização    do ambiente de trabalho. Limpeza e higiene, tipo de solo. Riscos ambientais e    biológicos. Sistemas de criação, materiais de construção e custos. Acesso,    localização dos galpões, orientação, dimensionamento e lotação. Piquetes e    pastagens. Reservatório para água. Rede elétrica. Principais raças e    linhagens. Características físicas e de desempenho. Sistema de criação: fase    inicial (cortinas, campânulas, círculo de proteção, cama, termômetro,    bebedouros e comedouros). Descarga, alojamento e cuidados iniciais. Água,    ração, temperatura, manejo do ambiente, manejo dos equipamentos. Manejo da    alimentação, portinholas do galpão, tamanho dos piquetes. Tipo de pastagens,    alimentação alternativa, programa de arraçoamento. Ração inicial, ração    intermediária, ração final. Forragens, frutas, verduras e legumes usados como    alimento alternativo. Vazio sanitário, retirada da cama, remoção dos    equipamentos e utensílios. Limpeza e desinfecção do galpão,  principais     desinfetantes, pintura. Medidas de controle sanitário. Principais    doenças das aves. Subdivisão do galpão para apanha, maneira de captura das    aves, caixas de transporte, deslocamento até o abatedouro. Custo de produção    do lote, conversão alimentar, peso médio, mortalidade.</td>
                </tr>
                <tr>
                  <td>Básico de    GPS - Sistema de Posicionamento Global</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Introdução ao GPS - Conceito e objetivos do GPS - Aplicações - Agricultura de    precisão - Uso do teclado e entrada de dados no aparelho de GPS - Marcar uma    e várias posições do GPS - Página de navegação - Página de navegação -    Utilização de comandos e funções do aparelho - Configurações - Calculando    áreas com o GPS</td>
                </tr>
                <tr>
                  <td>Básico de    Pequenos Frutos - Amora-preta, Framboesa, Mirtilo e Morango</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Classificação    botânica e caracteristicas. Clima. Preparo do solo e canteiros. Obtenção de    mudas e preparo de mudas. Cultivares. Propagação. Plantio: espaçamento, epoca    de plantio. Sistemas: cultivo, condução. Adubação. Poda. Pragas e doenças.    Irrigação. Colheita. Conservação. Utilização.</td>
                </tr>
                <tr>
                  <td>Básico de    Plantas Medicinais, Condimentares e Aromáticas</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Conceituação    de plantas medicinais, condimentares e aromáticas. Espécies mais cultivadas.    Infra-estrutura de produção: galpão, área coberta. Multiplicação de plantas.    Preparo dos canteiros de mudas. Preparação de substrato. Controle    fitossanitário: principais pragas e doenças, métodos de controle, EPI.    Colheita. Secagem. Armazenagem. Embalagens. Comercialização.</td>
                </tr>
                <tr>
                  <td>Boas    Práticas na Fabricação de Alimentos (BPF) </td>
                  <td align="center">40</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">•    Saúde dos colaboradores • Potabilidade da água • Controle integrado de pragas    e vetores • Manejo de resíduos e efluentes • Recebimento da matéria-prima e    insumos • Análise da Estrutura Física • Qualidade dos equipamentos, móveis e    utensílios • Higiene e proteção pessoal • Higiene das Instalações,    equipamentos, móveis e utensílios • Análise do fluxograma de produção e    layout das agroindústrias • Embalagem e Rotulagem • Armazenamento de    Alimentos • Transporte de Alimentos • Microbiologia dos Alimentos • Boas    Práticas Agropecuárias em produtos de origem animal e vegetal  •     APPCC • Conservas ácidas (APPCC, verificação de pH) • Sanitização de    frutas e hortaliças •  Legislação de    Agroindústrias (legislação, legalização, auditoria de não conformidade) •    Como elaborar o Manual de Boas Práticas (MBP) • Como monitorar os    Procedimentos (Planilhas de Controle) • Criação de Procedimentos Operacionais    Padrão (POPs) • Estudos de caso e vivências práticas.</td>
                </tr>
                <tr>
                  <td>Bolachas e    Salgados Caseiros</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Higiene e saúde na manipulação de alimentos - Segurança e saúde no trabalho –    prevenção de acidentes - Cuidados com o meio ambiente - Preparação dos    ingredientes - Desenvolvimento das receitas de bolachas doces: Cookies de    amendoim, Broa de Fubá, Bolacha Champanhe, Bolacha Integral, Bolacha sem    glúten, Bolacha com Goiabada, Bolacha de Aveia com Coco, Bolacha de Manteiga,    Bolacha Casadinha, Bolacha de Mel, Bolacha de Melado, Bolacha de    Amendoim  - Desenvolvimento das    receitas de bolachas salgadas: Rosca, Palito de Gergelim, Palito de Queijo,    Biscoito Vovó Sentada, Sequilhos Massa Pão, Enroladinho  - Preparação das massas para salgados:    Massa Folhada e Liga Básica - Preparação dos recheios para salgados: Carne,    Frango e Legumes - Desenvolvimento das receitas de salgados: Barquete,    Pastelzinho Assado de Carne, Esfiha, Empada Pingo, Quibe, Quiche e Empada -    Embalagem e armazenamento das bolachas e dos salgados</td>
                </tr>
                <tr>
                  <td>Cadastro    Ambiental Rural - CAR</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Evolução da Legislação Ambiental Brasileira e do Estado do Rio Grande do    Sul  - Legislação Vigente – Leis,    Decretos, Resoluções, Instruções Normativas - Mata Atlântica – Lei 11.428/06.  - Passo-a-passo para o preenchimento do    CAR.</td>
                </tr>
                <tr>
                  <td>Cercas    Elétricas</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Características    da cerca elétrica. Componentes de cerca elétrica: eletrificadores,    isoladores, tramas e moirões, fios e arames, porteiras, pára-raios,    voltímetros, chave conectora de  rede.    Princípio básico de funcionamento da cerca elétrica. Construção da cerca    elétrica. Manutenção de cerca elétrica: manutenção, perda de voltagem e    carregamento das baterias. Custos na construção da cerca elétrica. Esquema de    construção de potreiros com cerca elétrica. Vídeo sobre utilização e    instalação da cerca elétrica. Prática de montagem da cerca elétrica,    aterramento, instalação de pára-raios e porteiras. Teste de cerca    elétrica  com  animais. Visita técnica em propriedade com    cerca já implantada.</td>
                </tr>
                <tr>
                  <td>Compostagem,    Húmus e Substratos</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">1.    Compostagem - Definição, local e dimensionamento do silo - Materiais e    equipamentos - Misturas e enriquecimento - Processo de produção e    características desejáveis  2. Produção    de Húmus - Definição, local e dimensionamento do minhocário - Espécies de    minhocas e matérias primas utilizadas - Manejo das fases de produção -    Características e usos do material  3.    Substratos - Definição e tipos de materiais - Preparo da matéria prima para    obtenção  4. Usos e Benefícios das    Diferentes Misturas - Sugestões de composições de misturas para os diferentes    cultivos.</td>
                </tr>
                <tr>
                  <td>Confecção com    Lã Crua</td>
                  <td align="center">40</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Uso    do tear.    Colocação da urdidura.    Tecelagem e confecção de peças: xergão,    pala, ruana, tapeçaria e tapete.       Acbamentos e arremates.       Aspectos de comercialização.       Preservação do meio ambiente.       Higiene e segurança no trabalho.</td>
                </tr>
                <tr>
                  <td>Conservação    de Forrageiras - Fenação e Ensilagem - Bovinos de Leite</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Características da Produção de Forrageiras no RS; - Métodos de Ensilagem    (características e cálculos); - Tipos de Ensilagem; - Método da Fenação    (características e cálculos); - Análise de Alternativa na Utilização de    Conservação de Forrageiras; - Consolidação das Informações sobre os Métodos    de Conservação de Forragem.</td>
                </tr>
                <tr>
                  <td>Criação de    Peixes de Água Doce</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Introdução - Aspectos Ambientais - Anatomia e Fisiologia dos Peixes -    Espécies - Cadeia Alimentar - Sistemas de Criação - Técnicas de Criação -    Criatórios - Parâmetros de Construção - Qualidade da Água - Preparo de    Viveiros - Aquisição e Transporte de Alevinos - Ambientação - Considerações    sobre Povoamento de Viveiros - Alimentação - Sanidade dos Peixes - Despesca e    Transporte - Viabilidade Econômica</td>
                </tr>
                <tr>
                  <td>Cultivo e    Manejo da Erva-Mate</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Etapas    da produção de mudas e plantio. Seleção de árvores matrizes e produção de    sementes de qualidade. Processo de produção de mudas. Plantio das mudas.    Manejo do erval. Comentários sobre os custos de produção. Industrialização    para  chimarrão. Legislação. Entidades    representativas do setor ervateiro.</td>
                </tr>
                <tr>
                  <td>Cultura da    Videira</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Espécies e cultivares - Aspectos climáticos - Descrição da planta - Estádios    fenológicos da planta - Escolha do local - Solo - Plantio - Sistemas de    condução - Propagação - Poda - Tipos de poda - Principais doenças fúngicas -    Viroses, bacterioses e nematóides - Principais pragas - Colheita e    pós-colheita - Comercialização</td>
                </tr>
                <tr>
                  <td>Cultura de    Citros</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância econômica da cultura.  -    Condições climáticas.  - Solos.  - Variedades e cultivares.  - Porta enxertos.  - Plantio: cuidados, época e    espaçamento.  - Adubação.  - Fitorreguladores.  - Poda.     - Raleio das frutas.  - Controle    de pragas e doenças.  - Uso do EPI e    descarte de embalagens vazias de agrotóxicos.     - Colheita e pós-colheita.</td>
                </tr>
                <tr>
                  <td>Desmame e    Recria de Bovinos de Corte</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Capitulo    I - Desmame de Bovinos de Corte - Importância do desmame - Anatomia e    fisiologia digestiva do terneiro - Características do sistema digestivo do    terneiro - Fatores que interferem na atividade reprodutiva da vaca - Tipos de    desmame - Impactos dos tipos de desmame sobre o desenvolvimento do terneiro e    sobre o desempenho reprodutivo da vaca - Procedimentos para realizar os    diferentes tipos de desmame - Aspectos sanitáros nos diferentes tipos de    desmame - Viabilidade econômica     Capítulo II - Recria de Bovinos de Corte - O que é a recria: conceitos    e objetivos - Ganho de peso compensatório - Fases da recria - Crescimento de    novilhas de reposição do desmame ao acasalamento - Critérios de seleção de    novilhas de reposição - Recria de machos segundo a finalidade e idade de    abate</td>
                </tr>
                <tr>
                  <td>Doma    Racional</td>
                  <td align="center">64</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">Características    do cavalo. Diferenças entre doma racional e tradicional. Habilidades    necessárias à doma racional. Partes do buçal e técnicas de montagem. Primeiro    contato físico e regras de aproximação e afastamento. Como embuçalar o    animal. Sensibilização da nuca e focinho. Quebra de cabresto. Guia ou    redondel, finalidades. Banhos de água, de arreio e de gente. Uso de água para    dessedentar animal em serviço. Tipos e severidades de freios. Escovação,    limpeza e toalete do animal. Uso e finalidade das rédeas de borracha. Montar    o animal: parado e em movimento. Aprumos, aparação e correção de cascos.    Elementos acessórios de doma. Principais doenças dos eqüínos. Maneira correta    de encilhar e montar.</td>
                </tr>
                <tr>
                  <td>Educação    Ambiental</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    O homem e o ambiente - Água - Ar - Solo - Agrotóxicos - Biodiversidade -    Resíduos Sólidos (lixo) - Orientações gerais - O ambiente e a saúde humana</td>
                </tr>
                <tr>
                  <td>Eletricista    Rural</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">Conceitos    básicos em eletricidade: corrente elétrica, voltagem, potência, corrente    contínua, corrente alternada, freqüência, ligação em série e paralelo e    cálculo do consumo de energia. Componentes básicos em instalações elétricas:    condutores, tomadas de energia elétrica, interruptores de energia, células    fotoelétricas, lâmpadas incandescentes, lâmpadas fluorescentes, lâmpadas    vapor-de-mercúrio, disjuntores e fusíveis, caixas de entrada e quadros de    comando, isoladores e eletrodutos. Instalações em linha aberta. Tipos de    instalações de condutores. Manutenção das instalações elétricas. Motores    elétricos: tipos e classificação, aplicação, identificação dos motores,    proteção contra sobrecarga e isolamento. Teoria básica sobre pára-raios.    Normas de segurança e primeiros socorros. Prática.</td>
                </tr>
                <tr>
                  <td>Excel Básico    - Gestão Rural</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Conhecimento do ambiente do Excel - Configurar o Excel - Panejamento,    criação, edição e formatação de planilhas eletrônicas.  - Inclusão de imagens e figuras.  - Construção de cálculos com fórmulas.  - Criação de fórmulas para cálculos    específicos (fluxo de caixa, custos de produção, controle de estoque e    planejamento de atividades). - Trabalhar com bases de dados no Excel.  - Criação de gráficos.</td>
                </tr>
                <tr>
                  <td>Fabricação    de Melado, Açúcar Mascavo e Rapadura</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Infra-estrutura.    Higiene pessoal, de equipamentos e de utensílios. Matéria prima:    características necessárias. Processo de moagem da cana. Fabricação de    melado, açúcar mascavo e rapadura: preparo do caldo (aquecimento e    evaporação, ponto), secagem, envasamento ou colocação em formas. Conservação,    embalagem e armazenamento. Custos e comercialização (mercado). Fluxogramas de    produção. Legislação.</td>
                </tr>
                <tr>
                  <td>Fabricação de    Queijos</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Boas Práticas de Elaboração de Produtos de Origem Vegetal e Animal; - O    leite; - O queijo; - Fabricação de queijos (queijo minas frescal, queijo    prato, queijo colonial, queijo ricota, queijo minas meia cura, queijo    mussarela e caccio cavalo, queijo provolone)</td>
                </tr>
                <tr>
                  <td>Ferrageamento    de Equídeos</td>
                  <td align="center">24</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">-    Anatomia dos cascos - Fisiologia dos cascos e membros - Aprumos normais e    defeituosos - Exame do pé erguido - Exame do aprumo em movimento - Formas de    avaliação da ferradura - Etapas do ferrageamento - Cravejamento - Doenças do    casco - Formas</td>
                </tr>
                <tr>
                  <td>Floricultura    - Produção de Plantas Ornamentais, Corte e Vaso</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">1.&nbsp;Conceitos    em Floricultura 2. Histórico e perspectivas de mercado 3. Plantas Ornamentais    3.1. Clima e Solo 3.2. Propagação 3.3. Irrigação 3.4. Plantio e Tratos    Culturais 3.5. Doenças e Pragas 3.6. Colheita e Pós-colheita 3.7. Embalagem e    Comercialização 4. Plantas de Corte 4.1. Plantas de Clima Tropical 4.2.    Plantas de Clima Temperado 4.3. Clima e Solo 4.4. Propagação 4.5. Irrigação    4.6. Plantio e Tratos culturais 4.7. Doenças e Pragas 4.8. Colheita e    Pós-colheita 4.9. Embalagem e Comercialização 4.10. Conservação de Plantas    Cortadas 5. Plantas de Vaso (bromélias, crisântemos, gerânios, gérberas,    orquídeas) 5.1. Clima e Solo 5.2. Propagação 5.3. Irrigação 5.4. Plantio e    Tratos culturais 5.5. Doenças e Pragas 5.6. Colheita e Pós-colheita 5.7. Embalagem    e Comercialização 5.8. Conservação de Plantas de Vaso</td>
                </tr>
                <tr>
                  <td>Fruticultura    - Tecnologia de Poda</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Árvore    frutífera. Conceito de poda. Objetivos da poda. Época da poda. Intensidade da    poda. Técnica de corte. Tipos de condução. Instrumentos de poda. Materiais    para desinfetar instrumentos de poda. Tipos de poda.</td>
                </tr>
                <tr>
                  <td>Gestão Rural    - Básico</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Apresentação - Características do Setor Rural - Cadeias produtivas - Gestão    Rural - Fatores de Produção - Políticas Agrícolas - Meio Ambiente - Segurança    do Trabalho - Sucessão Familiar - Custos de Produção - Exercício / Planilha    de Cálculos</td>
                </tr>
                <tr>
                  <td>Gestão Rural -    I (Custo de Produção, Gestão de Pessoas, Meio Ambiente, Organização,    Controles)</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Apresentação - Agronegócio - Gestão Rural - Diagnóstico da propriedade - Sede    da unidade de produção rural - Prevenção de acidentes - Gestão de pessoas -    Custo de produção - Meio ambiente</td>
                </tr>
                <tr>
                  <td>Gestão Rural -    II (Finanças, Comercialização, Obrigações Legais e Tributárias, Planejamento)</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Área de finanças - Balanço patrimonial - Fluxo de caixa - Matemática    financeira - Área de comercialização e marketing - Obrigações legais e    tributárias - Planejamento - Jogo de Gestão Rural</td>
                </tr>
                <tr>
                  <td>Guasqueiro -    Confecção de Peças de Couro</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Preparação de ferramentas (facas, cravadores, suvela e vasador) - Revisão de    conteúdo do Guasqueiro - Trabalhar o Couro - Preparação de tentos para    tranças de 5 a 10 - Confecção de corredores por 2 tentos - Confecção de    rédea, cabeçada, bucal, cabresto, rebenque, mango e relho, maneia,    estribeira, travessão - Confecção de corda chata ponteada e costurada</td>
                </tr>
                <tr>
                  <td>Guasqueiro -    Trabalhar o Couro</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Preparação de ferramentas (facas e cravadores) - Avaliação de couros e peles    - Desengorduramento, descarne, depilação de couros e peles e estaqueamento -    Preparação de lonca - Sova e amaciamento de couros - Técnicas para tirar    tentos e loros - Fixação de argola e costura simples - Conserto e reparo de    arreios - Confecção de trançado até 5 tentos, corda lisa e botão simples    (rédea, cabeçada, peiteira, estribeira e maneia)</td>
                </tr>
                <tr>
                  <td>Implantação    do Pomar e Tratos Culturais</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância da fruticultura - Tipos de pomar - Classificação das frutíferas e    condições climáticas - Solos: necessidades de adubação e correção através de    análise de solo de forma visual e foliar - Aquisição de mudas e sistemas de    cultivo</td>
                </tr>
                <tr>
                  <td>Implementos    para Silagem e Fenação</td>
                  <td align="center">16</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">-    Segurança no trabalho - Acoplamento: implementos montados e de arrasto -    Tipos de implementos para silagem e fenação - Ensiladoras: tipos, regulagem e    manutenção - Segadoras: tipos, regulagem e manutenção - Ancinho enleirador:    tipos, regulagem e manutenção - Enfardadora: tipos, regulagem e manutenção -    Vagão forrageiro: tipos, regulagem e manutenção - Desensiladora: tipos,    regulagem e manutenção - Planejamento da operação - Prática</td>
                </tr>
                <tr>
                  <td>Inclusão    Digital Rural - Windows (kit móvel)</td>
                  <td align="center">16</td>
                  <td align="center">5</td>
                  <td align="center">5</td>
                  <td width="370">1.    Informática Básica 2. O que é a Internet 3. Conhecendo e Navegando no Canal    do Produtor 4. Portal de Educação à Distância do SENAR 5. Conhecendo os    Aplicativos do Microsoft Office 2010</td>
                </tr>
                <tr>
                  <td>Informática    Básica - Gestão Rural</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Noções de Hardware e Software - Conhecimento da área de trabalho, conhecendo    as ferramentas e suas aplicações - Noções do Word - Edição e revisão de    textos - Formatação documentos  -    Construção de tabelas - Inserção de elementos gráficos - Edição</td>
                </tr>
                <tr>
                  <td>Inseminação    Artificial de Ovinos</td>
                  <td align="center">40</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">-    Fatores que afetam a fertilidade da fêmea - Fatores que interferem na    produção de sêmen - Manejo dos carneiros pré-inseminação - Metodologia da    inseminação artificial - Manejo do rebanho (cio natural e sincronizado) -    Registros da inseminação</td>
                </tr>
                <tr>
                  <td>Inseminador</td>
                  <td align="center">40</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">-    Inseminação artificial: importância, vantagens e desvantagens, instalações    e   material  necessário - Aparelho reprodutor masculino:    noções básicas de anatomia e fisiologia - Aparelho reprodutor feminino:    noções básicas de anatomia e fisiologia - Cio: definição, identificação do    cio, duração e intervalos, cios anômalos, sincronização, horários de    inseminação - Sêmen: qualidade, tipos de embalagens, identificação - Botijão    de sêmen: tipos e capacidades, componentes, cuidados no manejo, medição do    nível de nitrogênio - Inseminador: perfil, higiene, controle de dados,    auxiliar - Manejo do rebanho com vistas à inseminação artificial - Práticas:    manejo do botijão e descongelamento de sêmen, inseminação em corpo de provas,    manejo e inseminação em animais vivos, registros dos dados</td>
                </tr>
                <tr>
                  <td>Instalação    de Motores Elétricos</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">-    Conceitos básicos - Tipos de correntes elétricas - Tipos de ligações de    circuitos elétricos - Condutores de correntes elétricas - Redes elétricas -    Motores elétricos - Ligação dos motores elétricos - Tensões de ligações    normais - Contadores - Proteção dos motores elétricos - Segurança no trabalho    - Dicas para economizar energia elétrica - Escolha do motor elétrico</td>
                </tr>
                <tr>
                  <td>Jardinagem</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Jardinagem - Ecologia - Partes da planta e suas funções - Grupos de plantas:    uso para jardim - Caracterização do solo - Irrigação - Seleção, distribuição    e plantio de mudas - Manutenção das plantas de interior, exterior e    ferramentas utilizáveis - Controle de pragas, doenças e uso do EPI - Higiene    e segurança no trabalho</td>
                </tr>
                <tr>
                  <td>Liderança e    Desenvolvimento de Equipes</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Liderança - Trabalho em equipe - Comunicação - Feedback - Negociação e gestão    de conflitos</td>
                </tr>
                <tr>
                  <td>Manejo da    Ordenha e Qualidade do Leite</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    O processo de manejo da ordenha - Glândula mamária: tecido conjuntivo e    secretor; estímulo de produção - Ordenhador, ambiente de ordenha, locais de    ordenha - Utensílios e equipamentos de ordenha - Tipos de ordenha: manual,    mecânica balde ao pé, mecânica canalizada - Componentes de uma ordenhadeira:    unidades de vácuo e unidades de ordenha - Rotinas das ordenhas manual e    mecânica: técnicas para uma  ordenha    higiênica - Avaliação e controle dos animais e equipamentos - Testes e    controles da ordenha e do leite - Rotinas de lavagem e desinfecção dos    utensílios, equipamentos de ordenha e equipamentos de resfriamento do leite -    Tipos e produtos para lavagem e desinfecção - Qualidade do leite - Composição    do leite de qualidade, fatores que afetam a composição do leite -    Características organolépticas, propriedades físico-químicas e    microbiológicas do leite de qualidade - Características microbiológicas do    leite, contaminação por microorganismos, mamites - Fatores que afetam a    qualidade do leite, contaminantes, antibióticos e adulterantes - Conservação    do leite de qualidade, resfriamento e transporte - Testes de mamite, contagem    de células somáticas e testes bacteriológicos - Condições de higiene e    desinfecção de animais e equipamentos - Formas para melhorar a qualidade do    leite</td>
                </tr>
                <tr>
                  <td>Manejo da    Terneira e da Novilha Leiteira</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Como fazer uma boa terneira: nascimento da terneira, administração do    colostro, identificação da terneira - Manejo da terneira: descorna, remoção    dos tetos supranumerários, alimentação, alojamentos, desmame (desaleitamento)    - Pós desmame - Manejo da novilha - Principais cuidados com a novilha -    Alimentação, puberdade, idade do primeiro acasalamento</td>
                </tr>
                <tr>
                  <td>Manejo da    Vaca Seca e em Lactação</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Manejo da vaca no período seco - Pontos críticos de controle para o correto    manejo da vaca seca - Manejo alimentar - Instalações - Escore de condição    corporal - Anatomia da glândula mamária ou úbere: aspecto externo,    sustentação da glândula mamária, tecido secretor, sistema de irrigação    sangüínea do úbere, relação sistema neuroendócrino e ejeção do leite,    sistemas de proteção da integridade da glândula mamária - Ordenha: métodos    utilizados para a ordenha da vaca leiteira, condução do animal até a sala de    ordenha, higienização do úbere, ordenha do animal, controle leiteiro -    Mastite (mamite) - fatores predisponentes e efeitos na produtividade (mamite    e a ordenha, mamite e o ambiente, a vaca e a mamite, o homem e a mamite no    rebanho) - Diagnóstico das infecções do úbere - Tratamento da mamite -    Qualidade do leite: leite ácido - Fatores que interferem no conteúdo de    gordura do leite</td>
                </tr>
                <tr>
                  <td>Manejo de    Equinos</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    História da Equinocultura - Importância e Crescimento da Equinocultura -    Comportamento Equino - Tipos e Sistemas de Criação - Manejo dos Potros e    Potrancas - Principais Raças no Brasil - Anatomia, Fisiologia e Comportamento    Reprodutivo - Genética</td>
                </tr>
                <tr>
                  <td>Manejo de    Forrageiras de Inverno - Bovinos de Corte</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância estratégica das forrageiras de inverno para o gado de corte -    Fatores que influem no correto manejo das pastagens de inverno - Exigências    climáticas, ambientais, hídricas e térmicas - Zoneamento climático das    forrageiras de inverno no Rio Grande do Sul - Características morfológicas    para identificação das espécies - Escolha das espécies forrageiras: área,    preparo de solo, correção e adubação de solo, escolha da semente, inoculação    e peletização de leguminosas, métodos de semeadura - Cuidados para o correto    manejo da pastagem: exigências específicas de cada espécie, área foliar,    identificação de pontos de crescimento e substâncias de reservas, formas de    estabelecimento, manejo inicial da pastagem, consorciações, identificação do    ciclo das forrageiras - Manejo relacionado aos animais: disponibilidade de    pasto, cálculo de resíduo para ajuste de lotação, capacidade de suporte,    carga animal - Sistemas de pastoreio - Principais espécies forrageiras de    inverno para o Rio Grande do Sul - Formação de cadeias forrageiras regionais    para gado de corte</td>
                </tr>
                <tr>
                  <td>Manejo de    Forrageiras de Inverno - Bovinos de Leite</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância estratégica das forrageiras de inverno para o gado de leite -    Fatores que influem no correto manejo das pastagens de inverno - Exigências    climáticas, ambientais, hídricas e térmicas - Zoneamento climático das    forrageiras de inverno no Rio Grande do Sul. - Características morfológicas    para identificação das espécies - Escolha das espécies forrageiras: área,    preparo de solo, correção e adubação de solo, escolha da semente, inoculação    e peletização de leguminosas, métodos de semeadura - Cuidados para o correto    manejo da pastagem: exigências específicas de cada espécie, área foliar,    identificação de pontos de crescimento e substâncias de reservas, formas de    estabelecimento, manejo inicial da pastagem, consorciações, identificação do    ciclo das forrageiras - Manejo relacionado aos animais: disponibilidade de    pasto, cálculo de resíduo para ajuste de lotação, capacidade de suporte,    carga animal - Sistemas de pastoreio - Principais espécies forrageiras de    inverno para o Rio Grande do Sul - Formação de cadeias forrageiras regionais    para gado de leite</td>
                </tr>
                <tr>
                  <td>Manejo de    Forrageiras de Verão - Bovinos de Corte</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância estratégica das forrageiras de verão para o gado de corte -    Fatores que influem no correto manejo das pastagens de verão - Exigências    climáticas, ambientais, hídricas e térmicas - Zoneamento climático das    forrageiras de verão no Rio Grande do Sul - Características morfológicas para    identificação das espécies - Escolha das espécies forrageiras: área, preparo    de solo, correção e adubação de solo, escolha da semente, inoculação e    peletização de leguminosas, métodos de semeadura - Cuidados para o correto    manejo da pastagem: exigências específicas de cada espécie, área foliar,    identificação de pontos de crescimento e substâncias de reservas, formas de    estabelecimento, manejo inicial da pastagem, consorciação, identificação do    ciclo das forrageiras - Manejo relacionado aos animais disponibilidade de    pasto, cálculo de resíduo para ajuste de lotação, capacidade de suporte,    carga animal - Sistemas de pastoreio - Principais espécies forrageiras de    verão para o Rio Grande do Sul - Formação de cadeias forrageiras regionais    para gado de corte</td>
                </tr>
                <tr>
                  <td>Manejo de    Forrageiras de Verão - Bovinos de Leite</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância estratégica das forrageiras de verão para o gado de leite -    Fatores que influem no correto manejo das pastagens de verão - Exigências    climáticas, ambientais, hídricas e térmicas - Zoneamento climático das    forrageiras de verão no Rio Grande do Sul - Características morfológicas para    identificação das espécies - Escolha das espécies forrageiras: área, preparo    de solo, correção e adubação de solo, escolha da semente, inoculação e    peletização de leguminosas, métodos de semeadura - Cuidados para o correto    manejo da pastagem: exigências específicas de cada espécie, área foliar,    identificação de pontos de crescimento e substâncias de reservas, formas de    estabelecimento, manejo inicial da pastagem, consorciações, identificação do    ciclo das forrageiras - Manejo relacionado aos animais: disponibilidade de    pasto, cálculo de resíduo para ajuste de lotação, capacidade de suporte,    carga animal - Sistemas de pastoreio - Principais espécies forrageiras de    verão para o Rio Grande do Sul - Formação de cadeias forrageiras regionais    para gado de leite</td>
                </tr>
                <tr>
                  <td>Manejo de    Ovinos</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Raças, seleção e cruzamentos - Manejo operacional do rebanho - Instalações -    Manejo sanitário do rebanho - Alimentação de ovinos - Lã e tosquia - Pele    ovina</td>
                </tr>
                <tr>
                  <td>Manejo de    Recursos Forrageiros para Ovinos</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Principais ecossistemas pastoris do Rio Grande do Sul - Fundamentos do    crescimento das plantas - Técnicas de manejo de pastagens:                   - subdivisões                   - adubação                   - limpeza (roçada)</td>
                </tr>
                <tr>
                  <td>Manejo do    Solo e sua Fertilidade - Plantio Direto</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Enfoque econômico e conservacionista - Sistemas de cultivo e coleta de    amostras de solo: diferenciação e vantagens dos diferentes sistemas de    cultivo - Plano de amostragem de solo - Calagem e adubação: critérios e    épocas para aplicação  - Influência do    PD na adubação - Necessidades das culturas     - Estratégias de adubação - Rotação de culturas: plantas de cobertura    de solo - Efeito alelopático  -    Produção de palha - Reciclagem de nutrientes - Aplicação de agrotóxicos:  uso de herbicida, inseticida e fungicida -    Aplicação de herbicidas na rotação de culturas (manejo integrado de plantas    daninhas) - Classes toxicológicas - Uso de EPI - Aspectos importantes na    aplicação de agrotóxicos - Tríplice lavagem e descarte de embalagem</td>
                </tr>
                <tr>
                  <td>Manejo e    Melhoramento do Campo Nativo - Bovinos de Corte</td>
                  <td align="center">20</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Como as plantas crescem utilizando-se do meio-ambiente - A importância da    fotossíntese no desenvolvimento das plantas - Integração do complexo ambiente    - plantas - animais - Principais ecossistemas pastoris do Rio Grande do Sul -    Definição de manejo - Aspectos importantes para o melhoramento do campo    nativo - Identificação das principais espécies nativas - Principais    alternativas técnicas utilizadas para o correto manejo e melhoramento do    campo nativo - Subdivisões, tipos de pastoreio, uso de cerca elétrica,  aguadas, sombreamento - Diferimento: porque    e como fazer, época adequada - Ajuste de lotação: determinação de resíduo,    pressão de pastejo, carga animal - Limpeza de campo: métodos, roçadas -    Correção e adubação: como fazer, épocas adequadas - Introdução de espécies    melhoradas em campo nativo: quais e como fazer inoculação, peletização -    Suplementação e complementação em campo nativo: porque, como e o que utilizar</td>
                </tr>
                <tr>
                  <td>Manejo    Reprodutivo de Ovinos</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Aparelho reprodutivo do macho e da fêmea - Condição corporal e os efeitos na    reprodução de ovinos - Acasalamento - Manejo de carneiros, borregas e ovelhas    -Técnicas auxiliares da reprodução - Gestação, parto e desmama</td>
                </tr>
                <tr>
                  <td>Manejo    Sanitário de Bovinos de Corte</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Impacto do Manejo Sanitário nos Sistemas de Produção - Conceitos referentes à    Sanidade Bovina - Saúde do rebanho - Doenças Infectocontagiosas dos bovinos    de corte - Doenças Parasitárias (Ecto e Endoparasitas) - Doenças Fúngicas dos    Bovinos de Corte - Doenças Tóxicas e as Carências Metabólicas dos Bovinos de    Corte - Classes de Medicamentos Veterinários – indicações, carências e    ressalvas - Equipamentos, materiais, instalações e procedimentos para a    correta utilização dos medicamentos - Manutenção, limpeza e assepsia dos    equipamentos - Calendário, planos e planilhas de controle sanitário -    Práticas de bons tratos e bem estar animal</td>
                </tr>
                <tr>
                  <td>Motoniveladoras</td>
                  <td align="center">32</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">Apresentação.    Segurança no trabalho. Código de Trânsito Brasileiro. Elementos da    motoniveladora: painel de instrumentos, controles e comandos, motor    (componetes e funcionamento), sistema de filtragem de ar, de combustível, de    lubrificação, de arrefecimento ou refrigeração e elétrico. Eixo dianteiro e    traseiro: articulação, sistema de transmissão, caixa de câmbio, diferencial,    freios. Sistema de direção. Sistema hidráulico. Operação da motoniveladora.    Ajustes operacionais.</td>
                </tr>
                <tr>
                  <td>Nota Fiscal    Avulsa - Eletrônica NFA-E</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">12</td>
                  <td width="370">O    que é a Nota Fiscal Eletrônica (NFA-e) Por que usar a NFA-e Novas    Obrigatoriedades O que é necessário para a emissão da NFA-e O que é um    certificado Digital Como obter o certificado digital Tipos de certificado    Como emitir a NFA-e03.10.2017 Cancelamento NF-e Inutilização de NFA-e Carta    de Correção Duplicar Nota Contra Nota – Documentos Referenciados</td>
                </tr>
                <tr>
                  <td>NR20    Segurança e Saúde no Trabalho - Inflamáveis e Combustíveis para Trabalhadores    no Meio Rural</td>
                  <td align="center">16</td>
                  <td align="center">7</td>
                  <td align="center">10</td>
                  <td width="370">-    Inflamáveis: características, propriedades, perigos e riscos - Controles    coletivo e individual para trabalhos com inflamáveis - Fontes de ignição e    seu controle - Proteção contra incêndio com inflamáveis - Procedimentos em    situações de emergência com inflamáveis - Estudo da norma regulamentadora n.º    20 - Análise preliminar de perigos/riscos: conceitos e exercícios práticos -    Permissão para trabalho com inflamáveis - Conhecimentos e utilização dos    sistemas de segurança contra incêndio com inflamáveis</td>
                </tr>
                <tr>
                  <td>NR33    Segurança nos Trabalhos em Espaços Confinados - Supervisor de Entrada no Meio    Rural</td>
                  <td align="center">40</td>
                  <td align="center">7</td>
                  <td align="center">10</td>
                  <td width="370">-    Primeiros socorros atendimento pré-hospitalar (APH) permissão de entrada e    trabalho (PET) - Segurança e saúde em espaços confinados  - Segurança e saúde em espaços    confinados  - Proteção respiratória em    espaços confinados  - Entendimento da    legislação aplicável - Análise de riscos     - Detecção de gases e ventilação em espaço confinado  - Atmosferas explosivas  - Proteção contra incêndio - Operações de    salvamento em espaços confinados - Atividades práticas de montagem, operação    e uso de sistemas de resgate e de proteção individual</td>
                </tr>
                <tr>
                  <td>NR33    Segurança nos Trabalhos em Espaços Confinados - Trabalhadores Autorizados e    Vigia no Meio Rural</td>
                  <td align="center">16</td>
                  <td align="center">7</td>
                  <td align="center">10</td>
                  <td width="370">-    Primeiros socorros atendimento pré-hospitalar (APH) - Segurança e saúde em    espaços confinados - Noções de resgate em espaços confinados - Proteção    respiratória em espaços confinados</td>
                </tr>
                <tr>
                  <td>NR35    Segurança nos Trabalhos em Altura no Meio Rural</td>
                  <td align="center">8</td>
                  <td align="center">7</td>
                  <td align="center">10</td>
                  <td width="370">-    Normas aplicáveis ao trabalho em altura - Riscos potenciais no trabalho em    altura - Medidas de controle - Sistemas, equipamentos e procedimentos de    proteção coletiva - Equipamentos de proteção individual - Acidentes típicos    em trabalho em altura - Noções de técnicas de resgate e primeiros socorros -    Transporte de vítimas</td>
                </tr>
                <tr>
                  <td>Nutrição de    Gado Leiteiro</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Sistema    digestivo dos bovinos. Nutrientes contidos nos alimentos, análises químicas    para determinação dos nutrientes nos alimentos, análises químicas e definição    de termos utilizados em nutrição de bovinos. Função dos nutrientes e sintomas    de carência e toxidez. Alimentos para bovinos de leite - tipos: volumosos,    concentrados, suplementos minerais, aditivos, tabela de composição dos    alimentos. Exigências nutricionais de bovinos de leite. Formulação de rações    para bovinos leiteiros. Elaboração do plano forrageiro para o rebanho    leiteiro. Controle do desempenho do rebanho. Visita à propriedade: avaliação    de animais e do potencial de produção de forragens. Plano de descarte, plano    forrageiro e plano de arraçoamento do rebanho.</td>
                </tr>
                <tr>
                  <td>Operação de    Semeadoras-Adubadoras para Plantio Direto</td>
                  <td align="center">16</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">-    Introdução - Operação de Semeadoras-Adubadoras para Plantio Direto -    Verificar as condições de operação do trator - Identificar as partes da    semeadora-adubadora para plantio direto - Verificar as condições da    semeadora-adubadora - Acoplar a semeadora-adubadora ao trator - Regular a    semeadora-adubadora - Operar a semeadora-adubadora no campo</td>
                </tr>
                <tr>
                  <td>Operação e    Manutenção de Distribuidores - Taxa Variável</td>
                  <td align="center">16</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">-    Compreender os objetivos da aplicação de corretivos e fertilizantes. -    Conhecer os corretivos e fertilizantes. - Entender o distribuidor e os    parâmetros da aplicação. - Fazer adequação do conjunto trator-distribuidor. -    Realizar a revisão dos componentes do trator e do distribuidor. - Configure o    distribuidor de acordo com o produto a ser aplicado. - Fazer a regulagem e a    calibração do distribuidor. - Conhecer as tecnologias de automação com    georreferenciamento. - Aplicar o produto (corretivo ou fertilizante). -    Conhecer os aspectos legais e de segurança na operação de aplicação de    corretivos e fertilizantes.</td>
                </tr>
                <tr>
                  <td>Operação e    Manutenção de Motosserra</td>
                  <td align="center">32</td>
                  <td align="center">4</td>
                  <td align="center">6</td>
                  <td width="370">Componentes    básicos de uma motosserra. Legislação e operação de motosserra. Perfil do    operador de motosserra. Regras de segurança na operação de motosserra.    Equipamento de proteção individual. Motor 2 tempos. Lubrificação de motores 2    tempos. Abastecimento da motosserra. Modelos de motosserras e classificação.    Conjunto de corte. Montagem do conjunto de corte. Lubrificação da corrente.    Amaciamento da corrente. Troca da corrente,sabre e pinhão. Afiação.    Profundiade de corte. Como colocar a motosserra em funcionamento. Tecnologia    de corte de árvores. Derrubada em uma etapa. Derrubada com fisga, com    alavanca, derrubada com cunhas. Derrubada de árvore inclinada na direção    contrária da queda, derrubada de árvore inclinada na direção de queda    desejada, derrubada de árvore com tronco de diâmetro duas vezes maior que o    sabre. Desgalhamento, traçamento, manutenção.</td>
                </tr>
                <tr>
                  <td>Operação e    Manutenção de Tratores Fruteiros</td>
                  <td align="center">20</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">-    Tratores fruteiros (conceito, uso, aplicações, opções do mercado) - Normas de    segurança NR-31 - Uso de tratores e questões ambientais - Código de trânsito    brasileiro e tratores -  Manutenção    preventiva (diária, semanal, mensal, semestral e anual) -  Manutenção do motor e seus componentes    -  Lubrificação geral do trator - Óleo    diesel (armazenamento e abastecimento) -     Manutenção do eixo dianteiro e traseiro - Sistema hidráulico    (manutenção, ajustes e regulagens) - Sistema de direção - Partida correta e    amaciamento de motor - Tomada de força (rotação PTO e uso) -  Lastração e ajuste de contrapesos -  Pneus (ajuste de pressão, patinagem e    avanço) - Acoplamento de implementos e ajustes - Operação a campo - Cálculo    do custo hora de operação</td>
                </tr>
                <tr>
                  <td>Operação e    Manutenção de Turboatomizadores (NR 31)</td>
                  <td align="center">20</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">-    Conceitos de pulverização e aplicação de agrotóxicos - Legislação vigente e    trabalho com agrotóxicos - Exposição direta aos agrotóxicos (dermal, oral,    respiratória) - Equipamento de Proteção Individual - EPI (tipos, utilização,    proteção) - Medidas higiênicas antes e após o trabalho - Limpeza e manutenção    do EPI - Rótulo do produto e classes toxicológicas - Sinais de intoxicação e    primeiros socorros - Aquisição correta de agrotóxicos - Transporte para a    propriedade - Armazenamento na propriedade - Manutenção geral do equipamento    (revisão) - Acoplamento do trator - Regulagens fundamentais - Tipos de bico e    utilização - Fluxo e direção do vento da turbina - Calibração do volume de    calda - Preparo da calda - Normas de segurança na aplicação e sinalização da    área - Tríplice lavagem e destino final de embalagens vazias - Condições    climáticas e aplicação - Avaliação da pulverização com papel sensível -    Avaliação (deposição de produto, deriva e escorrimento) - Redução do impacto    ambiental na pulverização</td>
                </tr>
                <tr>
                  <td>Palestra -    Administração Rural</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">50</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Alimentação e Saúde</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">-    Pirâmide alimentar e alimentação saudável: necessidades nutricionais nas    diferentes etapas da vida e planejamento de refeições balanceadas; -    Alimentação preventiva e alimentos funcionais; - Seleção, preparação,    conservação e armazenamento dos alimentos; - Higiene dos utensílios e higiene    dos alimentos; - Segurança doméstico no manuseio dos alimentos.</td>
                </tr>
                <tr>
                  <td>Palestra -    Apicultura</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Bovinocultura de Corte</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">50</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Bovinocultura de Leite</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">50</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Cadastro Ambiental Rural (CAR)</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Campo e Saúde</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">Conteúdos:  Uso Seguro de Agroquímicos - Riscos à    saúde  - Importância do uso de EPI e    proteção do trabalhador rural - Uso responsável de agroquímicos Exposição    Solar - Riscos à saúde  - Tipos de    doenças de pele - Sintomas - Prevenção - Tratamento</td>
                </tr>
                <tr>
                  <td>Palestra -    Educação Ambiental</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">Temas    relativos a educação ambiental.</td>
                </tr>
                <tr>
                  <td>Palestra -    Equinocultura</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">50</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Fruticultura</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Mecanização Agrícola</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Olericultura</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">Manejo    Sistema Protegido Sistemas de Irrigação Comercialização</td>
                </tr>
                <tr>
                  <td>Palestra -    Ovinocultura</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Plantas Medicinais</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">20</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Primeiros Socorros na Atividade Rural</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">20</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Qualidade de Vida no Meio Rural</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">-    Conceitos sobre saúde; - Sintomas e prevenção das principais doenças:    diabetes, hipertensão, colesterol, obesidade, estresse e depressão; -    Diagnósticos e prevenção das principais doenças ocasionadas pela atividade    rural; - Hábitos para a qualidade de vida no meio rural: exercícios físicos,    postura, alongamentos e alimentação saudável.</td>
                </tr>
                <tr>
                  <td>Palestra -    Saúde da Mulher Rural</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">-    Integridade da saúde da mulher rural; - A mulher e os ciclos reprodutivos; -    Planejamento familiar; - Os métodos anticoncepcionais; - Principais doenças    femininas (câncer de colo e cãncer de mama) e as doenças sexualmente    transmissíveis (candidíase, triconomíase, gonorréia, sífilis, AIDS,    corrimento e cistites); - Medidas de hgiene e prevenção; - Aspectos    essenciais à saúde e bem estar da mulher rural.</td>
                </tr>
                <tr>
                  <td>Palestra -    Saúde do Homem</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">Conteúdo    Programático: Higiene Pessoal Planejamento Familiar Doenças Sexualmente    Transmissíveis Câncer de Próstata Câncer de Pênis Disfunção Erétil Tabagismo    Alcoolismo Nutrição Riscos com o uso incorreto de agrotóxicos</td>
                </tr>
                <tr>
                  <td>Palestra -    Saúde na Terceira Idade</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">Conteúdo    Programático:  Legislação Idoso -    Direitos a)   Estatuto do Idoso b)   Política Nacional de Saúde do Idoso  Vida Saudável e Cuidado em Saúde a)   Alimentação b)   Atividade Física/Lazer c)   Higiene Pessoal d)   Utilização e Armazenamento de    Medicamentos   Prevenção em Saúde    a)   Doenças Crônicas/Doenças    comuns  b)   Consultas e Exames periódicos  Acesso ao Serviços de Saúde (SUS) a)   Atenção Básica b)   ESF</td>
                </tr>
                <tr>
                  <td>Palestra -    Saúde Preventiva: De Bem com a Vida</td>
                  <td align="center">3</td>
                  <td align="center">20</td>
                  <td align="center">30</td>
                  <td width="370">Conteúdo    Programático  -    O que são DST´s – Doenças Sexualmente    Transmíssiveis  -    As principais doenças sexualmente    transmissíveis -    Como se pega DST´s?    -    Quais os principais sintomas das    DST´s? -    Como se prevenir das DST´s?    -    Qual o tratamento para as DST´s?    -    Aspectos essenciais à saúde e bem    estar</td>
                </tr>
                <tr>
                  <td>Palestra -    Segurança na Atividade Rural</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Tecnologia de Aplicação de Defensivos Agrícolas</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra -    Zoonoses</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">30</td>
                  <td width="370">-    Conceito Zoonoses; - Problemas sanitários da relação homem/animal; -    Prejuízos econômicos causados pelas zoonoses; - Principais zoonoses:    brucelose, tuberculose, hidatidose, bicho do pé, teníase/cisticercose,    leptospirose/hantavirose, miíase, toxoplasmose e fasciolose; - Quadro    clínico; - Formas de transmissão; - Clico biológico; - Prevenção e controle;</td>
                </tr>
                <tr>
                  <td>Palestra    Ensilagem e Manejo de Forrageiras para Bovinocultura de Corte</td>
                  <td align="center">8</td>
                  <td align="center">(vazio)</td>
                  <td align="center">(vazio)</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra    Sensibilização - BPA para Bovinos de Corte</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370"> </td>
                </tr>
                <tr>
                  <td>Palestra    Sensibilização - Programa Boas Práticas Agrícolas em Frutas e Hortaliças</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">200</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Palestra    Sensibilização - Programa Empreendedor Rural</td>
                  <td align="center">6</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370"> </td>
                </tr>
                <tr>
                  <td>Palestra    Sensibilização - Programa Turismo Rural</td>
                  <td align="center">4</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370"> </td>
                </tr>
                <tr>
                  <td>Palestra    Sensibilização - Tecnologia para Produção de Leite (Leitec)</td>
                  <td align="center">4</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370"> </td>
                </tr>
                <tr>
                  <td>Palestra    Turismo Rural - 8 horas</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td align="center">50</td>
                  <td width="370">&nbsp;</td>
                </tr>
                <tr>
                  <td>Panificação    Caseira</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Histórico da panificação - Higiene pessoal - Higiene dos utensílios,    equipamentos e do ambiente - Ingredientes básicos (pães diversos e massas) -    Preparo de pães diversos - Preparo de massas - Processos básicos de    congelamento e descongelamento - Armazenamento e embalagens</td>
                </tr>
                <tr>
                  <td>Primeiros    Socorros e Patologias de Bovinos de Leite</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Considerações    sobre a saúde animal: formas para avaliar o estado sanitário de um animal ou    rebanho, higiene e seus efeitos sobre a saúde animal. Manejo animal:    contenção dos animais para avaliação, tratamento e manejo, avaliação da    temperatura corporal, uso de medicamentos e prevenção de enfermidades,    aplicação de medicamentos: vias de administração, exame de fezes, raspado de    pele e verrugas, amostragem de leite, amostragem de sangue, destino dos    animais mortos e embalagens de produtos tóxicos, técnicas de manejo para os    animais, intoxicações por plantas, alimentos estragados, produtos químicos.    Definições importantes para compreender a busca da saúde animal. O animal e a    manutenção de sua saúde e produtividade. Imunidade e seus reflexos na saúde    animal. Enfermidades que afetam o rebanho leiteiro. Doenças bacterianas.    Doenças parasitárias. Doenças nutricionais e metabólicas. Problemas do    aparelho locomotor: problemas do casco. Plantas tóxicas e intoxicações.</td>
                </tr>
                <tr>
                  <td>Processamento    de Frutas</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Microbiologia    e normas de higiene. Princípios e métodos de conservação dos alimentos.    Infra-estrutura necessária para a planta de processamento. Sanidade    industrial. Preparo dos produtos: frutas em calda, compotas, sucos,    cristalização de frutas, geléias, doce em massa schimiers, polpa de frutas.    Conservação. Custo e comercialização. Legislação.</td>
                </tr>
                <tr>
                  <td>Processamento    de Hortaliças</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Microbiologia    e normas de higiene. Princípios e métodos de conservação dos alimentos.    Infra-estrutura necessária para a planta de processamento. Sanidade    industrial. Preparo dos produtos: conservação em óleo vegetal, hortaliças    minimamente processadas, conservas em vinagre aromatizado, molho de tomate    tipo italiano, concentrado de tomate, ketchup. Custo e comercialização.    Legislação.</td>
                </tr>
                <tr>
                  <td>Processamento    de Peixes</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Piscicultura como alimento -Cuidados básicos com a higiene - Aspectos da    legislação - Critérios de responsabilidade técnica - O valor alimentar -    Caracterização do pescado - Estrutura do corpo e dos músculos - Rendimento de    carcaça ou corpo limpo</td>
                </tr>
                <tr>
                  <td>Produção    Caseira da Mandioca e Seus Derivados</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Informar    sobre a importância dos métodos de boas práticas de fabricação de alimentos,    usando apostila, a fim de que venham a utilizar essas técnicas no seu dia a    dia. Informar sobre a importância do consumo da mandioca na alimentação    humana, através de bibliografia informativa, a fim de que saibam desenvolver    uma alimentação variada e saudável. Conhecer os derivados da mandioca e saber    prepará-los adequadamente, a fim de divulgar e aderir ao consumo destes    produtos no cardápio diário. Orientar quanto as boas práticas alimentares.    Elaborar diversas receitas da cultura mandioca.</td>
                </tr>
                <tr>
                  <td>Produção de    Alimentos a Base de Arroz e Derivados</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Histórico do Arroz - Higiene pessoal - Higiene dos utensílios, equipamentos e    do ambiente - Ingredientes básicos (pães, massas, pizzas, biscoitos, bolos) -    Preparo de diversos produtos alimentícios a base de arroz e derivados -    Armazenamento e embalagens</td>
                </tr>
                <tr>
                  <td>Produção de    Derivados de Leite</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Introdução - Segurança alimentar - O leite - O queijo - Fabricação do queijo    minas frescal - Pasteurização da nata e fabricação da manteiga - Fabricação    do iogurte - Fabricação do queijo ricota - Fabricação do doce de leite -    Fabricação da rapadura de leite - Fabricação do käs schimier - Fabricação do    requeijão cremoso</td>
                </tr>
                <tr>
                  <td>Produção de    Embutidos e Defumados</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Higiene    pessoal, do ambiente, dos utensílios, importância, procedimentos.    Tecnologia de fabricação ( moagem da    carne, formulação, aditivos).       Conservação.    Produção dos    embutidos e defumados (lingüiça colonial,     lingüiça calabresa, salsichão).       Preparo dos salgados.    Salames    (salaminho).    Copa.    Bacon.       Costela e lombo defumados.       Patê de fígado.       Defumação.    Armazenagem.    Comercialização.</td>
                </tr>
                <tr>
                  <td>Produção de    Frangos e Ovos Caipiras</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Organização    do ambiente de trabalho, limpeza e higiene.       Riscos ambientais e biológicos.       Sistemas de criação: frangos para corte e produção de ovos.    Acesso, localização dos galpões,    orientação, dimensionamento e lotação.       Piquetes e pastagens.       Reservatório para água.    Rede    elétrica.    Principais raças e    linhagens para corte e para ovos.       Sistema de criação: fase inicial (cortinas, campânulas, círculo de    proteção, cama, termômetro, bebedouros e comedouros), descarga, alojamento e    cuidados iniciais.    Água, ração,    temperatura, manejo do ambiente, manejo dos equipamentos.    Tipo de pastagens, alimentação    alternativa, programa de arraçoamento.       Ração inicial, ração intermediária e ração final.    Forragens, frutas, verduras e legumes    usados como alimento alternativo.       Vazio sanitário, retirada da cama, remoção dos equipamentos e    utensílios.    Limpeza e desinfecção do    galpão,  principais  desinfetantes, pintura.    Principais doenças das aves e medidas de    controle sanitário.    Subdivisão do    galpão para apanha, maneira de captura das aves, caixas de transporte,    deslocamento até o abatedouro.   Custo    de produção do lote de frangos e custo de produção das poedeiras.    Manejo da produção de Ovos.</td>
                </tr>
                <tr>
                  <td>Produção de    Hortaliças - Básico</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">1.  Mercado de olerícolas: país, estado,    exigências, destino da produção. 2. Relação planta/meio ambiente.  3. Infraestrutura de produção: topografia,    ventos, água, máquinas, equipamentos, sistemas de irrigação.  4. Cultivares, tipos de sementeiras,    substratos (definição, tipos e propriedades físico-químicas), composto    orgânico.  5. Manejo do viveiro de produção    de mudas.  6. Preparo do solo: manual    ou mecanizado, calagem, adubação orgânica, adubação foliar, adubação de    plantio e de cobertura, fertirrigação.     7. Sistemas de plantio: manual, mecanizado, canteiros, sulcos,    covas.  8. Transplante: espaçamento e    profundidade.  9. Tratos culturais:    regas, capinas, desbaste, tutoramento, poda, rotação de culturas,    polinização.  10.  Pragas e doenças: atrativos naturais e    controles.  11. Técnicas de colheita:    ponto de colheita, beneficiamento, embalagem, armazenagem e comercialização.</td>
                </tr>
                <tr>
                  <td>Produção de    Hortaliças em Estufas (Manejo e Construção)</td>
                  <td align="center">40</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">1.    Características do mercado consumidor e possibilidades de comercialização. 2.    Infraestrutura, recursos hídricos, estrutura viária, distância ao mercado. 3.    Estruturas: madeira, metálica ou arcos. 4. Características do solo e relevo,    orientação solar, ventos predominantes, escolha e reunião do material na    área, demarcação do terreno e início das obras (abertura dos buracos,    colocação e alinhamento dos esteios, colocação das linhas, tesouras e    caibros, colocação do plástico e fechamento da estufa). 5. Escolha da    cultura, época de plantio, modelo de estufa, material utilizado, modelo do    sistema de irrigação. 6. Construção do túnel baixo ou de uma estufa, com    preparo antecipado do local. 7. Locais de semeadura, tratamento do solo,    adubação e tratamento fitossanitário de sementeiras, técnicas de semeadura,    substrato e esterilização do solo. 8.     Análise do solo: correção, adubação, preparo do solo (mecânico ou    manual). 9. Cobertura morta do solo (mulching) transplante de mudas, capina,    amontoa, desbaste, poda, desponte, adubação de cobertura ou foliar,    tutoramento, irrigação e fertirrigação, rotação de culturas, raleio de    frutas, polinização. 10. Hortaliças cultivas: tomate, pepino, pimentão,    feijão-vagem, melão, folhosas, morango e abobrinha.  11. Manejo Estufa:  ventilação, sombreamento, água,    temperaturas altas e baixas, processo de aquecimento. 12.  Controle de pragas e doenças</td>
                </tr>
                <tr>
                  <td>Pulverizador    Autopropelido (NR 31)</td>
                  <td align="center">24</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">-    Conhecer os objetivos da aplicação de defensivos agrícolas - Conhecer os    defensivos agrícolas - Conhecer a segurança e saúde do aplicador - Entender a    constituição do pulverizador autopropelido - Conhecer a cabine do    pulverizador - Conhecer o sistema de pulverização - Conhecer os parâmetros de    pulverização - Conhecer a classificação das pontas de pulverização - Fazer a    revisão dos componentes do pulverizador - Fazer a regulagem e calibração do    pulverizador - Fazer a avaliação da aplicação - Conhecer as tecnologias de    automação com georreferenciamento - Fazer o preparo da calda - Conhecer os    aspectos legais e de segurança na operação do pulverizador autopropelido</td>
                </tr>
                <tr>
                  <td>Pulverizador    Manual Costal</td>
                  <td align="center">8</td>
                  <td align="center">8</td>
                  <td align="center">12</td>
                  <td width="370">Objetivos    da Técnica de Aplicação de Agrotóxicos. Segurança: vias de absorção, EPI,    acidentes, toxicologia e primeiros socorros. Produto. Equipamento, aplicação    (tipos, componentes, bicos, peneiras). Revisão e manutenção de equipamentos.    Calibração. Preparo de calda. Tríplice lavagem. Aplicação. Manutenção    pós-aplicação.</td>
                </tr>
                <tr>
                  <td>Pulverizador    Motorizado</td>
                  <td align="center">16</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">-    Objetivos da Técnica de Aplicação de Agrotóxicos. - Segurança: vias de    absorção, EPI, acidentes, toxicologia e primeiros socorros. Produto. -    Equipamento, aplicação (tipos, componentes, bicos, peneiras). - Revisão e    manutenção de equipamentos. - Calibração. - Preparo de calda. - Tríplice    lavagem. - Aplicação. - Manutenção pós-aplicação.</td>
                </tr>
                <tr>
                  <td>Reflorestamento</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Importância das florestas. - Legislação florestal e ambiental. -    Recomendações para o sucesso da atividade. - Rentabilidade x espécie. -    Implantação de florestas. - Espaçamento. - Forma de plantio. - Consorciação    (sistema agroflorestal). - Escolha.</td>
                </tr>
                <tr>
                  <td>Regulagem e    Manutenção de Colheitadeiras</td>
                  <td align="center">40</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">1.    Segurança no trabalho; 2. Código de Trânsito Brasileiro; 3. Sistemas    auxiliares da colheitadeira: controles e comandos, painel de instrumentos,    motor (componentes e funcionamento), sistemas de filtragem do ar, de    combustível, de lubrificação, de refrigeração, elétrico e turbocompressor; 4.    Eixo traseiro: 4x2 e 4x4; 5. Eixo dianteiro: caixa de câmbio, embreagem e    freios; 6. Sistema hidráulico e transmissão hidrostática; 7. Esteiras de    tração; 8. Compressor de ar; 9. Sistema industrial: corte e alimentação,    trilha, separação, limpeza, transporte, armazenagem e descarga de grãos,    picador e espalhador de palhas; 10. Operação colheitadeira</td>
                </tr>
                <tr>
                  <td>Reprodução    de Bovinos de Corte</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Sistemas    de acasalamento: monta natural, monta dirigida e inseminação artificial.    Cruzamentos e melhoramento genético. Manejo da novilha: peso e idade de    acasalamento, atividade dos ovários e fertilização. Cuidados com a vaca    primípara. Manejo das vacas com cria ao pé: condição corporal e ocorrência de    cios. Manejo das vacas falhadas: como agir em função de diferentes taxas de    natalidade do rebanho. Manejo do touro: avaliação e seleção de reprodutores,    exame andrológico, melhoramento genético.</td>
                </tr>
                <tr>
                  <td>Reprodução e    Melhoramento Genético de Bovinos de Leite</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Manejo    reprodutivo. Fatores que afetam a eficiência reprodutiva do rebanho bovino    leiteiro. Métodos de reprodução. Cuidados na reprodução do rebanho leiteiro.    Fatores que afetam o ciclo estral. Melhoramento genético do rebanho leiteiro.    Seleção de reprodutores para acasalamento.</td>
                </tr>
                <tr>
                  <td>Retroescavadeira    - Manutenção e Operação</td>
                  <td align="center">40</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">1.    Apresentação. 2. Segurança no trabalho. 3. Código de Trânsito Brasileiro. 4.    Elementos da retroescavadeira: painel de instrumentos, controles e comandos,    motor (componentes e funcionamento), sistema de filtragem  de ar, de combustível, de lubrificação, de    arrefecimento ou refrigeração, elétrico e turbocompressor. 5. Eixo dianteiro:    4x2 e 4x4. 6. Eixo traseiro: sistema de transmissão (caixa de câmbio,    diferencial, freios, reduções finais e conversor de torque). 7. Sistema de    direção. 8. Sistema hidráulico. 9. Operação da retroescavadeira e carregador    (coxilha e várzea).</td>
                </tr>
                <tr>
                  <td>Roçadeira -    Operação e Manutenção</td>
                  <td align="center">16</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">-    Conhecer a roçadeira - Recomendações relacionadas a saúde e segurança no    trabalho - Manutenções na roçadeira - Operar a roçadeira com segurança e    eficiência</td>
                </tr>
                <tr>
                  <td>Saneamento    Rural Básico</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">Definições    sobre o tema saneamento rural básico (legislação). Captação, proteção e    armazenamento da água no meio rural. Disposição adequada dos esgotos e águas    servidas no ambiente rural. Identificação, classificação e separação do lixo.    Compostagem. Lixo químico: descarte e tríplice lavagem das embalagens.    Controle de vetores: mosquitos, baratas, barbeiro, moscas, borrachudos,    mosquitos da dengue, ratos. Prevenção de intoxicações domésticas. Cuidados    básicos com a moradia.</td>
                </tr>
                <tr>
                  <td>Secagem e    Armazenamento de Grãos</td>
                  <td align="center">32</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Características morfológicas, físico-químicas e fisiológicas dos grãos -    Ponto de colheita - Fatores que afetam a fissura e quebra de grãos -    Recebimento, determinação de umidade e impurezas, amostragem - Umidade:    equilíbrio higroscópico, umidade relativa do ar - Secagem: conceitos,    princípios e métodos - Tipos de secadores: fluxo da secagem, aeração -    Pré-limpeza e práticas de secagem - Beneficiamento: importância, limpeza,    classificação dos grãos, transportadores, manutenção - Armazenamento: fatores    que afetam - Armazéns convencionais - Armazenamento a granel: secagem,    limpeza e expurgo de grãos - Regras de segurança</td>
                </tr>
                <tr>
                  <td>Secagem e    Armazenamento de Grãos na Pequena Propriedade</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Qualidade dos grãos - Características dos grãos - Recebimento e limpeza de    grãos - Secagem de grãos - Armazenagem - Aeração - Manutenção de silos -    Cuidados para evitar acidentes - Insetos - Controle integrado de pragas -    Roedores</td>
                </tr>
                <tr>
                  <td>Soldador    Rural - Básico</td>
                  <td align="center">24</td>
                  <td align="center">4</td>
                  <td align="center">6</td>
                  <td width="370">1.    Segurança no processo de soldagem 2. Corrente elétrica 3. Aparelhos de    soldagem 4. Materiais metálicos 5. Eletrodos revestidos 6. Movimentos de    soldagem 7. Preparação para a soldagem 8. Juntas (Tipos) 9. Posições de    Soldagem 10. Sopro magnético 11. Ferramentas auxiliares 12. Características    de uma boa solda 13. Defeitos, causas e soluções nas soldagens</td>
                </tr>
                <tr>
                  <td>Suplementação    e Confinamento de Bovinos de Corte</td>
                  <td align="center">24</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">1.    Introdução - Comparativo entre atividades produtivas - Pecuária de corte no    RS - Fatores econômicos e de mercado que influenciam na atividade -    Integração da lavoura/pecuária - Avaliação de desempenho - Seleção e    avaliação de animais - Importância da eficiência animal e conversão alimentar    - Impacto ambiental 2. Suplementação - Conceito - Quando suplementar - Como    suplementar - Tipos de suplementação - Por que suplementar 3. Confinamento -    Quando confinar - Planejamento do confinamento - Tipos de instalações - Tipos    de equipamentos a utilizar - Tipo de animal a confinar - Alimentação no    confinamento 4. Relação das principais doenças dos bovinos em suplementação e    confinamento 5. Gerenciamento e análise de resultados</td>
                </tr>
                <tr>
                  <td>Tecelagem com    Lã Crua</td>
                  <td align="center">40</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Tipos de lã - Lavagem da lã - Abrir, cardar e fiar na roca - Tingimento da lã    - Cálculo da medida dos trabalhos - Urdidura - Preparação do tear: primitivo,    com pente e com pregos - Tecelagem da lã: amostra com variação de pontos -    Acabamentos - Higiene e Segurança no trabalho</td>
                </tr>
                <tr>
                  <td>Terminação    de Cordeiros</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Usos de sistemas de acasalamento para produção de carne - Raças para utilizar    na produção de carne - Influência dos cruzamentos - Sistemas de produção -    Alimentação - Peso ao nascer do cordeiro - Peso ao desmame do cordeiro -    Idade da ovelha - Ganho de peso - Influência do sexo e idade nas    características da carcaça - Rendimento de carcaça - Componentes do    não-carcaça ou quinto quarto</td>
                </tr>
                <tr>
                  <td>Tortas e    Docinhos Caseiros</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Higiene e saúde na manipulação de alimentos - Segurança e saúde no trabalho –    prevenção de acidentes - Cuidados com o meio ambiente - Preparação dos    ingredientes - Preparação da massa básica de bolo e pão de ló para tortas -    Preparação dos recheios para as tortas - Preparação das coberturas para as    tortas - Preparação das decorações para as tortas - Desenvolvimento das    receitas de tortas: Torta Marta Rocha, Torta de Morangos e Chocolate, Torta    de Nozes, Torta de Ganache, Torta de Sorvete e Torta de Frutas - Preparação    da massa básica para docinhos -     Preparação dos recheios e das coberturas para os docinhos -    Desenvolvimento das receitas de docinhos: Beijinho, Brigadeiro, Branquinho,    Docinho de Nozes, Docinho Olho de Sogra, Brigadeiros de Copinho, Beijinho de    Copinho, Docinhos Glaçados e Docinhos Caramelados - Embalagem e armazenamento    das tortas e dos docinhos</td>
                </tr>
                <tr>
                  <td>Tosquia de    Ovinos - Método Tally-Hi</td>
                  <td align="center">40</td>
                  <td align="center">8</td>
                  <td align="center">10</td>
                  <td width="370">1.    Manutenção das Tesouras de Esquilar - Partes da tesoura - Funcionamento da    tesoura - Armação e regulagem da tesoura - Lubrificação da tesoura - Armação    e regulagem do pente e cortante - Acoplamento da tesoura - Problemas na    tesoura - Técnica de afiação 2. Instalações para tosquia - Bretes de    contenção - Galpão de tosquia 3. Equipamentos     - Tosquia mecânica - Tipos de máquinas e equipamentos -  Mesa de classificação -  Embolsadoras de lã 4. Tosquia - Vantagens    da tosquia tally-hi - Trabalhos preliminares à tosquia - Ordem de tosquia dos    animais - Cuidados durante e após à tosquia 5. Acondicionamento da lã - Mesa    (suas medidas e posicionamento do operador) - Levantamento do velo - Manuseio    e preparação do velo</td>
                </tr>
                <tr>
                  <td>Transformação    Caseira de Derivados da Soja</td>
                  <td align="center">16</td>
                  <td align="center">10</td>
                  <td align="center">15</td>
                  <td width="370">-    Noções básicas sobre o valor nutricional dos alimentos - Alimentação    Balanceada - Higienização no preparo, instalações, equipamentos, utensílios e    manipulador - Composição da soja - Benefícios da soja - Necessidades diárias    - Seleção e escolha da soja - Tratamento dos grãos  - Derivados da soja e seus preparos básicos    (óleo, farinha, proteína, leite, resíduo e fermentados) - Produção de    Saladas, vitaminas, queijo, maionese, patês, pães, bolos, bolachas, doces e    sobremesas, petiscos, missoschiro, hambúrguer e almôndegas</td>
                </tr>
                <tr>
                  <td>Tratores    Agrícolas - Manutenção e Operação</td>
                  <td align="center">40</td>
                  <td align="center">6</td>
                  <td align="center">8</td>
                  <td width="370">1.    Segurança no trabalho 2. Código de Trânsito Brasileiro 3. Identificação dos    componentes: painel de instrumentos, controles e comandos, motor (componentes    e funcionamento), sistema de filtragem de ar, de combustível, de    lubrificação, de arrefecimento ou refrigeração, elétrico e turbocompressor 4.    Eixo dianteiro: 4x2 e 4x4 5. Eixo traseiro: sistema de transmissão    (embreagem, caixa de câmbio, diferencial, freios, reduções finais) 6. Sistema    elétrico 7. Sistema de direção 8. Sistema hidráulico: de levante a três    pontos, com controle eletrônico, controle remoto 9. Tomada de força 10.    Preparação do trator para o trabalho: ajuste de bitolas, lastração, pneus 11.    Acionamento de tomada de força, rotações e utilização 12. Acoplamento e    regulagem de implementos: montados e de arrasto 13. Operação com implementos    (arado, grade, roçadeira, outros)</td>
                </tr>
              </table>
              <h3>&nbsp;</h3>
</div>
            <div class="row visible-xs"> </div>
        </div>
    </div>

    @include('frontend.partials.agenda')
@endsection

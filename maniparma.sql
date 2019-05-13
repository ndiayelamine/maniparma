-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 13, 2019 alle 16:50
-- Versione del server: 5.7.22
-- Versione PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maniparma`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `chi_siamo`
--

CREATE TABLE `chi_siamo` (
  `id` int(11) NOT NULL,
  `column_position` int(15) NOT NULL,
  `column_title` varchar(250) NOT NULL,
  `column_content` text NOT NULL,
  `img_url_big` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `chi_siamo`
--

INSERT INTO `chi_siamo` (`id`, `column_position`, `column_title`, `column_content`, `img_url_big`) VALUES
(1, 0, 'Maniparma', 'Mani &egrave; un\'associazione che opera sul territorio di Parma dal 2001, perseguendo scopi di utilit&agrave; sociale, di sensibilizzazione alle tematiche della cooperazione con i Paesi del Sud del mondo. Crediamo che sia necessario promuovere, organizzare ed incoraggiare iniziative di cooperazione decentrata e internazionale allo sviluppo e di responsabilit&agrave; sociale incentrati al superamento delle cause di povert&agrave; e ingiustizia sociale.', './assets/img/chiSiamo/img_big_s_1.png'),
(2, 2, '5 x 1000', 'Dona il tuo 5x1000 all\'Associazione Mani, non costa nulla: scrivi il nostro codice fiscale nella tua dichiarazione dei redditi. &Egrave; infatti sufficiente inserire il numero 92113840349 nell\'apposito spazio dedicato al 5x1000 per aiutare la nostra associazione. Consulta il tuo commercialista o il CAAF per il 730 o il modello UNICO.', './assets/img/chiSiamo/img_big_s_2.png'),
(3, 3, 'Parma per l\'Africa', '<p>L\'Associazione sostiene e realizza progetti di cooperazione internazionale costruiti dal basso, favorendo il protagonismo delle realt&agrave; locali attraverso la mediazione delle comunit&agrave; di migranti e la <span style=\"text-decoration: underline;\"><strong>centralit&agrave; del ruolo delle donne</strong></span>.</p><p>L\'Associazione pensa che la costruzione del futuro debba passare per l\'uguaglianza dei diritti e per uno sviluppo sostenibile che superi un modello di crescita economicistico e individualista.</p>', './assets/img/chiSiamo/img_big_s_3.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `contatti`
--

CREATE TABLE `contatti` (
  `id` int(11) NOT NULL,
  `column_position` int(1) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_address` varchar(500) NOT NULL,
  `contact_role` varchar(250) NOT NULL,
  `contact_phone` varchar(250) NOT NULL,
  `contact_secondary_phone` varchar(250) NOT NULL,
  `contact_mail` varchar(500) NOT NULL,
  `contact_secondary_mail` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `contatti`
--

INSERT INTO `contatti` (`id`, `column_position`, `contact_name`, `contact_address`, `contact_role`, `contact_phone`, `contact_secondary_phone`, `contact_mail`, `contact_secondary_mail`) VALUES
(2, 2, 'Matilde Marchesini', '', 'PRESIDENTE', '', '', 'matilde@maniparma.org', ''),
(3, 3, 'Stefano Olivieri', '', 'SOCIO VOLONTARIO', '', '', 'stefano@maniparma.org', ''),
(4, 4, 'Luca Pelagatti', '', 'SOCIO VOLONTARIO', '', '', 'luca@maniparma.org', ''),
(5, 5, 'Ermes Araldi', '', 'VICE PRESIDENTE', '', '', '', ''),
(6, 6, 'Fulvio Tosi', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(7, 7, 'Veronica Federico', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(9, 9, 'Michela Preti', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(10, 10, 'Massimo Finardi', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(11, 11, 'Nicoletta Orsi', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(12, 12, 'Celestina Schianchi', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(13, 13, 'Bettina Costi', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(14, 14, 'Stefano Ippolitoni', '', 'SOCIO VOLONTARIO', '', '', '', ''),
(15, 15, 'Cristiana Brizzolara', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(16, 16, 'Lamine Ndiaye', '', 'RESPONSABILE INFORMATICO', '', '', '', ''),
(17, 17, 'Denise Pelagatti', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(18, 18, 'Tiziana Monacelli', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(19, 19, 'Nadia Monacelli', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(20, 20, 'Carla Ghirardi', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(21, 21, 'Valentina Argento', '', 'SOCIA VOLONTARIA', '', '', '', ''),
(22, 22, 'Carlotta Valesi', '', 'SOCIA VOLONTARIA', '', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `cosa_facciamo`
--

CREATE TABLE `cosa_facciamo` (
  `id` int(11) NOT NULL,
  `column_position` int(1) NOT NULL,
  `column_title` varchar(250) NOT NULL,
  `column_content` text NOT NULL,
  `img_url_big` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `cosa_facciamo`
--

INSERT INTO `cosa_facciamo` (`id`, `column_position`, `column_title`, `column_content`, `img_url_big`) VALUES
(1, 1, 'Sviluppo Sostenibile', '<h3>Agenda 2030</h3>\r\n<p>L&rsquo;Agenda 2030 per lo Sviluppo Sostenibile &egrave; un programma d&rsquo;azione per le persone, il pianeta e la prosperit&agrave; sottoscritto nel settembre 2015 dai governi dei 193 Paesi membri dell&rsquo;ONU. Essa ingloba 17 Obiettivi per lo Sviluppo Sostenibile -&nbsp;<b><a href=\"http://www.un.org/sustainabledevelopment/\" target=\"_blank\" rel=\"noopener\">Sustainable Development Goals, SDGs</a></b>&nbsp;- in un grande programma d&rsquo;azione per un totale di 169 &lsquo;target&rsquo; o traguardi. L&rsquo;avvio ufficiale degli Obiettivi per lo Sviluppo Sostenibile ha coinciso con l&rsquo;inizio del 2016, guidando il mondo sulla strada da percorrere nell&rsquo;arco dei prossimi 15 anni: i Paesi, infatti, si sono impegnati a raggiungerli entro il 2030.&nbsp;</p>\r\n<b><a href=\"https://www.unric.org/it/agenda-2030\" target=\"_blank\">Continua...</a></b>', './assets/img/cosaFacciamo/1.jpg'),
(2, 2, 'Organizzazione', '<p>Incoraggiare l\'organizzazione di reti locali di donne e uomini, cooperative, associazioni e istituzioni pubbliche per la promozione d\'innovazioni sociali, produttive e d\'impresa nel territorio. Collabora con le comunit&agrave; di immigrati.</p>\r\n', './assets/img/cosaFacciamo/2.jpg'),
(3, 3, 'Risorse del territorio', '<p>Favorire la valorizzazione delle risorse endogene d\'ogni ambito locale.</p>', './assets/img/cosaFacciamo/3.jpg'),
(4, 4, 'CO-sviluppo', '<p>Costituire una assunzione di responsabilit&agrave; in cui le comunit&agrave; di migranti favoriscano lo sviluppo sostenibile nei loro paesi,collaborando con i presidi della societ&agrave; civile e scientifica in Emilia Romagna.</p>', './assets/img/cosaFacciamo/4.jpg'),
(5, 5, 'Sviluppo della cultura', '<p>Impegnarsi per sviluppare la cultura e la prassi del monitoraggio e valutazione negli ambiti dei programmi di cooperazione dalla fase progettuale alla realizzazione.</p>', './assets/img/cosaFacciamo/5.jpg'),
(6, 6, 'Trasparenza', '<p>Perseguire la necessaria trasparenza dell\'utilizzo delle risorse e la sostenibilit&agrave; dei progetti oltre che la concretizzazione nello scambio di relazioni e di risorse tra i territori.</p>', './assets/img/cosaFacciamo/6.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `seo_title` varchar(300) NOT NULL,
  `long_content` text NOT NULL,
  `data` date NOT NULL,
  `news_link` varchar(500) NOT NULL,
  `news_link_open` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`news_id`, `title`, `seo_title`, `long_content`, `data`, `news_link`, `news_link_open`) VALUES
(1, '\"Donne attrici di sviluppo e sicurezza alimentare\"-RENDICONTO FINANZIARIO PROGETTO OTTO PER MILLE VALDESE', '_donne_attrici_di_sviluppo_e_sicurezza_alimentare_rendiconto_finanziario_progetto_otto_per_mille_valdese', '', '2016-02-25', 'https://www.facebook.com/10150095283330626/photos/a.10150211781710626.446456.10150095283330626/10156573429655626/?type=3&theater', 1),
(2, 'IL SENEGAL AL FEMMINILE: IL RACCONTO DI UN PAESE E DELLE SUE TRADIZIONE CON GLI OCCHI DELLE DONNE', 'il_senegal_al_femminile_il_racconto_di_un_paese_e_delle_sue_tradizione_con_gli_occhi_delle_donne', '', '2016-04-27', 'http://www.qcodemag.it/2016/04/20/il-senegal-al-femminile/', 1),
(3, 'L\'AGENDA UE SULLE MIGRAZIONI: UN ANNO IN ROTTA', 'l_agenda_ue_sulle_migrazioni_un_anno_in_rotta', '', '2016-04-27', 'http://sociale.regione.emilia-romagna.it/events/2016/lagenda-ue-sulle-migrazioni-un-anno-in-rotta', 1),
(5, 'Adottare una donna che legge apre squarci di futuro.', 'adottare_una_donna_che_legge_apre_squarci_di_futuro_', '', '2016-06-21', 'https://www.facebook.com/permalink.php?story_fbid=10157067294695626&id=10150095283330626', 1),
(6, 'Intervista alle donne della delegazione senegalese per il progetto Cibo e salute: Reti femminili per lo sviluppo locale', 'intervista_alle_donne_della_delegazione_senegalese_per_il_progetto_cibo_e_salute_reti_femminili_per_lo_sviluppo_locale_', '', '2016-09-19', 'http://www.assemblea.emr.it/paceediritti/microfono-della-pace/2013/le-donne-senegalesi-ripartono-dagli-anacardi/#null', 1),
(7, 'Finanziato dalla Chiesa Valdese per il progetto \"Nutrire l\'istruzione\".', 'Finanziamento_Chiesa_Valdese_Progetto_Nutrire_Istruzione', 'Finanziato dalla Chiesa Valdese il progetto \"Nutrire l\'istruzione\" che istituendo mense scolastiche tutela il diritto allo studio e la sicurezza alimentare in tre villaggi della regione di Thies e un villaggio della Regione di Fatick.', '2018-09-20', 'https://www.ottopermillevaldese.org/wp-content/uploads/2019/02/Approvati_Estero_2018.pdf', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `column_position` int(1) NOT NULL,
  `column_title` varchar(250) NOT NULL,
  `column_link` varchar(500) NOT NULL,
  `column_link_open` int(1) NOT NULL,
  `img_url` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `partners`
--

INSERT INTO `partners` (`id`, `column_position`, `column_title`, `column_link`, `column_link_open`, `img_url`) VALUES
(1, 4, 'COMUNE DI PARMA', 'http://www.comune.parma.it/homepage.aspx', 1, './assets/img/partners/comune_parma.jpg'),
(2, 3, 'SENEGALESI DI PARMA', 'http://www.senegalesidiparma.it/', 1, './assets/img/partners/cspp.png'),
(3, 21, 'MUSOCO', 'http://www.musoco.org/', 1, './assets/img/partners/musoco.png'),
(4, 28, 'SOPRA I PONTI', 'http://www.sopraiponti.org/', 1, './assets/img/partners/sopraPonti.jpg'),
(5, 10, 'COMUNE DI COLLECCHIO', 'http://www.comune.collecchio.pr.it/', 1, './assets/img/partners/ComuneCollecchio.jpg'),
(6, 18, 'KUMINDA - DIRITTO AL CIBO', 'http://kuminda.org/', 1, './assets/img/partners/kuminda.png'),
(7, 22, 'ECOSOLGEA', 'http://www.forumsolidarieta.it/associazioni/volontariato/ecosolgea_1.aspx', 1, './assets/img/partners/Logo_Ecosolgea.jpg'),
(8, 20, 'CUCI - UNIVERSITA DI PARMA', 'https://www.unipr.it/ateneo/organi-e-strutture/centri-e-altre-strutture/centri-universitari/cuci-centro-universitario-la', 1, './assets/img/partners/unipr.png'),
(9, 23, 'LICEO SCIENTIFICO \"G. MARCONI\"', 'http://www.liceomarconipr.gov.it/', 1, './assets/img/partners/marconi.png'),
(10, 24, 'SCUOLA PER L\'EUROPA PARMA', 'https://www.scuolaperleuropa.eu/pvw/app/PRSP0065/pvw_sito.php', 1, './assets/img/partners/scuolaEuropa.png'),
(11, 25, 'DONNE DI QU&Agrave; E L&Agrave;', 'https://www.facebook.com/donnediquaedila/', 1, './assets/img/partners/donnequaela.jpg'),
(12, 26, 'FOCUS Casa Dei Diritti Sociali - ROMA', 'http://www.dirittisociali.org/', 1, './assets/img/partners/focusRoma.png'),
(13, 27, 'FEEDA - SENEGAL', 'http://feedasenegal.com/', 1, './assets/img/partners/feeda.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `progetti`
--

CREATE TABLE `progetti` (
  `progetti_id` bigint(20) UNSIGNED NOT NULL,
  `column_position` int(15) NOT NULL,
  `title` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `location` varchar(250) NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `long_description` text NOT NULL,
  `image_url` varchar(200) CHARACTER SET latin1 NOT NULL,
  `progetti_date` date NOT NULL,
  `seo_title` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `progetti`
--

INSERT INTO `progetti` (`progetti_id`, `column_position`, `title`, `location`, `short_description`, `long_description`, `image_url`, `progetti_date`, `seo_title`) VALUES
(1, 1, 'Terra e Salute', 'Regione di Thies, Senegal', '<div><div><p>Interventi di prevenzione dell\'esodo rurale nei villaggi del Senegal con una mediazione al femminile</p></div></div>', '<div><div><p>La regione di Thies, in cui sono collocate Diol Kadd e&nbsp; Pire, costituisce una realt&agrave; rurale caratterizzata da povert&agrave; e marginalit&agrave;.&nbsp; Gi&agrave; nei piani di indirizzo del governo senegalese si evidenziano dati di emergenza sanitaria e indicazioni sulla necessit&agrave;&nbsp; di rafforzare l&rsquo;agricoltura locale e la formazione di attivit&agrave; di reddito che possano contrastare l&rsquo;emigrazione interna e verso l&rsquo;Europa.&nbsp;</p><p><span style=\"text-decoration: underline;\">A Pire,</span> territorio di forte emigrazione maschile, si e&rsquo; sviluppata un&rsquo;ampia realt&agrave; associativa femminile, consorziata in Federazione dei gruppi femminili, che ha lavorato in progetti di cooperazione decentrata con il territorio di Parma. Sono nate attivit&agrave; di piccola imprenditoria agricola e commerciale, gestite dalle donne con il supporto di un sistema locale di microcredito.</p><p><em><span style=\"text-decoration: underline;\">Diol Kadd</span></em> negli ultimi trenta anni ha subito un progressivo e grave spopolamento a causa della crescente siccit&agrave;. L&rsquo;Associazione Takku ligey, fondata per svolgere attivit&agrave; in campo agricolo, culturale e turistico finalizzate ad arrestare l&rsquo;esodo rurale, ha gi&agrave; perseguito buoni obiettivi, se si considera che la popolazione ha raggiunto nel 2010 i 500 abitanti. Da anni si stanno sviluppando interventi di cooperazione decentrata con il territorio di Parma, volti al potenziamento delle strutture e servizi sanitari presenti in loco. Lo scambio e l&rsquo;integrazione tra cultura della salute occidentale e locale &egrave; obiettivo fondante di questi interventi.</p></div></div>', 'upload/progetti/thumb_518cf7d5767a5.jpg', '2013-05-30', 'terra_e_salute'),
(2, 2, 'Papà  portami a scuola, mamma aiutami a restarci (Progetto Lara Araldi)', 'Regione di Thies - Pire, Senegal', '<p>Partenariato FEEDA-Mani- Assessorato Pari opportunit&agrave; della Provincia di Parma- Comune di Collecchio, perch&eacute; le bambine terminino gli studi, a ricordo di Lara Araldi.</p>', '<p>L&rsquo;analfabetismo femminile resta una delle piaghe dell&rsquo;Africa contemporanea. A Pire, villaggio rurale del Senegal (con cui il territorio di Parma intrattiene rapporti di partenariato in una logica di mutuo scambio e di cooperazione decentrata da alcuni anni) circa il 95% delle donne al di sopra dei 35 anni &egrave; analfabeta. L&rsquo;abbandono scolastico dovuto a matrimoni precoci delle giovani degli ultimi anni delle scuole superiori contribuisce ad aggravare il fenomeno, rendendo meno efficaci gli sforzi di scolarizzazione di bambine ed adolescenti. Le famiglie, dopo aver investito sulla loro educazione, spingono le giovani a lasciare gli studi se si presenta l&rsquo;occasione di un matrimonio interessante, soprattutto se con un <em>Modous-modous</em>, un emigrato che sembra dare l&rsquo;illusione del successo e della ricchezza.</p><p>Il progetto &egrave; al terzo anno di vita. Il primo anno sono stati assegnati 20 Premi Lara Araldi, il secondo anno 28. Nell&rsquo;anno scolastico 2011-12 FEEDA ha assegnato <strong>36 premi Lara Araldi,</strong> che consistono nella presa in carico totale (l&rsquo;iscrizione scolastica, il materiale scolastico, dai libri al temperamatite, gli zaini, le uniformi scolastiche) delle spese di scolarizzazione delle 36 ragazze (dalla scuola elementare al liceo) a cui sono stati assegnati i premi. FEEDA ed il Collettivo locale che sostengono il progetto hanno inoltre organizzato, sempre grazie al progetto, corsi di sostegno della durata di 8 mesi (sono iniziati a novembre) nelle materie scientifiche in cui tradizionalmente le ragazze sono pi&ugrave; insicure. L&rsquo;obiettivo &egrave; quello di potenziare quanto pi&ugrave; possibile l&rsquo;effetto della scolarizzazione. I risultati sono evidenti: i due migliori studenti del distretto amministrativo di cui fa parte Pire sono due ragazze che dal 2009 beneficiano del Premio Lara Araldi. La competizione &egrave; alta ed il fatto che i due migliori studenti siano due ragazze non &egrave; per nulla scontato. In Novembre 2011la Presidentessa di FEEDA, Dr Bineta Gueye, &egrave; stata premiata nel distretto comme &ldquo;Femme Mod&egrave;le&rdquo;, una grande onoreficenza, proprio per la sua attivit&agrave; in relazione al progetto &ldquo;Pap&agrave; portami a scuola, mamma aiutami a restarci&rdquo;.</p><p>Dall&rsquo;anno scorso, inoltre, il progetto ha cominciato a costruire una <strong>biblioteca</strong> intitolata a Lara Araldi, ospitata nei locali di FEEDA a Pire.</p>', 'upload/progetti/thumb_51a6104f26d56.jpg', '2013-05-30', 'pap_portami_a_scuola_mamma_aiutami_a_restarci_progetto_lara_araldi_'),
(3, 3, 'Cibo e Salute', 'Regione di Thies - Pire, Thienaba, Diol Kadd - Senegal', '<p>Responsabilizzazione e partecipazione delle reti femminili esistenti al fine di contrastare la discriminazione di genere contribuendo  alla protezione dei diritti fondamentali delle donne</p>', '<div><p>La regione di Thies, in cui sono collocate Pire, Thienaba, Diol Kadd&nbsp; costituisce una realt&agrave; rurale caratterizzata da povert&agrave; e marginalit&agrave;.&nbsp;</p><p>Gi&agrave; nei piani di indirizzo del governo senegalese si evidenziano dati di emergenza sanitaria e indicazioni sulla necessit&agrave;&nbsp; di rafforzare l&rsquo;agricoltura locale e la formazione di attivit&agrave; di reddito che possano contrastare l&rsquo;emigrazione interna e verso l&rsquo;Europa.&nbsp;</p><p>&nbsp;<span style=\"text-decoration: underline;\">A Pire,</span> territorio di forte emigrazione maschile, si e&rsquo; sviluppata un&rsquo;ampia realt&agrave; associativa femminile, consorziata in Federazione dei gruppi femminili, che ha lavorato in progetti di cooperazione decentrata con il territorio di Parma. Sono nate attivit&agrave; di piccola imprenditoria agricola e commerciale, gestite dalle donne con il supporto di un sistema locale di microcredito.</p><p>A <span style=\"text-decoration: underline;\">Thienaba </span>esiste una dinamica e organizzata realt&agrave; di gruppi femminili,sostenuti dalla Comunit&agrave; rurale, impegnati in cooperative di produzione, trasformazione e commercializzazione di anacardi.</p><p><span style=\"text-decoration: underline;\">Diol Kadd</span> saranno coinvoltie prioritariamente le donne dell\'Associazione femminile Takku ligey,&nbsp; su obiettivi connessi ai diritti e alla salute con l\'intento di consolidare azioni gi&agrave; avviate&nbsp; con interventi di cooperazione decentrata con il territorio di Parma, volti al potenziamento delle strutture e servizi sanitari presenti in loco. Lo scambio e l&rsquo;integrazione tra cultura della salute occidentale e locale &egrave; obiettivo fondante di questi interventi.<strong></strong></p></div>', 'upload/progetti/thumb_51b72e3db0be9.jpg', '2013-06-11', 'cibo_e_salute'),
(4, 4, 'Nutrire l\'istruzione', 'Pire; Thienaba; Diol Kadd e Keur Bakar (Senegal)', '<div><p>L&rsquo;Istruzione &egrave; lo strumento pi&ugrave; potente per uno sviluppo che, non solo, sia sostenibile ma che coniughi un diritto diffuso con pratiche di democrazia a tutela del &ldquo;bene pubblico&rdquo;</p></div>', '<div><div><p>\r\nIl progetto approvato dall&rsquo;8 x mille della Chiesa Valdese, si propone di sostenere il diritto allo studio di bambini/e; ragazze/ragazzi tramite il diritto alla sicurezza e benessere alimentare in diversi villaggi del Senegal rurale, operando per l&rsquo;empowerment delle Associazioni femminili. <br>\r\nL&rsquo;istituzione delle mense scolastiche si rivela strategica&nbsp; sia per conseguire l&rsquo;obiettivo della sicurezza alimentare che come fattore di attrazione per le famiglie di ragazzi/e che arrivano da una miriade di piccolissimi villaggi che&nbsp; compongono le localit&agrave; di Pire; Thienaba; Diol Kadd e Keur Bakar.&nbsp; Per questo, alcuni e alcune studentesse devono percorrere anche 7 Km, restando a scuola tutto il giorno per la scarsit&agrave; delle aule. Alcuni, per povert&agrave; di risorse, rimangono a digiuno, con rischio per la salute e di abbandono scolastico. All&rsquo;interno di questa realt&agrave;, sostenere in modo mirato la scolarizzazione prolungata delle ragazze garantisce diritti, ma ,anche, previene matrimoni e gravidanze precoci che comportano mortalit&agrave; materno-infantile. Il progetto realizza&nbsp; quattro mense scolastiche nelle localit&agrave; citate gestite dalle Associazioni di donne sia come protagoniste nei &ldquo;Comit&eacute;s des Parents&rdquo; che monitorano le mense, che come Cuciniere e Fornitrici di prodotti alimentari dei loro orti collettivi. Accedono alle mese scolastiche tutti i bambini e bambine delle scuole primarie di Diol Kadd e di keur Bakar e&nbsp; 150 ragazze/ragazzi del liceo di Pire e 150 del liceo di Thienaba. La mensa gratuita &egrave; riservata a chi abita molto lontano, a situazioni di povert&agrave; e alle ragazze che hanno ottenuto una borsa di studio. La realizzazione di questo progetto si iscrive nelle strategie per la realizzazione degli OBIETTIVI DEL MILLENNIO perch&eacute; tutela il diritto allo studio; opera per la sicurezza alimentare; sostiene l&rsquo;agricoltura delle piccole produttrici agricole cercando di sviluppare graduali attivit&agrave; di reddito contro l&rsquo;esodo rurale e soprattutto opera per l&rsquo;equit&agrave; di genere valorizzando il ruolo delle donne.\r\n</div></div></p>', 'upload/progetti/opm_valdese.jpg', '2018-09-20', 'Nutrire_Istruzione'),
(5, 5, 'Premio FEEDA-Lara ARALDI', 'Regione di Thies - Pire, Senegal', '<p>Parit&agrave; di genere nell\'accesso all\'istruzione: il sogno di Ndi&eacute;m&eacute; KA si realizza con il viaggio di Maimouna BA e quelli delle sorelle e dei fratelli, i coraggiosi orfani di Keur Samba Lawa KA.</p>', '<p>\r\n<div align=\"center\">\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/M5EYYoJaj58\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n</div>\r\n</p>', 'http://i3.ytimg.com/vi/M5EYYoJaj58/maxresdefault.jpg', '2018-08-10', 'Premio_FEEDA_Lara_ARALDI');

-- --------------------------------------------------------

--
-- Struttura della tabella `progetti_media`
--

CREATE TABLE `progetti_media` (
  `media_id` int(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `video_url` varchar(300) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `progetti_id` int(50) NOT NULL,
  `position` int(10) NOT NULL,
  `media_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `progetti_media`
--

INSERT INTO `progetti_media` (`media_id`, `title`, `video_url`, `image_url`, `progetti_id`, `position`, `media_type`) VALUES
(1, 'Terra e Salute 1', '', './assets/img/progetti/proj_lara.jpg', 2, 1, 0),
(2, 'Terra e Salute II', '', './assets/img/progetti/proj_lara.jpg', 2, 2, 0),
(3, 'L.A.', '', './assets/img/progetti/proj_lara.jpg', 5, 3, 0),
(4, 'LA1', '', './assets/img/progetti/proj_lara.jpg', 5, 4, 0),
(5, 'LA2', '', './assets/img/progetti/proj_lara.jpg', 5, 5, 0),
(6, 'LA3', '', './assets/img/progetti/proj_lara.jpg', 5, 6, 0),
(7, 'LA4', '', './assets/img/progetti/proj_lara.jpg', 5, 7, 0),
(8, 'LA5', '', './assets/img/progetti/proj_lara.jpg', 5, 8, 0),
(9, 'LA7', '', './assets/img/progetti/proj_lara.jpg', 5, 10, 0),
(10, 'LA8', '', './assets/img/progetti/proj_lara.jpg', 5, 11, 0),
(11, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 12, 0),
(12, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 13, 0),
(13, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 14, 0),
(14, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 15, 0),
(15, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 16, 0),
(16, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 17, 0),
(17, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 18, 0),
(18, 'Nutrire l\'istruzione', '', './assets/img/progetti/proj_lara.jpg', 4, 19, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `chi_siamo`
--
ALTER TABLE `chi_siamo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `contatti`
--
ALTER TABLE `contatti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cosa_facciamo`
--
ALTER TABLE `cosa_facciamo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indici per le tabelle `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `progetti`
--
ALTER TABLE `progetti`
  ADD UNIQUE KEY `photo_id` (`progetti_id`);

--
-- Indici per le tabelle `progetti_media`
--
ALTER TABLE `progetti_media`
  ADD PRIMARY KEY (`media_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `chi_siamo`
--
ALTER TABLE `chi_siamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `contatti`
--
ALTER TABLE `contatti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `cosa_facciamo`
--
ALTER TABLE `cosa_facciamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `progetti`
--
ALTER TABLE `progetti`
  MODIFY `progetti_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `progetti_media`
--
ALTER TABLE `progetti_media`
  MODIFY `media_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

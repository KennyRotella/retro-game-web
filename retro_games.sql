-- Progettazione Web 
DROP DATABASE if exists retro_games; 
CREATE DATABASE retro_games; 
USE retro_games; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: retro_games
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acquisto`
--

DROP TABLE IF EXISTS `acquisto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acquisto` (
  `idacquisto` int(11) NOT NULL AUTO_INCREMENT,
  `utente` int(11) NOT NULL,
  `gioco` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pagato` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idacquisto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acquisto`
--

LOCK TABLES `acquisto` WRITE;
/*!40000 ALTER TABLE `acquisto` DISABLE KEYS */;
INSERT INTO `acquisto` VALUES (2,2,2,'2018-12-04 16:28:44',1),(3,2,1,'2018-12-04 17:36:10',0),(4,2,7,'2018-12-04 17:36:20',0),(5,2,16,'2018-12-04 17:36:31',0);
/*!40000 ALTER TABLE `acquisto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gioco`
--

DROP TABLE IF EXISTS `gioco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gioco` (
  `idgioco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `demo` int(11) NOT NULL DEFAULT '0',
  `catalogo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idgioco`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gioco`
--

LOCK TABLES `gioco` WRITE;
/*!40000 ALTER TABLE `gioco` DISABLE KEYS */;
INSERT INTO `gioco` VALUES (1,'MetalSlug',4,'Il gioco consiste nel guidare un soldato, con una pistola e 10 bombe a mano nello zainetto, lungo il territorio nemico e farsi strada attraverso soldati, carri armati nemici e, addirittura forze occulte e presenze aliene. Durante la sua missione, il soldato può scegliere di salire su vari carri armati incustoditi che trova lungo il suo percorso o su una serie di altri macchinari chiamati Slug e che caratterizzano la serie. Questi Slug, ovviamente, danno al giocatore da un lato una maggiore potenza di fuoco e, dall\'altro, una migliore resistenza ai colpi subiti. Infine, non si possono non menzionare i vari ostaggi, grazie ai quali il giocatore, se decide di liberarli, può ottenere armi, bombe o potenziamenti vari e aggiuntivi.',1,1),(2,'PacMan',3,'Il giocatore deve guidare una creatura sferica di colore giallo, chiamata Pac-Man, facendole mangiare tutti i numerosi puntini disseminati ordinatamente all\'interno del labirinto e, nel far questo, deve evitare di farsi toccare da quattro \"fantasmi\", pena la perdita immediata di una delle vite a disposizione. Per facilitare il compito al giocatore sono presenti, presso gli angoli dello schermo di gioco, quattro \"pillole\" speciali (\"power pills\") che rovesciano la situazione rendendo vulnerabili i fantasmi, che diventano blu e, per 10 secondi esatti, invertono la loro marcia; per guadagnare punti, è possibile in questa fase andare a caccia degli stessi fantasmi, per mangiarli.',0,0),(3,'Tetris',6,'I vari pezzi del gioco di Tetris si chiamano tetramini, ciascuno composto da quattro blocchi, infatti il termine Tetris deriva, come detto sopra, da tetramino. I tetramini cadono giù uno alla volta e il compito del giocatore è ruotarli e/o muoverli in modo che creino una riga orizzontale di blocchi senza interruzioni. Quando la riga è stata creata, i mattoni spariscono e i pezzi sovrastanti (se presenti) cadono a formare nuove linee.',0,1),(4,'PuzzleBobble',7,'In cima all\'area di gioco rettangolare, si trovano alcune biglie di vari colori. In basso si trova un cannone fermo, la cui rotazione è controllata dal giocatore, che spara palline colorate in modo semicasuale in linea retta. Se una pallina viene a contatto con un\'altra dello stesso colore, formando un gruppo di tre o più sfere, questo gruppo verrà fatto \"scoppiare\" e sarà rimosso dal campo di gioco, facendo cadere anche le palline sottostanti che si ancoravano ad esso. ',0,1),(5,'BubbleBobble',5,'Il malvagio Baron Von Blubba ha rapito le fidanzate dei due fratelli Bubby e Bobby (inizialmente umani) e ha trasformato questi ultimi in due draghetti sputabolle. Lo scopo dei due fratelli è pertanto quello di completare tutti i 100 livelli del gioco, corrispondenti a caverne con forme geometriche sempre più in profondità nel sottosuolo, per poter poi affrontare Baron Von Blubba, salvare le loro ragazze e ritornare nelle loro forme umane. Se si conclude bene tutto il gioco, la storia finirà con Bubby e Bobby che si riuniscono felicemente con le loro fidanzate e con i loro genitori.',0,1),(6,'DonkeyKong',6,'Jumpman, un coraggioso idraulico passato poi alla storia con il nome di Mario, deve salvare la fidanzata Pauline dal gorilla Donkey Kong, salendo i piani di un palazzo in costruzione ed evitando i vari oggetti che lo scimmione gli lancia addosso. In ogni schermo Mario/Jumpman può usare uno dei martelli presenti nello schermo per distruggere gli ostacoli (tranne le molle e Donkey Kong) entro un limite di tempo, tuttavia non può salire per le scale né saltare finché ha il martello in mano. La struttura narrativa ricorda la fuga finale di King Kong in cima al grattacielo Empire State Building.',0,1),(7,'SuperMario',5,'Per molto tempo, nel Regno dei Funghi regnano le tenebre, ma quando la notizia giunge anche ai due fratelli italiani Mario e Luigi, questi si dirigono verso i confini del regno per salvare la principessa. Dopo un lungo viaggio attraverso 8 mondi, Mario e Luigi riescono a raggiungere il castello di Bowser e a sconfiggerlo in battaglia (facendolo cadere nella lava). È così che la principessa viene salvata e il Regno dei Funghi riportato alla pace. Dopo aver compiuto la missione, Mario e Luigi decidono di rimanere nel Regno dei Funghi per proteggerlo da eventuali minacce. Il rapporto tra Mario e la principessa Peach diventerà col tempo amore.',0,1),(8,'MegaManX',4,'Come i precedenti Mega Man, Mega Man X è un ibrido tra un videogioco di piattaforme ed un run \'n\' gun. Il giocatore controlla X, il quale, come Mega Man, può correre, saltare e sparare con il suo cannone (X-Buster), che può inoltre essere caricato e sparare un colpo più potente. In aggiunta a ciò, Mega Man X introduce nuove abilità non presenti nella serie Mega Man, come scalare i muri, lasciarsi scivolare da essi o saltare da un muro all\'altro. X può inoltre compiere un veloce scatto in avanti, che estende la portata dei salti.',0,0),(9,'Asteroids',4,'Il gioco è piuttosto semplice. Il giocatore comanda una navicella (rappresentata da un triangolo) intrappolata in un campo di asteroidi. Lo scopo è distruggere tutti gli asteroidi nelle vicinanze. Lo spazio in cui si muove la navicella è toroidale: questo significa che se un oggetto esce dalla parte destra dello schermo ricompare dalla parte sinistra, se esce dalla parte alta riappare nella parte bassa.\r\n\r\nGli asteroidi, una volta colpiti, si dividono in due frammenti più piccoli, che a loro volta si scinderanno se colpiti nuovamente; questa operazione deve essere dunque ripetuta due volte per poter distruggere definitivamente ogni asteroide.',0,1),(10,'Qbert',4,'Il campo di gioco di Q*bert è una proiezione isometrica di una struttura piramidale di cubi dalle facce di tre colori. Lo scopo è di saltare da un cubo all\'altro per rendere ciascuna faccia di uno specifico colore (ad esempio, da blu a giallo). Nei primi livelli, questo è semplice come saltare sulla faccia, ma con il progredire della difficoltà il compito diventa più complicato: bisogna saltare sul cubo due volte, oppure saltando su un cubo ricolorato il colore torna quello sbagliato, e così via. Se si salta nel vuoto sui lati della piramide, Q*bert precipita e si perde una vita.',0,1),(11,'Arkanoid',6,'Durante un viaggio nello spazio, l\'astronave madre \"Arkanoid\" viene attaccata e distrutta da una misteriosa forza esterna; la piccola astronave \"Vaus\" riesce a scappare, ma rimane poi intrappolata in una piega spazio-temporale. Dopo questa presentazione inizia il gioco, che vede la Vaus muoversi attraverso questa strana dimensione per affrontare il responsabile di tutto, \"Doh\", chiamato in alcune conversioni \"Dimension Changer\". Nell\'epilogo dell\'arcade il malvagio essere, che è l\'unico boss nel gioco, dopo la sua distruzione si scopre essere una fortezza di controllo dimensionale.',0,1),(12,'SpaceInvaders',6,'La modalità di gioco è piuttosto semplice: il giocatore controlla un cannone mobile che si muove orizzontalmente sul fondo dello schermo, e deve abbattere uno ad uno gli alieni che piano piano si avvicinano alla Terra. Le tappe di avvicinamento degli alieni al Mondo seguono uno schema univoco, un ampio e ordinato zig-zag che li porta lentamente ma inesorabilmente a raggiungere il fondo dello schermo decretando l\'avvenuta invasione e la conseguente fine della partita.',0,1),(13,'Tron',5,'Tron è suddiviso in quattro livelli, ognuno ispirato ad una particolare scena del film. Una delle più note è quella della gara delle Light Cycles, dove il giocatore deve evitare di scontrare le scie luminose degli avversari, e allo stesso tempo intrappolare questi ultimi nella propria. Questo livello è stato ricreato nei videogiochi open source Armagetron Advanced e GLtron.',0,1),(14,'CrashBandicoot',10,'Crash Bandicoot è un videogioco a piattaforme in cui il giocatore deve guidare il protagonista, Crash, attraverso trentadue livelli sparsi sulle tre isole Wumpa, con l\'obiettivo di sconfiggere Cortex e salvare Tawna. Ciascun livello diventa disponibile solo dopo aver superato il livello precedente. Una mappa tridimensionale dell\'isola in cui si trova Crash permette di scegliere il livello da affrontare. I livelli sono costituiti da un percorso brulicante di ostacoli e nemici di vario tipo, che Crash deve superare utilizzando le sue abilità, ovvero la capacità di saltare e di eseguire giravolte, grazie alle quali è possibile per esempio oltrepassare una buca nel terreno o sconfiggere una pianta carnivora.',0,1),(15,'DoubleDragon',5,'Cinque anni dopo una guerra nucleare, una squallida New York è controllata da organizzazioni criminali, su tutte i temibilissimi Black Warriors capeggiati da Willy Mackey. I protagonisti sono i fratelli Billy e Jimmy Lee (il primo vestito di blu, il secondo di rosso), grandi esperti dell\'arte marziale Sou-Setsu-Ryu (tecnica puramente inventata), che vedono rapita l\'amica Marian dai Black Warriors come oggetto di riscatto per ottenere i segreti della loro disciplina. I due fratelli iniziano la loro avventura a mani nude nell\'intento di sgominare i banditi, anch\'essi a mani nude o con armi bianche, e liberare Marian.',0,1),(16,'MetalGearSolid',8,'A parte la trasposizione in 3D, il gameplay di Metal Gear Solid rimane simile al suo antecessore (Metal Gear 2: Solid Snake) in 2D. Il giocatore deve guidare il protagonista, Solid Snake, attraverso le aree del gioco evitando di essere scoperto dai nemici. Si viene scoperti entrando nel cono visivo del nemico.',0,0);
/*!40000 ALTER TABLE `gioco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `idutente` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idutente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES (1,'admin','admin',''),(2,'prova','provaprova','prova@gmail.com');
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04 18:57:45

 # `PHP CLI battle simulator`

### Overview
    The software shows how two warriors can face each other in a command line battle.
    Combat occurs through a series of rules and properties defined in the PHP classes.
<br>





### Panoramica

    Crea un'applicazione PHP a riga di comando che simula una battaglia tra due combattenti.
    Il combattimento avviene attraverso una serie di regole e proprietà definite nelle classi PHP.

<br>

<span>Select a Language: <span> <a href='#it'>IT</a> or <a href='#uk'>UK</a>


<br>
<br>

<span id='it'></span>
# Proprietà

Ogni combattente ha le seguenti proprietà:

* Nome della stringa combattente, 30 caratteri o meno
* Salute Quantità di salute rimanente Numero intero, da 0 a 100
* Forza Danni inflitti all'attacco Numero intero, da 0 a 100
* Difesa Riduzione del danno durante la difesa da un attacco Numero intero, da 0 a 100
* Velocità Determina l'ordine di attacco Numero intero, da 0 a 100
* Fortuna Influisce sulla capacità di schivare un attacco Decimale, da 0 a 1

<br>

### Tipi combattenti

Esistono 3 tipi di combattente: <i>spadaccino</i>, <i>bruto</i> e <i>grappler</i>. Ogni tipo ha dei punti di forza
e debolezze. All'inizio di una battaglia, quando vengono creati i combattenti, ogni proprietà deve
essere determinato in modo casuale tra i valori massimi e minimi consentiti per questo

```
Type  			Health  	Strength  		Defence   	Speed  		Luck 
Swordsman  		40 - 60		60 - 70			20 - 30  	90 - 100  	0.3 - 0.5 
Brute  			90 - 100	65 - 75			40 - 50		40 - 65		0.3 - 0.35 
Grappler  		60 - 100  	75 - 80			35 - 40		60 - 80		0.3 - 04 
```
<br>

## Flusso di battaglia / gioco

    Il programma viene eseguito sulla riga di comando. Quando il programma si avvia, richiede i nomi di
    due combattenti e assegna loro un tipo di combattente a caso. Le proprietà sono quindi
    determinato casualmente per ogni combattente come sopra.


    Il programma esegue la simulazione di battaglia e produce una riga di testo ogni turno che spiega cosa
    è successo quel round fino a quando uno non si esaurisce la salute o 30 turni passano senza un vincitore
    essere dichiarato.

    La velocità dei combattenti determina quale attaccherà per primo, se combattenti hanno
    la stessa velocità dovrebbe andare per prima quella con la difesa più bassa. I combattenti quindi attaccano
    uno alla volta fino alla fine della battaglia. Il danno inflitto dall'attaccante è determinato
    con il seguente calcolo:

`
Damage = Attacker strength 	- Defenders  defence
`


    Il danno viene sottratto dalla salute dei difensori. Se la salute di un combattente scende a 0, lui
    perdere la battaglia. Se il combattimento non è terminato dopo 30 round, viene dichiarato un pareggio.
    Ogni volta che un difensore viene attaccato c'è una piccola possibilità che l'attaccante perda. La possibilità di
    un attacco mancante è indicato dalla proprietà fortuna dei difensori.



### Abilità speciali
    Ogni tipo di combattente ha un'abilità speciale:

<b><i>Spadaccino - Lucky Strike</i></b>
Con ogni attacco c'è una probabilità del 5% che la loro forza raddoppi per quell'attacco.

<b><i>Bruto - Colpo sbalorditivo</i></b>
Con ogni attacco c'è una probabilità del 2% di stordire il nemico, facendogli perdere il suo
prossimo attacco.

<b><i>Grappler - Contrattacco</i></b>
    Quando un grappler sfugge a un attacco, il suo avversario subisce 10 danni.

<br>
<br>

<i>Quando una battaglia finisce, il programma dovrebbe dichiarare il vincitore per nome o annunciare il
    risultato come un pareggio.</i>


<br>
<br>

<br>

## `Regole`

<b>
    <i>
            Vorremmo vedere l'app che gira sulla riga di comando su un'installazione vanilla di
            PHP 5.6 o 7. 
            Non ci sono restrizioni rigide riguardo alle prestazioni, agli standard del codice o al tempo
            tuttavia, ciascuno di essi è importante. 
            Considera quanto segue prima di inviare la tua soluzione:
    </i>
</b>

<br><br>

<!--
Hai verificato la presenza di bug nel sistema? Hai testato il codice?
• Il tuo codice è coerente, hai seguito uno standard di codifica? 
• Il codice è di facile manutenzione? Quanto sarebbe facile introdurre un nuovo tipo di combattente?
• E se volessimo aggiungere un combattente con due abilità, sarebbe possibile? (per
esempio Grappling Swordsman with a lucky st rike and counter attack) 
• Il codice è disaccoppiato e riutilizzabile? Sarebbe possibile costruire un utente grafico
l'interfaccia sopra il tuo codice più tardi?
-->
Sebbene questa sfida non sia un probabile progetto del mondo reale, ha tutti gli stessi problemi
sperimenterai in natura. <br> Cerchiamo soluzioni che dimostrino la consapevolezza nel utilizzo delle best pratices nell'ambito dello sviluppo di software PHP.<br>  Preferiamo la semplicità all'intelligenza, la praticita' piuttosto che magia e la manutenibilità sulla velocità.

<br> 
Soprattutto, però, questa è un'opportunità per scrivere un codice creativo e divertirsi.
Spero ti sia piaciuto!




<br>
<br>
<br>
<span id='uk'></span>

# Property

Each fighter has the following properties:

* Name of the fighter string, 30 characters or less
* Health Amount of health remaining Integer, from 0 to 100
* Strength Damage dealt to attack Integer, from 0 to 100
* Defense Damage reduction when defending against an Integer attack, from 0 to 100
* Speed ​​Determines the order of attack Integer, from 0 to 100
* Luck Affects the ability to dodge a Decimal attack, from 0 to 1

<br>

### Fighting types

There are 3 types of fighter: <i> swordsman </i>, <i> brute </i> and <i> grappler </i>. Each type has strengths
and weaknesses. At the start of a battle, when fighters are created, each property must
be determined randomly between the maximum and minimum values ​​allowed for this


```
Type  			Health  	Strength  		Defence   	Speed  		Luck 
Swordsman  		40 - 60		60 - 70			20 - 30  	90 - 100  	0.3 - 0.5 
Brute  			90 - 100	65 - 75			40 - 50		40 - 65		0.3 - 0.35 
Grappler  		60 - 100  	75 - 80			35 - 40		60 - 80		0.3 - 04 
```
<br>

## Battle / game flow

    The program runs on the command line. When the program starts, it asks for the names of
    two fighters and assign them a random fighter type. The properties are therefore
    randomly determined for each fighter as above.

    The program runs the battle simulation and produces a line of text each turn explaining what
    that round happened until either one runs out of health or 30 turns go by without a winner
    be declared.

    The speed of the fighters determines which one will attack first, if two fighters have it
    the same speed should go first with the lowest defense. The fighters then attack
    one at a time until the end of the battle. The damage dealt by the attacker is determined
    with the following calculation:

`
Damage = Attacker strength 	- Defenders  defence
`


    The damage is subtracted from the health of the defenders. If a fighter's health drops to 0, he
    lose the battle. If the fight has not ended after 30 rounds, a tie is declared.
    Whenever a defender is attacked there is a small chance that the attacker will lose. The possibility of
    a missing attack is indicated by the luck property of the defenders.



### Special skills
    Each type of fighter has a special ability:

<b> <i> Swordsman - Lucky Strike </i> </b>
With each attack there is a 5% chance that their strength will double for that attack.

<b> <i> Brutus - Stunning Shot </i> </b>
With each attack there is a 2% chance to stun the enemy, causing him to lose his
next attack.

<b> <i> Grappler - Counterattack </i> </b>
    When a grappler escapes an attack, its opponent takes 10 damage.

<br>
<br>

<i> When a battle ends, the program should declare the winner by name or announce the
    result as a tie. </i>


<br>
<br>

<br>

## `Rules`

<b>
    <i>
            We would like to see the app running on the command line on a vanilla installation of
            PHP 5.6 or 7.
            There are no hard restrictions on performance, code standards or timing
            however, each of them is important.
            Consider the following before submitting your solution:
    </i>
</b>

<br><br>

<!--
Hai verificato la presenza di bug nel sistema? Hai testato il codice?
• Il tuo codice è coerente, hai seguito uno standard di codifica? 
• Il codice è di facile manutenzione? Quanto sarebbe facile introdurre un nuovo tipo di combattente?
• E se volessimo aggiungere un combattente con due abilità, sarebbe possibile? (per
esempio Grappling Swordsman with a lucky st rike and counter attack) 
• Il codice è disaccoppiato e riutilizzabile? Sarebbe possibile costruire un utente grafico
l'interfaccia sopra il tuo codice più tardi?
-->


While this challenge isn't a likely real-world project, it all has the same problems
you will experience in nature. <br> We are looking for solutions that demonstrate awareness in using best practices in PHP software development. <br> We prefer simplicity to intelligence, practicality rather than magic and maintainability over speed.

<br> 
Most importantly though, this is an opportunity to write creative code and have fun.
I hope you enjoyed it!


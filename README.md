# Web shop za nošenu odjeću Brnja

## Opis aplikacije

Web shop Brnja je web aplikacija za kupovinu korištene tj. nošene brendirane odjeće. Aplikacija omogućuje registraciju, odnosno prijavu korisnika te dodavanje proizvoda u košaricu i njihovu kupovinu.

Aplikacija ima dvije vrste korisnika: Gost i Korisnik.

Gost ima ograničene mogućnosti, poput čitanja informacija o web shop-u, ali ne pretraživanja sadržaja za kupovinu. 

Korisnik je registriani korisnik koji ima mogućnost prijave kako bi mogao pregledati i dodati artikle u košaricu, brisati ih iz košarice te izvršiti narudžbu.

Početna stranica je glavna podstranica koja vodi do sljedećih podstranica, gdje se zapravo obavljaju glavne funkcionalnosti aplikacije. Na vrhu svake stranice nalazi se navigacijska traka, koja je fiksirana u svom položaju. Neprijavljeni korisnik, odnosno Gost, u padajućem navbar-u navigacijske trake ima ponuđenu opciju "About" koja vodi na stranicu s detaljima web shopa. Osim toga u navbar-u piše „Login/Register to see items“ što naznačuje Gostu da je potrebna registracija ukoliko želi pretraživati proizvode. Registrirani korisnik, s druge strane, ima opciju „Products“ unutar navbar-a što omogućuje usmjeravanje na stranicu sa proizvodima. Uz to, prikazana mu je i „Log out“ opcija, koja ga odjavljuje te vraća na početnu stranicu. Nakon prijave, na navigacijskoj traci se pojavljuje „cart“ koji prikazuje broj proizvoda u košarici te služi kao link na podstranicu košarice.


Unutar svake podstranice, na navigacijskoj traci nalazi se ime web shop-a koji je ujedno i link na početnu stranicu.

Podstranica s proizvodima sadrži slike proizvoda, ime, cijenu, sliku, te gumb pomoću kojeg ubacujemo određeni proizvod u košaricu. Također, klik na svaki proizvod vodi na podstranicu tog proizvoda s detaljnijim opisom.

## Ograničenja

- Gosti (ne-ulogirani) korisnici imaju pristup samo detaljnim informacijama web aplikacije s time da imaju mogućnost registracije/prijave. Ne mogu pregledati proizvode, dodati ih u košaricu, kao ni uređivati košaricu.

- Registrirani/prijavljeni korisnici imaju veće mogućnosti od ne-ulogiranih. Mogu pretraživati proizvode, dodavati ih u košaricu, uređivati košaricu te ih kupiti. Također, mogu se i odjaviti. 


## Persone

Persone predstavljaju tipove korisnika iz perspektive dizajna sučelja. Ovisno koji je cilj određene persone i na kojem dijelu aplikacije se nalaze, mijenjaju se njihove ovlasti i motivi.

- Gost: osoba koja posjećuje web aplikaciju bez da je prijavljena te ima samo pristup informacijama bez većih mogućnosti sve dok se ne registrira/prijavi. Do tada može samo pregledavati sadržaj te nema mogućnost dodavanja artikala u košaricu te manipulaciju nad istima.
- Korisnik: korisnik na stranici koji je registriran tj. ima kreiran korisnički račun. Registrirati se je potrebno samo jednom te se svaki idući puta korisnik prijavljuje s korisničkim imenom i lozinkom koji su pohranjeni u bazi podataka nakon registracije. Korisnik ima mogućnost pregledavanja sadržaja web aplikacije te svih ponuđenih artikala koje može dodavati u košaricu kao i uklanjati ih iz košarice. Pri odabiru željenih artikala, može ih kupiti. Na kraju se može odjaviti. Nema mogućnost upravljanja na razini baze podataka.

Svi korisnički računi pohranjeni su u bazu podataka. Navedene persone nisu odvojeni zapisi u bazi nego se samo razlikuju prema ulozi te se promatraju kao semantički objekti iz perspektive posjetitelja aplikacija.

## Stranice

Osnovne stranice koje se koriste za projekt. Određene stranice su potrebne za implementaciju pojedinih funkcionalnosti kako bi ova web aplikacija zadovoljila svoju svrhu. 

Svaka stranica je podstranica u cjelokupnom projektu, pa je tako i početna stranica samo jedna od podstranica. Prema važnosti je jedna od važnijih, ali ne sadrži količinu funkcionalnosti kao neke druge podstranice (npr. Košarica). Svaka podstranica je zasebna i na nju vodi klik na određeni link ili gumb.

- POČETNA stranica - početna stranica projekta. Sadrži navigacijsku traku koja se sastoji od padajuceg navbar-a, imena web shopa i link-a za košaricu. S prijavom se izbor opcija navbar-a povećava kako je u prethodnom tekstu navedeno. Sadrži dvije forme – jedna za registraciju korisnika, a druga za prijavu korisnika.
- PRODUCTS stranica -stranica s ponuđenim artiklima gdje korisnik slobodno pregledava artikle. Klik na artikl vodi na stranicu kliknutog artikla.
- PRODUCT stranica – stranica za određeni proizvod na kojoj se nalazi detaljniji opis proizvoda.
- KOŠARICA stranica - stranica sa artiklima koje je korisnik tamo dodao, ali još nisu kupljeni.
- ABOUT stranica - stranica koja sadrži informacije o web trgovini.

Svaka stranica koja je navedena smije sadržavati i više funkcionalnosti od navedenih, ako je dizajn aplikacije zamišljen da se određene funkcionalnosti obavljaju sa te stranice. Uz uvjet da ostatak specifikacije ne određuje drugačije.

# User stories

Svaki Epic user story podjeljen je u više user storyja, kojima su definirane funkcionalnosti aplikacije iz perspektive pojedine persone. Svaki user story ima definiran acceptance criteria koji potvrđuje ispunjavanja tog User storyja. Epic user story je ispunjen kada su ispunjeni svi acceptance kriteriji svih storyja tog Epica.

Osim toga, neki user storyji mogu sadržavati polje Need. U njemu su eksplicitno navedeni zahtjevi za funkcionalnost koji se mogu zaključiti iz teksta storyja. Tamo gdje nema polja Need, potrebni resursi za ispunjenje storyja mogu se zdravo-razumski zaključiti.

## Epic 1: Gost može samo čitati detalje kompanije te ima mogućnost registracije/prijave za veće mogućnosti

- S1-1 
  Kao običan Gost koji pristupa HOMEPAGE stranici nemam mogućnosti koristiti njezinu punu funkcionalnost. Mogu se registrirati kao novi korisnik ili prijaviti kao postojeći, nakon čega me sustav redirecta natrag na stranicu s proizvodima. 

  Need: ime, password

  Acceptance criteria: 
  - Gost vidi funkcionalnost registracije na HOMEPAGEU
  - Gost može kreirati novi korisnički račun 
  - Gost je redirectan na stranicu s proizvodima nakon prijave

- S1-2 
  Kao gost mogu se pristupom na HOMEPAGE stranicu prijaviti u aplikaciju nakon čega me sustav redirecta na stranicu s proizvodima.

  Need: ispravno ime i password

  Acceptance criteria:
  - Gost vidi funkcionalnost za prijavu
  - Gost se može prijaviti u aplikaciju
  - Gost je redirectan na stranicu s proizvodima nakon prijave

- S1-3
  Kao bilo koji korisnik, mogu pristupiti linku *about* te pregledati informacije vezane za stranicu

  Acceptance criteria: 
  - Link na *about* vidljiv je na svim stranicama koje sadrže navigacijsku traku (sve)
  - Klik na link otvara stranicu s informacijama

# Epic 2: Korisnik može pregledati proizvode, dodavati artikle u košaricu, manipulirati njima, naručivati ih. Na kraju se može odjaviti

- S2-1 
  Kao Korisnik mogu otvoriti stranicu *products*, pregledati artikle te kliknuti na svaki kako bi otvorio stranicu za pojedini

  Acceptance criteria:
  - Korisnik može kliknuti na gumb *products* sa navigacijske trake koja ga vodi na stranicu s artiklima
  - Korisnik može pregledati sve proizvode
  - Klikom na proizvod, korisnik može otvoriti novu stranicu za pojedini proizvod s više informacija

- S2-2 
  Kao Korisnik(korisnik koji je prjavljen) mogu kliknuti na gumb *Add to cart* i vidjeti sadržaj košarice

  Acceptance criteria:
  - Korisnik može kliknuti na gumb i dodati proizvod u košaricu
  - Korisnik može vidjeti proizvode dodane u košaricu te njihovu cijenu
  - Korisnik ima pristup košarici klikom na link *cart* u navigacijskoj traci

- S2-3
  Kao korisnik mogu manipulirati artiklima u košarici

  Acceptance criteria: 
  - Korisnik može uklanjati pojedine artikle iz košarice
  - Korisnik može ukloniti sve artikle iz košarice klikom na gumb *clear cart*
  - Korisnik može vidjeti ukupnu cijenu i cijenu pojedinih artikala u košarici

- S2-4 
  Kao korisnik mogu obavati kupnju proizvoda dodanih u košaricu

  Acceptance criteria:
  - Korisnik može vidjeti sve artikle u košarici te ih i dalje može ukloniti
  - Korisnik na stranici *cart* ne može dodavati artikle u košaricu
  - Korisnik klikom na gumb *Checkout* obavlja kupovinu, ako je prije toga dodao proizvode u košaricu te se redirecta na praznu košaricu

- S2-5 
  Kao korisnik vidim prikaz da je kupnja izvršena

  Acceptance criteria:
  - Korisnik je nakon klika na gumb *Checkout* redirectan na stranicu *cart* koja je prazna što označava uspješnu kupovinu

- S2-6 
  Kao Korisnik vidim da sam prijavljen/a i mogu se odjaviti

  Acceptance criteria:
  - Korisnik sve dok je prijavljen u navigacijskoj se traci odmah ispod *about* vidi ispis Hello_imeKorisnika prema imenu kojim je registriran
  - Korisnik klikom na gumb *Log out* (navigacijska traka) u bilo kojem trenutku se može odjaviti iz aplikacije i od tada se smatra Gostom i ima njegove mogućnosti sve dok se opet ne prijavi te je redirectan na HOMEPAGE
<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Assuming you have at least one user in the database

        Media::create([
            'user_id' => $user->id,
            'title' => 'Атака титанів 1 сезон',
            'origin_title' => 'Shingeki no Kyojin',
            'year' => 2013,
            'country' => 'Японія',
            'description' => "Століття тому, на Землі сталося те, чого найбільше боялося людство. Нізвідки з'явилися гіганти, вони мали великий зріст, але були бездумними. Величезних істот нарекли титанами. Вони трощили все, що траплялося на їхньому шляху, а на сніданок харчувалися людьми, які відчайдушно захищалися, вступаючи з ними в протистояння. Але всі спроби подолати людожерів виявилися марними. Титанів не могла знищити жодна високотехнологічна зброя XIX століття і ті, кому вдалося дивом вижити, вирішили звести три величезні стіни. Будівлі вийшли високоміцні та мали колосальну висоту. Монстри не могли пробитися крізь каміння та перелізти через огорожі. Незабаром люди заспокоїлися і почали вести мирне існування. Заради безпеки, населенням було створено спеціальний Легіон Розвідки, до якого відбиралися лише найкращі війни. Але солдати цілими днями лише байдикували і грали в кості, навіть не думаючи про битви, поки в їхніх лавах не з'явився Ерен Єгер — син вченого, який зробив для міста чимало добрих справ. Хлопець не розумів, чому захисники сидять без діла, і не хочуть розчищати території від монстрів, щоб назавжди покінчити із ув'язненням, яке робить їх схожими на худобу.",
            'season' => 1,
            'series' => 25,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Атака титанів 2 сезон',
            'origin_title' => 'Shingeki no Kyojin',
            'year' => 2017,
            'country' => 'Японія',
            'description' => "Дивитися онлайн рекомендується всім, кому не терпиться дізнатися, чим продовжиться протистояння людей і титанів. Щоб зрозуміти, хто з них мисливець, а хто жертва, був створений особливий корпус розвідки, який очолював Ервін Сміт — розумна, розважлива людина, яка мислить здорово і шанована в місті. Він з дитинства виховувався у канонах справедливості і був при цьому неймовірно добрим малим. Проте, ці суперечності у його характері стосувалися абсолютно всього. Сміт дбав про своїх солдатів, але був готовий будь-якої миті пожертвувати ними заради майбутнього всього людства. Він мислив глобально і правильно розставляв пріоритети, що й робило його жорстким і водночас рішучим воєначальником. Але останні події, що відбулися за участю кадетів зі 104-го корпусу, поставили його, у скрутне становище. Напавши на таємничий слід, Ервін націлився з'ясувати, звідки насправді взялися гіганти і дізнатися, чи залишилися на Землі люди, здатні перетворюватися на титанів? А поки командир вирішував непосильні для його розуміння завдання, головний герой Ерен — імпульсивний і вельми зарозумілий хлопчина, який з власної ініціативи вступив до лав Легіону Розвідки, продовжував боротися з монстрами, сподіваючись відвоювати для свого народу можливість без страху жити на Землі.",
            'season' => 2,
            'series' => 12,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Атака титанів 3 сезон',
            'origin_title' => 'Shingeki no Kyojin',
            'year' => 2018,
            'country' => 'Японія',
            'description' => "З того часу, як людство мало не зникло з лиця Землі з вини титанів — величезних, людиноподібних істот, які не мали розуму, і вбивали людей, заради задоволення, минуло чимало сотень років. Але, невеликому відсотку щасливчиків все ж таки вдалося вижити, завдяки високим стінам, які оточили невелике містечко і постійно латалися від нападок гігантів, але, як і раніше, були міцні та захищали расу від вимирання. Але, головний герой Ерен - син відомого вченого, не дарма припускав, що настане день і моторошні монстри прорвуться крізь огорожу. Якось, за стіною і справді з'явився супертитан, який прорвав міцну споруду. Не бажаючи жити у споконвічному страху, як худоба за огорожею, хлопець вирішив вступити в загін Легіону Розвідки, і зібрати нову армію, здатну об'єднатися та знищити моторошних титанів. Повернувшись із важливої ​​місії, Ерен зіткнувся з черговою загрозою в межах рідного міста – найвищим урядом. Після того, як пастора Ніка вбили, атмосфера загострилася. У цей час бравий командир Ервін Сміт уже готував план по поваленню старих правителів і навіть відшукав для трона нову королеву, в особі Крісти — випускника зі 104-го корпусу, що має добрий характер.",
            'season' => 3,
            'series' => 22,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Атака титанів 4 сезон',
            'origin_title' => 'Shingeki no Kyojin',
            'year' => 2022,
            'country' => 'Японія',
            'description' => "Через чотири роки, після того, як безстрашні учасники розвідувального корпусу нарешті досягли берегів моря, людство дізналося, що протягом століть вело протистояння не лише з кровожерливими титанами, а й з людьми з протиборчої нації. Ця інформація зберігалася у записах Гриші Єгера — рідного батька Ерена та прийомного для його сестри Мікаси. У цей час за морем Марлія закінчила тривалу війну з багатотисячною армією Середньосхідного Альянсу. Нація, яка колись об'єднувала сили на полі бою з монстрами, почала поступово втрачати першість. Щоб зберегти лідерство, їх правитель задумав знайти могутність Титана-засновника, який був наймогутнішим, з дев'яти основоположників. Він контролював інших гігантів, але знайти його силу, було не простим завданням. Він перебував на острові Парадіз, в руках головного героя Ерена Єгера — колись забіячного хлопця, що перетворився на відважного юнака,який проте приносить чимало головного болю прийомній сестрі Мікасі. Незабаром йому разом з Райнером Брауном треба було повернутися в рідні краї після провальної операції із захоплення, і знову зіткнутися зі старими товаришами, а потім і з новими небезпеками.",
            'season' => 4,
            'series' => 30,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Цей прекрасний світ, благословенний Богом! 1 сезон',
            'origin_title' => 'KONOSUBA God\'s blessing on this wonderful world!! この素晴らしい世界に祝福を！',
            'year' => 2016,
            'country' => 'Японія',
            'description' => "Смерть Кадзуми Сато стала для героя кінцем всього. Він прийшов до тями десь між світами, тут же зустрів богиню Акву, яка звернулася до нього з дуже привабливою пропозицією. Сато не в змозі відмовитися від можливості вирушити у світ, схожий на його улюблену онлайн-гру, адже були й перспективи переродитися в якусь комашку. Рішення прийняте: тепер головний герой повинен звикнути до нових реалій виживання у світі з мобами, нпс і вселенським злом у вигляді Темного Князя, якого необхідно перемогти, щоб залишитися назавжди в цьому прекрасному світі! На шляху Кадзума зустріне чимало цікавих особистостей: дехто стане друзями, а хтось продасть добрий шмот, викупивши при цьому накопичений лут. Ось такий чудовий світ!",
            'season' => 1,
            'series' => 11,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Цей прекрасний світ, благословенний Богом! 2 сезон',
            'origin_title' => 'KONOSUBA God\'s blessing on this wonderful world!! この素晴らしい世界に祝福を！',
            'year' => 2017,
            'country' => 'Японія',
            'description' => "Продовження історії про максималістів, які навіть у провальній ситуації обирають тріумф. Кадзума Сато нещодавно закінчив пригоду на рідній землі і вирушив у велику подорож паралельними реальностями. Головний герой прийшов до тями в іншому вимірі, де зіткнувся з богинею Аквою. Кадзума отримав шанс виконати мрію всього життя: будучи великим гравцем у комп'ютерні ігри на землі, він нарешті може опинитися в реаліях улюбленого ММО! Ось вже справді чудова пропозиція, адже до цього головний персонаж тільки те й робив, що замислювався про переродження у вигляді мухи чи жука. Щоправда, щоб досягти успіху в новому світі, головному герою належить кинути виклик самому Князю Темряви, що, звичайно ж, справа не з простих. Однак схему Сато знає чудово: кач і тільки кач! А що ще потрібно, щоб стати сильнішим і зрештою здобути таку важливу та довгоочікувану перемогу. Юний герой взяв із собою в інший світ Акву, щоб та допомагала з усіма труднощами. Як виявилося, це цілком легально, а самій богині не варто було викаблучуватися, щоб не потрапити в такий інцидент. У результаті дійовим особам доводиться виконувати квести, гуляти величезним відкритим світом, насолоджуватися краєвидами, а також намагатися зрозуміти, хто ким є в цій фентезійній реальності. Кадзума Сато обрав шлях злодія-розбійника, коли його союзниця стала кимось на зразок цілительки. У такій паті можна і на найскладніші данжі рукою махнути! Щоправда, підкачатися доведеться у будь-якому разі, адже попереду чекає зустріч із головним ворогом!",
            'season' => 2,
            'series' => 11,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Цей прекрасний світ, благословенний Богом! 3 сезон',
            'origin_title' => 'KONOSUBA God\'s blessing on this wonderful world!! この素晴らしい世界に祝福を！',
            'year' => 2024,
            'country' => 'Японія',
            'description' => "Кадзума Сато – типовий самітник, який вирішив, що жити в нашому світі – найнудніша і вкрай марна трата часу та сил. Головний персонаж прийняв рішення закінчити муки. У результаті він приходить до тями через деякий час у просторі між реальностями, де стикається з Аквою, дуже хитрою і самозакоханою богинею. Та пропонує йому дещо, від чого вкрай непросто відмовитись. Герой зможе стати частиною приголомшливого ігрового світу, де йому випаде честь боротися з темними силами і зрештою здолати божевільного Князя Темряви! Все це просто затуманює голову герою, через що той вирішує пуститися в пригоди. Аква дозволяє юнакові взяти з собою одну річ у потойбічний світ чаклунства. Герой не довго думаючи бере із собою саму богиню, яка навіть не підозрювала, що так можна. Начальство стверджує подібне рішення, через що Аква, незважаючи на всю свою впевненість і єхидність, опиняється у ролі компаньйона головного персонажа. Кадзука розпочинає свою подорож, обираючи шлях веселого злодія, а не відважного лицаря. Всі ці круті високоморальні вчинки лицарів не для нього, через що і пригода дійових осіб перетворюється на щось неймовірне та захоплююче.",
            'season' => 3,
            'series' => 11,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Магічна битва 1 сезон',
            'origin_title' => 'Jujutsu Kaisen',
            'year' => 2020,
            'country' => 'Японія',
            'description' => "Ітадорі Юуджі ніколи не вважав, що чимось особливо відрізняється від своїх однолітків. Здібний до всіх видів спорту, він, утім, рішуче відмовляється вступати до будь-яких шкільних клубів, що відбирали б забагато часу: зрештою, йому в першу чергу треба дбати про свого хворого дідуся. Та одного дня все його нормальне, звичне життя різко котиться під три чорти. Невинна окультна забавка перетворюється на смертельно небезпечний квиток в один кінець: намагаючись урятувати своїх друзів, Юуджі, не подумавши як слід, ковтає проклятий предмет вищого рангу та стає живим вмістилищем Короля проклять — Дволикого Сукуни. А потім на тобі — вирок: 'тебе мають стратити'. Так розпочинається його нове життя у світі, сповненому магії та проклять: магічна школа, вірні друзі й дивакуваті вчителі, та, на додачу, смертельно небезпечні вороги... Тепер попереду на Ітадорі чекає довгий шлях...",
            'season' => 1,
            'series' => 24,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Магічна битва 2 сезон',
            'origin_title' => 'Jujutsu Kaisen',
            'year' => 2023,
            'country' => 'Японія',
            'description' => "Другий сезон \"Магічної битви\" охоплює події арок \"Іскра Божа\", \"Згаслий пломінь\" й \"Шібуйський інцидент\". Спочатку історія перенесе глядачів на 12 років назад, у часи буремної юності \"Найсильнішого\". От тільки неймовірний талант і високий титул ще не гарантують, що життя здаватиметься медом: як і будь-який підліток, Ґоджьо стикатиметься з непростими викликами, учитиметься розділяти емоції та обов'язки, боротиметься з власним гонором і шукатиме відповідь на найголовніше запитання: \"Ти найсильніший, бо ти Ґоджьо Сатору? Чи ти Ґоджьо Сатору, бо ти найсильніший?\". Шлях мага ніколи не буває простим, і учням Токійської магічної школи відомо про це, як нікому іншому. Ти або зламаєшся, або станеш сильнішим, третього не дано. От тільки що робити, коли привиди минулого знову стукають у двері, а старі рани починають кровити з новою силою? І чи може секундна слабкість обернути на попіл цілий світ?",
            'season' => 2,
            'series' => 23,
            'image' => null,
            'watched' => true,
        ]);

        Media::create([
            'user_id' => $user->id,
            'title' => 'Сталевий алхімік',
            'origin_title' => '鋼の錬金術師, Hagane no Renkinjutsushi',
            'year' => 2003,
            'country' => 'Японія',
            'description' => "Алхімія - дуже давня наука, яка вивчає метаморфози матерії під впливом різних речовин. Головний закон алхімії свідчить: щоб отримати бажане, потрібно спочатку віддати щось важливе натомість. Альфонсу та Едварду Елрікам виповнилося лише по 11 років, коли вони зрозуміли, що все знають про алхімію, і з її допомогою зможуть воскресити свою матір. Але недосвідчені брати не змогли здійснити задумане, їхні ідеї зазнали краху. Хлопчики мали заплатити за свій експеримент важку ціну: Альфонс загинув, а його брат втратив ногу та руку. Ціною неймовірних зусиль Евардові вдалося врятувати душу брата і вживити її в стародавні обладунки. Брати їдуть із міста, яке принесло їм стільки нещасть. Вони намагаються повернути колишню подобу, а для цього їм потрібні нові знання. Брати хочуть знайти легендарний філософський камінь. Але, на жаль, не вони одні бажають виявити артефакт. Тепер братам знову доведеться побоюватися за своє життя.",
            'season' => 1,
            'series' => 51,
            'image' => null,
            'watched' => true,
        ]);

    }
}

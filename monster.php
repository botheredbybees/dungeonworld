<?php 
// $user = 'bn_silverstripe';
$user = 'root';
// $password = 'ff51f7cbb3';
$password = 'excalibur';
$db = new mysqli('localhost', $user, $password, 'dungeon_world');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$myXMLData = <<<XML
<?xml version='1.0' encoding='utf-8'?>
<monsters>
   <monster>
      <name>Ankheg</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Bite (d8+1 damage)</attack>
         <hp>10 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>A hide like plate armor and great crushing mandibles are problematic. A stomach full of acid that can burn a hole through a stone wall makes them all the worse. They’d be bad enough if they were proper insect-sized, but these things have the gall to be as long as any given horse. It’s just not natural! Good thing they tend to stick to one place? Easy for you to say—you don’t have an ankheg living under your corn field.</description>
      <instinct>To undermine</instinct>
      <moves>
         <move>Undermine the ground</move>
         <move>Burst from the earth</move>
         <move>Spray forth acid, eating away at metal and flesh</move>
      </moves>
   </monster>
   <monster>
      <name>Cave Rat</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Gnaw (d6 damage 1 piercing)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Flexible</qualities>
      <description>Who hasn’t seen a rat before? It’s like that, but nasty and big and not afraid of you anymore. Maybe this one was a cousin to that one you caught in a trap or the one you killed with a knife in that filthy tavern in Darrow. Maybe he’s looking for a little ratty revenge.</description>
      <instinct>To devour</instinct>
      <moves>
         <move>Swarm</move>
         <move>Rip something (or someone) apart</move>
      </moves>
   </monster>
   <monster>
      <name>Choker</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Choke (d10 damage)</attack>
         <hp>15 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Flexible</qualities>
      <description>Some say these things descended from the family of a cruel wizard who forced them to live out their lives underground. They say his experiments led him to fear the sun and ages passed while he descended into unlife, dragging his folk along with him. These things resemble men, in a way. Head, four limbs and all that. Only their skin is wet and rubbery and their arms long and fingers grasping. They hate all life that bears the stink of the sun’s touch, as one might expect. Jealousy, long-instilled, is hard to shake.</description>
      <instinct>To deny light</instinct>
      <moves>
         <move>Hold someone, wringing the breath from them</move>
         <move>Fling a held creature</move>
      </moves>
   </monster>
   <monster>
      <name>Cloaker</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Stealthy</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Constrict (d10 damage ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Looks like a cloak</qualities>
      <description>Don’t put on that cloak, Gareth. Don’t. You don’t know where it’s been. I tell you, it’s no good. See! It moved! I’m not mad, Gareth, it moved! Don’t do it! No! GARETH!</description>
      <instinct>To engulf</instinct>
      <moves>
         <move>Engulf the unsuspecting</move>
      </moves>
   </monster>
   <monster>
      <name>Dwarven Warrior</name>
      <tags>
         <tag>Horde</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Axe (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Made of stone</qualities>
      <description>For ages, men believed all dwarves were male and all were of this ilk: stoic and proud warriors. Axe-wielding and plate-wearing. Stout bearded battle-hungry dwarves who would push them, time and time again, back up out of their mines and tunnels with ferocity. It just goes to show how little men know about the elder races. These folk are merely a vanguard, and they bravely do their duty to protect the riches of the Dwarven realm. Earn their trust and you’ve an ally for life. Earn their ire and you’re not likely to regret it very long.</description>
      <instinct>To defend</instinct>
      <moves>
         <move>Drive them back</move>
         <move>Call up reinforcements</move>
      </moves>
   </monster>
   <monster>
      <name>Earth Elemental</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Smash (d10+5 damage)</attack>
         <hp>27 HP</hp>
         <armor>4 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Made of stone</qualities>
      <description>Our shaman says that all the things of the world have a spirit. Stones, trees, a stream. Now that I’ve seen the earth roil under my feet and fists of stone beat my friends half to death I’d like to believe that crazy old man. The one I saw was huge—big as a house! It came boiling up from a rockslide out of nowhere and had a voice like an avalanche. I pay my respects, now. Rightly so.</description>
      <instinct>To show the strength of earth</instinct>
      <moves>
         <move>Turn the ground into a weapon</move>
         <move>Meld into stone</move>
      </moves>
   </monster>
   <monster>
      <name>Fire Beetle</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Flames (d6 damage ignores armor)</attack>
         <hp>3 HP</hp>
         <armor>3 Armor</armor>
         <tag>Near</tag>
      </stats>
      <qualities>Full of flames</qualities>
      <description>! What a delightful creature—see how its carapace glitters in the light of our torches? Not too close now, they’re temperamental, you see. The fire in their belly isn’t just metaphorical, no. Watch as I goad the beast. Aha! A spout of flame! Unexpected, isn’t it? One of these creatures alone, if it comes up from below, can be a hellish nuisance to a farmstead or village. A whole swarm? There’s a reason they call it a conflagration of fire beetles.</description>
      <instinct>What a delightful creature—see how its carapace glitters in the light of our torches? Not too close now, they’re temperamental, you see. The fire in their belly isn’t just metaphorical, no. Watch as I goad the beast. Aha! A spout of flame! Unexpected, isn’t it? One of these creatures alone, if it comes up from below, can be a hellish nuisance to a farmstead or village. A whole swarm? There’s a reason they call it a conflagration of fire beetles.</instinct>
      <moves>
         <move>Undermine the ground</move>
         <move>Burst from the earth</move>
         <move>Spray forth flames</move>
      </moves>
   </monster>
   <monster>
      <name>Gargoyle</name>
      <tags>
         <tag>Horde</tag>
         <tag>Stealthy</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Claw (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>It’s a sad thing, really. Guardians bred by magi of the past with no more castles to guard. Their ancestors’ sacred task bred into their blood leads them to find a place—ruins mostly, but sometimes a cave or hill or mountain cliff—and guard it as though their masters yet lived below. They’re notoriously good at finding valuables buried below the earth, though. Find one of these winged reptiles and you’ll find yourself a treasure nearby. Just be careful, they’re hard to spot and tend to move in packs.</description>
      <instinct>To guard</instinct>
      <moves>
         <move>Attack with the element of surprise</move>
         <move>Take to the air</move>
         <move>Blend into stonework</move>
      </moves>
   </monster>
   <monster>
      <name>Gelatinous Cube</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Stealthy</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Engulf (d10+1 damage ignores armor)</attack>
         <hp>20 HP</hp>
         <armor>1 Armor</armor>
         <tag>Hand</tag>
      </stats>
      <qualities>Transparent</qualities>
      <description>How many adventurers’ last thoughts were “strange, this tunnel seems cleaner than most?” Too many, and all because of this transparent menace. A great acidic blob that expands to fill a small chamber or corridor and then slides, ever so slowly along, eating everything in its path. It cannot eat stone or metal and will often have them floating in its jelly mass. Blech.</description>
      <instinct>To clean</instinct>
      <moves>
         <move>Fill an apparently empty space</move>
         <move>Dissolve</move>
      </moves>
   </monster>
   <monster>
      <name>Goblin</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Spear (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Filth Fever</qualities>
      <description>Nobody seems to know where these things came from. Elves say they’re the dwarves’ fault—dredged up from a hidden place beneath the earth. Dwarves say they’re bad elvish children, taken away at birth and raised in the dark. The truth of the matter is that goblins have always been here and they’ll be here once all the civilized races have fallen and gone away. Goblins never die out. There’s just too damn many of them.</description>
      <instinct>To multiply</instinct>
      <moves>
         <move>Charge!</move>
         <move>Call more goblins</move>
         <move>Retreat and return with (many) more</move>
      </moves>
   </monster>
   <monster>
      <name>Goblin Orkaster</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Small</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Acid orb (d10+1 damage ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Filth Fever</qualities>
      <description>Oh lord, who taught them magic?</description>
      <instinct>To tap power beyond their stature</instinct>
      <moves>
         <move>Unleash a poorly understood spell</move>
         <move>Pour forth magical chaos</move>
         <move>Use other goblins for shields</move>
      </moves>
   </monster>
   <monster>
      <name>Goliath</name>
      <tags>
         <tag>Group</tag>
         <tag>Huge</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Mace (d8+7 damage)</attack>
         <hp>14 HP</hp>
         <armor>1 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Filth Fever</qualities>
      <description>They dwell beneath the earth because they do not belong above it any longer. An undying race of mighty titans fled the plains and mountains in ages past—driven out by men and their heroes. Left to bide their time in the dark, hate and anger warmed by the pools of lava deep below. It’s said that an earthquake is a goliath’s birthing cry. Someday they’ll take back what’s theirs.</description>
      <instinct>To retake</instinct>
      <moves>
         <move>Shake the earth</move>
         <move>Retreat, only to come back stronger</move>
      </moves>
   </monster>
   <monster>
      <name>Otyugh</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Tentacles (d10+3 damage)</attack>
         <hp>20 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Filth Fever</qualities>
      <description>The mating call of the otyugh is a horrible, blaring cry that sounds like a cross between an elephant dying and an over-eager vulture. The otyugh spends much of its time partly submerged in filthy water and prefers eating garbage over any other food. As a result, it often grows fat and strong on the offal of orcs, goblins and other cave-dwelling sub-humans. Get too close, however, and you’ll have one of its barbed tentacles dragging you into that soggy, razor-toothed maw. If you get away with your life, best get to a doctor, or your victory may be short lived.</description>
      <instinct>To befoul</instinct>
      <moves>
         <move>Infect someone with filth fever</move>
         <move>Fling someone or something</move>
      </moves>
   </monster>
   <monster>
      <name>Maggot-Squid</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Chew (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Amphibious, Paralyzing Tentacles</qualities>
      <description>The gods that made this thing were playing some sick joke on the civilized folk of the world. The maggot-squid wields a face full of horrible squirming tentacles that, if they touch you, feel like being struck by lightning. They’ll paralyze you and chew you up slowly while you’re helpless. Best to not let it get to that.</description>
      <instinct>To eat</instinct>
      <moves>
         <move>Paralyze with a touch</move>
      </moves>
   </monster>
   <monster>
      <name>Purple Worm</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Bite (d10+5 damage)</attack>
         <hp>20 HP</hp>
         <armor>2 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>Iä! Iä! The Purple Worm! Blessed is its holy slime! We walk, unworthy, in its miles of massive tunnels. We are but shadows under its violet and all-consuming glory. Mere acolytes, we who hope someday to return to the great embrace of its tooth-ringed maw. Let it consume us! Let it eat our homes and villages so that we might be taken! Iä! Iä! The Purple Worm!</description>
      <instinct>To consume</instinct>
      <moves>
         <move>Swallow whole</move>
         <move>Tunnel through stone and earth</move>
      </moves>
   </monster>
   <monster>
      <name>Roper</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Bite (d10+1 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Rock-like Flesh</qualities>
      <description>Evolutionary happenstance has created a clever underground predator. Disguised as a rocky formation—most often a stalactite or stalagmite—the roper waits for its prey to wander by. When it does, whether it’s a rat, a goblin or a foolhardy adventurer, a mass of thin, whipping tentacles erupts from the thing’s hide. A hundred lashes in the blink of an eye and the stunned prey is being dragged into the roper’s mouth. Surprisingly effective for a thing that looks like a rock.</description>
      <instinct>To ambush</instinct>
      <moves>
         <move>Ensnare the unsuspecting</move>
         <move>Disarm a foe</move>
         <move>Chew on someone</move>
      </moves>
   </monster>
   <monster>
      <name>Rot Grub</name>
      <tags>
         <tag>Horde</tag>
         <tag>Tiny</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Burrow (d6-2 damage)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Hand</tag>
      </stats>
      <qualities>Burrow into flesh</qualities>
      <description>They live in your skin. Or your organ meat. Or your eyeballs. They grow there and then, in a bloody and horrific display, burrow their way out. Disgusting.</description>
      <instinct>To infect</instinct>
      <moves>
         <move>Burrow under flesh</move>
         <move>Lay eggs</move>
         <move>Burst forth from an infected creature</move>
      </moves>
   </monster>
   <monster>
      <name>Spiderlord</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Devious</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Mandibles (d8+4 damage)</attack>
         <hp>16 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>Even spiders have their gods, whispered to in webs with little praying arms.</description>
      <instinct>To weave webs (literal and metaphorical)</instinct>
      <moves>
         <move>Enmesh in webbing</move>
         <move>Put a plot into motion</move>
      </moves>
   </monster>
   <monster>
      <name>Troglodyte</name>
      <tags>
         <tag>Group</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Cavern Dwellers</setting>
      <stats>
         <attack>Club (d8 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>Long-forgotten, our last remaining ancestors dwell in caves in the wild parts of the world. Driven away by our cities and villages, our iron swords and our fire, these ape-men eat their meat raw with sharp-nailed hands and jagged teeth. They strike out at frontier villages wielding clubs and in overwhelming numbers to seize cattle, tools, and poor prisoners to drag into the hills. Known for their viciousness and their stink, they’re an old and dying race we’d all sooner forget existed.</description>
      <instinct>To prey on civilization</instinct>
      <moves>
         <move>Raid and retreat</move>
         <move>Use scavenged weapons or magic</move>
      </moves>
   </monster>
   <monster>
      <name>Aboleth</name>
      <tags>
         <tag>Group</tag>
         <tag>Huge</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Tentacle (d10+3 damage)</attack>
         <hp>18 HP</hp>
         <armor>0 Armor</armor>
         <tag>Reach</tag>
      </stats>
      <qualities>Telepathy</qualities>
      <description>Deep below the surface of the world, in freshwater seas untouched by the sun, dwell the aboleth. Fish the size of whales, with strange growths of gelatinous feelers used to probe the lightless shores. They’re served by slaves: blind albino victims of any race unfortunate enough to stumble on them, drained of thought and life by the powers of the aboleth’s alien mind. In the depths they plot against each other, fishy cultists building and digging upward towards the surface until someday, they’ll breach it. For now, they sleep and dream and guide their pallid minions to do their bidding.</description>
      <instinct>To command</instinct>
      <moves>
         <move>Invade a mind</move>
         <move>Turn minions on them</move>
         <move>Put a plan in motion</move>
      </moves>
   </monster>
   <monster>
      <name>Apocalypse Dragon</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Magical</tag>
         <tag>Divine</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Bite (b[2d12]+9 damage, 4 piercing)</attack>
         <hp>26 HP</hp>
         <armor>5 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Inch-thick metal hide, Supernatural knowledge, Wings</qualities>
      <description>The end of all things shall be a burning—of tree and earth and of the air itself. It shall come upon the plains and mountains not from beyond this world but from within it. Birthed from the womb of deepest earth shall come the Dragon that Will End the World. In its passing all will become ash and bile and the Dungeon World a dying thing will drift through planar space devoid of life. They say to worship the Apocalypse Dragon is to invite madness. They say to love it is to know oblivion. The awakening is coming.</description>
      <instinct>To end the world</instinct>
      <moves>
         <move>Set a disaster in motion</move>
         <move>Breathe forth the elements</move>
         <move>Act with perfect foresight</move>
      </moves>
   </monster>
   <monster>
      <name>Chaos Spawn</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Chaotic touch (d10 damage)</attack>
         <hp>19 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Chaos form</qualities>
      <description>Driven from the city, a cultist finds sanctuary in towns and villages. Discovered there, he flees to the hills and scratches his devotion on the cave walls. Found out again, he is chased with knife and torch into the depths, crawling deeper and deeper until, in the deepest places, he loses his way. First, he forgets his name. Then he forgets his shape. His chaos gods, most beloved, bless him with a new one.</description>
      <instinct>To undermine the established order</instinct>
      <moves>
         <move>Rewrite reality</move>
         <move>Unleash chaos from containment</move>
      </moves>
   </monster>
   <monster>
      <name>Chuul</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Cautious</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Claws (d8+1 damage, 3 piercing)</attack>
         <hp>10 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Amphibious</qualities>
      <description>Your worst seafood nightmare come to life. A vicious sort of half-man half-crawdad, cursed with primal intelligence and blessed with a pair of razor-sharp claws. Strange things lurk in the stinking pools in caverns best forgotten and the chuul is one of them. If you spot one, your best hope is a heavy mace to crack its shell and maybe a little garlic butter. Mmmm.</description>
      <instinct>To split</instinct>
      <moves>
         <move>Split something in two with mighty claws</move>
         <move>Retreat into water</move>
      </moves>
   </monster>
   <monster>
      <name>Deep Elf Assassin</name>
      <tags>
         <tag>Group</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>oisoned blade (d8 damage, 1 piercing)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Divine connection</qualities>
      <description>It was not so simple a thing as a war over religion or territory. No disagreement of queens led to the great sundering of the elves. It was sadness. It was the very diminishing of the world by the lesser races. The glory of all the elves had built was cracking and turning to glass. Some, then, chose to separate themselves from the world; wracked with tears they turned their backs on men and dwarves. There were others, though, that were overcome with something new. A feeling no elf had felt before. Spite. Hatred filled these elves and twisted them and they turned on their weaker cousins. Some still remain after the great exodus below. Some hide amongst us with spider-poisoned blades, meting out that strangest of punishments: elven vengeance.</description>
      <instinct>To spite the surface races</instinct>
      <moves>
         <move>Poison them</move>
         <move>Unleash an ancient spell</move>
         <move>Call reinforcements</move>
      </moves>
   </monster>
   <monster>
      <name>Deep Elf Swordmaster</name>
      <tags>
         <tag>Group</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Barbed blade (b[2d8]+2 damage, 1 piercing)</attack>
         <hp>6 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Divine connection</qualities>
      <description>The deep elves lost the sweetness and gentle peace of their bright cousins ages ago, but they did not abandon grace. They move with a swiftness and beauty that would bring a tear to any warrior’s eye. In the dark, they’ve practiced. A cruelty has infested their swordsmanship—a wickedness comes to the fore. Barbed blades and whips replace the shining pennant-spears of elven battles on the surface. The swordmasters of the deep elf clans do not merely seek to kill, but to punish with every stroke of their blades. Wickedness and pain are their currency.</description>
      <instinct>To punish unbelievers</instinct>
      <moves>
         <move>Inflict pain beyond measure</move>
         <move>Use the dark to advantage</move>
      </moves>
   </monster>
   <monster>
      <name>Deep Elf Priest</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Divine</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Smite (d10+2 damage)</attack>
         <hp>14 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Divine connection</qualities>
      <description>The spirits of the trees and the lady sunlight are far, far from home in the depths where the deep elves dwell. New gods were found there, waiting for their children to come home. Gods of the spiders, the fungal forests, and things that whisper in the forbidden caves. The deep elves, ever attuned to the world around them, listened with hateful intent to their new gods and found a new source of power. Hate calls to hate and grim alliances were made. Even among these spiteful ranks, piety finds a way to express itself.</description>
      <instinct>To pass on divine vengeance</instinct>
      <moves>
         <move>Weave spells of hatred and malice</move>
         <move>Rally the deep elves</move>
         <move>Pass on divine knowledge</move>
      </moves>
   </monster>
   <monster>
      <name>Dragon</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Terrifying</tag>
         <tag>Cautious</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Bite (b[2d12]+5 damage, 4 piercing)</attack>
         <hp>16 HP</hp>
         <armor>5 Armor</armor>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Elemental blood, Wings</qualities>
      <description>They are the greatest and most terrible things this world will ever have to offer.</description>
      <instinct>To rule</instinct>
      <moves>
         <move>Bend an element to its will</move>
         <move>Demand tribute</move>
         <move>Act with disdain</move>
      </moves>
   </monster>
   <monster>
      <name>Gray Render</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Rending claws (d10+3 damage, 3 piercing)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Fiery blood</qualities>
      <description>On its own, the render is a force of utter destruction. Huge and leathery, with a maw of unbreakable teeth and claws to match, the render seems to enjoy little more than tearing things apart. Stone, flesh, or steel, it matters little. However, the gray render is so rarely found alone. They bond with other creatures. Some at birth, others as fully-grown creatures, and a gray render will follow their bonded master wherever they go, bringing them offerings of meat and protecting them while they sleep. Finding an un-bonded render means certain riches, if you survive to sell it.</description>
      <instinct>To serve</instinct>
      <moves>
         <move>Tear something apart</move>
      </moves>
   </monster>
   <monster>
      <name>Magmin</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Flaming hammer (d6+2 damage)</attack>
         <hp>7 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Fiery blood</qualities>
      <description>Dwarf-shaped and industrious, the magmin are among the deepest-dwellers of Dungeon World. Found in cities of brass and obsidian built nearest the molten core of the planet, the magmin live a life devoted to craft—especially that of fire and magical items related to it. Surly and strange, they do not often deign to speak to petitioners who appear at their gates, even those who have somehow found a way to survive the hellish heat. Even so, they respect little more than a finely made item and to learn to forge from a magmin craftsman means unlocking secrets unknown to surface blacksmiths. Like so much else, visiting the magmin is a game of risk and reward.</description>
      <instinct>To craft</instinct>
      <moves>
         <move>Offer a trade or deal</move>
         <move>Strike with fire or magic</move>
         <move>Provide just the right item, at a price</move>
      </moves>
   </monster>
   <monster>
      <name>Minotaur</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Axe (d10+1 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Unerring sense of direction</qualities>
      <description>“Head of a man, body of a bull. No, wait, I’ve got that backwards. It’s the bull’s head and the man’s body. Hooves sometimes? Is that right? I remember the old king said something about a maze? Blast! You know I can’t think under this kind of pressure. What was that? Oh gods, I think it’s coming…”</description>
      <instinct>To contain</instinct>
      <moves>
         <move>Confuse them</move>
         <move>Make them lost</move>
      </moves>
   </monster>
   <monster>
      <name>Naga</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
         <tag>Hoarder</tag>
         <tag>Magical</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Bite (d10 damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>Ambitious and territorial above nearly all else, the naga are very rarely found without a well-formed and insidious cult of followers. You’ll see it in many mountain towns—a snake sigil scrawled on a tavern wall or a local church burned to the ground. People going missing in the mines. Men and women wearing the mark of the serpent. At the core of it all lies a naga: an old race now fallen into obscurity, still preening with the head of a man over its coiled, serpent body. Variations of these creatures exist depending on their bloodline and original purpose, but they are all master manipulators and magical forces to be reckoned with.</description>
      <instinct>To lead</instinct>
      <moves>
         <move>Send a follower to their death</move>
         <move>Use old magic</move>
         <move>Offer a deal or bargain</move>
      </moves>
   </monster>
   <monster>
      <name>Salamander</name>
      <tags>
         <tag>Horde</tag>
         <tag>Large</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Lower Depths</setting>
      <stats>
         <attack>Flaming spear (b[2d6]+3 damage)</attack>
         <hp>7 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Near</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>“The excavation uncovered what the reports called a basalt gate. Black stone carved with molten runes. When they dug it up, the magi declared it inert but further evidence indicates that was an incorrect claim. The entire team went missing. When we arrived, the gate was glowing. Its light filled the whole cavern. We could see from the entrance that the area had become full of these creatures—like men with red and orange skin, tall as an ogre but with a snake’s tail where their legs ought to be. They were clothed, too—some had black glass armor. They spoke to each other in a tongue that sounded like grease in a fire. I wanted to leave but the sergeant wouldn’t listen. You’ve already read what happened next, sir. I know I’m the only one that got back, but what I said is true. The gate is open, now. This is just the beginning!”</description>
      <instinct>To consume in flame</instinct>
      <moves>
         <move>Summon elemental fire</move>
         <move>Melt away deception</move>
      </moves>
   </monster>
   <monster>
      <name>Bulette</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Bite (d10+5 damage, 3 piercing)</attack>
         <hp>20 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>A seasoned caravan guard learns to listen for the calls of a scout or sentry with a keen ear. A few extra seconds after the alarm is raised can mean life or death. Different cries mean different responses, too—a call of “orcs!” means draw your sword and steady for blood but a call of “bandits!” says you might be able to bargain. One alarm from the scouts that always, always means it’s time to pack up, whip your horse and run for the hills? “LAND SHARK!”</description>
      <instinct>To devour</instinct>
      <moves>
         <move>Drag prey into rough tunnels</move>
         <move>Burst from the earth</move>
         <move>Swallow whole</move>
      </moves>
   </monster>
   <monster>
      <name>Chimera</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Bite (d10+1 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Reach</tag>
      </stats>
      <qualities>Telepathy</qualities>
      <description>Well-known and categorized, the chimera is a perfected creature. From the codices of the Mage’s Guild to the famous pages of Cullaina’s Creature Compendium, there’s no confusion about what chimera means. Two parts lioness, one part serpent, head of a she-goat, and all the vicious magic one can muster. The actual ritual might vary, as might a detail or two—more creative sorcerers switch the flame breath for acid, perhaps. Used as a guardian, an assassin or merely an instrument of chaos unchained, it matters little. The chimera is the worst sort of abomination: an intentional affront to all natural life.</description>
      <instinct>To do as commanded</instinct>
      <moves>
         <move>Belch forth flame</move>
         <move>Run them over</move>
         <move>Poison them</move>
      </moves>
   </monster>
   <monster>
      <name>Derro</name>
      <tags>
         <tag>Horde</tag>
         <tag>Devious</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>ickaxe (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Telepathy</qualities>
      <description>It’s typical to think that all the malignant arcane monsters made in this world are birthed by wizards, sorcerers, and their ilk. That the colleges and towers of Dungeon World are womb to every bleak experiment. There are mistakes made in the depths of the earth, too. These ones, the derro, are the mistakes of a long-forgotten dwarven alchemist. The derro don’t forget, though. Twisted and hateful, the derro can be spotted by their swollen skulls, brain-matter grown too large. They do not speak except in thoughts to one another and plot in the silent dark to extract sweetest revenge—that of the created on the creator.</description>
      <instinct>To replace dwarves</instinct>
      <moves>
         <move>Fill a mind with foreign thoughts</move>
         <move>Take control of a beast’s mind</move>
      </moves>
   </monster>
   <monster>
      <name>Digester</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Acid (d10+1 damage ignores armor)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Digest acid secretion</qualities>
      <description>It’s okay, magical experimentation is a messy science. For every beautiful pegasus there’s a half-done creature that wasn’t quite right. We understand. The goblin-elephant you thought was such a great idea. The Gelatinous Drake. Just examples. No judgement here. Anyway, we’ve got something for that. We call it the Digester. Yes, just like it sounds. Strange looking, I know, and the smell isn’t the best, but this thing—it’ll eat magic like Svenloff the Stout drinks ale. Next time one of these unfortunate accidents occurs, just point the Digester at it and all your troubles drain away. Just keep an eye on it. Damn thing ate my wand last week.</description>
      <instinct>To digest</instinct>
      <moves>
         <move>Eat away at something</move>
         <move>Draw sustenance</move>
      </moves>
   </monster>
   <monster>
      <name>Ethereal Filcher</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Stolen dagger (w[2d8] damage)</attack>
         <hp>12 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>Things go missing. A sock, a silver spoon, your dead mother’s bones. We blame the maid, or bad luck, or just a moment of stupid forgetfulness and we move on. We never get to see the real cause of these problems. The spidery thing with human hands and eyes as blue as the deep Ethereal plane from whence the creature comes. We never see the nest it makes of astral silver webbing and stolen objects arranged in some mad pattern. We never watch it assemble its collection of halfling finger-bones, stolen from the hands of the sleeping. We’re lucky, that way.</description>
      <instinct>To steal</instinct>
      <moves>
         <move>Take something important to its planar lair</move>
         <move>Retreat to the Ethereal plane</move>
         <move>Use an item from its lair</move>
      </moves>
   </monster>
   <monster>
      <name>Ettin</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Club (d10+3 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Two heads</qualities>
      <description>What could possibly be better than an idiotic angry hill giant? One with two heads. Fantastic idea, really. Grade A stuff.</description>
      <instinct>To smash</instinct>
      <moves>
         <move>Attack two enemies at once</move>
         <move>Defend its creator</move>
      </moves>
   </monster>
   <monster>
      <name>Girallon</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Rending hands (d10+5 damage)</attack>
         <hp>20 HP</hp>
         <armor>1 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Many arms</qualities>
      <description>The pounding of the jungle drums calls to it. The slab of meat on the sacrificial stone to lure in the great ape. Girallon, they call it—a name from the long-forgotten tongue of the kings who bred the beast. Taller than a building, some say. Cloaked in ivory fur with tusks as long as scimitars. Four arms? Six? The rumors are hard to verify. Every year it is the same: some explorer visits the jungle villages seeking the ape and returns, never quite the same, never with a trophy. The pounding of the drums goes on.</description>
      <instinct>To rule</instinct>
      <moves>
         <move>Answer the call of sacrifice</move>
         <move>Drive them from the jungle</move>
         <move>Throw someone</move>
      </moves>
   </monster>
   <monster>
      <name>Iron Golem</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Metal fists (d8+5 damage)</attack>
         <hp>10 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Metal</qualities>
      <description>A staple of the enchanter’s art. Every golemist and mechano-thaumaturge in the kingdoms knows this. Iron is a misnomer, though. These guardians are crafted of any metal, really: steel, copper, or even gold, in some small cases. As much an art as a science, the crafting of a fine golem is as respected in the Kingdoms as a bridge newly built or a castle erected in the mountains. Unceasing watchdog, stalwart defender, the iron golem lives to serve, following its orders eternally. Any enchanter worth his salt can craft one, if he can afford the materials. If not…</description>
      <instinct>To serve</instinct>
      <moves>
         <move>Follow orders implacably</move>
         <move>Use a special tool or adaptation, built-in</move>
      </moves>
   </monster>
   <monster>
      <name>Flesh Golem</name>
      <tags>
         <tag>Horde</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Miscellaneous Claws and Teeth (d6+2 damage)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Many body parts</qualities>
      <description>Stolen bits and pieces in the night. Graveyards stealthily uprooted and maybe tonight an arm, a leg, another head (the last one came apart too soon). Even the humblest hedge-enchanter can make do with what he can and, with a little creativity, well—it’s not only the college that can make life, hmm? We’ll show them.</description>
      <instinct>To live</instinct>
      <moves>
         <move>Follow orders</move>
         <move>Detach a body part</move>
      </moves>
   </monster>
   <monster>
      <name>Kraken</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Giant tentacles (d10+5 damage)</attack>
         <hp>20 HP</hp>
         <armor>2 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Aquatic</qualities>
      <description>”A cephalo-what? No, boy. Not “a kraken” but “the kraken.” I don’t know what nonsense they taught you at that school you say you’re from, but here, we know to respect the Hungerer. Right, that’s what we call it, The Hungerer in the Deep to be more proper. Ain’t no god, though we’ve got those, too. It’s a squid! A mighty squid with tentacles thicker ‘round than a barrel and eyes the size of the full moon. Smart, too, the Hungerer. Knows just when to strike—when you’re all too drunk or too tired or run out of clean water, that’s when he gets you. No, I ain’t ever seen him. I’m alive, aren’t I?”</description>
      <instinct>To rule the ocean</instinct>
      <moves>
         <move>Drag a person or ship to a watery grave</move>
         <move>Wrap them in tentacles</move>
      </moves>
   </monster>
   <monster>
      <name>Manticore</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Stinger (d10+1 damage, 1 piercing)</attack>
         <hp>16 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>If the chimera is the first step down a dark path, the manticore is a door that can’t be closed once it’s been opened. A lion, a scorpion, the wings of a drake. All difficult to obtain but not impossible and just animals, anyway. The last component, the hissing hateful face of the beast, is the ingredient that makes a manticore so cruel. Young or old, man or woman, it matters not but that they are human, living and breathing, married to the creature with twisted magic. All sense of who they are is lost, and maybe that’s a blessing, but the beast is born from human suffering. No wonder, then, that they’re all so eager to kill.</description>
      <instinct>To kill</instinct>
      <moves>
         <move>Poison them</move>
         <move>Rip something apart</move>
      </moves>
   </monster>
   <monster>
      <name>Owlbear</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Claws (d10 damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>Body of a bear. Feathers of an owl. Beak, claws, and excellent night vision. What’s not to love?</description>
      <instinct>To hunt</instinct>
      <moves>
         <move>Strike from darkness</move>
      </moves>
   </monster>
   <monster>
      <name>Pegasus</name>
      <tags>
         <tag>Group</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Sharp hooves (d8 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>Don’t go thinking that every creature not natural-born is a horrible abomination. Don’t imagine for a second that they’re all tentacles and screaming and blood or whatever. Take this noble beast, for example. Lovely thing, isn’t it? A fine white horse with the wings of a swan. Don’t look like it ought to be able to fly, but it does. The elves work miracles, in their own way. They breed true—that’s the purity of elf-magic at work. Hatching from little crystal eggs and bonded with their riders for life. There’s still some beauty in the world, mark my words.</description>
      <instinct>To carry aloft</instinct>
      <moves>
         <move>Carry a rider into the air</move>
         <move>Give their rider an advantage</move>
      </moves>
   </monster>
   <monster>
      <name>Rust Monster</name>
      <tags>
         <tag>Group</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Corrosive touch (d8 damage, ignores armor)</attack>
         <hp>6 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Corrosive touch</qualities>
      <description>A very distinctive-looking creature. Something like a reddish cricket, I think. Long crickety legs, anyhow. Blind, too, as I understand it—they feel their way around with those long moth-looking tendrils. Feed that way, too. Sift through piles of metal for the choicest bits. That’s what they eat, don’t matter the type, neither. Their merest touch turns it all to rusted flakes. Magic lasts longer but under the scrutiny of a rust monster, it’s a foregone conclusion. Only the gods know where they came from, but they’re a curse if you value your belongings.</description>
      <instinct>To decay</instinct>
      <moves>
         <move>Turn metal to rust</move>
         <move>Gain strength from consuming metal</move>
      </moves>
   </monster>
   <monster>
      <name>Xorn</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Twisted Experiments</setting>
      <stats>
         <attack>Maw (d10 damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Burrowing</qualities>
      <description>Dwarf-made elemental garbage muncher. Shaped like a trash bin with a radius of arms to feed excess rock and stone into its gaping maw. They eat stone and excrete light and heat. Perfect for operating a mine or digging out a quarry. Once one gets lost in the sewers below a city, though, or in the foundation of a castle? You’re in deep trouble. They’ll eat and eat until you’ve got nothing left but to collapse the place down on it and move somewhere else. Ask Burrin, Son of Fjornnvald, exile from his clan. I bet he could tell you a story about a xorn.</description>
      <instinct>To eat</instinct>
      <moves>
         <move>Consume stone</move>
         <move>Give off a burst of light and heat</move>
      </moves>
   </monster>
   <monster>
      <name>Acolyte</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Sword (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Endless enthusiasm</qualities>
      <description>“Can’t all be the High Priest, they said. Can’t all wield the White Spire, they said. Scrub the floor, they told me. The Cthonic Overgod don’t want a messy floor, do he? They said it’d be enlightenment and magic. Feh. It’s bruised knees and dishpan hands. If only I’d been a cleric, instead.”</description>
      <instinct>To serve dutifully</instinct>
      <moves>
         <move>Follow dogma</move>
         <move>Offer eternal reward for mortal deeds</move>
      </moves>
   </monster>
   <monster>
      <name>Adventurer</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Sword (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Endless enthusiasm</qualities>
      <description>“Scum of the earth, they are. A troupe of armored men and women come sauntering into town, brandishing what, for all intents and purposes, is enough magical and mundane power to level the whole place. Bringing with them bags and bags of loot, still dripping blood from whatever poor sod they had to kill to get it. An economical fiasco waiting to happen, if you ask me. The whole system becomes completely uprooted. Dangerous, unpredictable murder-hobos. Oh, wait, you’re an adventurer? I take it all back.”</description>
      <instinct>To adventure or die trying</instinct>
      <moves>
         <move>Go on a fool’s errand</move>
         <move>Act impulsively</move>
         <move>Share tales of past exploits</move>
      </moves>
   </monster>
   <monster>
      <name>Bandit</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Dirk (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>Desperation is the watchword of banditry. When times are tough, what else is there to do but scavenge a weapon and take up with a clan of nasty men and women? Highway robbery, poaching, scams and cons and murder most foul but we’ve all got to eat so who can blame them? Then again, there’s evil in the hearts of some and who’s to say that desperation isn’t a need to sate one’s baser lusts? Anyway—it’s this or starve, sometimes.</description>
      <instinct>To rob</instinct>
      <moves>
         <move>Steal something</move>
         <move>Demand tribute</move>
      </moves>
   </monster>
   <monster>
      <name>Bandit King</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Trusty knife (b[2d10] damage)</attack>
         <hp>12 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>Better to rule in hell than serve in heaven.</description>
      <instinct>To lead</instinct>
      <moves>
         <move>Make a demand</move>
         <move>Extort</move>
         <move>Topple power</move>
      </moves>
   </monster>
   <monster>
      <name>Fool</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Spear (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities/>
      <description>There’s not but one person in all the King’s court allowed to speak the truth. The real, straight-and-honest truth about anything. The fool couches it all in bells and prancing and chalky face-paint, but who else gets to tell the King what’s what? You can trust a fool, they say, especially when he’s made you red-faced and you’d just as soon drown him in a cesspit.</description>
      <instinct>To mock</instinct>
      <moves>
         <move>Expose injustice</move>
         <move>Play a trick</move>
      </moves>
   </monster>
   <monster>
      <name>Guardsman</name>
      <tags>
         <tag>Group</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Spear (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities/>
      <description>Noble protector or merely drunken lout, it often makes no difference to these sorts. Falling shy of a noble knight, the proud town guard is an ancient profession nonetheless. These folks of the constabulary often dress in the colors of their lord (when you can see it under the mud) and, depending on the richness of that lord, might even have a decent weapon and some armor that fits. Those are the lucky ones. Even so, someone has to be there to keep an eye on the gate when the Black Riders have been spotted in the woods. Too many of us owe our lives to these souls—remember that the next time one is drunkenly insulting your mother, hmm?</description>
      <instinct>To do as ordered</instinct>
      <moves>
         <move>Uphold the law</move>
         <move>Make a profit</move>
      </moves>
   </monster>
   <monster>
      <name>Halfling Thief</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Small</tag>
         <tag>Intelligent</tag>
         <tag>Stealthy</tag>
         <tag>Devious</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Dagger (w[2d8] damage)</attack>
         <hp>12 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>It would be foolish, now, to draw conclusions about folks just because they happen to be good at one thing or another. Then again, a spade’s a spade, isn’t it. Or maybe just the goodly, soft-and-sweet type of Halfling have the mind to stay in their grassy-hill homes and aren’t the type you find in the slums and taverns of the mannish world. Perhaps they’re there to cut your purse for calling them “halfling” in the first place. Not all take so kindly to the title. Or they’re playing a game, pretending to be a child in need of alms—and your arrogant eyes can’t even see the difference until too late. Well, it matters little. They’re gone with your coin before you even realize you deserved it.</description>
      <instinct>To live a life of stolen luxury</instinct>
      <moves>
         <move>Steal</move>
         <move>Put on the appearance of friendship</move>
      </moves>
   </monster>
   <monster>
      <name>Hedge Wizard</name>
      <tags>
         <tag>Magical</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Ragged bow (d6 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities/>
      <description>Not all those who wield the arcane arts are adventuring wizards. Nor necromancers in mausoleums or sorcerers of ancient bloodline. Some are just old men and women, smart enough to have discovered a trick or two. It might make them a bit batty to come by that knowledge, but if you’ve a curse to break or a love to prove, might be that a hedge wizard will help you, if you can find his rotten hut in the swamp and pay the price he asks.</description>
      <instinct>To learn</instinct>
      <moves>
         <move>Cast almost the right spell (for a price)</move>
         <move>Make deals beyond their ken</move>
      </moves>
   </monster>
   <monster>
      <name>High Priest</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Ragged bow (d6 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities/>
      <description>Respected by all who gaze upon them, the high priests and abbesses of Dungeon World are treated with a sort of reverence. Whether they pay homage to Ur-thuu-hak, God of Swords, or whisper quiet prayers to Namiah, precious daughter of peace, they know a thing or two that you and I won’t ever know. The gods speak to them as a hawker-of-wares might speak to us in the marketplace. For this, for the bearing-of-secrets and the knowing-of-things, we give them a wide berth as they pass in their shining robes.</description>
      <instinct>To lead</instinct>
      <moves>
         <move>Set down divine law</move>
         <move>Reveal divine secrets</move>
         <move>Commission divine undertakings</move>
      </moves>
   </monster>
   <monster>
      <name>Hunter</name>
      <tags>
         <tag>Group</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Ragged bow (d6 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities/>
      <description>The wilds are home to more than just beasts of horn and scale. There are men and women out there, too—those who smell blood on the wind and stalk the plains in the skins of their prey. Whether with a trusty longbow bought on a rare trip into the city or with a knife of bone and sinew, these folk have more in common with the things they track and eat than with their own kind. Solemn, somber and quiet, they find a sort of peace in the wild.</description>
      <instinct>To survive</instinct>
      <moves>
         <move>Bring back news from the wilds</move>
         <move>Slay a beast</move>
      </moves>
   </monster>
   <monster>
      <name>Knight</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
         <tag>Cautious</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Sword (b[2d10] damage)</attack>
         <hp>12 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>What youngster doesn’t cling to the rail at the mighty joust, blinded by the sun on their glittering armor, wishing they could be the one adorned in steel and riding to please the King and Queen? What peasant youth with naught but a loaf of bread and a lame sow doesn’t wish to trade it all in for the lance and the bright pennant? A knight is many things—a holy warrior, a sworn sword, a villain sometimes, too, but a knight cannot help but be a symbol to all who see her. A knight means something.</description>
      <instinct>To live by a code</instinct>
      <moves>
         <move>Make a moral stand</move>
         <move>Lead soldiers into battle</move>
      </moves>
   </monster>
   <monster>
      <name>Merchant</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Axe (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>“Ten foot poles. Get your ten foot poles, here. Torches, bright and hot. Mules, too—stubborn but immaculately bred. Need a linen sack, do you? Right over here! Come and get your ten foot poles!”</description>
      <instinct>To profit</instinct>
      <moves>
         <move>Propose a business venture</move>
         <move>Offer a “deal”</move>
      </moves>
   </monster>
   <monster>
      <name>Noble</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Axe (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>Are they granted their place by the gods, perhaps? Is that why they’re able to pass their riches and power down by birth? Some trick or enchantment of the blood, maybe. The peasant bends his knee and scrapes and toils and the noble wears the finery of his place and, they say, we all have our burdens to bear. Seems to me that some of us have burdens of stone and some carry their weight in gold. It’s a tough life.</description>
      <instinct>To rule</instinct>
      <moves>
         <move>Issue an order</move>
         <move>Offer a reward</move>
      </moves>
   </monster>
   <monster>
      <name>Peasant</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Axe (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>Covered in muck, downtrodden at the bottom of the great chain of being, we all stand on the backs of those who grow our food on their farms. Some peasants do better than others, but none will ever see a coin of gold in their day. They’ll dream at night of how someday, somehow, they’ll fight a dragon and save a princess. Don’t act like you weren’t one before you lost what little sense you had, adventurer.</description>
      <instinct>To get by</instinct>
      <moves>
         <move>Plead for help</move>
         <move>Offer a simple reward and gratitude</move>
      </moves>
   </monster>
   <monster>
      <name>Rebel</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Axe (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>In the countryside they’d be called outlaw and driven off or killed. The city, though, is full of places to hide. Damp basements to pore over maps and to plan and plot against a corrupt system. Like rats, they gnaw away at order, either to supplant it anew or just erode the whole thing. The line between change and chaos is a fine one—some rebels walk that thin line and others just want to see it all torched. Disguise, a knife in the dark or a thrown torch at the right moment are all tools of the rebel. The burning brand of anarchy is a common fear amongst the nobles of Dungeon World. These men and women are why.</description>
      <instinct>To upset order</instinct>
      <moves>
         <move>Die for a cause</move>
         <move>Inspire others</move>
      </moves>
   </monster>
   <monster>
      <name>Soldier</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Folk of the Realm</setting>
      <stats>
         <attack>Spear (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities/>
      <description>For a commoner with a strong arm, sometimes it’s this or be a bandit. It’s wear the colors and don ill-fitting armor and march into the unknown with a thousand other scared men and women conscripted to fight the wars of our time. They could be hiding out in the woods instead, living off poached elk and dodging the king’s guard. Better to risk one’s life in service to a cause. To bravely toss one’s lot in with one’s fellows and hope to come out the other side still in one piece. Besides, the nobles need strong men and women. What is it they say? A handful of soldiers beats a mouthful of arguments.</description>
      <instinct>To fight</instinct>
      <moves>
         <move>March into battle</move>
         <move>Fight as one</move>
      </moves>
   </monster>
   <monster>
      <name>Spy</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats/>
      <qualities/>
      <description>Beloved of kings but never truly trusted. Mysterious, secretive and alluring, the life of a spy is, if you ask a commoner, full of romance and intrigue. They’re a knife in the dark and a pair of watchful eyes. A spy can be your best friend, your lover or that old man you see in the market every day. One never knows. Hells, maybe you’re a spy—they say there’s magic that can turn folks’ minds without them ever knowing it. How can we trust you?</description>
      <instinct>To infiltrate</instinct>
      <moves>
         <move>Report the truth</move>
         <move>Double cross</move>
      </moves>
   </monster>
   <monster>
      <name>Tinkerer</name>
      <tags/>
      <setting>Folk of the Realm</setting>
      <stats/>
      <qualities/>
      <description>It’s said that if you see a tinker on the road and you don’t offer him a swig of ale or some of your food that he’ll leave a curse of bad luck behind. A tinker is a funny thing. These strange folk often travel the roads between towns with their oddment carts and favorite mules. With a ratty dog and always a story to tell. Sometimes the mail, too, if you’re lucky and live in a place where Queen’s Post won’t go. If you’re kind, maybe they’ll sell you a rose that never wilts or a clock that chimes with the sound of faerie laughter. Or maybe they’re just antisocial peddlers. You never know, right?</description>
      <instinct>To create</instinct>
      <moves>
         <move>Offer an oddity at a price</move>
         <move>Spin tales of great danger and reward in far-off lands</move>
      </moves>
   </monster>
   <monster>
      <name>Formian Drone</name>
      <tags>
         <tag>Horde</tag>
         <tag>Organized</tag>
         <tag>Cautious</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Bite (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Hive connection, Insectoid</qualities>
      <description>With good cause, they say that these creatures (like all insects, really) are claimed by the powers of Law. They are order made flesh—a perfectly stratified society in which every larva, hatchling and adult knows its place in the great hive. The formian is some strange intersection of men and ants. (Though there are winged tribes that look like wasps out in the Western Desert, I’ve heard. And some with great sawtooth arms like mantids in the forests of the east.) Tall, with a hard shell and a harder mind, these particular formians are the bottom caste. They work the hills and honeycombs with single-minded joy that can be known only by such an alien mind.</description>
      <instinct>To follow orders</instinct>
      <moves>
         <move>Raise the alarm</move>
         <move>Create value for the hive</move>
         <move>Assimilate</move>
      </moves>
   </monster>
   <monster>
      <name>Formian Taskmaster</name>
      <tags>
         <tag>Group</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Spiked whip (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Hive connection, Insectoid</qualities>
      <description>It takes two hands to rule an empire: one to wield the scepter and one to crack the whip. These ant-folk are that whip. Lucky for them, with two extra arms, that’s a lot of whip to crack. They oversee the vast swarms of worker drones that set to build the mighty caverns and ziggurats that dot the places that formians can be found. One in a hundred, these brutes stand two or three feet taller than their pale, near-mindless kin and have a sharper, crueler wit to match. They’ll often ignore the soft races (as we’re known) if we don’t interfere in a project, but get in the way of The Great Work and expect nothing less than their full attention. You don’t want their full attention.</description>
      <instinct>To command</instinct>
      <moves>
         <move>Order drones into battle</move>
         <move>Set great numbers in motion</move>
      </moves>
   </monster>
   <monster>
      <name>Formian Centurion</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Barbed spear (b[2d6]+2 damage)</attack>
         <hp>7 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Hive connection, Insectoid, Wings</qualities>
      <description>Whether in the form of a legionnaire, part of the formian standing army, or as a praetorian guard to the queen, every formian hive contains a great number of these most dangerous insectoids. Darker in carapace, often scarred with furrows and the ceremonial markings that set them apart from their drones, the formian centurions are their fighting force and rightly so. Born, bred and living for the singular purpose of killing the enemies of their hive, they fight with one mind and a hundred swords. Thus far, the powers of Law have seen fit to spare mankind a great war with these creatures, but we’ve seen them in skirmish—descending sometimes on border towns with their wings flickering in the heat or spilling up from a sandy mound to wipe clean a newly-dug mine. Theirs is an orderly bloodshed, committed with no pleasure but the completion of a goal.</description>
      <instinct>To fight as ordered</instinct>
      <moves>
         <move>Advance as one</move>
         <move>Summon reinforcements</move>
         <move>Give a life for the hive</move>
      </moves>
   </monster>
   <monster>
      <name>Formian Queen</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Crushing mandibles (d10+5 damage)</attack>
         <hp>24 HP</hp>
         <armor>3 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Hive connection, Insectoid</qualities>
      <description>At the heart of every hive, no matter its size or kind, lives a queen. As large as any giant, she sits protected by her guard, served by every drone and taskmaster with her own, singular purpose: to spread her kind and grow the hive. To birth the eggs. To nurture. We do not understand the minds of these creatures but it is known they can communicate with their children, somehow, over vast distances and that they begin to teach them the ways of earth and stone and war while still pale and wriggling larvae, without a word. To kill one is to set chaos on the hive; without their queen, the rest turn on one another in a mad, blind rage.</description>
      <instinct>To spread formians</instinct>
      <moves>
         <move>Call every formian it spawned</move>
         <move>Release a half-formed larval mutation</move>
         <move>Organize and issue orders</move>
      </moves>
   </monster>
   <monster>
      <name>Gnoll Tracker</name>
      <tags>
         <tag>Group</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Bow (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Scent-tracker</qualities>
      <description>Once they scent your blood, you can’t escape. Not without intervention from the gods, or the duke’s rangers at least. The desert scrub is a dangerous place to go exploring on your own and if you fall and break your leg or eat the wrong cactus, well, you’ll be lucky if you die of thirst before the gnolls find you. They prefer their prey alive, see—cracking bones and the screams of the dying lend a sort of succulence to a meal. Sickening creatures, no? They’ll hunt you, slow and steady, as you die. If you hear laughter in the desert wind, well, best pray Death comes to take you before they do.</description>
      <instinct>To prey on weakness</instinct>
      <moves>
         <move>Doggedly track prey</move>
         <move>Strike at a moment of weakness</move>
      </moves>
   </monster>
   <monster>
      <name>Gnoll Emissary</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Divine</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Ceremonial dagger (d10+2 damage)</attack>
         <hp>18 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Scent</qualities>
      <description>Oh, an emissary! How nice. I suspect you didn’t know the gnolls had ambassadors, did you? Yes, even these mangy hyenas have to make nice sometimes. No, no, not with us. Nor the dwarves, neither. No, the emissary is the one, among his packmates, who trucks directly with their dripping demon lord. Frightening? Too right. Every hound has a master with his hand on the chain. This gnoll hears his master’s voice. Hears it and obeys.</description>
      <instinct>To share divine insight</instinct>
      <moves>
         <move>Pass on demonic influence</move>
         <move>Drive the pack into a fervor</move>
      </moves>
   </monster>
   <monster>
      <name>Gnoll Alpha</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Sword (b[2d10] damage, 1 piercing)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Scent</qualities>
      <description>Every pack has its top dog. Bigger, maybe—that’d be the simplest way. Often, though, with these lank and filthy mutts, it’s not about size or sharp teeth but about cruelty. About a willingness to kill your brothers and eat them while the pack watches. Willingness to desecrate the pack in a way that cows them to you. If they’re that awful to each other—to their living kin—think about how they must view us. It’s hard to be mere meat in a land of carnivores.</description>
      <instinct>To drive the pack</instinct>
      <moves>
         <move>Demand obedience</move>
         <move>Send the pack to hunt</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Bloodwarrior</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Jagged blade (d6+2 damage, 1 piercing)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Mutations</qualities>
      <description>The orcish horde is a savage, bloodthirsty, and hateful collection of tribes. There are myths and stories that tell of the origin of their rage—a demon curse, a homeland destroyed, elven magic gone wrong—but the truth has been lost to time. Every able orc, be it man or woman, child or elder, swears fealty to the warchief and their tribe and bears the jagged blade of a bloodwarrior. Men are trained to fight and kill—orcs are born to it.</description>
      <instinct>To fight</instinct>
      <moves>
         <move>Fight with abandon</move>
         <move>Revel in destruction</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Berserker</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Divine</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Cleaver (d10+5 damage)</attack>
         <hp>20 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Mutations</qualities>
      <description>Stained in the unholy ritual of Anointing By The Night’s Blood, some warriors of the horde rise to a kind of twisted knighthood. They trade their sanity for this honor, stepping halfway into a world of swirling madness. This makes berserkers the greatest of their tribe, though as time passes, the chaos spreads. The rare berserker that lives more than a few years becomes horrible and twisted, growing horns or an extra arm with which to grasp the iron cleavers they favor in battle.</description>
      <instinct>To rage</instinct>
      <moves>
         <move>Fly into a frenzy</move>
         <move>Unleash chaos</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Breaker</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Hammer (d10+3 damage ignores armor)</attack>
         <hp>16 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>One eye</qualities>
      <description>“Before you set out across the hordeland, brave sir, hark a moment to the tale of Sir Regnus. Regnus was like you, sir—a paladin of the Order, all a-shine in his plated armor and with a shield as tall as a man. Proud he was of it, too—Mirrorshield, he called himself. Tale goes that he’d set his eyes on rescuing some lost priest, a kidnap from the abbey on the borders. Regnus came across some orcs in his travels, a dozen or so, and thought, as one might, that they’d be no match. Battle was joined and all was well until one of them orcs emerged from the fray with a hammer bigger than any man ought to be able to wield. Built more like an ogre or a troll, they say it was, and with a single swing, it crushed Regnus to the ground, shield and all. It were no ordinary orc, they say. It were a breaker. They can’t make plate of their own, see, so maybe it’s jealousy drives these burly things to crush and shatter the way they do. Effective tactic, though. Careful out there.”</description>
      <instinct>To smash</instinct>
      <moves>
         <move>Destroy armor or protection</move>
         <move>Lay low the mighty</move>
      </moves>
   </monster>
   <monster>
      <name>Orc One-Eye</name>
      <tags>
         <tag>Group</tag>
         <tag>Divine</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Inflict Wounds (d8+2 damage ignores armor)</attack>
         <hp>6 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>One eye</qualities>
      <description>In the name of He of Riven Sight and by the First Sacrifice of Elf-Flesh do we invoke the Old Powers. By the Second Sacrifice, I make my claim to what is mine—the dark magic of Night. In His image, I walk the path to Gor-sha-thak, the Iron Gallows! I call to the runes! I call to the clouded sky! Take this mortal organ, eat of the flesh of our enemy and give me what is mine!</description>
      <instinct>To hate</instinct>
      <moves>
         <move>Rend flesh with divine magic</move>
         <move>Take an eye</move>
         <move>Make a sacrifice and grow in power</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Shaman</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Elemental blast (d10 damage ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Elemental power</qualities>
      <description>The orcs are as old a race as any. They cast bones in the dirt and called to the gods in the trees and stone as the elves built their first cities. They have waged wars, conquered kingdoms, and fallen into corruption in the aeons it took for men to crawl from their caves and dwarves to first see the light of the sun. Fitting, then, that the old ways still hold. They summon the powers of the world to work, to fight and to protect their people, as they have since the first nights.</description>
      <instinct>To strengthen orc-kind</instinct>
      <moves>
         <move>Give protection of earth</move>
         <move>Give power of fire</move>
         <move>Give swiftness of water</move>
         <move>Give clarity of air</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Slaver</name>
      <tags>
         <tag>Horde</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Whip (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Shadow cloak</qualities>
      <description>Red sails fly in the southern sea. Red sails and ships of bone, old wood and iron. The warfleet of the horde. Orcs down that way have taken to the sea, harassing island towns and stealing away with fishermen and their kin. It’s said the custom is spreading north and the orcs learn the value of free work. Taken to it like a sacred duty—especially if they can get their hands on elves. Hard to think of a grimmer fate than to live out your life on an orcish galley, back bent under the lash.</description>
      <instinct>To take</instinct>
      <moves>
         <move>Take a captive</move>
         <move>Pin someone under a net</move>
         <move>Drug them</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Shadowhunter</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Stealthy</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>oisoned dagger (d10 damage, 1 piercing)</attack>
         <hp>10 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Shadow cloak</qualities>
      <description>Not every attack by orcs is torches and screaming and enslavement. Among those who follow He of Riven Sight, poison and murder-in-the-dark are considered sacred arts. Enter the shadowhunter. Orcs cloaked in Night’s magic who slip into camps, towns and temples and end the lives of those within. Do not be so distracted by the howling of the berserkers that you don’t notice the knife at your back.</description>
      <instinct>To kill in darkness</instinct>
      <moves>
         <move>Poison them</move>
         <move>Melt into the shadows</move>
         <move>Cloak them in darkness</move>
      </moves>
   </monster>
   <monster>
      <name>Orc Warchief</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Iron Sword of Ages (b[2d10]+2 damage)</attack>
         <hp>16 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>One-Eye blessings, Shaman blessings, Divine protection from mortal harm</qualities>
      <description>There are chiefs and there are leaders of the tribes among the orcs. There are those who rise to seize power and fall under the machinations of their foes. There is but one Warchief. One orc in all the horde who stands above the rest, bearing the blessings of the One-Eyes and the Shamans both. But one who walks with the elements under Night. But one who bears the Iron Sword of Ages and carries the ancient grudge against the civil races on his shoulders. The Warchief is to be respected, to be obeyed and above all else, to be feared. All glory to the Warchief.</description>
      <instinct>To lead</instinct>
      <moves>
         <move>Start a war</move>
         <move>Make a show of power</move>
         <move>Enrage the tribes</move>
      </moves>
   </monster>
   <monster>
      <name>Triton Spy</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Trident (w[2d10] damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Near</tag>
      </stats>
      <qualities>Aquatic</qualities>
      <description>A fishing village caught one in their net, some time ago. Part a man and part some scaly sea creature, it spoke in a broken, spy-learned form of the common tongue before it suffocated in the open air. It told the fishermen of a coming tide, an inescapable swell of the power of some deep-sea god and that the triton empire would rise up and drag the land down into the ocean. The tale spread and now, when fishermen sail the choppy seas, they watch and worry that the dying triton’s tales were true. That there are powers deep below that watch and wait. They fear the tide is coming in.</description>
      <instinct>To spy on the surface world</instinct>
      <moves>
         <move>Reveal their secrets</move>
         <move>Strike at weakness</move>
      </moves>
   </monster>
   <monster>
      <name>Triton Tidecaller</name>
      <tags>
         <tag>Group</tag>
         <tag>Divine</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Waves (d8+2 damage, ignores armor)</attack>
         <hp>6 HP</hp>
         <armor>2 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Aquatic, Mutations</qualities>
      <description>Part priest, part outcast among their kind, the tidecaller speaks with the voice of the deeps. They can be known by their mutations—transparent skin, perhaps, or rows of teeth like a shark. Glowing eyes or fingertips, angler-lights in the darkness of their underwater kingdom. They speak in a strange tongue that can call and command creatures of the sea. They ride wild hippocampi and cast strange spells that rot through the wooden decks of ships or encrust them with barnacles heavy enough to sink. It is the tidecallers who come, now, back to the cities of the triton, bearing word that the prophecy is coming to pass. The world of men will drown in icy brine. The tidecallers speak and the lords begin to listen.</description>
      <instinct>To bring on The Flood</instinct>
      <moves>
         <move>Cast a spell of water and destruction</move>
         <move>Command beasts of the sea</move>
         <move>Reveal divine proclamation</move>
      </moves>
   </monster>
   <monster>
      <name>Triton Sub-Mariner</name>
      <tags>
         <tag>Group</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Harpoon (b[2d8] damage)</attack>
         <hp>6 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Aquatic</qualities>
      <description>The triton are not a militant race by nature. They shy away from battle except when the sahuagin attack, and then they only defend themselves and retreat into the depths where their foes can’t follow. This trend begins to change. As the tidecallers come to rally their people, some triton men and women take up arms. They call these generals “sub-mariners” and build for them armor of shells and hardened glass. They swim in formation, wielding pikes and harpoons and attack the crews of ships that wander too far from port. Watch for their pennants of kelp on the horizon and the conch-cry of a call to battle and keep, if you can, your boats near shore.</description>
      <instinct>To wage war</instinct>
      <moves>
         <move>Lead tritons to battle</move>
         <move>Pull them beneath the waves</move>
      </moves>
   </monster>
   <monster>
      <name>Triton Noble</name>
      <tags>
         <tag>Group</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Ravenous Hordes</setting>
      <stats>
         <attack>Trident (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Aquatic</qualities>
      <description>The triton ruling houses were chosen, they say, at the dawn of time. Granted lordship over all the races of the sea by some now-forgotten god. These bloodlines continue, passing rulership from father to daughter and mother to son through the ages. Each is allowed to rule their city in whatever way they choose—some alone or with their spouses, others in council of brothers and sisters. In ages past, they were known for their sagacity and bloodlines of even-temper were respected above all else. The tidecallers prophecy is changing that: nobles are expected to be strong, not wise. The nobles have begun to respond, and it is feared by some that the ancient blood is changing forever. It may be too late to turn back. Time and tide wait for none.</description>
      <instinct>To lead</instinct>
      <moves>
         <move>Stir tritons to war</move>
         <move>Call reinforcements</move>
      </moves>
   </monster>
   <monster>
      <name>Angel</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Terrifying</tag>
         <tag>Divine</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Sword of Flames (b[2d10]+4 damage, ignores armor)</attack>
         <hp>18 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>“So was it written that the heavens opened up to Avra’hal and did an angel from the clouds emerge to speak unto her and so did it appear to her as her firstborn daughter—beautiful, of ebon skin and golden eyes—and did Avra’hal weep to see it. ‘Be not afraid,’ it commanded her. ‘Go to the villages I have shown you in your dreams and unto them show the word I have written on your soul.’ Avra’hal wept and wept and did agree to do this and did take up her sword and tome and did into the villages go, a great thirst for blood on her lips for the word the angel wrote upon the soul of Avra’hal was ‘kill’.”</description>
      <instinct>To share divine will</instinct>
      <moves>
         <move>Deliver visions and prophecy</move>
         <move>Stir mortals to action</move>
         <move>Expose sin and injustice</move>
      </moves>
   </monster>
   <monster>
      <name>Barbed Devil</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Planar</tag>
         <tag>Terrifying</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Spines (d10+3 damage, 3 piercing)</attack>
         <hp>16 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Spines</qualities>
      <description>There are a thousand forms of devil, maybe more. Some common and some unique. Each time the Inquisitors discover a new one they write it into the Tormentors Codex and the knowledge is shared among the abbeys in the hope that atrocities of that particular sort won’t find their way into the world again. The barbed devil has long been known to the brothers and sisters of the Inquisition. It appears only at a site of great violence or when called by a wayward summoner. Covered in sharp quills, this particular demon revels in the spilling of blood, preferably by impaling victims piecemeal or in whole upon its thorns and letting them die there. Cruel but not particularly effective beyond slaughter. A low inquisitorial priority.</description>
      <instinct>To rend flesh and spill blood</instinct>
      <moves>
         <move>Impale someone</move>
         <move>Kill indiscriminately</move>
      </moves>
   </monster>
   <monster>
      <name>Chain Devil</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Crush (d10 damage, ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Ideal form</qualities>
      <description>Do you think the phrase “drag him to hell” means nothing? It is unfortunately literal, in the case of the chain devil. Appearing differently to each victim, this summoned creature has but a single purpose: to wrap its victim up in binding coils and take it away to a place of torment. Sometimes it will come as a man-shaped mass of rusting iron, hooks and coils of mismatched links. Other times, a roiling tangle of rope or kelp or twisted bloody bedsheets. The results are always the same.</description>
      <instinct>To capture</instinct>
      <moves>
         <move>Take a captive</move>
         <move>Return to whence it came</move>
         <move>Torture with glee</move>
      </moves>
   </monster>
   <monster>
      <name>Concept Elemental</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Planar</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Secret dagger (w[2d8] damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Ideal form</qualities>
      <description>The planes are not as literal as our world. Clothed in the elemental chaos are places of stranger stuff than air and water. Here, rivers of time crash upon shores of crystal fear. Bleak storms of nightmare roil and churn in a laughter-bright sky. Sometimes, the spirits of these places can be lured into our world, though they are infinitely more unpredictable and strange than mere fire or earth might be. Easier to make mistakes, too—one might try calling up a wealth elemental and be surprised to find a murder elemental instead.</description>
      <instinct>To perfect its concept</instinct>
      <moves>
         <move>Demonstrate its concept in its purest form</move>
      </moves>
   </monster>
   <monster>
      <name>Corrupter</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Planar</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Secret dagger (w[2d8] damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Made of flame</qualities>
      <description>“Surely, my good man, you must know why I am here. Must know who I am. You said the words. You spilled the blood and followed the instructions almost to the letter. Your pronunciation was a bit off but that’s to be expected. I’ve come to give you what you’ve always wanted, friend. Glory, love, money? Paltry things when you’ve the vaults of hell to plumb. Don’t look so shocked, you knew what this was. You have but one thing we desire. Promise it to us, and the world shall be yours for the taking. Trust me.”</description>
      <instinct>To bargain</instinct>
      <moves>
         <move>Offer a deal with horrible consequences</move>
         <move>Plumb the vaults of hell for a bargaining chip</move>
         <move>Make a show of power</move>
      </moves>
   </monster>
   <monster>
      <name>Djinn</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Magical</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Flame (d8+1 damage, ignores armor)</attack>
         <hp>14 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Made of flame</qualities>
      <description>“Stop rubbing that lamp, you idiot. I do not care what you have read, it will not grant you wishes. I brought you here to show you something real, something true. See this mural? It shows the ancient city. The true city that came before. They called it Majilis and it was made of brass by the spirits. They had golem servants and human lovers and, in that day, it was said you could trade them a year of your life for a favor. We are not here to gather treasure this night, fool, we are here to learn. The djinn still sometimes come to these places, and you must understand their history if you are to know how to behave. They are powerful and wicked and proud and you must know them if you hope to survive a summoning. Now, bring the lamp here and we will light it, it grows dark and these ruins are dangerous at night.”</description>
      <instinct>To burn eternally</instinct>
      <moves>
         <move>Grant power for a price</move>
         <move>Summon the forces of the City of Brass</move>
      </moves>
   </monster>
   <monster>
      <name>Hell Hound</name>
      <tags>
         <tag>Group</tag>
         <tag>Planar</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Fiery Bite (d8 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Hide of shadow</qualities>
      <description>When one reneges on a deal, does not the debtor come for payment? Does the owed party not send someone to collect what is due? So too with the Powers Below. They only want what is theirs. A howling pack of shadows, flame and jagged bone, driven by the hunting horn. They will not cease, they cannot be evaded.</description>
      <instinct>To pursue</instinct>
      <moves>
         <move>Follow despite all obstacles</move>
         <move>Spew fire</move>
         <move>Summon the forces of hell on their target</move>
      </moves>
   </monster>
   <monster>
      <name>Imp</name>
      <tags>
         <tag>Horde</tag>
         <tag>Planar</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Flame gout (d6 damage, ignores armor)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Made of Order</qualities>
      <description>These tiny observer-demons often act as a first-time binding subject by neophyte warlocks. They can be found infesting arcane cabals, drinking potions when no one watches, and chasing pets and servants with tiny pitchforks. A caricature of true demonhood, these little creatures are, thankfully, not too difficult to bind or extinguish.</description>
      <instinct>To harass</instinct>
      <moves>
         <move>Send information back to hell</move>
         <move>Cause mischief</move>
      </moves>
   </monster>
   <monster>
      <name>Inevitable</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Magical</tag>
         <tag>Cautious</tag>
         <tag>Amorphous</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Hammer (d10+1 damage)</attack>
         <hp>21 HP</hp>
         <armor>5 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Made of Order</qualities>
      <description>All things come to an end. Reality bleeds from the cut of entropy’s knife. At the edge of time itself stand the inevitable. Massive, powerful and seemingly carved from star-stuff themselves, the inevitable intervene only where magic or calamity have undone the skein of fate. Where the arrogant and powerful boil the substance of destiny away and seek to undermine the very laws of reality, the inevitable arrive to guide things back to the proper order. Unshakable, seemingly immune to mortal harm and utterly enigmatic, it is said that the Inevitable are all that will remain when time’s long thread has run out.</description>
      <instinct>To preserve order</instinct>
      <moves>
         <move>End a spell or effect</move>
         <move>Enforce a law of nature or man</move>
         <move>Give a glimpse of destiny</move>
      </moves>
   </monster>
   <monster>
      <name>Larvae</name>
      <tags>
         <tag>Horde</tag>
         <tag>Devious</tag>
         <tag>Planar</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Slime (w[2d4] damage)</attack>
         <hp>10 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Flame and shadow</qualities>
      <description>Those who have seen visions of the Planes Below, and survived with their sanity intact, speak of masses of these writhing wretches. Maggots with the faces of men and women, crying out for salvation in a nest of flames. Sometimes, they can be goaded out through a rip in the planar caul and emerge, wriggling and in torment, into our world. Once here, they spread misery and sickness during their mayfly lives before expiring into a slurry of gore. All in all, an enticement to do good deeds in life.</description>
      <instinct>To suffer</instinct>
      <moves>
         <move>Fill them with despair</move>
         <move>Beg for mercy</move>
         <move>Draw evil attention</move>
      </moves>
   </monster>
   <monster>
      <name>Nightmare</name>
      <tags>
         <tag>Horde</tag>
         <tag>Large</tag>
         <tag>Magical</tag>
         <tag>Terrifying</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Trample (d6+1 damage)</attack>
         <hp>7 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Flame and shadow</qualities>
      <description>The herd came from a pact made in the days when folk still inhabited the Blasted Steppes. Horselords, they were, who travelled those lands. Born in the saddle, it was said. One of theirs, in a bid to dominate his peers, made a black pact with some fell power and traded away his finest horses. He had some power, sure—but what’s a thousand year dynasty when a life is so short? Now the fiends of the pit ride on the finest horses ever seen. Coats of shining oil and manes of tormented flame: these are steeds of hell’s cavalry.</description>
      <instinct>To ride rampant</instinct>
      <moves>
         <move>Sheath a rider in hellish flame</move>
         <move>Drive them away</move>
      </moves>
   </monster>
   <monster>
      <name>Quasit</name>
      <tags>
         <tag>Horde</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats>
         <attack>Hellish weaponry (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Adaptable form</qualities>
      <description>An imp with some ambition. A quasit is a kind of foot soldier in the demon realm. A commoner, armed with fangs or claws or wings or some other thing to give it just a little edge over its hellish peers. Commonly bound by warlocks to carry heavy loads or build bridges or guard their twisted towers, a quasit can take on many forms, none of them pleasant.</description>
      <instinct>To serve</instinct>
      <moves>
         <move>Attack with abandon</move>
         <move>Inflict pain</move>
      </moves>
   </monster>
   <monster>
      <name>The Tarrasque</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Planar</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats/>
      <qualities>Impervious</qualities>
      <description>The Tarrasque. Legendary unstoppable juggernaut—eater of cities and swallower of ships, horses, and knights. A creature unseen in an age but about whom all kinds of stories are told. One thread of truth weaves through these stories. It cannot be killed. No blade can pierce its stony shell nor spell penetrate the shield it somehow bears. Stories say, though, that the will of one pure soul can send it to slumber, though what that means and, by the gods, where such a thing might be found, pray we do not ever need to learn. It slumbers. Somewhere in the periphery of the planar edge, it sleeps for now.</description>
      <instinct>To consume</instinct>
      <moves>
         <move>Swallow a person, group, or place whole</move>
         <move>Release a remnant of a long-eaten place from its gullet</move>
      </moves>
   </monster>
   <monster>
      <name>Word Demon</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Planar</tag>
         <tag>Magical</tag>
      </tags>
      <setting>Planar Powers</setting>
      <stats/>
      <qualities/>
      <description>All of mortal magic is just words. Spells are prayers, rote formula, runes cast, or songs sung. Letters, words, sentences, and syntax strung together in a language that the whole world itself might understand. By way of words we can make our fellows cry or exult, can paint pictures and whisper desire to the gods. No little wonder, then, that in all that power is intent. That every word we utter, if repeated and meaning or emotion given to it, can spark a kind of unintentional summoning. Word daemons are called by accident, appear at random and are often short-lived, but come to attend a particular word. Capricious, unpredictable and dangerous, yes—but possibly useful, depending on the word.</description>
      <instinct>To further their word</instinct>
      <moves>
         <move>Cast a spell related to their word</move>
         <move>Bring their word into abundance</move>
      </moves>
   </monster>
   <monster>
      <name>Bakunawa</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Intelligent</tag>
         <tag>Messy</tag>
         <tag>Forceful</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Bite (d10+3 damage, 1 piercing)</attack>
         <hp>16 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Amphibious</qualities>
      <description>Dragon-Turtle’s sister is a mighty serpent queen. Ten yards of scales and muscle, they say she wakes with a hunger when the sun disappears from the sky. She is attracted by bright light in the darkness and like any snake, the Bakunawa is sneaky. She will seek first to beguile and mislead and will only strike out with violence when no other option is available. When she does, though, her jaws are strong enough to crack the hull of any swamp-boat and certainly enough to slice through a steel breastplate or two. Give the greedy snake your treasures and she might just leave you alone.</description>
      <instinct>To devour</instinct>
      <moves>
         <move>Lure prey with lies and illusions</move>
         <move>Lash out at light</move>
         <move>Devour</move>
      </moves>
   </monster>
   <monster>
      <name>Basilisk</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Bite (d10 damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Amorphous</qualities>
      <description>“Few have seen a basilisk and lived to tell the tale. Get it? Seen a basilisk? Little bit of basilisk humor there. Sorry, I know you’re looking for something helpful, sirs. Serious stuff, I understand. The basilisk, even without its ability to turn your flesh to stone with a gaze, is a dangerous creature. A bit like a frog, bulbous eyes and six muscled legs built for leaping. A bit like an alligator, with snapping jaws and sawing teeth. Covered in stony scales and very hard to kill. Best avoided, if possible.”</description>
      <instinct>To create new statuary</instinct>
      <moves>
         <move>Turn flesh to stone with a gaze</move>
         <move>Retreat into a maze of stone</move>
      </moves>
   </monster>
   <monster>
      <name>Black Pudding</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Corrosive touch (d10 damage, ignores armor)</attack>
         <hp>15 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Amorphous</qualities>
      <description>How do you kill a pile of goo? A great, squishy pile of goo that also happens to want to dissolve you and slurp you up? That is a good question to which I have no answer. Do let us know when you find out.</description>
      <instinct>To dissolve</instinct>
      <moves>
         <move>Eat away metal, flesh, or wood</move>
         <move>Ooze into a troubling place: food, armor, stomach</move>
      </moves>
   </monster>
   <monster>
      <name>Coutal</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
         <tag>Devious</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Light ray (d8 damage, ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings, Halo</qualities>
      <description>As if in direct defiance of the decay and filth of the world, the gods granted us the coutal. As if to say, “there is beauty, even in this grim place.” A serpent in flight on jeweled wings, these beautiful creatures glow with a soft light, as the sun does through stained glass. Bright, wise, and calm, a coutal often knows many things and sees many more. You might be able to make a trade with it in exchange for some favor. They seek to cleanse and to purge and to make of this dark world a better one. Shame we have so few. The gods are cruel.</description>
      <instinct>To cleanse</instinct>
      <moves>
         <move>Pass judgment on a person or place</move>
         <move>Summon divine forces to cleanse</move>
         <move>Offer information in exchange for service</move>
      </moves>
   </monster>
   <monster>
      <name>Crocodilian</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Bite (d8+3 damage)</attack>
         <hp>10 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Amphibious, Camouflage</qualities>
      <description>It’s a really, really big crocodile. Seriously. So big.</description>
      <instinct>To eat</instinct>
      <moves>
         <move>Attack an unsuspecting victim</move>
         <move>Escape into the water</move>
         <move>Hold something tight in its jaws</move>
      </moves>
   </monster>
   <monster>
      <name>Doppelgänger</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Dagger (d6 damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Shapeshifting</qualities>
      <description>Their natural form, if you ever see it, is hideous. Like a creature who stopped growing part-way, before it decided it was elf or man or dwarf. Then again, maybe that’s how you get to be the way a doppelgänger is—without form, without shape to call their own, maybe all they really seek is a place to fit in. If you go out into the world, when you come back home, make sure your friends are who you think they are. They might, instead, be a doppelgänger and your friend might be dead at the bottom of a well somewhere. Then again, depending on your friends, that might be an improvement.</description>
      <instinct>To infiltrate</instinct>
      <moves>
         <move>Assume the shape of a person whose flesh it’s tasted</move>
         <move>Use another’s identity to advantage</move>
         <move>Leave someone’s reputation shattered</move>
      </moves>
   </monster>
   <monster>
      <name>Dragon Turtle</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
         <tag>Cautious</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Bite (d10+3 damage)</attack>
         <hp>20 HP</hp>
         <armor>4 Armor</armor>
         <tag>Reach</tag>
      </stats>
      <qualities>Shell, Amphibious</qualities>
      <description>Bakunawa has a brother. Where she is quick to anger and hungry for gold, he is slow and sturdy. She is a knife and he is a shield. A great turtle that lies in the muck and mire for ages as they pass, mud piled upon his back—sometimes trees and shrubs. Sometimes a whole misguided clan of goblins will build their huts and cook their ratty meals on the shell of the dragon turtle. His snapping jaws may be glacier-slow, but they can rend a castle wall. Careful where you tread.</description>
      <instinct>To resist change</instinct>
      <moves>
         <move>Move forward implacably</move>
         <move>Bring its full bulk to bear</move>
         <move>Destroy structures and buildings</move>
      </moves>
   </monster>
   <monster>
      <name>Dragon Whelp</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Small</tag>
         <tag>Intelligent</tag>
         <tag>Cautious</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Elemental breath (d10+2 damage)</attack>
         <hp>16 HP</hp>
         <armor>3 Armor</armor>
         <tag>Close</tag>
         <tag>Near</tag>
      </stats>
      <qualities>Wings, Elemental Blood</qualities>
      <description>What? Did you think they were all a mile long? Did you think they didn’t come smaller than that? Sure, they may be no bigger than a dog and no smarter than an ape, but a dragon whelp can still belch up a hellish ball of fire that’ll melt your armor shut and drop you screaming into the mud. Their scales, too, are softer than those of their bigger kin, but can still turn aside an arrow or sword not perfectly aimed. Size is not the only measure of might.</description>
      <instinct>To grow in power</instinct>
      <moves>
         <move>Start a lair, form a base of power</move>
         <move>Call on family ties</move>
         <move>Demand oaths of servitude</move>
      </moves>
   </monster>
   <monster>
      <name>Ekek</name>
      <tags>
         <tag>Horde</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Talons (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wing-arms</qualities>
      <description>Ugly, wrinkled bird-folk, these. Once, maybe, in some ancient past, they were a race of angelic men from on high, but now they eat rats that they fish from the murk with talon-feet and devour with needle-teeth. They understand the tongues of men and dwarves but speak in little more than gibbering tongues, mimicking the words they hear with mocking laughter. It’s a chilling thing to see a beast so close to man or bird but not quite either one.</description>
      <instinct>To lash out</instinct>
      <moves>
         <move>Attack from the air</move>
         <move>Carry out the bidding of a more powerful creature</move>
      </moves>
   </monster>
   <monster>
      <name>Fire Eels</name>
      <tags>
         <tag>Horde</tag>
         <tag>Tiny</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Burning touch (d6-2 damage, ignores armor)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Hand</tag>
      </stats>
      <qualities>Flammable oil, aquatic</qualities>
      <description>These strange creatures are no bigger or smarter than their mundane kin. They have the same vicious nature. Over their relations they have one advantage—an oily secretion that oozes from their skin. It makes them hard to catch. On top of that, with a twist of their body they can ignite the stuff, leaving pools of burning oil atop the surface of the water and roasting prey and predator alike. I hear the slimy things make good ingredients for fire-resistant gear, but you have to get your hands on one, first.</description>
      <instinct>To ignite</instinct>
      <moves>
         <move>Catch someone or something on fire (even underwater)</move>
         <move>Consume burning prey</move>
      </moves>
   </monster>
   <monster>
      <name>Frogman</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Spear (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Amphibious</qualities>
      <description>Croak croak croak. Little warty munchkins. Some wizard or godling’s idea of a bad joke, these creatures are. They stand as men, dress in scavenged cloth and hold court in their froggy villages. They speak a rumbling pidgin form of the tongue of man and are constantly at war with their neighbors. They’re greedy and stupid but clever enough when they need to defend themselves. Some say, too, their priests have a remarkable skill at healing. Or maybe they’re just really, really hard to kill.</description>
      <instinct>To wage war</instinct>
      <moves>
         <move>Launch an amphibious assault</move>
         <move>Heal at a prodigious rate</move>
      </moves>
   </monster>
   <monster>
      <name>Hydra</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Bite (d10+3 damage)</attack>
         <hp>16 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Many heads, Only killed by a blow to the heart</qualities>
      <description>A bit like a dragon, wingless though it may be. Heads, nine in number at birth, spring from a muscled trunk and weave a sinuous pattern in the air. A hydra is to be feared—a scaled terror of the marsh. The older ones, though, they have more heads, for every failed attempt to murder it just makes it stronger. Cut off a head and two more grow in its place. Only a strike, true and strong, to the heart can end a hydra’s life. Not time or tide or any other thing but this.</description>
      <instinct>To grow</instinct>
      <moves>
         <move>Attack many enemies at once</move>
         <move>Regenerate a body part (especially a head)</move>
      </moves>
   </monster>
   <monster>
      <name>Kobold</name>
      <tags>
         <tag>Horde</tag>
         <tag>Small</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Spear (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Dragon connection</qualities>
      <description>Some are wont to lump these little, rat-like dragon-men in with goblins and orcs, bugbears and hobgoblins. They are smarter and wiser than their kin, however. The kobolds are beholden slaves to dragons and were, in ancient times, their lorekeepers and sorcerer-servants. Their clans, with names like Ironscale and Whitewing, form around a dragon master and live to serve and do its bidding. Spotting a kobold means more are near—and if more are near then a mighty dragon cannot be far, either.</description>
      <instinct>To serve dragons</instinct>
      <moves>
         <move>Lay a trap</move>
         <move>Call on dragons or draconic allies</move>
         <move>Retreat and regroup</move>
      </moves>
   </monster>
   <monster>
      <name>Lizardman</name>
      <tags>
         <tag>Group</tag>
         <tag>Stealthy</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Spear (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Amphibious</qualities>
      <description>A traveling sorcerer once told me that lizardmen came before we did. That before elves and dwarves and men built even the first of their wattle huts, a race of proud lizard kings strode the land. That they lived in palaces of crystal and worshipped their own scaly gods. Maybe that’s true and maybe it ain’t—now they dwell in places men long forgot or abandoned, crafting tools from volcano-glass and lashing against the works of the civilized world. Maybe they just want back what they lost.</description>
      <instinct>To destroy civilization</instinct>
      <moves>
         <move>Ambush the unsuspecting</move>
         <move>Launch an amphibious assault</move>
      </moves>
   </monster>
   <monster>
      <name>Medusa</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Intelligent</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Claws (d6 damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Look turns you to stone</qualities>
      <description>The medusa are children of a serpent-haired mother, birthing them in ancient times to bear her name across the ages. They dwell near places of civilization—luring folks to their caves with promises of beauty or riches untold. Fine appreciators of art, the medusa curate strange collections of their victims, terror or ecstasy frozen forever in stone. It satisfies their vanity to know they were the last thing seen in so many lives. Arrogant, proud, and spiteful, in their way, they seek what so many do—endless company.</description>
      <instinct>To collect</instinct>
      <moves>
         <move>Turn a body part to stone with a look</move>
         <move>Draw someone’s gaze</move>
         <move>Show hidden terrible beauty</move>
      </moves>
   </monster>
   <monster>
      <name>Sahuagin</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Endless teeth (d6+4 damage, 1 piercing)</attack>
         <hp>3 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Forceful</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Amphibious</qualities>
      <description>The shape and craft of men wedded to the hunger and the endless teeth of a shark. Voracious and filled only with hate, these creatures will not stop until all life has been consumed. They cannot be reasoned with, they cannot be controlled or sated. They are hunger and bloodlust, driven up from the depths of the sea to ravage coastal towns and swallow island villages.</description>
      <instinct>To spill blood</instinct>
      <moves>
         <move>Bite off a limb</move>
         <move>Hurl a poisoned spear</move>
         <move>Frenzy at the sight of blood</move>
      </moves>
   </monster>
   <monster>
      <name>Sauropod</name>
      <tags>
         <tag>Group</tag>
         <tag>Huge</tag>
         <tag>Cautious</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Trample (d10+5 damage)</attack>
         <hp>18 HP</hp>
         <armor>4 Armor</armor>
         <tag>Reach</tag>
      </stats>
      <qualities>Armor plated body</qualities>
      <description>Great lumbering beasts, they live in places long since forgotten by the thinking races of the world. Gentle if unprovoked, but mighty if their ire is raised, they trample smaller creatures with the care we might give to crushing an ant beneath our boots. If you see one, drift by and gaze in awe, but do not wake the giant.</description>
      <instinct>To endure</instinct>
      <moves>
         <move>Stampede</move>
         <move>Knock something down</move>
         <move>Unleash a deafening bellow</move>
      </moves>
   </monster>
   <monster>
      <name>Swamp Shambler</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Magical</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Lash (d10+1 damage)</attack>
         <hp>23 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Swamp form</qualities>
      <description>Some elementals are conjured up in sacred circles etched in chalk. Most, in fact. There’s a sort of science to it. Others, though, aren’t so orderly—they don’t fall under the carefully controlled assignments of fire, air, water, or earth. Some are a natural confluence of vine and mire and fungus. They do not think the way a man might think. They cannot be understood as one might understand an elf. They simply are. Spirits of the swamp. Shamblers in the mud.</description>
      <instinct>To preserve and create swamps</instinct>
      <moves>
         <move>Call on the swamp itself for aid</move>
         <move>Meld into the swamp</move>
         <move>Reassemble into a new form</move>
      </moves>
   </monster>
   <monster>
      <name>Troll</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Club (d10+3 damage)</attack>
         <hp>20 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Regeneration</qualities>
      <description>Tall. Real tall. Eight or nine feet when they’re young or weak. Covered all over in warty, tough skin, too. Big teeth, stringy hair like swamp moss and long, dirty nails. Some are green, some gray, some black. They’re clannish and hateful of each other, not to mention all the rest of us. Near impossible to kill, too, unless you’ve fire or acid to spare—cut a limb off and watch. In a few days, you’ve got two trolls where you once had one. A real serious problem, as you can imagine.</description>
      <instinct>To smash</instinct>
      <moves>
         <move>Undo the effects of an attack (unless caused by a weakness, your call)</move>
         <move>Hurl something or someone</move>
      </moves>
   </monster>
   <monster>
      <name>Will-o-wisp</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Tiny</tag>
         <tag>Magical</tag>
      </tags>
      <setting>Swamp Denizens</setting>
      <stats>
         <attack>Ray (w[2d8-2] damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Near</tag>
      </stats>
      <qualities>Body of light</qualities>
      <description>Spot a lantern floating in the darkness, lost traveler in the swamp. Hope—a beacon of shimmering light. You call out to it, but there’s no answer. It begins to fade and so you follow, sloshing through the muck, tiring at the chase, hoping you’re being led to safety. Such a sad tale that always ends in doom. These creatures are a mystery—some say they’re ghosts, others beacons of faerie light. Nobody knows the truth. They are cruel, however. All can agree on that.</description>
      <instinct>To misguide</instinct>
      <moves>
         <move>Lead someone astray</move>
         <move>Clear a path to the worst place possible</move>
      </moves>
   </monster>
   <monster>
      <name>Abomination</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
         <tag>Terrifying</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Slam (d10+3 damage)</attack>
         <hp>20 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Many limbs, heads, and so on</qualities>
      <description>Corpses sewn onto corpses make up the bulk of these shambling masses of dark magic. Most undead are crafted to be controlled—made to serve some purpose like building a tower or serving as guardians. Not so the abomination. The last aspect of the ritual used to grant fire to their hellish limbs invokes a hatred so severe that the abomination knows but one task: to tear and rend at the very thing it cannot have—life. Many students of the black arts learn to their mortal dismay the most important fact about these hulks; an abomination knows no master.</description>
      <instinct>To end life</instinct>
      <moves>
         <move>Tear flesh apart</move>
         <move>Spill forth putrid guts</move>
      </moves>
   </monster>
   <monster>
      <name>Banshee</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Scream (d10 damage)</attack>
         <hp>16 HP</hp>
         <armor>0 Armor</armor>
         <tag>Near</tag>
      </stats>
      <qualities>Insubstantial</qualities>
      <description>Come away from an encounter with one of these vengeful spirits merely deaf and count yourself lucky for the rest of your peaceful, silent days. Often mistaken at first glance for a ghost or wandering spirit, the banshee reveals a far more deadly talent for sonic assault when angered. And her anger comes easy. A victim of betrayal (often by a loved one) the banshee makes known her displeasure with a roar or scream that can putrefy flesh and rend the senses. If you can help her get her vengeance, they say she might grant rewards. Whether the affection of a spurned spirit is a thing you’d want, well, that’s another question.</description>
      <instinct>To get revenge</instinct>
      <moves>
         <move>Drown out all other sound with a ceaseless scream</move>
         <move>Unleash a skull-splitting noise</move>
         <move>Disappear into the mists</move>
      </moves>
   </monster>
   <monster>
      <name>Devourer</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Large</tag>
         <tag>Intelligent</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Smash (d10+3 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Icy touch</qualities>
      <description>Most folk know that the undead feed on flesh. The warmth, blood and living tissue continue their unholy existence. This is true for most of the mindless dead, animated by black sorcery. Not so the devourer. When a particularly wicked person (often a manipulator of men, an apostate priest or the like) dies in a gruesome way, the dark powers of Dungeon World might bring them back to a kind of life. The devourer, however, does not feed on the flesh of men or elves. The devourer eats souls. It kills with a pleasure only the sentient can enjoy and in the moments of its victims’ expiry, draws breath like a drowning man and swallows a soul. What does it mean to have your soul eaten by such a creature? None dare ask for fear of finding out.</description>
      <instinct>To feast on souls</instinct>
      <moves>
         <move>Devour or trap dying soul</move>
         <move>Bargain for a soul’s return</move>
      </moves>
   </monster>
   <monster>
      <name>Dragonbone</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Huge</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Bite (d10+3 damage, 3 piercing)</attack>
         <hp>20 HP</hp>
         <armor>2 Armor</armor>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Icy touch</qualities>
      <description>Mystical sorcerers debate: is this creature truly undead or is it a golem made of a particularly rare and blasphemous material? The bones, sinews and scales of a dead dragon make up this bleak automaton. Winged but flightless, dragon-shaped but without the mighty fire of such a noble thing, the dragonbone serves its master with a twisted devotion and is often set to assault the keeps and towers of rival necromancers. It would take a being of some considerable evil to twist the remains of a dragon thus.</description>
      <instinct>To serve</instinct>
      <moves>
         <move>Attack unrelentingly</move>
      </moves>
   </monster>
   <monster>
      <name>Draugr</name>
      <tags>
         <tag>Horde</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Rusty sword (d6+1 damage)</attack>
         <hp>7 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Icy touch</qualities>
      <description>In the Nordemark, the men and women tell tales in their wooden halls of a place where the noble dead go. A mead hall atop their heavenly mountain where men of valor go to await the final battle for the world. It is a goodly place. It is a place where one hopes to go after death. And the inglorious dead? Those who fall to poison or in an act of cowardice, warriors though they may be? Well, those mead halls aren’t open to all and sundry. Some come back, frozen and twisted and empowered by jealous rage and wage their eternal war not on the forces of giants or trolls but on the towns of the men they once knew.</description>
      <instinct>To take from the living</instinct>
      <moves>
         <move>Freeze flesh</move>
         <move>Call on the unworthy dead</move>
      </moves>
   </monster>
   <monster>
      <name>Ghost</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Devious</tag>
         <tag>Terrifying</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>hantom touch (d6 damage)</attack>
         <hp>16 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Insubstantial</qualities>
      <description>Every culture tells the story the same way. You live, you love or you hate, you win or you lose, you die somehow you’re not too fond of and here you are, ghostly and full of disappointment and what have you. Some people take it upon themselves, brave and kindly folks, to seek out the dead and help them pass to their rightful rest. You can find them, most times, down at the tavern drinking away the terrors they’ve seen or babbling to themselves in the madhouse. Death takes a toll on the living, no matter how you come by it.</description>
      <instinct>To haunt</instinct>
      <moves>
         <move>Reveal the terrifying nature of death</move>
         <move>Haunt a place of importance </move>
         <move>Offer information from the other side, at a price</move>
      </moves>
   </monster>
   <monster>
      <name>Ghoul</name>
      <tags>
         <tag>Group</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Talons (d8 damage, 1 piercing)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>Hunger. Hunger hunger hunger. Desperate clinging void-stomach-emptiness hunger. Sharp talons to rend flesh and teeth to tear and crack bones and suck out the soft marrow inside. Vomit up hate and screaming jealous anger and charge on twisted legs—scare the living flesh and sweeten it ever more with the stink of fear. Feast. Peasant or knight, wizard, sage, prince, or priest all make for such delicious meat.</description>
      <instinct>To eat</instinct>
      <moves>
         <move>Gnaw off a body part</move>
         <move>Gain the memories of their meal</move>
      </moves>
   </monster>
   <monster>
      <name>Lich</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
         <tag>Cautious</tag>
         <tag>Hoarder</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Magical Force (d10+3 damage, ignores armor)</attack>
         <hp>16 HP</hp>
         <armor>5 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>“At the end, they give you a scroll and a jeweled medallion to commemorate your achievements. Grand Master of Abjuration, I was called, then. Old man. Weak and wizened and just a bit too senile for them—those jealous halfwits. Barely apprentices, and they called themselves The New Council. It makes me sick, or would, if I still could be. They told me it was an honor and I would be remembered forever. It was like listening to my own eulogy. Fitting, in a way, don’t you think? It took me another ten years to learn the rituals and another four to collect the material and you see before you the fruits of my labor. I endure. I live. I will see the death of this age and the dawn of the next. It pains me to have to do this, but, you see, you cannot be permitted to endanger my research. When you meet Death, say hello for me, would you?”</description>
      <instinct>To un-live</instinct>
      <moves>
         <move>Cast a perfected spell of death or destruction</move>
         <move>Set a ritual or great working into motion</move>
         <move>Reveal a preparation or plan already completed</move>
      </moves>
   </monster>
   <monster>
      <name>Mohrg</name>
      <tags>
         <tag>Group</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Bite (d8 damage)</attack>
         <hp>10 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>You never get away with murder. Not really. You might evade the law, might escape your own conscience in the end and die, fat and happy in a mansion somewhere. When the gods themselves notice your misdeeds, though, that’s where your luck runs out and a mohrg is born. The mohrg is a skeleton—flesh and skin and hair all rotted away. All but their guts—their twisted, knotted guts still spill from their bellies, magically preserved and often wrapped, noose-like, about their necks. They do not think, exactly, but they suffer. They kill and wreak havoc and their souls do not rest. Such is the punishment, both on them for the crime and on all mankind for daring to murder one another. The gods are just and they are harsh.</description>
      <instinct>To wreak havoc</instinct>
      <moves>
         <move>Rage</move>
         <move>Add to their collection of guts</move>
      </moves>
   </monster>
   <monster>
      <name>Mummy</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Divine</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Smash (d10+2 damage)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>There are cultures who revere the dead. They do not bury them in the cold earth and mourn their passing. These people spend weeks preparing the sacred corpse for its eternal rest. Temples, pyramids, and great vaults of stone are built to house them and are populated with slaves, pets and gold. The better to live in luxury beyond the Black Gates, no? Do not be tempted by these vaults—oh, I know that greedy look! Heed my warnings or risk a terrible fate, for the honored dead do not wish to be disturbed. Thievery will only raise their ire—don’t say I did not warn you!</description>
      <instinct>To enjoy eternal rest</instinct>
      <moves>
         <move>Curse them</move>
         <move>Wrap them up</move>
         <move>Rise again</move>
      </moves>
   </monster>
   <monster>
      <name>Nightwing</name>
      <tags>
         <tag>Horde</tag>
         <tag>Stealthy</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Rend (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>Scholars of the necromantic arts will tell you that the appellation “undead” applies not only to those who have lived, died, and been returned to a sort of partway living state. It is the proper name of any creature whose energy originates beyond the Black Gates. The creature men call the nightwing is one such—empowered by the negative light of Death’s domain. Taking the shape of massive, shadowy, winged creatures (some more bat-like, some like vultures, others like some ancient, leathery things) nightwings travel in predatory flocks, swooping down to strip the flesh from cattle, horses and unlucky peasants out past curfew. Watch the night sky for their red eyes. Listen for their screeching call. And hope to the gods you have something to hide under until they pass.</description>
      <instinct>To hunt</instinct>
      <moves>
         <move>Attack from the night sky</move>
         <move>Fly away with prey</move>
      </moves>
   </monster>
   <monster>
      <name>Shadow</name>
      <tags>
         <tag>Horde</tag>
         <tag>Large</tag>
         <tag>Magical</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Shadow touch (d6+1 damage)</attack>
         <hp>11 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Shadow Form</qualities>
      <description>We call to the elements. We call on fire, ever-burning. We summon water, life-giving. We beseech the earth, stable-standing. We cry to the air, forever-changing. These elements we recognize and give our thanks but ask to pass. The elemental we call upon this night knows another name. We call upon the element of Night. Shadow, we name you. Death’s messenger and black assassin, we claim for our own. Accept our sacrifice and do our bidding ’til the morning come.</description>
      <instinct>To darken</instinct>
      <moves>
         <move>Snuff out light</move>
         <move>Spawn another shadow from the dead</move>
      </moves>
   </monster>
   <monster>
      <name>Sigben</name>
      <tags>
         <tag>Horde</tag>
         <tag>Large</tag>
         <tag>Construct</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Tail whip (d6+1 damage)</attack>
         <hp>11 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Vampire spawn</qualities>
      <description>“Aswang-hound and hopping whip-tail! Sent by vampires on their two, twisted legs, these ugly things look like the head of a rat or a crocodile, maybe, furry though and sharp of tooth. They have withered wings, but cannot use them and long, whipping tails, spurred with poison tips. Stupid, vengeful and mischievous they cause all kinds of chaos when let out of the strange clay jars in which they’re born. Only a vampire could love such a wretched thing.”</description>
      <instinct>To disturb</instinct>
      <moves>
         <move>Poison them</move>
         <move>Do a vampire’s bidding</move>
      </moves>
   </monster>
   <monster>
      <name>Skeleton</name>
      <tags>
         <tag>Horde</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Slam (d6 damage)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Insubstantial</qualities>
      <description>Dem bones, dem bones, dem dry bones.</description>
      <instinct>To take the semblance of life</instinct>
      <moves>
         <move>Act out what it did in life</move>
         <move>Snuff out the warmth of life</move>
         <move>Reconstruct from miscellaneous bones</move>
      </moves>
   </monster>
   <monster>
      <name>Spectre</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Withering touch (d10 damage)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Insubstantial</qualities>
      <description>For some folk, when they pass, Death himself cannot release their grip on the places they love most. A priest whose devotion to the temple is greater than that of his god. A banking guild official who cannot bear to part with his vault. A drunk and his favorite tavern. All make excellent spectres. They act not out of the usual hunger that drives the undead, but jealousy. Jealousy that anyone else might come to love their home as much as they do and drive them out. These places belong to them and these invisible spirits will kill before they’ll let anyone send them to their rest.</description>
      <instinct>To drive life from a place</instinct>
      <moves>
         <move>Turn their haunt against a creature</move>
         <move>Bring the environment to life</move>
      </moves>
   </monster>
   <monster>
      <name>Vampire</name>
      <tags>
         <tag>Group</tag>
         <tag>Stealthy</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Supernatural force (d8+5 damage, 1 piercing)</attack>
         <hp>10 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Changing form, ancient mind</qualities>
      <description>We fear them, because they call to us. So much like us, or how we hope to be: beautiful, passionate, and powerful. They are drawn to us for what they cannot be: warm, kind, and alive. These tormented souls can only hope, at most, to pass their dreadful curse along. Every time they feed they run the risk of passing along their torture to another and in each one lives the twisted seed of its creator. Vampires beget vampires. Suffering begets suffering. Do not be drawn in by their seduction or you may be given their gift—a crown of shadows and the chains of eternal undying grief.</description>
      <instinct>To manipulate</instinct>
      <moves>
         <move>Charm someone</move>
         <move>Feed on their blood</move>
         <move>Retreat to plan again</move>
      </moves>
   </monster>
   <monster>
      <name>Wight-Wolf</name>
      <tags>
         <tag>Horde</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>ounce (d6+1 damage 1 piercing)</attack>
         <hp>7 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Shadow form</qualities>
      <description>Like the nightwing, the wight-wolf is a creature not spawned in our world. Somehow slipping the seals of the Black Gates of Death, these spirits take the shape of massive hounds or shadowy wolves and hunt the living for sport. They travel in packs, led by a mighty alpha, but bear a kind of intelligence unknown to true canines. Their wild hunts draw the attention of intelligent undead—liches, vampires and the like—who will sometimes make pacts with the alpha and serve a grim purpose together. Listen for the baying of the hounds of Death and pray that they do not howl for you.</description>
      <instinct>To hunt</instinct>
      <moves>
         <move>Encircle prey</move>
         <move>Summon the pack</move>
      </moves>
   </monster>
   <monster>
      <name>Zombie</name>
      <tags>
         <tag>Horde</tag>
      </tags>
      <setting>Undead Legions</setting>
      <stats>
         <attack>Bite (d6 damage)</attack>
         <hp>11 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>When there’s no more room in Hell…</description>
      <instinct>Braaaaaains</instinct>
      <moves>
         <move>Attack with overwhelming numbers</move>
         <move>Corner them</move>
         <move>Gain strength from the dead, spawn more zombies</move>
      </moves>
   </monster>
   <monster>
      <name>Assassin Vine</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Stealthy</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Thorns (d10 damage, 1 piercing)</attack>
         <hp>15 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Plant</qualities>
      <description>Among the animals there exists a clear division ‘tween hunter and hunted. All it takes is a glance to know—by fangs and glowing eyes or claws or venomous sting—which of the creatures of this world are meant to kill and which stand to be killed. Such a split, if you have the eyes to see it, cuts the world of leaves and flowers in twain, as well. Druids in their forest circles know it. Rangers, too, might spot such a plant before it’s too late. Lay folk, though, they wander where they oughtn’t—paths into the deep woods covered in creeping vines and with a snap, these hungry ropes snap tight, dragging their meaty prey into the underbrush. Mind your feet, traveller.</description>
      <instinct>To grow</instinct>
      <moves>
         <move>Shoot forth new growth</move>
         <move>Attack the unwary</move>
      </moves>
   </monster>
   <monster>
      <name>Blink Dog</name>
      <tags>
         <tag>Group</tag>
         <tag>Small</tag>
         <tag>Magical</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Bite (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>4 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Illusion</qualities>
      <description>Now you see it, now you don’t. Hounds once owned by a sorcerer lord and imbued with a kind of illusory cloak, they escaped into the woods around his lair and began to breed with wolves and wild dogs of the forest. You can spot them, if you’re lucky, by the glittering silver of their coats and their strange, ululating howls. They have a remarkable talent for being not quite where they appear to be and use it to take down prey much stronger than themselves. If you find yourself facing a pack of blink dogs you might as well close your eyes and fight. You’ll have an easier time when not betrayed by your natural sight. By such sorceries are the natural places of the world polluted with unnatural things.</description>
      <instinct>To hunt</instinct>
      <moves>
         <move>Give the appearance of being somewhere they’re not</move>
         <move>Summon the pack</move>
         <move>Move with amazing speed</move>
      </moves>
   </monster>
   <monster>
      <name>Centaur</name>
      <tags>
         <tag>Horde</tag>
         <tag>Large</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Bow (d6+2 damage, 1 piercing)</attack>
         <hp>11 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Near</tag>
      </stats>
      <qualities>Half-horse, Half-man</qualities>
      <description>“It will be a gathering of clans unseen in this age. Call Stormhoof and Brightspear. Summon Whitemane and Ironflanks. Sound the horn and we shall begin our meeting—we shall speak the words and bind our people together. Too long have the men cut the ancient trees for their ships. The elves are weak and cowardly, friend to these mannish slime. It will be a cleansing fire from the darkest woods. Raise the red banner of war! Today we strike back against these apes and retake what is ours!”</description>
      <instinct>To rage</instinct>
      <moves>
         <move>Overrun them</move>
         <move>Fire a perfect bullseye</move>
         <move>Move with unrelenting speed</move>
      </moves>
   </monster>
   <monster>
      <name>Chaos Ooze</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Planar</tag>
         <tag>Terrifying</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Warping touch (d10 damage ignores armor)</attack>
         <hp>23 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Ooze, Fragments of other planes embedded in it</qualities>
      <description>The barrier between Dungeon World and the elemental planes is not, as you might hope, a wall of stone. It’s much more porous. Places where the civil races do not often tread can sometimes, how to put this, spring a leak. Like a dam come just a little loose. Bits and pieces of the chaos spill out. Sometimes, they’ll congeal like an egg on a pan—that’s where we get the material for many of the Guild’s magical trinkets. Useful, right? Sometimes, though, it squirms and squishes around a bit and stays that way, warping all it touches into some other, strange form. Chaos begets chaos, and it grows.</description>
      <instinct>To change</instinct>
      <moves>
         <move>Cause a change in appearance or substance</move>
         <move>Briefly bridge the planes</move>
      </moves>
   </monster>
   <monster>
      <name>Cockatrice</name>
      <tags>
         <tag>Group</tag>
         <tag>Small</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Beak (d8 damage)</attack>
         <hp>6 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Stone touch</qualities>
      <description>“I ain’t ever seen such a thing, sir. Rodrick thought it a chicken, maybe. Poor Rodrick. I figured it to be a lizard of a sort, though he was right—it had a beak and gray feathers like a chicken. Right, well, see, we found it in the woods, in a nest at the foot of a tree while we were out with the sow. Looking for mushrooms, sir. I told Rodrick we were—yes, sir, right sir, the bird—see, it was glaring at Rodrick and he tried to scare it off with a stick to steal the eggs but the thing pecked his hand. Quick it was, too. I tried to get him away but he just got slower and slower and…yes, as you see him now, sir. All frozen up like when we left the dog out overnight in winter two years back. Poor, stupid Rodrick. Weren’t no bird nor lizard, were it, sir?”</description>
      <instinct>To defend the nest</instinct>
      <moves>
         <move>Start a slow transformation to stone</move>
      </moves>
   </monster>
   <monster>
      <name>Dryad</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
         <tag>Devious</tag>
         <tag/>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Crushing vines (w[2d8]damage)</attack>
         <hp>12 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Plant</qualities>
      <description>More beautiful by far than any man or woman born in the civil realms. To gaze upon one is to fall in love. Deep and punishing, too. Thing is, they don’t love—not the fleshy folk who often find them, anyway. Their love is a primal thing, married to the woods—to a great oak that serves as home and mother and sacred place to them. It’s a curse to see one, too, they’ll never love you back. No matter what you do. No matter how you pledge yourself to them, they’ll always spurn you. If ever their oak comes to harm, you’ve not only the dryad’s wrath to contend with, but in every nearby village there’s a score of men with a secret longing in their heart, ready to murder you where you sleep for just a smile from such a creature.</description>
      <instinct>To love nature passionately</instinct>
      <moves>
         <move>Entice a mortal</move>
         <move>Merge into a tree</move>
         <move>Turn nature against them</move>
      </moves>
   </monster>
   <monster>
      <name>Eagle Lord</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Organized</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Talons (b[2d8]+1 damage, 1 piercing)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
      </stats>
      <qualities>Mighty wings</qualities>
      <description>Some the size of horses. Bigger, even—the kings and queens of the eagles. Their cry pierces the mountain sky and woe to those who fall under the shadow of their mighty wings. The ancient wizards forged a pact with them in the primordial days. Men would take the plains and valleys and leave the mountaintops to the eagle lords. These sacred pacts should be honored, lest they set their talons into you. Lucky are the elves, for the makers of their treaties yet live and when danger comes to elvish lands, the eagle lords often serve as spies and mounts for them. Long-lived and proud, some might be willing to trade their ancient secrets for the right price, too.</description>
      <instinct>To rule the heights</instinct>
      <moves>
         <move>Attack from the sky</move>
         <move>Pull someone into the air</move>
         <move>Call on ancient oaths</move>
      </moves>
   </monster>
   <monster>
      <name>Elvish Warrior</name>
      <tags>
         <tag>Horde</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Sword (b[2d6] damage)</attack>
         <hp>3 HP</hp>
         <armor>2 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Sharp sense</qualities>
      <description>”As with all things they undertake, the elves approach war as an art. I saw them fight, once. The Battle of Astrid’s Veil. Yes, I am that old, boy, now hush. A warrior-maiden, she was clad in plate that shone like the winter sky. White hair streaming and a pennant of ocean blue tied to her spear. She seemed to glide between the trees the way an angel might, striking out and bathing her blade in blood that steamed in the cold air. I never felt so small before. I trained with the master-at-arms of Battlemoore, you know. I’ve held a sword longer than you’ve been alive, boy, and in that one moment I knew that my skill meant nothing. Thank the gods the elves were with us then. A more beautiful and terrible thing I have never seen.”</description>
      <instinct>To seek perfection</instinct>
      <moves>
         <move>Strike at a weak point</move>
         <move>Set ancient plans in motion</move>
         <move>Use the woods to advantage</move>
      </moves>
   </monster>
   <monster>
      <name>Elvish High Arcanist</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Magical</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Arcane fire (d10 damage ignores armor)</attack>
         <hp>12 HP</hp>
         <armor>0 Armor</armor>
         <tag>Near</tag>
         <tag>Far</tag>
      </stats>
      <qualities>Sharp senses</qualities>
      <description>True elvish magic isn’t like the spells of men. Mannish wizardry is all rotes and formulas. They cheat to find the arcane secrets that resound all around them. They are deaf to the arcane symphony that sings in the woods. Elvish magic requires a fine ear to hear that symphony and the voice with which to sing. To harmonize with what is already resounding. Men bind the forces of magic to their will; Elves simply pluck the strings and hum along. The High Arcanists, in a way, have become more and less than any elf. The beat of their blood is the throbbing of all magic in this world.</description>
      <instinct>To unleash power</instinct>
      <moves>
         <move>Work the magic that nature demands</move>
         <move>Cast forth the elements</move>
      </moves>
   </monster>
   <monster>
      <name>Griffin</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Talons (d8+3 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Wings</qualities>
      <description>On first glance, one might mistake the griffin for another magical mistake like the manticore or the chimera. It looks the part, doesn’t it? These creatures have the regal haughtiness of a lion and the arrogant bearing of an eagle, but they temper those with the unshakeable loyalty of both. To earn the friendship of a griffin is to have an ally all your living days. Truly a gift, that. If you’re ever lucky enough to meet one be respectful and deferential above all else. It may not seem it but they can perceive the subtlest slights and will answer them with a sharp beak and talons.</description>
      <instinct>To serve allies</instinct>
      <moves>
         <move>Judge someone’s worthiness</move>
         <move>Carry an ally aloft</move>
         <move>Strike from above</move>
      </moves>
   </monster>
   <monster>
      <name>Hill Giant</name>
      <tags>
         <tag>Group</tag>
         <tag>Huge</tag>
         <tag>Intelligent</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Thrown rocks (d8+3 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Reach</tag>
         <tag>Near</tag>
         <tag>Far</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Enchantment</qualities>
      <description>Ever seen an ogre before? Bigger than that. Dumber and meaner, too. Hope you like having cows thrown at you.</description>
      <instinct>Ruin everything.</instinct>
      <moves>
         <move>Throw something</move>
         <move>Do something stupid</move>
         <move>Shake the earth</move>
      </moves>
   </monster>
   <monster>
      <name>Ogre</name>
      <tags>
         <tag>Group</tag>
         <tag>Large</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Club (d8+5 damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Enchantment</qualities>
      <description>A tale, then. Somewhere in the not-so-long history of the mannish race there was a divide. In days when men were merely dwellers-in-the-mud with no magic to call their own, they split in two: one camp left their caves and the dark forests and built the first city to honor the gods. The others, a wild and savage lot, retreated into darkness. They grew, there. In the deep woods a grim loathing for their softer kin gave them strength. They found dark gods of their own, there in the woods and hills. Ages passed and they bred tall and strong and full of hate. We have forged steel and they match it with their savagery. We may have forgotten our common roots, but somewhere, deep down, the ogres remember.</description>
      <instinct>To return the world to darker days</instinct>
      <moves>
         <move>Destroy something</move>
         <move> Fly into a rage</move>
         <move> Take something by force</move>
      </moves>
   </monster>
   <monster>
      <name>Razor Boar</name>
      <tags>
         <tag>Solitary</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Tusks (d10 damage, 3 piercing)</attack>
         <hp>16 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Enchantment</qualities>
      <description>The tusks of the razor boar shred metal plate like so much tissue. Voracious, savage and unstoppable, they tower over their mundane kin. To kill one? A greater trophy of bravery and skill is hard to name, though I hear a razor boar killed the Drunkard King in a single thrust. You think you’re a better hunter than he?</description>
      <instinct>To shred</instinct>
      <moves>
         <move>Rip them apart</move>
         <move>Rend armor and weapons</move>
      </moves>
   </monster>
   <monster>
      <name>Satyr</name>
      <tags>
         <tag>Group</tag>
         <tag>Devious</tag>
         <tag>Magical</tag>
         <tag>Hoarder</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Charge (w[2d8] damage)</attack>
         <hp>10 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities>Enchantment</qualities>
      <description>One of only a very few creatures to be found in the old woods that don’t outright want to maim, kill, or eat us. They dwell in glades pierced by the sun, and dance on their funny goat-legs to enchanting music played on pipes made of bone and silver. They smile easily and, so long as you please them with jokes and sport, will treat our kind with friendliness. They’ve a mean streak, though, so if you cross them, make haste elsewhere; very few things hold a grudge like the stubborn satyr.</description>
      <instinct>To enjoy</instinct>
      <moves>
         <move>Pull others into revelry through magic</move>
         <move>Force gifts upon them</move>
         <move>Play jokes with illusions and tricks</move>
      </moves>
   </monster>
   <monster>
      <name>Sprite</name>
      <tags>
         <tag>Horde</tag>
         <tag>Tiny</tag>
         <tag>Stealthy</tag>
         <tag>Magical</tag>
         <tag>Devious</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Dagger (w[2d4] damage)</attack>
         <hp>3 HP</hp>
         <armor>0 Armor</armor>
         <tag>Hand</tag>
      </stats>
      <qualities>Wings, Fey Magic</qualities>
      <description>I’d classify them elementals, except that “being annoying” isn’t an element.</description>
      <instinct>To play tricks</instinct>
      <moves>
         <move>Play a trick to expose someone’s true nature</move>
         <move>Confuse their senses</move>
         <move>Craft an illusion</move>
      </moves>
   </monster>
   <monster>
      <name>Treant</name>
      <tags>
         <tag>Group</tag>
         <tag>Huge</tag>
         <tag>Intelligent</tag>
         <tag>Amorphous</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Walloping branches (d10+5 damage)</attack>
         <hp>21 HP</hp>
         <armor>4 Armor</armor>
         <tag>Reach</tag>
         <tag>Forceful</tag>
      </stats>
      <qualities>Wooden</qualities>
      <description>Old and tall and thick of bark</description>
      <instinct>To shed the appearance of civilization</instinct>
      <moves>
         <move>Move with implacable strength</move>
         <move>Set down roots</move>
         <move>Spread old magic</move>
      </moves>
   </monster>
   <monster>
      <name>Werewolf</name>
      <tags>
         <tag>Solitary</tag>
         <tag>Intelligent</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Bite (d10+2 damage, 1 piercing)</attack>
         <hp>12 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
         <tag>Messy</tag>
      </stats>
      <qualities>Weak to silver</qualities>
      <description>“Beautiful, isn’t it? The moon, I mean. She’s watching us, you know? Her pretty silver eyes watch us while we sleep. Mad, too—like all the most beautiful ones. If she were a woman, I’d bend my knee and make her my wife on the spot. No, I didn’t ask you here to speak about her, though. The chains? For your safety, not mine. I’m cursed, you see. You must have suspected. The sorcerer-kings called it “lycanthropy” in their day—passed on by a bite to make more of our kind. No, I could find no cure. Please, don’t be scared. You have the arrows I gave you? Silver, yes. Ah, you begin to understand. Don’t cry, sister. You must do this for me. I cannot bear more blood on my hands. You must end this. For me.”</description>
      <instinct>To shed the appearance of civilization</instinct>
      <moves>
         <move>Transform to pass unnoticed as beast or man</move>
         <move>Strike from within</move>
         <move>Hunt like man and beast</move>
      </moves>
   </monster>
   <monster>
      <name>Worg</name>
      <tags>
         <tag>Horde</tag>
         <tag>Organized</tag>
      </tags>
      <setting>Dark Woods</setting>
      <stats>
         <attack>Bite (d6 damage)</attack>
         <hp>3 HP</hp>
         <armor>1 Armor</armor>
         <tag>Close</tag>
      </stats>
      <qualities/>
      <description>As horses are to the civil races, so go the worg to the goblins. Mounts, fierce in battle, ridden by only the bravest and most dangerous, are found and bred in the forest primeval to serve the goblins in their wars on men. The only safe worg is a pup, separated from its mother. If you can find one of these, or make orphans of a litter with a sharp sword, you’ve got what could become a loyal protector or hunting hound in time. Train it well, mind you, for the worg are smart and never quite free of their primal urges.</description>
      <instinct>To serve</instinct>
      <moves>
         <move>Carry a rider into battle</move>
         <move>Give its rider an advantage</move>
      </moves>
   </monster>
</monsters>
XML;
$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
//print_r($xml);
foreach ($xml->monster as $monster) {
	//print_r($monster);
	//echo $monster->name.'<br>';
	foreach($monster->tags->tag as $tag) {
     $tagid = findtag($tag);	
     echo $tag.' '.$tagid.'<br>';
	}
   foreach($monster->stats->tag as $tag){
     $tagid = findtag($tag);   
     echo '...'.$tag.' '.$tagid.'<br>'; 
   }
}
function findtag($tag) {
   global $db;
   $sql = "
    SELECT *
    FROM `monstertags`
    WHERE `tag` = '".$tag."'";

   if(!$result = $db->query($sql)){
       die('There was an error running the query [' . $db->error . ']');
   }
   if ($result->num_rows<1) {
      //echo $tag.' not found<br>';
      $sql = "INSERT INTO `dungeon_world`.`monstertags` (`ID`, `tag`, `description`, `tagtype`) VALUES (NULL, '".$tag."', '', 'range');";
      if(!$result = $db->query($sql)){
          die('There was an error running the query [' . $db->error . ']');
      }
      //echo 'inserted '.mysqli_insert_id($db);
      return mysqli_insert_id($db);
   } else {
      //echo 'found: '.$tag.'<br>';
      $row = $result->fetch_assoc();
      //echo $row['ID'].'<br>';
      return $row['ID'];
   }
}
?>
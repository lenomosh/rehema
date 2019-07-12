<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    /**
     * @return array
     */
    public function quote(){
        $quotes = array(
            array(
                'quote' => "Let us never forget that government is ourselves and not an alien power over us. The ultimate rulers of our democracy are not a President and senators and congressmen and government officials, but the voters of this country",
                'author' => "Franklin D. Roosevelt"
            ),
            array(
                'quote' => "If we desire a society of peace, then we cannot achieve such a society through violence. If we desire a society without discrimination, then we must not discriminate against anyone in the process of building this society. If we desire a society that is democratic, then democracy must become a means as well as an end. ",
                'author' => " Bayard Rustin"
            ),
            array(
                'quote' => " Where you see wrong or inequality or injustice, speak out, because this is your country. This is your democracy. Make it. Protect it. Pass it on.",
                'author' => "Thurgood Marshall "
            ),
            array(
                'quote' => "It's a relief to hear the rain. It's the sound of billions of drops, all equal, all equally committed to falling, like a sudden outbreak of democracy. Water, when it hits the ground, instantly becomes a puddle or rivulet or flood. ",
                'author' => "Alice Oswald"
            ),
            array(
                'quote' => "Real liberty is neither found in despotism or the extremes of democracy, but in moderate governments. ",
                'author' => "Alexander Hamilton"
            ),
            array(
                'quote' => "Democracy cannot succeed unless those who express their choice are prepared to choose wisely. The real safeguard of democracy, therefore, is education.",
                'author' => "Franklin D. Roosevelt"
            ),
            array(
                'quote' => "Democracy is not merely a form of government. It is primarily a mode of associated living, of conjoint communicated experience. It is essentially an attitude of respect and reverence towards fellow men.",
                'author' => "B. R. Ambedkar",
            ),
            array(
                'quote' => "Democracy and socialism have nothing in common but one word, equality. But notice the difference: while democracy seeks equality in liberty, socialism seeks equality in restraint and servitude.",
                'author' => "Alexis de Tocqueville"
            ),
            array(
                'quote' => "There is a cult of ignorance in the United States, and there has always been. The strain of anti-intellectualism has been a constant thread winding its way through our political and cultural life, nurtured by the false notion that democracy means that my ignorance is just as good as your knowledge.",
                'author' => "Isaac Asimov"
            ),
            array(
                'quote' => " Political democracy cannot last unless there lies at the base of it social democracy. What does social democracy mean? It means a way of life which recognizes liberty, equality and fraternity as the principles of life.",
                'author' => "B. R. Ambedkar"
            ),
            array(
                'quote' => "The government, which was designed for the people, has got into the hands of the bosses and their employers, the special interests. An invisible empire has been set up above the forms of democracy.",
                'author' => "Woodrow Wilson"
            ),
            array(
                'quote' => "To make democracy work, we must be a nation of participants, not simply observers. One who does not vote has no right to complain. ",
                'author' => "Louis L'Amour"
            ),
            array(
                'quote' => "Dictatorship naturally arises out of democracy, and the most aggravated form of tyranny and slavery out of the most extreme liberty. Plato Hatred is corrosive of a person's wisdom and conscience; the mentality of enmity can poison a nation's spirit, instigate brutal life and death struggles, destroy a society's tolerance and humanity, and block a nation's progress to freedom and democracy.",
                'author' => "Liu Xiaobo"
            ),
            array(
                'quote' => "Corruption is a cancer: a cancer that eats away at a citizen's faith in democracy, diminishes the instinct for innovation and creativity; already-tight national budgets, crowding out important national investments. It wastes the talent of entire generations. It scares away investments and jobs.",
                'author' => "Joe Biden"
            ),
            array(
                'quote' => "There is no dignity in wickedness, whether in purple or rags; and hell is a democracy of devils, where all are equals.",
                'author' => "Herman Melville"
            ),
            array(
                'quote' => "There is not Communism or Marxism, but representative democracy and social justice in a well-planned economy.",
                'author' => "Fidel Castro"
            ),
            array(
                'quote' => "Democracy must be built through open societies that share information. When there is information, there is enlightenment. When there is debate, there are solutions. When there is no sharing of power, no rule of law, no accountability, there is abuse, corruption, subjugation and indignation.",
                'author' => "Atifete Jahjaga"
            ),
            array(
                'quote' => "I really rebel against this idea that politics has to be a place full of ego and where you're constantly focused on scoring hits against each one another. Yes, we need a robust democracy, but you can be strong, and you can be kind.",
                'author' => "Jacinda Ardern"
            ),
            array(
                'quote' => "Democracy must be something more than two wolves and a sheep voting on what to have for dinner.",
                'author' => "James Bovard"
            ),
            array(
                'quote' => "Democracy... while it lasts is more bloody than either aristocracy or monarchy. Remember, democracy never lasts long. It soon wastes, exhausts, and murders itself. There is never a democracy that did not commit suicide.",
                'author' => "John Adams"
            ),
            array(
                'quote' => "Democracy is not something that happens, you know, just at election time, and it's not something that happens just with one event. It's an ongoing building process. But it also ought to be a part of our culture, a part of our lives.",
                'author' => "Jim Hightower"
            ),
            array(
                'quote' => "The best weapon of a dictatorship is secrecy, but the best weapon of a democracy should be the weapon of openness.",
                'author' => "Niels Bohr"
            ),
            array(
                'quote' => "Education is a human right with immense power to transform. On its foundation rest the cornerstones of freedom, democracy and sustainable human development.",
                'author' => "Kofi Annan"
            ),
            array(
                'quote' => "Democracy is not just an election, it is our daily life.",
                'author' => "Tsai Ing-wen"
            ),
            array(
                'quote' => "You see these dictators on their pedestals, surrounded by the bayonets of their soldiers and the truncheons of their police ... yet in their hearts there is unspoken fear. They are afraid of words and thoughts: words spoken abroad, thoughts stirring at home -- all the more powerful because forbidden -- terrify them. A little mouse of thought appears in the room, and even the mightiest potentates are thrown into panic",
                'author' => "Winston S. Churchill, Blood, Sweat and Tears"
            ),
            array(
                'quote' => "As I would not be a slave, so I would not be a master. This expresses my idea of democracy.",
                'author' => "Abraham Lincoln "
            ),
            array(
                'quote' => "Gandhi is the other person. I believe Gandhi is the only person who knew about real democracy - not democracy as the right to go and buy what you want, but democracy as the responsibility to be accountable to everyone around you. Democracy begins with freedom from hunger, freedom from unemployment, freedom from fear, and freedom from hatred. To me, those are the real freedoms on the basis of which good human societies are based.",
                'author' => "Vandana Shiva"
            ),
            array(
                'quote' => "In a democracy, someone who fails to get elected to office can always console himself with the thought that there was something not quite fair about it.",
                'author' => "Thucydides, History of the Peloponnesian War"
            ),
            array(
                'quote' => "A democracy which makes or even effectively prepares for modern, scientific war must necessarily cease to be democratic. No country can be really well prepared for modern war unless it is governed by a tyrant, at the head of a highly trained and perfectly obedient bureaucracy.",
                'author' => "Aldous Huxley, Ends and Means"
            ),
            array(
                'quote' => "Under democracy one party always devotes its chief energies to trying to prove that the other party is unfit to rule-and both commonly succeed, and are right.",
                'author' => "H. L. Mencken, Minority Report "
            ),
            array(
                'quote' => "Our safety, our liberty, depends upon preserving the Constitution of the United States as our fathers made it inviolate. The people of the United States are the rightful masters of both Congress and the courts, not to overthrow the Constitution, but to overthrow the men who pervert the Constitution.",
                'author' => "Abraham Lincoln"
            ),
            array(
                'quote' => "Giving every man a vote has no more made men wise and free than Christianity has made them good.",
                'author' => "H.L. Mencken"
            ),
            array(
                'quote' => "When widely followed public figures feel free to say anything, without any fact-checking, it becomes impossible for a democracy to think intelligently about big issues.",
                'author' => "Thomas L. Friedman"
            ),
            array(
                'quote' => "No one in this world, so far as I know-and I have searched the record for years, and employed agents to help me-has ever lost money by underestimating the intelligence of the great masses of the plain people.",
                'author' => " H.L. Mencken, Gist of Mencken "
            ),
            array(
                'quote' => "It's not the voting that's democracy, it's the counting.",
                'author' => "Tom Stoppard, Jumpers "
            ),
            array(
                'quote' => "...I do not want art for a few; any more than education for a few; or freedom for a few...  ",
                'author' => " William Morris "
            ),
            array(
                'quote' => "I hold it that a little rebellion now and then is a good thing, and as necessary in the political world as storms in the physical.",
                'author' => "Thomas Jefferson"
            ),
            array(
                'quote' => "But love, like the sun that it is, sets afire and melts everything. what greed and privilege to build up over whole centuries the indignation of a pious spirit, with its natural following of oppressed souls, will cast down with a single shove.",
                'author' => " Jose Marti"
            ),
            array(
                'quote' => "it is the people who control the Government, not the Government the people.",
                'author' => " Winston S. Churchill"
            ),
            array(
                'quote' => "Here's what we're not taught [about the Declaration and Constitution]: Those words at the time they were written were blazingly, electrifyingly subversive. If you understand them truly now, they still are. You are not taught - and it is a disgrace that you aren't - that these men and women were radicals for liberty; that they had a vision of equality that was a slap in the face of what the rest of their world understood to be the unchanging, God-given order of nations; and that they were willing to die to make that desperate vision into a reality for people like us, whom they would never live to see.",
                'author' => " Naomi Wolf, The End of America: Letter of Warning to a Young Patriot "
            ),
            array(
                'quote' => "The major western democracies are moving towards corporatism. Democracy has become a business plan, with a bottom line for every human activity, every dream, every decency, every hope. The main parliamentary parties are now devoted to the same economic policies - socialism for the rich, capitalism for the poor - and the same foreign policy of servility to endless war. This is not democracy. It is to politics what McDonalds is to food",
                'author' => "John Pilger "
            ),
            array(
                'quote' => "Freedom of speech is unnecessary if the people to whom it is granted do not think for themselves.",
                'author' => " Mokokoma Mokhonoana "
            ),
            array(
                'quote' => "Social conservatism and neoconservatism have revived authoritarian conservatism, and not for the better of conservatism or American democracy. True conservatism is cautious and prudent. Authoritarianism is rash and radical. American democracy has benefited from true conservatism, but authoritarianism offers potentially serious trouble for any democracy.",
                'author' => "John W. Dean, Conservatives Without Conscience "
            ),
            array(
                'quote' => "The answer to 1984 is 1776",
                'author' => "Alex E. Jones"
            ),
            array(
                'quote' => "High hopes were once formed of democracy; but democracy means simply the bludgeoning of the people by the people for the people.",
                'author' => "Oscar Wilde"
            ),
            array(
                'quote' => "Society has three stages: Savagery, Ascendance, Decadence. The great rise because of Savagery. They rule in Ascendance. They fall because of their own Decadence.\"
He tells how the Persians were felled, how the Romans collapsed because their rulers forgot how their parents gained them an empire. He prattles about Muslim dynasties and European effeminacy and Chinese regionalism and American self-loathing and self-neutering. All the ancient names.
\"Our Savagery began when our capital, Luna, rebelled against the tyranny of Earth and freed herself from the shackles of Demokracy, from the Noble Lie - the idea that men are brothers and are created equal.\"
Augustus weaves lies of his own with that golden tongue of his. He tells of the Goldens' suffering. The Masses sat on the wagon and expected the great to pull, he reminds. They sat whipping the great until we could no longer take it.
I remember a different whipping.
\"Men are not created equal; we all know this. There are averages. There are outliers. There are the ugly. There are the beautiful. This would not be if we were all equal. A Red can no more command a starship than a Green can serve as a doctor!\"
There's more laughter across the square as he tells us to look at pathetic Athens, the birthplace of the cancer they call Demokracy. Look how it fell to Sparta. The Noble Lie made Athens weak. It made their citizens turn on their best general, Alcibiades, because of jealousy.
\"Even the nations of Earth grew jealous of one another. The United States of America exacted this idea of equality through force. And when the nations united, the Americans were surprised to find that they were disliked! The Masses are jealous! How wonderful a dream it would be if all men were created equal! But we are not.
It is against the Noble Lie that we fight. But as I said before, as I say to you now, there is another evil against which we war. It is a more pernicious evil. It is a subversive, slow evil. It is not a wildfire. It is a cancer. And that cancer is Decadence. Our society has passed from Savagery to Ascendance. But like our spiritual ancestors, the Romans, we too can fall into Decadence.",
                'author' => " Pierce Brown, Red Rising "
            ),
            array(
                'quote' => "Democracy becomes a government of bullies tempered by editors.",
                'author' => "Ralph Waldo Emerson "
            ),
            array(
                'quote' => "But when the group is literally capable of changing our perceptions, and when to stand alone is to activate primitive, powerful, and unconscious feelings of rejection, then the health of these institutions seems far more vulnerable than we think.",
                'author' => " Susan Cain, Quiet: The Power of Introverts in a World That Can't Stop Talking "
            ),
            array(
                'quote' => "Constitutional morality is not a natural sentiment. It has to be cultivated. We must realise that our people have yet to learn it. Democracy in India is only a top-dressing on an Indian soil which is essentially undemocratic.",
                'author' => " B.R. Ambedkar, Annihilation of Caste "
            ),
            array(
                'quote' => "Every actual democracy rests on the principle that not only are equals equal but unequals will not be treated equally. Democracy requires, therefore, first homogeneity and second-if the need arises elimination or eradication of heterogeneity",
                'author' => " Carl Schmitt, The Crisis of Parliamentary Democracy "
            ),
            array(
                'quote' => "The Americans are the living refutation of the Cartesian axiom, \"I think, therefore I am\": Americans do not think, yet they are.",
                'author' => " Julius Evola "
            ),
            array(
                'quote' => "It is not enough to be electors only.
It is necessary to be law-makers;
otherwise those who can be law-makers will be the masters of those who can only be electors.",
                'author' => "Bhimrao Ramji Ambedkar, Writings And Speeches: A Ready Reference Manual "
            ),
            array(
                'quote' => "How does paying people more money make you more money?

It works like this. The more you pay your workers, the more they spend. Remember, they're not just your workers- they're your consumers, too. The more they spend their extra cash on your products, the more your profits go up. Also, when employees have enough money that they don't have to live in constant fear of bankruptcy, they're able to focus more on their work- and be more productive. With fewer personal problems and less stress hanging over them, they'll lose less time at work, meaning more profits for you. Pay them enough to afford a late model car (i.e. one that works), and they'll rarely be late for work. And knowing that they'll be able to provide a better life for their children will not only give them a more positive attitude, it'll give them hope- and an incentive to do well for the company because the better the company does, the better they'll do.

Of course, if you're like most corporations these days- announcing mass layoffs right after posting record profits- then you're already hemorrhaging the trust and confidence of your remaining workforce, and your employees are doing their jobs in a state of fear. Productivity will drop. That will hurt sales. You will suffer. Ask the people at Firestone: Ford has alleged that the tire company fired its longtime union employees, then brought in untrained scab workers who ended up making thousands of defective tires- and 203 dead customers later, Firestone is in the toilet.",
                'author' => "Michael Moore, Stupid White Men "
            ),
            array(
                'quote' => "Equality may be a fiction but nonetheless one must accept it as a governing principle",
                'author' => "Bhimrao Ramji Ambedkar, Writings And Speeches: A Ready Reference Manual"
            )
        );
        return $quotes;
    }

}

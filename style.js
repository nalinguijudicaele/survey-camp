const text = "Bonjour ! Nous t'invitons à participer à un questionnaire en ligne visant à identifier les intentions de vote et les avis de manière anonyme et confidentielle sur le processus électoral, c'est-à-dire à exprimer ton choix de voter ou non et à donner ton opinion sur le déroulement des élections. Ta participation pourra permettre l'amélioration des services offerts aux électeurs et aux candidats dans le but de favoriser leurs conditions, leur persévérance et leur réussite pour assurer le bon déroulement des événements. Nous tenons à rappeler ici que ce sondage ne soutient aucun parti politique et reste complètement neutre quant au choix de chaque participant. Le temps consacré pour répondre au sondage est de 2 à 5 minutes et ta participation restera confidentielle et anonyme. Merci d'avance pour ta contribution.";
let index = 0;
const speed = 50; // Vitesse de l'effet de machine à écrire (en millisecondes)

function typeWriter() {
    if (index < text.length) {
        document.getElementById("typewriter-text").innerHTML += text.charAt(index);
        index++;
        if (text.charAt(index - 1) === '.' || text.charAt(index - 1) === '!') {
            document.getElementById("typewriter-text").innerHTML += "<br>";
        }
        setTimeout(typeWriter, speed);
    }
}

typeWriter();
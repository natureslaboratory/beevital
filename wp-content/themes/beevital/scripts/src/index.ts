import Faq from "./classes/FAQ";

// get faq container
const faqContainers = Array.from(document.getElementsByClassName("schema-faq") as HTMLCollectionOf<HTMLElement>);

faqContainers.forEach(c => {
    new Faq(c);
})

// create instances of question (has method hide/show)
// add event listeners for click for opening/closing


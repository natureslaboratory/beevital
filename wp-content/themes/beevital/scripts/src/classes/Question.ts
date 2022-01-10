export default class Question {
    node: HTMLElement;
    answer: HTMLElement;
    chevron: HTMLElement;

    get isShowing(): boolean {
        if (this.answer.style.maxHeight) {
            return true;
        }
        return false;
    }

    constructor(node: HTMLElement) {
        this.node = node;
        let answers = this.node.getElementsByClassName("schema-faq-answer") as HTMLCollectionOf<HTMLElement>;
        if (answers) {
            this.answer = answers[0];
        }

        // adds chevron
        this.chevron = document.createElement("i");
        this.chevron.className = "far fa-chevron-down"
        let question = (this.node.getElementsByClassName("schema-faq-question") as HTMLCollectionOf<HTMLElement>)[0];
        let questionContainer = document.createElement("div");
        questionContainer.className = "schema-faq-question-container";
        questionContainer.appendChild(question);
        questionContainer.appendChild(this.chevron);
        this.node.insertBefore(questionContainer, this.answer);

        console.log(this.node, this.answer);
    }

    show() {
        this.answer.style.transition = `${this.answer.scrollHeight/4 + 150}ms`
        this.answer.style.maxHeight = `${this.answer.scrollHeight}px`;
        this.answer.style.marginBottom = null;
        this.chevron.style.transform = 'rotate(180deg)';
    }

    hide() {
        this.answer.style.maxHeight = null;
        this.answer.style.marginBottom = "-1rem";
        this.chevron.style.transform = 'rotate(0deg)';
    }
}
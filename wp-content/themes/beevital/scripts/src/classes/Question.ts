export default class Question {
    node: HTMLElement;
    question: HTMLElement;
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
        this.chevron = document.createElement("div");
        this.chevron.innerHTML = "&#10133;";
        this.chevron.classList.add("icon");
        this.question = (this.node.getElementsByClassName("schema-faq-question") as HTMLCollectionOf<HTMLElement>)[0];
        let questionContainer = document.createElement("div");
        questionContainer.className = "schema-faq-question-container";
        questionContainer.appendChild(this.question);
        questionContainer.appendChild(this.chevron);
        this.node.insertBefore(questionContainer, this.answer);

    }

    show() {
        this.answer.style.transition = `${this.answer.scrollHeight/4 + 150}ms`
        this.answer.style.maxHeight = `${this.answer.scrollHeight}px`;
        this.answer.style.marginBottom = "1rem";
        this.chevron.innerHTML = "&#10134;"
    }

    hide() {
        this.answer.style.maxHeight = null;
        this.answer.style.marginBottom = "-1rem";
        this.chevron.innerHTML = "&#10133;"
    }
}
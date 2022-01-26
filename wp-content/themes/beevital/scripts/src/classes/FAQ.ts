import Question from "./Question";

export default class Faq {
    node : HTMLElement;
    questions : Array<Question> = [];
    answers : HTMLCollectionOf<HTMLElement>;


    constructor(node : HTMLElement) {
        this.node = node;
        let questions = node.getElementsByClassName("schema-faq-section") as HTMLCollectionOf<HTMLElement>;
        for (let i = 0; i < questions.length; i++) {
            const question = questions[i];
            this.questions = [...this.questions, new Question(question)];
        }

        this.attachEventListeners();
    }

    closeAllMenus() {
        this.questions.forEach(q => {
            q.hide();
        })
    }

    attachEventListeners() {
        this.questions.forEach(q => {
            q.node.addEventListener("click", (e) => {
                q.isShowing ? q.hide() : q.show();
            })
        })
    }
}
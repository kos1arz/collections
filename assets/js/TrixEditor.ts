// export class TrixEditor {
//   private trix: HTMLElement | undefined;
//   private toolBar: HTMLElement | undefined;
//   private textArea: HTMLTextAreaElement | undefined;

//   constructor() {
//     const trixEditor = document.querySelector("trix-editor");
//     if (trixEditor) {
//       this.trix = trixEditor as HTMLElement;
//       // @ts-ignore
//       this.toolBar = this.trix.toolbarElement;

//       this.textArea = document.createElement("textarea");
//       this.textArea.style.width = "100%";
//       this.textArea.style.height = "400px";
//       this.textArea.style.display = "none";
//       // @ts-ignore
//       this.trix.parentNode.insertBefore(this.textArea, this.trix);
//       this.init();
//     }
//   }

//   init() {
//     this.createCustomDropdown();
//     this.addHTMLCodeToggleButton();
//   }

//   private createCustomDropdown() {
//     let customDropdown = document.createElement("div");
//     customDropdown.className = "trix-button custom-dropdown";

//     let dropdownBtn = document.createElement("button");
//     dropdownBtn.type = "button";
//     dropdownBtn.className = "dropdown-toggle";
//     dropdownBtn.innerHTML = "Wybierz blok HTML";

//     customDropdown.appendChild(dropdownBtn);

//     let test = document.createElement("select");
//     test.className = "form-select";
//     test.innerHTML = `
//       <option selected>Open this select menu</option>
//       <option value="1">One</option>
//       <option value="2">Two</option>
//       <option value="3">Three</option>`;

//     customDropdown.appendChild(test);

//     let dropdownContent = document.createElement("div");
//     dropdownContent.className = "dropdown-content";

//     const dupa = `<div class="container" style="margin-top: 65px">
//     <div class="row">
//         <div class="col-12 col-lg-6">
//             <img class="img-fluid mx-auto" src="/build/images/Group7609.svg">
//         </div>

//         <div class="col-12 col-lg-6">
//             <div style="margin-top: 25px">
//                 <h2>Czego się nauczysz</h2>
//                 <p>Zaufaj profesjonalistom</p>
//                 <br>
//                 <ul class="course-aproved-list">
//                     <li>
//                         Zostań instruktorem najdynamiczniej rozwijającej się
//                         aktywności na świecie!
//                     </li>
//                     <li>
//                         Kształć się pod okiem pionierów Nordic Walking w Polsce
//                         i dołącz do ponad 3500 profesjonalisów
//                     </li>
//                     <li>
//                         Nasze kursy są rekomendowane przez twórcę Nordic Walking
//                         - Marko Kantanevę
//                     </li>
//                     <li>
//                         Jedyne w Polsce zaświadczenie Ministerstwa Edukacji
//                         Narodowej!
//                     </li>
//                     <li>
//                         Legitymacja Instruktora z poleceniem samego twórcy-
//                         Marko Kantanevy (jako jedyna organizacja w Polsce
//                         posiadamy świadectwo jakości i akredytację World
//                         Original Nordic Walking Federation)
//                     </li>
//                     <li>
//                         Tylko z nami dołączysz do największej Ogólnopolskiej
//                         bazy Instruktorów www.znajdzinstruktora.pl
//                     </li>
//                 </ul>
//             </div>
//         </div>
//     </div>
// </div>`;

//     let blocks = [
//       { name: "Test 1", html: dupa },
//       { name: "Test 2", html: "<h1>Test 2</h1>" },
//     ];

//     blocks.forEach((block) => {
//       let blockOption = document.createElement("a");
//       blockOption.href = "#";
//       blockOption.innerHTML = block.name;
//       blockOption.addEventListener("click", (e: Event) => {
//         e.preventDefault();
//         (this.trix as any).editor.insertHTML(block.html);
//         (this.trix as any).setAttribute("data-original-html", block.html);
//       });
//       dropdownContent.appendChild(blockOption);
//     });

//     customDropdown.appendChild(dropdownContent);
//     // @ts-ignore
//     this.toolBar
//       .querySelector(".trix-button-group--block-tools")
//       .appendChild(customDropdown);
//   }

//   private addHTMLCodeToggleButton() {
//     let btn = document.createElement("button");
//     btn.type = "button";
//     btn.className = "trix-button trix-button--html-code";
//     btn.innerHTML = "Kod HTML";
//     btn.addEventListener("click", () => {
//       this.toggleHTMLCodeView();
//     });
//     // @ts-ignore
//     this.toolBar.appendChild(btn);
//   }

//   private toggleHTMLCodeView() {
//     // @ts-ignore
//     if (this.textArea.style.display === "none") {
//       const htmlContent =
//         // @ts-ignore
//         this.trix.getAttribute("data-original-html") || this.trix.innerHTML;
//       // @ts-ignore
//       this.textArea.value = htmlContent;
//       // @ts-ignore
//       this.trix.style.display = "none";
//       // @ts-ignore
//       this.textArea.style.display = "block";
//     } else {
//       const editorContent = (this.trix as any).editor;
//       // @ts-ignore
//       editorContent.loadHTML(this.textArea.value);
//       // @ts-ignore
//       this.trix.setAttribute("data-original-html", this.textArea.value);
//       // @ts-ignore
//       this.trix.style.display = "block";
//       // @ts-ignore
//       this.textArea.style.display = "none";
//     }
//   }
// }

// @ts-nocheck
export class TrixEditor {
  private trix: HTMLElement;
  private textArea: HTMLTextAreaElement;
  private originalHTMLContainer: HTMLInputElement;
  private toolbarButton: HTMLElement;
  private htmlToggleButton: HTMLElement;

  constructor() {
    this.trix = document.querySelector("trix-editor");
    console.log(this.trix);
    if (!this.trix) {
      console.warn("Element trix-editor nie został znaleziony.");
      return;
    }

    this.textArea = document.createElement("textarea");

    this.setupTextArea();
    this.addToolbarButton();
    this.addHTMLToggleButton();
    // this.setUpFormSubmitHandler();
  }

  private setupTextArea() {
    this.textArea.style.width = "100%";
    this.textArea.style.height = "400px";
    this.textArea.style.display = "none";
    this.trix.parentElement.appendChild(this.textArea);
  }

  private addToolbarButton() {
    this.toolbarButton = document.createElement("button");
    this.toolbarButton.innerText = "Test 1";
    this.toolbarButton.addEventListener("click", (e) => {
      e.preventDefault();
      const htmlContent = `<div class="container" style="margin-top: 65px"><h2>Czego się nauczysz</h2></div>`;
      //     const htmlContent = `<div class="container" style="margin-top: 65px">
      //     <div class="row">
      //         <div class="col-12 col-lg-6">
      //             <img class="img-fluid mx-auto" src="/build/images/Group7609.svg">
      //         </div>

      //         <div class="col-12 col-lg-6">
      //             <div style="margin-top: 25px">
      //                 <h2>Czego się nauczysz</h2>
      //                 <p>Zaufaj profesjonalistom</p>
      //                 <br>
      //                 <ul class="course-aproved-list">
      //                     <li>
      //                         Zostań instruktorem najdynamiczniej rozwijającej się
      //                         aktywności na świecie!
      //                     </li>
      //                     <li>
      //                         Kształć się pod okiem pionierów Nordic Walking w Polsce
      //                         i dołącz do ponad 3500 profesjonalisów
      //                     </li>
      //                     <li>
      //                         Nasze kursy są rekomendowane przez twórcę Nordic Walking
      //                         - Marko Kantanevę
      //                     </li>
      //                     <li>
      //                         Jedyne w Polsce zaświadczenie Ministerstwa Edukacji
      //                         Narodowej!
      //                     </li>
      //                     <li>
      //                         Legitymacja Instruktora z poleceniem samego twórcy-
      //                         Marko Kantanevy (jako jedyna organizacja w Polsce
      //                         posiadamy świadectwo jakości i akredytację World
      //                         Original Nordic Walking Federation)
      //                     </li>
      //                     <li>
      //                         Tylko z nami dołączysz do największej Ogólnopolskiej
      //                         bazy Instruktorów www.znajdzinstruktora.pl
      //                     </li>
      //                 </ul>
      //             </div>
      //         </div>
      //     </div>
      // </div>`;
      // (this.trix as any).editor.loadHTML(htmlContent);
      (this.trix as any).editor.loadHTML(htmlContent);
      console.log(htmlContent);
      console.log((this.trix as any).editor);
    });
    const toolbar = this.trix.toolbarElement;
    toolbar.appendChild(this.toolbarButton);
  }

  private addHTMLToggleButton() {
    this.htmlToggleButton = document.createElement("button");
    this.htmlToggleButton.innerText = "Pokaż HTML";
    this.htmlToggleButton.addEventListener("click", (e) => {
      e.preventDefault();
      this.toggleHTMLCodeView();
    });
    const toolbar = this.trix.toolbarElement;
    toolbar.appendChild(this.htmlToggleButton);
  }

  //   private toggleHTMLCodeView() {
  //     // @ts-ignore
  //     if (this.textArea.style.display === "none") {
  //       const htmlContent =
  //         // @ts-ignore
  //         this.trix.getAttribute("data-original-html") || this.trix.innerHTML;
  //       // @ts-ignore
  //       this.textArea.value = htmlContent;
  //       // @ts-ignore
  //       this.trix.style.display = "none";
  //       // @ts-ignore
  //       this.textArea.style.display = "block";
  //     } else {
  //       const editorContent = (this.trix as any).editor;
  //       // @ts-ignore
  //       editorContent.loadHTML(this.textArea.value);
  //       // @ts-ignore
  //       this.trix.setAttribute("data-original-html", this.textArea.value);
  //       // @ts-ignore
  //       this.trix.style.display = "block";
  //       // @ts-ignore
  //       this.textArea.style.display = "none";
  //     }
  //   }
  // }

  private toggleHTMLCodeView() {
    if (this.textArea.style.display === "none") {
      console.log(this.trix);
      this.textArea.value = this.trix.loadHTML();
      this.trix.style.display = "none";
      this.textArea.style.display = "block";
      this.htmlToggleButton.innerText = "Pokaż Wizualnie";
    } else {
      this.trix.loadHTML(this.textArea.value);
      // this.trix.dispatchEvent(new Event("input"));
      this.trix.style.display = "block";
      this.textArea.style.display = "none";
      this.htmlToggleButton.innerText = "Pokaż HTML";
    }
  }

  private setUpFormSubmitHandler() {
    const form = this.trix.closest("form");
    if (form) {
      form.addEventListener("submit", (e) => {
        console.log(123);
        e.preventDefault();
        const formData = new FormData(form);
        formData.set("trix_content", this.originalHTMLContainer.value);
        // W tym miejscu możesz wysłać formularz używając fetch lub XMLHttpRequest
        // lub form.submit(), jeśli chcesz przekazać kontrolę nad wysyłaniem formularza z powrotem do przeglądarki.
      });
    }
  }
}

const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      arrow = body.querySelector(".arrow");

      arrow.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
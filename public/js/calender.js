document.addEventListener("DOMContentLoaded", function () {
  const prevMonthButton = document.getElementById("prev-month");
  const nextMonthButton = document.getElementById("next-month");
  const calendarMonth = document.getElementById("calendar-month");
  const calendarBody = document.getElementById("calendar-body");

  let currentMonth = new Date().getMonth(); // 0 - 11
  let currentYear = new Date().getFullYear();

  function renderCalendar(month, year) {
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    let calendarHTML = "";
    let day = 1;

    // Create empty cells for days before the 1st of the month
    calendarHTML += "<tr>";
    for (let i = 0; i < firstDay; i++) {
      calendarHTML += "<td></td>";
    }

    // Create cells for each day in the month
    for (let i = firstDay; i < 7; i++) {
      calendarHTML += `<td>${day}`;
      // Add event rect if it's a special day (example)
      if (day === 1) calendarHTML += '<div class="event-rect" data-bs-toggle="modal" data-bs-target="#eventModal">Foto</div>';
      calendarHTML += "</td>";
      day++;
    }
    calendarHTML += "</tr>";

    // Continue with remaining weeks
    while (day <= daysInMonth) {
      calendarHTML += "<tr>";
      for (let i = 0; i < 7 && day <= daysInMonth; i++) {
        calendarHTML += `<td>${day}`;
        // Add event rect if it's a special day (example)
        if (day === 12) calendarHTML += '<div class="event-rect" data-bs-toggle="modal" data-bs-target="#eventModal">Video</div>';
        calendarHTML += "</td>";
        day++;
      }
      calendarHTML += "</tr>";
    }

    // Fill remaining cells in the last row
    if (new Date(year, month, daysInMonth).getDay() !== 6) {
      calendarHTML += "<tr>";
      for (let i = new Date(year, month, daysInMonth).getDay() + 1; i < 7; i++) {
        calendarHTML += "<td></td>";
      }
      calendarHTML += "</tr>";
    }

    calendarBody.innerHTML = calendarHTML;

    // Update month and year display
    const options = { month: "long", year: "numeric" };
    calendarMonth.textContent = new Date(year, month).toLocaleDateString(undefined, options);
  }

  prevMonthButton.addEventListener("click", function () {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    renderCalendar(currentMonth, currentYear);
  });

  nextMonthButton.addEventListener("click", function () {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    renderCalendar(currentMonth, currentYear);
  });

  // Initial render
  renderCalendar(currentMonth, currentYear);
});

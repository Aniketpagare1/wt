import React, { useState, useEffect } from 'react';
import './Calendar.css';

const Calendar = () => {
  const [currentDate, setCurrentDate] = useState(new Date());
  const [calendar, setCalendar] = useState([]);

  useEffect(() => {
    renderCalendar(currentDate);
  }, [currentDate]);

  const renderCalendar = (date) => {
    const monthDays = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    const prevMonthDays = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
    const firstDayIndex = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
    const lastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
    const nextDays = 7 - lastDayIndex - 1;

    const daysArray = [];

    for (let x = firstDayIndex; x > 0; x--) {
      daysArray.push({
        day: prevMonthDays - x + 1,
        currentMonth: false
      });
    }

    for (let i = 1; i <= monthDays; i++) {
      daysArray.push({
        day: i,
        currentMonth: true,
        isToday: i === new Date().getDate() && date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear()
      });
    }

    for (let j = 1; j <= nextDays; j++) {
      daysArray.push({
        day: j,
        currentMonth: false
      });
    }

    setCalendar(daysArray);
  };

  const months = [
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
  ];

  const prevMonth = () => {
    setCurrentDate(new Date(currentDate.setMonth(currentDate.getMonth() - 1)));
  };

  const nextMonth = () => {
    setCurrentDate(new Date(currentDate.setMonth(currentDate.getMonth() + 1)));
  };

  return (
    <div className="calendar">
      <div className="calendar-header">
        <button onClick={prevMonth}>Prev</button>
        <h2>{months[currentDate.getMonth()]} {currentDate.getFullYear()}</h2>
        <button onClick={nextMonth}>Next</button>
      </div>
      <div className="calendar-body">
        <div className="calendar-weekdays">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div className="calendar-days">
          {calendar.map((day, index) => (
            <div
              key={index}
              className={`day ${day.currentMonth ? '' : 'prev-next-month'} ${day.isToday ? 'today' : ''}`}
            >
              {day.day}
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Calendar;

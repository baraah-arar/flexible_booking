@props(['action'])
<x-modal-overlay id="calendar-overlay">
    <x-modal-header closeDes=''>click to set start & end time for your reservation</x-modal-header>
<div class="calendar_cont">
            <div class="calendar_form mt-8 flex flex-col items-center justify-center">
                <form action="{{$action}}" method="put" class="flex items-center justify-center">
                    @csrf
                    <div class="flex items-center justify-center mx-2">
                        <input type="text" vlaue="" name="start_date" id="checkIn" class="border-b-2 border-gray-200 h-8">
                        <svg class="w-6 h-8 border-b-2 border-gray-200 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                     <div class="flex items-center justify-center mx-2">
                        <input type="text" vlaue="" name="end_date" id="checkOut" class="border-b-2 border-gray-200 h-8">
                        <svg class="w-6 h-8 border-b-2 border-gray-200 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <button type="button" value="Book" class="calender_btn mx-2">Check Time</button>
                </form>
                <div class="error_message text-red-400 text-xs font-medium"></div>
            </div>
            <div class="calendar_head flex items-center justify-center mt-8">
                <button class="before" data-type='prevMonth' value="">pm
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <button class="before mx-2" data-type='prevWeek' value="">pw
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                </button>
                <h3 class="date mx-4">Month 2021</h3>
                <button class="next mx-2" data-type='nextWeek' value="">nw
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </button>
                <button class="next" data-type='nextMonth' value="">nm
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </button>    
            </div>
        	<div class="calendar">
        		<div class="empty"></div>
        	</div>
        </div>
</x-modal-overlay>
    	<script type="text/javascript">
    		days_arr = ['','Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    		hours_arr = ['','08:00 am', '09:00:00 am', '10:00 am', '11:00 am', '12:00', '01:00 pm', '02:00 pm', '03:00 pm', '04:00 pm', '05:00 pm', '06:00 pm', '07:00 pm', '08:00 pm','09:00 pm', '10:00 pm', '11:00 pm'];
    		const calendar_div = document.querySelector('.calendar');
            const header_date = document.querySelector('.calendar_head .date');

            function initLoad(){
        		for (var c = 0; c <days_arr.length; c++) {
                    createMainRows(days_arr[c], c, 0)
        			for (var r = 1; r <hours_arr.length; r++) {
    	    			createMainRows(hours_arr[r], c, r);
    	    		}
        		}
            }
    		
    		function createMainRows(data, c, r){
    			const dayNameDiv = document.createElement('div');
    			c === 0? dayNameDiv.classList.add(`dayName`, `row${r+1}`, `col${c+1}`) : dayNameDiv.classList.add(`cell`,`hour`, `row${r+1}`, `col${c+1}`);
                r === 0 && dayNameDiv.classList.add('head');
    			const dayNameSpan = document.createElement('Span');
                r === 0 ? dayNameSpan.textContent = data.substr(0,3) : dayNameSpan.textContent = data;    			
    			dayNameDiv.appendChild(dayNameSpan);
    			calendar_div.appendChild(dayNameDiv);
    		}

            function init(date){
                // date = new Date();
                header_date.textContent = `${date.toLocaleString("default", {month: "long"})} ${date.getFullYear()}`;
                // console.log(new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate());
                // console.log(date.toLocaleString("default", {weekday: "long"}));
                console.log(date);
                mapDayNumMon(date);
                fillDateTimeCells(date);
            }

            function mapDayNumMon(date){
                // console.log(date.toDateString());
                const temp_date_week = date;
                const head_elems = document.querySelectorAll('.head');
                const current_day = temp_date_week.toLocaleString("default", {weekday: "long"});
                let curr_day_index = days_arr.indexOf(current_day) - 1;             
                // const options = {weekday:'short', day: 'numeric', month: 'short', year:'numeric'};
                // console.log(start_from_day);
                // console.log(date.toLocaleString('en-us', options));
                temp_date_week.setDate(temp_date_week.getDate() - curr_day_index);
                console.log(curr_day_index);
                for(i=1; i<head_elems.length; i++){                
                    head_elems[i].classList.add(`${temp_date_week.getDate()}`);
                    let day_num_span = document.createElement('span');
                    day_num_span.classList.add('dayNumber');
                    head_elems[i].querySelector('.dayNumber') &&
                        head_elems[i].removeChild(head_elems[i].querySelector('.dayNumber'));
                    day_num_span.textContent = `${temp_date_week.getDate()}`;
                    head_elems[i].appendChild(day_num_span);
                    console.log(date);
                    head_elems[i].dataset.dateTime = temp_date_week.toDateString();
                    // console.log(head_elems[i].dataset.dateTime);
                    temp_date_week.setDate(temp_date_week.getDate() + 1);
                }
            }

            function fillDateTimeCells(date){
                const cells = document.querySelectorAll('.cell');
                let temp_date = date;
                let index = 1;
                [...cells].map(cell => {
                    if(cell.classList.contains('head'))
                        temp_date = cell.dataset.dateTime;
                    else
                        if(index<hours_arr.length){
                            // console.log(cell);
                            cell.dataset.dateTime = `${temp_date} ${hours_arr[index]}`;
                            index++;}
                        else{
                            index = 1;
                            cell.dataset.dateTime = `${temp_date} ${hours_arr[index]}`;
                            index++;
                        }
                })
            }

            function setDateEvent(nav_month, nav_week){
                const date = new Date();
                date.setMonth(date.getMonth() + nav_month);
                date.setDate(date.getDate() + nav_week);
                init(date);
            }

            initLoad();
            init(new Date());
            // console.log(date.getFullYear() + 1);
            // console.log(date.toLocaleString("default", {month: "long"}));
            var nav_month = 0;
            var nav_week  = 0;
                      
            document.addEventListener('click', (e) => {
                // console.log(date);
                
                if(e.target.dataset.type === 'nextMonth'){
                    nav_month++;
                    setDateEvent(nav_month, nav_week);
                    // console.log(date.toLocaleString("default", {weekday: "long"}));
                    // console.log(date.getFullYear()); 
                    // console.log(date);
                    // header_date.textContent = `${date.toLocaleString("default", {month: "long"})} ${date.getFullYear()}`;
                    // init(date);
                }
                if(e.target.dataset.type === 'prevMonth'){
                    nav_month--;
                    setDateEvent(nav_month, nav_week);
                    // date.setMonth(date.getMonth() + nav_month); 
                    // header_date.textContent = `${date.toLocaleString("default", {month: "long"})} ${date.getFullYear()}`;
                    // init(date);
                }
                if(e.target.dataset.type === 'nextWeek'){
                    nav_week += 7;
                    setDateEvent(nav_month, nav_week);
                    // date.setDate(date.getDate() + nav_week);
                    // console.log(date.toLocaleString("default", {month: "long"}));
                    // console.log(date); 
                    // header_date.textContent = `${date.toLocaleString("default", {month: "long"})} ${date.getFullYear()}`;
                    // init(date);
                }
                if(e.target.dataset.type === 'prevWeek'){
                    nav_week -= 7;
                    setDateEvent(nav_month, nav_week);
                    // date.setDate(date.getDate() + nav_week);
                    // console.log(date);  
                    // header_date.textContent = `${date.toLocaleString("default", {month: "long"})} ${date.getFullYear()}`;
                    // init(date);
                }
            })

            const check_in_input = document.querySelector('.modal #checkIn');
            const check_out_input = document.querySelector('.modal #checkOut');

            function hendlePickTime(cell){
                console.log(check_in_input.value);
                if(check_in_input.value != '' && check_out_input.value != '')
                    resetValues();
                else{
                    if(check_in_input.value == '') { 
                        check_in_input.value = cell.dataset.dateTime
                    }else if(new Date(cell.dataset.dateTime) > new Date(check_in_input.value)){
                        check_out_input.value = cell.dataset.dateTime;
                    }else
                        document.querySelector('.error_message').innerText = 'Not valid date';
                }
            }
            console.log(new Date('Sun Dec 26 2021 10:00 am') < new Date('Mon Dec 27 2021 11:00 am'));
            function resetValues(){
                check_in_input.value = '';
                check_out_input.value = '';
            }

            const cells_btn = document.querySelectorAll('.cell:not(.head)');
            [...cells_btn].map(cell => {
                cell.addEventListener('click', (e)=> {hendlePickTime(cell)});
            })
    	</script>
import { Injectable } from '@angular/core';
import { Jsonp, Http, Response, Headers, RequestOptions } from '@angular/http';
import { Observable, Subject } from 'rxjs';

@Injectable()
export class TrackerService {

  constructor(private http: Http) {
  }

  pollList():Observable<any>{
      let url = 'http://localhost/ports-list-tracker/php-server/api/ports.controller.php';
      let body = "command=listPorts&options={id:13}";
      let payload = (url + "?" + body);
      
      let pollingSubject = new Subject<any>();
    
      //Ever 2 seconds send a request to the server for changes
      setInterval(()=>{
        this.http.get(payload)
        .map(res => res.text() ? res.json() : {}).subscribe(data => {
          pollingSubject.next(data);
        });
      },1000);

      return pollingSubject;

  }

}

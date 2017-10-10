import { Component, OnInit } from '@angular/core';
import { TrackerService } from './tracker.service';

import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';
import { Observer } from 'rxjs/Observer';
import 'rxjs/Rx';

@Component({
    selector:'tracker',
    templateUrl:'tracker.component.html',
    styleUrls:['tracker.component.css'],
    providers:[ TrackerService ]
})

export class TrackerComponent implements OnInit {

    displayList: any[] = [];
  
    constructor(private service:TrackerService){}

    dataStream: Subject<IListItem[]>;
    sortedAndIndexedDataStream: Observable<IListItem[]>;
    isListLoading:boolean = true;

    ngOnInit(){

        this.sortedAndIndexedDataStream = this.service.pollList().map((list:any[])=>{
            this.processItems(list);
            return this.displayList;
        })

        //Let the template know the data has finished loading
        // this.sortedAndIndexedDataStream.subscribe(data => {
        //     this.isListLoading = false 
        //     //console.log(data);
        // });
    }

    processItems(list: any[]){
        list.sort( (a,b) => b.amount-a.amount);

        list.forEach((element,orderedListIndex) => {

            let matchedItem = this.displayList.find( (val:any) => {
                return val.key == element.key;
            });

            if(matchedItem !== undefined){
                    this.mapValues(matchedItem, element);
                    this.makeDynamics(matchedItem, orderedListIndex);
            }else{
                this.displayList.push(element);
                this.displayList[this.displayList.length-1].dynamics = {};
                this.displayList[this.displayList.length-1].dynamics.index = this.displayList.length-1;
                this.displayList[this.displayList.length-1].dynamics.direction = 0;
            }

        });
    }

    makeDynamics(element: any, newIndex: number){

        element.dynamics.velocity = Math.abs(element.dynamics.index - newIndex);

        if(element.dynamics.index > newIndex){
            element.dynamics.direction = 1;
        }else if(element.dynamics.index < newIndex){
            element.dynamics.direction = -1;
        }else{
            element.dynamics.direction = 0;
        }
        element.dynamics.index = newIndex;
    }

    mapValues(val:any, element:any){
        for(let property in element){
            if(property !== 'dynamics'){
                val[property] = element[property];
            }
        }
    }

    animationCallback(item :IListItem, event:TransitionEvent){
        if(event.srcElement.id == 'amtctnr'){
            item.dynamics.direction = 0;
        }
    }

    makeListItemStyle(listItem:IListItem):Object{

        let index = 0;
        if(listItem.dynamics.direction === -1){ index = 0;}
        if(listItem.dynamics.direction === 0){ index = -1;}
        if(listItem.dynamics.direction === 1){ index = 1;}
        index += 3;

        return {
            'z-index': index,
            'top': (78 * listItem.dynamics.index) + 'px',
            'transition-duration': (0.4 + (listItem.dynamics.velocity/this.displayList.length*2.5)) + "s"
        };
    }

    makeProfilePic(listItem: IListItem){
        return {
            'background-image': 'url(' + listItem.profileImagePath + ')'
        }
    }

}

class IListItem {
    city:string;
    dataCenter:string;
    profileImagePath:string;
    amount:number;

    dynamics:IListItemDynamics;
}

interface IListItemDynamics {
    index?:number;
    velocity?:number;
    direction?:number;
}
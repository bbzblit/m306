import {User} from "./User.model";

export interface Set {
    id: number;
    owner: User;
    title: string;
}

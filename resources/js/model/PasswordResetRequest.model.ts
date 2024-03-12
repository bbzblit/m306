import {User} from "./User.model";

export interface PasswordResetRequest {
    id: number;
    user: User;
    code: string;
}
